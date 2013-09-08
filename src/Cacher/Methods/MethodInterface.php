<?php namespace Prash\Cacher;

interface MethodInterface {

	/**
	 * Store an item in the cache
	 * 		
	 * @param  mixed   $name  
	 * @param  mixed   $value 
	 * @param  integer $time  
	 * @return null
	 */
	public function store($name, $value, $time);

	/**
	 * Retrieve an item from the cache
	 * 
	 * @param  string $name
	 * @return mixed
	 */
	public function get($name);

	/**
	 * Remove an item from the cache
	 * 
	 * @param  mixed $key
	 * @return null
	 */
	public function remove($name);

	/**
	 * Remove all items in cache
	 * 
	 * @return null
	 */
	public function removeAll();

	/**
	 * Check if cache item exists
	 * 
	 * @return boolean
	 */
	public function exists($name);

	/**
	 * Cache item with no expiry
	 * 
	 * @param  string $name
	 * @param  mixed $value
	 * @return null
	 */
	public function permanent($name, $value);

}