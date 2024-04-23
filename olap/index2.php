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
			<th width="5%">No.</th>
			<th width="8%">Kode Bank</th>
			<th>Nama Bank</th>
		</thead>
';
$tabel .= '<tbody>';
foreach	($data as $row) {
	$tabel .= '
		<tr>
			<td style="text-align:center;">'.$a++.'.</td>
			<td style="text-align:center;"><a href="./debitur.php?tahun=2020&kdbank='.$row['kode_bank'].'" target="_blank">'.$row['kode_bank'].'</a></td>
			<td>'.$row['nama_bank'].'</td>
		</tr>
		';
}
$tabel .= '</tbody></tabel>';
echo $tabel;
// echo json_encode($data);
}
