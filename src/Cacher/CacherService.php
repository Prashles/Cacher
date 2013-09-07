<?php namespace Prash\Cacher;

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
	public function __construct(array $config = null, MethodInterface $method = null)
	{	
		// If no config array is injected, include default
		if ($config === null) {
			$config = include_once __DIR__ . '/config.php';
		}

		$this->config = $config;
		$this->method = $method;
	}

	public function get($name)
	{
		return func_get_args();
		return $this->method->get($name);
	}


}