<?php

class Autoloader 
{
	/**
	 * description
	 */
	public static function classLoader(string $className)
	{
		//code_here
		$filePath = __DIR__ . "/config/" . $className . ".php";
		
		if (is_readable($filePath)) {
			require $filePath;
		}
	}
	
	/**
	 * description
	 */
	public static function modelsLoader(string $className)
	{
		//code_here
		$filePath = __DIR__ . "/models/" . $className . ".php";
		
		if (is_readable($filePath)) {
			
			require $filePath;
		}
	}
}

Autoloader::modelsLoader('MReferensiBulan');

spl_autoload_register('Autoloader::modelsLoader');
