<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'model.php';

$obj = new Model();
$data = $obj->getBank();
$a=1;

echo "JUMLAH BARIS = ".count($data);
if(count($data) < 1) {
	echo "<br/>data tidak ditemukan";
} else {
$tabel = '
	<table border="1" width="100%" cellspacing="0" cellpadding="2">
		<thead>
			<th>No.</th>
			<th>Bank</th>
		</thead>
';
$tabel .= '<tbody>';
foreach	($data as $row) {
	$tabel .= '
		<tr>
			<td>'.$a++.'.</td>
			<td><a href="./debitur.php?tahun=2019&kdbank='.$row['kode_bank'].'" target="_blank">'.$row['kode_bank'].' '.$row['nama_bank'].'</a></td>
		</tr>
		';
}
$tabel .= '</tbody></tabel>';
echo $tabel;
// echo json_encode($data);
}
