<?php

function my_autoloader($class)
{
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.$class.'.php';
}

spl_autoload_register('my_autoloader');

class Controller {

	// constructor of Controller class
	public function __construct()
	{
		
	}
}
