<?php
class Conn 
{
    
    public $link;
    
    public function __construct()
    {
	    $this->link = $this->koneksi();
    }
    
	/* KONEKSI KE SERVER ORACLE */
    public function koneksi()
    {
		$host = "10.216.208.6"; //host db oracle
		$port = "1521"; //port default oracle
		$service = "SIKPOLAP"; //nama service
		$tns = "(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(HOST=$host)(PORT=$port))) (CONNECT_DATA=(SERVICE_NAME=$service)))"; //tns koneksi
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
