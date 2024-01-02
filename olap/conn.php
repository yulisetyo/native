<?php
/*
$host = "10.242.77.111"; //letak db oracle
$port = "1521"; //port default oracle
$tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))) (CONNECT_DATA=(SERVICE_NAME=SIKPDEV)))";
       
$db_user = "USERKUR";
$db_pass = "kurmikro";

try
   {
       $conn = new PDO("oci:dbname=".$tns, $db_user, $db_pass);
       if(!$conn)
       {
          throw new Exception("KONEKSI KE SERVER GAGAL");	
       }
   }
catch(PDOException $e)
   {
       echo ($e->getMessage())."<br /> <br />";
   }
*/   
   
class Conn 
{
    
    public $link;
    
    public function __construct()
    {
	    $this->link = $this->koneksi();
    }
    
    public function koneksi()
    {
		//~ $host = "10.242.77.111"; //host db oracle
		//~ $port = "3306"; //port default oracle
		//~ $service = "SIKPDEV";
		//~ $tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))) (CONNECT_DATA=(SERVICE_NAME=$service)))";
		
		$port = "1521"; //port default oracle
		$host = "10.216.208.6"; //host db oracle
		$service = "SIKPOLAP";
		$tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.216.208.6)(PORT=1521))) (CONNECT_DATA=(SERVICE_NAME=SIKPOLAP)))";
		
		$db_user = "USERKUR";
		$db_pass = "kurmikro";
		
		try {
			
			//$conn_link = new PDO("oci:dbname=".$tns, $db_user, $db_pass);
			$conn_link = oci_connect($db_user, $db_pass, $tns);
		
			if(!$conn_link) {
				throw new Exception("KONEKSI KE SERVER GAGAL");	
			} else {
				return $conn_link;
			}
		
		}
		catch(Exception $e) {
		
			echo $e->getMessage();
		
		}
    }

}

?>
