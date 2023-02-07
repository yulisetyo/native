<?php

$motor = [
	['Honda', 'jenis' => ['BeAT110', 'Vario150', 'PCX', 'ADV150', 'Verza150', 'CBR150', 'CBR250', 'CRF150']],
	['Yamaha', 'jenis' => ['NMax125', 'Aerox155', 'R150', 'R25', 'WR155']],
	['Kawasaki', 'jenis' => ['Ninja250', 'ZX250', 'KLX150', 'TrackerX']],
	['Suzuki', 'jenis' => ['Address', 'GSX150']]
];

echo json_encode($motor)."<br><br>";
//~ echo json_encode($motor[2])."<br><br>";
//~ echo json_encode($motor[0]['jenis'])."<br><br>";
//~ echo json_encode($motor[2]['jenis'])."<br><br>";
//~ echo json_encode($motor[2]['jenis'][3])."<br><br>";
//~ echo count($motor[2]['jenis'])."<br><br>";
$table = '<table border="1" cellspacing="0" cellpadding="5">';
$table .= '
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Merek</th>
			<th>Jenis Motor</th>
		</tr>
	</thead>';
	
$table .= '<tbody>';

for ($i = 0; $i < count($motor); $i++) {
	
	$x = $i + 1;
	
	$table .= '<tr>';
		
		$table .= '<th rowspan="'.count($motor[$i]['jenis']).'">'.$x.'</th>';
		
		$table .= '<th rowspan="'.count($motor[$i]['jenis']).'">'.$motor[$i][0].'</th>';
		
		$table .= '<td>'.$motor[$i]['jenis'][0].'</td>';				
	
	$table .= '</tr>';
	
	for ($j = 0; $j < count($motor[$i]['jenis']); $j++) {
		$k = $j + 1;
		if($k < count($motor[$i]['jenis'])) {
			$table .= '<tr>';
			$table .= '<td>'.$motor[$i]['jenis'][$k].'</td>';
			$table .= '</tr>';
		}
	}
}

$table .= '</tbody>';

$table .= '</table>';

echo $table."<br><br>";
