<?php

function my_autoloader($className)
{
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.$className . ".php";
}

spl_autoload_register("my_autoloader");

class Models extends Database {

	// constructor of Models class
	public function __construct()
	{
		parent::__construct();
	}
}
