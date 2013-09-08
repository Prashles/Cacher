<?php

return [

	/**
	 * General settings
	 */
	
	'general' => [

		// Which method to use for caching
		// file, redis, memcached, apc, db 
		'method' => 'file'

	],

	/**
	 * Settings to use when using file caching method
	 */
	
	'file'   => [

		// Path to store cache files
		'path'   => getcwd() . '/cache/',

		// Prefix cache file names
		'prefix' => ''
	],

	/**
	 * Database settings (only mysql for now)
	 *
	 * Make sure you have created the cacher_cache table
	 */
	
	'database' => [

		// DB Host
		'host' => 'localhost',

		// DB Username
		'username' => '',

		// DB Password
		'password' => '',

		// DB name
		'database_name' => 'my_db'

	],

	'aliases' => [
		'file' => '\Prash\Cacher\FileCache'
	]

];