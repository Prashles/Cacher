<?php namespace Prash\Cacher;

class Cacher {

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
	public function __construct(MethodInterface $method = null)
	{
		global $cacheConfig;

		$this->config = $cacheConfig;
		$this->method = ($method === null) ? new $cacheConfig['aliases'][$cacheConfig['general']['method']] : $method;
	}

	public function get()
	{
		return $this->instance;
	}

	/**
	 * Instantiate class when static method called
	 * 
	 * @return null
	 */
	public static function __callStatic($name, $args)
    {
        $class = new ReflectionClass($name);
        return $class->newInstanceArgs($args);

    	//$class = __CLASS__;

        //$this->instance = new $class;

        //return call_user_func_array($name, $args);
    }
}