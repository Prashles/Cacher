<?php namespace Prash\Cacher;

use Closure;

class CacherService {

	/**
	 * Config file
	 * 
	 * @var array
	 */
	protected $config;

	/**
	 * Class instance of method used
	 * 
	 * @var MethodInterface
	 */
	protected $method;

	/**
	 * Init
	 * 
	 * @param MethodInterface $method
	 */
	public function __construct(array $config, MethodInterface $method)
	{
		$this->config = $config;
		$this->method = $method;
	}

	/**
	 * Retrieve item from cache
	 * 
	 * @param  string $name
	 * @return mixed
	 */
	public function get($name)
	{
		return $this->method->get($name);
	}

	/**
	 * Store new item in cache
	 * 
	 * @param  string $name
	 * @param  mixed $value
	 * @param  integer $time
	 * @return null
	 */
	public function store($name, $value, $time)
	{
		return $this->method->store($name, $value, $time);
	}

	/**
	 * Check if cache is present, if not, store
	 * 
	 * @param  string  $name
	 * @param  integer  $time
	 * @param  Closure $value
	 * @return mixed
	 */
	public function make($name, $time, Closure $value)
	{
		// If exists, return
		if ($this->method->exists($name)) {
			return $this->method->get($name);
		}

		// Otherwise store

		$value = $value();

		$this->method->store($name, $value, $time);

		return $value;
	}

	/**
	 * Remove item from cache
	 * 
	 * @param  string $name
	 * @return null
	 */
	public function remove($name)
	{
		return $this->method->remove($name);
	}

	/**
	 * Remove all files from cache
	 * 
	 * @return null
	 */
	public function removeAll()
	{
		return $this->method->removeAll();
	}

	/**
	 * Check if cache item exists
	 * 
	 * @param  string $name
	 * @return boolean
	 */
	public function exists($name)
	{
		return $this->method->exists($name);
	}

}