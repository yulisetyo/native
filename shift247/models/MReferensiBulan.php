<?php

function model_autoloader($className)
{
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.$className.".php";
}

spl_autoload_register("model_autoloader");

class MReferensiBulan extends Models {

	// constructor of Models class
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * description
	 */
	public function getData()
	{
		$conn = $this->link;
		
		$sql = "
			  select kd_bulan, nm_bulan, jml_hari
			    from ref_bulan
			order by kd_bulan asc
		";
		
		$result = $conn->query($sql);
		
		$data = [];
		
		if ($result->num_rows > 0) {
			
			while ($row = $result->fetch_array()){
				$data[] = $row;
			}
			
		} else {
			
			$data[] = null;
		
		}

		return $data;
	}
}
