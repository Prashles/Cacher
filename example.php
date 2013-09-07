<?php
use \Prash\Cacher\Cacher as Cache;
error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once 'src/Cacher/autoload.php';

$cache = new Cache;

var_dump( Cache::get() ); 