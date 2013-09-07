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

	'aliases' => [
		'file' => '\Prash\Cacher\FileCache'
	]

];