<?php

function my_autoloader($class)
{
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.$class.'.php';
}

spl_autoload_register('my_autoloader');

class Model extends Database {

	// constructor of Model class
	public function __construct()
	{
		parent::__construct();
	}
}
