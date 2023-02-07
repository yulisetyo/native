<?php

Class Database {
	
	public $link;
	public static $host = "localhost";
    public static $port = "3306";
    public static $username = "root";
	public static $password = "p4ssw0rd!";
	public static $database = "newdb";
	
	/**
	 * description
	 */
	public function __construct()
    {
	    $this->link = $this->connection();
    }
    
	/**
	 * description
	 */
	public function connection()
	{
		try {
			
			// parameter connection mysql ke database
			$mysqli = new mysqli(self::$host, self::$username, self::$password, self::$database);
		
			// cek connection
			if($mysqli->connect_errno) {
				
				// memunculkan pesan error
				throw new Exception("Failed to connect to MySQL: " . $mysqli->connect_error);
				exit();
				
			} else {
				
				// get connected
				return $mysqli;
				
			}
		
		} catch (Exception $e) {
		
			// error occured
			echo '<span style="font-color:#FF0000;">'.$e->getMessage().'</span>';
		
		}
	}
}
