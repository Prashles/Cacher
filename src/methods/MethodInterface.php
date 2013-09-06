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
	public static function get($name);

	/**
	 * Remove an item from the cache
	 * 
	 * @param  mixed $key
	 * @return null
	 */
	public static function remove($name);

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
	public static function exists($name);

}