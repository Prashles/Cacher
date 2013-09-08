<?php namespace Prash\Cacher;

use PDO;

class DatabaseConnection {

	/**
	 * PDO Instance
	 * 
	 * @var $pdo
	 */
	protected $db;

	/**
	 * DB Host
	 * 
	 * @var string
	 */
	protected $host = 'localhost';

	/**
	 * DB Username
	 * 
	 * @var string
	 */
	protected $username = '';

	/**
	 * DB Password
	 * 
	 * @var string
	 */
	protected $password = '';

	/**
	 * DB Name
	 * 
	 * @var string
	 */
	protected $databaseName;

	public function __construct($host, $username, $password, $databaseName)
	{
		$this->host         = $host;
		$this->username     = $username;
		$this->password     = $password;
		$this->databaseName = $databaseName;
	}

	public function connectMysql()
	{
		try {
			return new PDO("mysql:host={$this->host};dbname={$this->databaseName};charset=utf8", $this->username, $this->password, 
				[PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		} catch (PDOException $e) {
			throw new Exception('Could not connect to database: ' . $e->getMessage());
		}
	}


}