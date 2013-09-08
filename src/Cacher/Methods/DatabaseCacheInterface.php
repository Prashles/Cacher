<?php namespace Prash\Cacher;

interface DatabaseCacheInterface {
	/**
	 * Check if name already exists in table
	 * 
	 * @param  string $name
	 * @return boolean
	 */
	public function existsInTable($name);

}