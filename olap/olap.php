<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'conn.php';

$obj = new Conn();

$conn = $obj->link;

$query = "
	  SELECT kode_bank,
	         UPPER (nama_bank) AS nama_bank
	    FROM kur_r_bank
	   WHERE kode_bank IS NOT NULL AND SUBSTR (kode_bank, 1, 1) = '0'
	ORDER BY kode_bank ASC
";

$data = [];
$stid = oci_parse($conn, $query);
oci_execute($stid);
// $rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
while($rows = oci_fetch_array($stid, OCI_ASSOC )){
	$data['data'][] = array(
		'kode_bank' => $rows['KODE_BANK'],
		'nama_bank' => $rows['NAMA_BANK'],
	);
}

echo json_encode($data);
