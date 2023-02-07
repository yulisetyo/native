<?php 

function my_autoloader($class)
{
	include_once dirname(__FILE__).DIRECTORY_SEPARATOR.$class.'.php';
}

spl_autoload_register('my_autoloader');

class ModelDash extends Conndash {
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getKL()
	{
		$conn = $this->link;
		$query = "
			  select kddept, nmdept
			    from t_dept
			   where kddept not in ('888', '999', 'ZZZ')
			order by kddept
		";
		
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		
		while($rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$data[] = $rows;
		}
		
		oci_free_statement($stid);
		oci_close($conn);
		
		if(isset($data)){
			return $data;
		} else {
			return [];
		}
	}
	
	public function getSatker()
	{
		$conn = $this->link;
		$query = "
			  select kddept, kdunit, kdsatker, nmsatker
			    from t_satker
			   where kddept != '999'
			order by kddept, kdunit, kdsatker
		";
		
		$stid = oci_parse($conn, $query);
		oci_execute($stid);
		
		while($rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
			$data[] = array(
				'kddept' => $rows['KDDEPT'],
				'kdunit' => $rows['KDUNIT'],
				'kdsatker' => $rows['KDSATKER'],
				'nmsatker' => $rows['NMSATKER']
			);
		}
		
		oci_free_statement($stid);
		oci_close($conn);
		
		if(isset($data)){
			return $data;
		} else {
			return [];
		}
	}
}
