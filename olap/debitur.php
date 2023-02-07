<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'model.php';

$obj = new Model();
$data = $obj->getDebitur();
$a=1;

echo "JUMLAH BARIS = ".count($data);
if(count($data) < 1) {
	echo "<br/>data tidak ditemukan";
} else {
$tabel = '
	<table border="1" width="100%" cellspacing="0" cellpadding="2">
		<thead>
			<th>NO.</th>
			<th>BANK</th>
			<th>NIK</th>
			<th>NAMA</th>
			<th>WILAYAH</th>
			<th>PEKERJAAN</th>
			<th>IJIN USAHA</th>
			<th>MODAL USAHA</th>
			<th>USUL KREDIT</th>
		</thead>
';
$tabel .= '<tbody>';
foreach	($data as $row) {
	$tabel .= '
		<tr>
			<td>'.$a++.'.</td>
			<td>'.$row['nama_bank'].'</td>
			<td>'.$row['nik'].'</td>
			<td>'.$row['nama'].'</td>
			<td>'.$row['kode_kabkota'].' '.$row['nama_kabkota'].'</td>
			<td>'.$row['pekerjaan'].'</td>
			<td>'.$row['ijin_usaha'].'</td>
			<td style="text-align:right;">'.number_format($row['modal_usaha'], 0, ',', '.').'</td>
			<td style="text-align:right;">'.number_format($row['jml_kredit'], 0, ',', '.').'</td>
		</tr>
		';
}
$tabel .= '</tbody></tabel>';
echo $tabel;
// echo json_encode($data);
}
