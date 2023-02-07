<?php

Class Koneksi {
	
	public $link;
	public static $host = "localhost";
    public static $port = "3306";
    public static $username = "root";
	public static $password = "";
	public static $database = "kjpp";
	
	public function __construct()
    {
	    $this->link = $this->connection();
    }
    
	public function connection()
	{
		try {
			
			// parameter connection mysql ke database
			$mysqli = new mysqli(self::$host, self::$username, self::$password, self::$database);
		
			// cek connection
			if($mysqli->connect_errno) {
				
				// memunculkan pesan error
				throw new Exception("Failed to connect to MySQL: " . $mysqli -> connect_error);
				exit();
				
			} else {
				
				return $mysqli;
				
			}
		
		}
		catch (Exception $e) {
		
			echo $e->getMessage();
		
		}
	}
}

// memanggil connection
$connection = new Koneksi();
$conn = $connection->link;

// script sql query
$sql = "SELECT * FROM tbl_pp WHERE id < 15  ORDER BY id ASC";

// hasil query
$result = mysqli_query($conn, $sql);

if ($result) {
	
	// create object using fecth data from result object
	while ($obj = $result->fetch_object()) {
		$rows[] = $obj; 
	}
	
	$result->free_result();
	
	// menampilkan data ke dalam JSON
	//~ echo json_encode($rows[3]);
	//~ echo "<br/><br/>";
	
	//~ echo $rows[5]->nama.'<ada Biro Kepegian'.$rows[5]->alamat;
	foreach($rows as $row) {
		echo '<div>
			<span>'.$row->id.'</span>|
			<span>'.$row->nama.'</span>|
			<span>'.$row->no_rmk.'</span>|
			<span>'.$row->no_izin.'</span>|
			<span>'.$row->email.'</span>
		</div>'.'<br>';
	}
	
}
