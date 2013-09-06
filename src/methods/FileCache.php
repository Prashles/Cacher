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
	public function __construct($prefix, $path)
	{
		$this->prefix = $prefix;
		$this->path   = (strlen($path) - 1) == '/') ? $this->path : $this->page . '/';
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

		file_put_contents($this->filePath($name), $data);
	}

	/**
	 * Retrieve an item from the cache
	 * 
	 * @param  string $name
	 * @return mixed
	 */
	public static function get($name)
	{	
		$file = $this->filePath($name);

		if (!file_exists($file)) {
			return null;
		}

		$file = file($file);

		if ($file['expiry'] < time()) {
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
	public static function remove($key);

	/**
	 * Remove all items in cache
	 * 
	 * @return null
	 */
	public static function removeAll();

	/**
	 * Check if cache item exists
	 * 
	 * @return boolean
	 */
	public static function exists();

	/**
	 * Name of cache file
	 * @param  string $name
	 * @return string
	 */
	protected function filePath($name)
	{
		return $this->path . md5($name);
	}

}