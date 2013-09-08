<?php

return [

	/**
	 * General settings
	 */
	
	'general' => [

		// Which method to use for caching
		// file, redis, memcached, apc, database 
		'method' => 'database'

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

		// The database driver to use
		//
		// Only supports mysql for now
		'driver' => 'mysql',


		// mysql settings
		'mysql' => [
			// DB Host
			'host' => 'localhost',

			// DB Username
			'username' => 'root',

			// DB Password
			'password' => '',

			// DB name
			'database_name' => 'cache'
		]

	],

	/**
	 * Settings for APC cache
	 */

	'apc' => [

		// Prefix item names
		'prefix' => ''

	],

	'aliases' => [
		'file' => '\Prash\Cacher\FileCache',
		'mysql' => '\Prash\Cacher\DatabaseMysqlCache'
	]

];