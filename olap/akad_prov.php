<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'model.php';

$obj = new Model();
$data = $obj->getAkad();
$a=1;
//printf($data);

echo "JUMLAH BARIS = ".count($data)."<br/>";

if(count($data) < 1) {

	echo "<br/>data tidak ditemukan";

} else {
	
	$tabel = '
		<table border="1" width="100%" cellspacing="0" cellpadding="2">
			<thead>
				<th>NO.</th>
				<th>TAHUN</th>
				<th>BULAN</th>
				<th>PROVINSI</th>
				<th>JUMLAH DATA AKAD</th>
				<th>NILAI AKAD</th>
			</thead>
	';
	$tabel .= '<tbody>';
	foreach	($data as $row) {
		$tabel .= '
			<tr>
				<td>'.$a++.'.</td>
				<td>'.$row->tahun.'</td>
				<td>'.$row->bulan.' '.$row->nama_bulan.'</td>
				<td>'.$row->kode_prov.' '.$row->nama_prov.'</td>
				<td style="text-align:right;">'.$row->jml_akad.'</td>
				<td style="text-align:right;">'.$row->nilai_akad.'</td>
			</tr>
			';
	}
	$tabel .= '</tbody></tabel>';
	echo $tabel;

}
