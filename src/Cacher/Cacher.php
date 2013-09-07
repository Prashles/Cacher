<?php namespace Prash\Cacher;

class Cacher {

	/**
	 * Hosts config file
	 * 
	 * @var array
	 */
	public static $config = null;

	/**
	 * Instantiate class when static method called
	 * 
	 * @return mixed
	 */
	public static function __callStatic($function, $args)
    {
    	// If no config file is set, inject default
    	if (self::$config === null) {
    		self::$config = include_once __DIR__ . '/config.php';
    	}

    	$method = 'make' . ucfirst(self::$config['general']['method']) . 'Method';

    	$methodInstance = self::$method();

    	$instance = new CacherService(self::$config, $methodInstance);

        return call_user_func_array([$instance, $function], $args);
    }

    /**
     * Instantiate FileCache class
     * 
     * @return FileCache
     */
    public static function makeFileMethod()
    {
    	return new FileCache(self::$config['file']['path'], self::$config['file']['prefix']);
    }
}