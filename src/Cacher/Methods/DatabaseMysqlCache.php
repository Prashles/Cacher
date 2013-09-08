<?php namespace Prash\Cacher;

use PDO;

class DatabaseMysqlCache implements DatabaseCacheInterface, MethodInterface {

	/**
	 * Connection instance
	 * 
	 * @var PDO
	 */
	protected $db;

	public function __construct(PDO $db)
	{
		$this->db = $db;
	}
	
	/**
	 * Store an item in the cache
	 * 		
	 * @param  mixed   $name  
	 * @param  mixed   $value 
	 * @param  integer $time  
	 * @return null
	 */
	public function store($name, $value, $time)
	{

	}

	/**
	 * Retrieve an item from the cache
	 * 
	 * @param  string $name
	 * @return mixed
	 */
	public function get($name)
	{
		
	}

	/**
	 * Remove an item from the cache
	 * 
	 * @param  mixed $key
	 * @return null
	 */
	public function remove($name)
	{
		
	}

	/**
	 * Remove all items in cache
	 * 
	 * @return null
	 */
	public function removeAll()
	{
		
	}

	/**
	 * Check if cache item exists
	 * 
	 * @return boolean
	 */
	public function exists($name)
	{
		
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
		
	}

	/**
	 * Check if name already exists in table
	 * 
	 * @param  string $name
	 * @return boolean
	 */
	public function existsInTable($name)
	{

	}

}