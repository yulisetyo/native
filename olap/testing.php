<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'conn.php';

$obj = new Conn();

$conn = $obj->link;

$query = "
	SELECT nik,
		   nama,
		   npwp,
		   kode_bank,
		   kode_kabkota,
		   jml_kredit,
		   is_uus,
		   TO_CHAR (tgl_upload, 'yyyy-mm-dd hh24:mi:ss') tgl_upload
	  FROM kur_t_debitur
	 WHERE     TO_CHAR (tgl_upload, 'yyyy') = '2019'
		   AND kode_bank = '008'
		   AND is_api = 1
		   /**AND nik = '1274056308750003'**/
";


$stid = oci_parse($conn, $query);
oci_execute($stid);
// $rows = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
while($rows = oci_fetch_array($stid, OCI_ASSOC )){
	$data['data'][] = array(
		'kode_bank' => $rows['KODE_BANK'],
		'nik' => $rows['NIK'],
		'nama' => $rows['NAMA'],
		'npwp' => $rows['NPWP'],
		'jml_kredit' => $rows['JML_KREDIT'],
		'tgl_upload' => $rows['TGL_UPLOAD'],
	);
}

echo json_encode($data);
