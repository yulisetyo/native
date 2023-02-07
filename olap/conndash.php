<?php
class Conndash
{
    
    public $link;
    
    public function __construct()
    {
	    $this->link = $this->koneksi();
    }
    
    public function koneksi()
    {
		$host = "10.242.231.111"; //host db oracle
		//~ $host = "10.242.67.44"; //host db oracle
		$port = "1000"; //port default oracle
		//~ $port = "1521"; //port default oracle
		$service = "ee";
		$tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))) (CONNECT_DATA=(SID=$service)))";
		//$tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=10.242.67.40)(PORT=1521))) (CONNECT_DATA=(SERVICE_NAME=SIKP)))";
		$db_user = "dash";
		$db_pass = "dash123#";
		
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

$conn = new Conn();



?>
