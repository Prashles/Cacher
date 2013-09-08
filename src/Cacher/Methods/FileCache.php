<?php namespace Prash\Cacher;

class FileCache implements MethodInterface {

	/**
	 * Prefix the filename of cache files
	 * 
	 * @var string
	 */
	protected $prefix;

	/**
	 * Directory path to store cache files
	 * 
	 * @var string
	 */
	protected $path;

	/**
	 * File system cache
	 * 
	 * @param string $prefix
	 * @param string $path
	 */
	public function __construct($path, $prefix = null)
	{
		$this->prefix = $prefix;
		$this->path   = ($path[(strlen($path) - 1)] == '/') ? $path : $path . '/';
	}

	/**
	 * Store an item in the cache
	 * 		
	 * @param  mixed   $name  
	 * @param  mixed   $value 
	 * @param  integer $time  time in minutes  
	 * @return null
	 */
	public function store($name, $value, $time)
	{
		$path = $this->filePath($name);

		$data = [
			'expiry' => time() + ($time * 60),
			'data'   => serialize($value)
		];

		file_put_contents($this->filePath($name), serialize($data));
	}

	/**
	 * Retrieve an item from the cache
	 * 
	 * @param  string $name
	 * @return mixed
	 */
	public function get($name)
	{	
		$file = $this->fileData($this->filePath($name));

		if ($file['expiry'] < time() && $file['expiry'] != 0) {
			return null;
		}

		return unserialize($file['data']);
	}

	/**
	 * Remove an item from the cache
	 * 
	 * @param  mixed $key
	 * @return null
	 */
	public function remove($name)
	{
		$file = $this->filePath($name);

		if (file_exists($file)) {
			unlink($file);
		}
	}

	/**
	 * Remove all items in cache
	 * 
	 * @return null
	 */
	public function removeAll()
	{
		$files = glob($this->path . '*');

		foreach ($files as $file) {
			unlink($file);
		}
	}

	/**
	 * Check if cache item exists
	 *
	 * @param string   $name
	 * @return boolean
	 */
	public function exists($name)
	{
		$file = $this->fileData($this->filePath($name));

		if ($file === false) {
			return false;
		}

		return ($file['expiry'] < time() && $file['expiry'] != 0) ? false : true;
	}

	/**
	 * Cache item with no expiry
	 * 
	 * @param  string $name
	 * @param  mixed $value
	 * @return null
	 */
	public function permanent($name, $value)
	{
		$path = $this->filePath($name);

		$data = [
			'expiry' => 0,
			'data'   => serialize($value)
		];

		file_put_contents($this->filePath($name), serialize($data));
	}

	/**
	 * Name of cache file
	 * @param  string $name
	 * @return string
	 */
	protected function filePath($name)
	{
		$fileName = ($this->prefix == null) ? $name : $this->prefix . '_' . $name;

		return $this->path . md5($fileName);
	}

	/**
	 * Return file data for file
	 * 
	 * @param  string $filePath
	 * @return 
	 */
	protected function fileData($filePath)
	{
		if (!file_exists($filePath)) {
			return false;
		}

		return unserialize(file_get_contents($filePath));
	}
}