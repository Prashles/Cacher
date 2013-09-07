<?php

// For testing

function __autoload($class)
{
	$parts = explode('\\', $class);

	$file = __DIR__ . '/' . end($parts) . '.php';

	if (file_exists($file)) {
		include_once $file;
	}

	$file = __DIR__ . '/Methods/' . end($parts) . '.php';

	if (file_exists($file)) {
		include_once $file;
	}
}