<?php

$sasaran = [
	['sasaran_1', 'risiko' => ['risiko11', 'risiko12', 'risiko13', 'risiko14', 'risiko15', 'risiko16', 'risiko17', 'risiko18']],
	['sasaran_2', 'risiko' => ['risiko21', 'risiko22', 'risiko23', 'risiko24', 'risiko25', 'risiko26']],
	['sasaran_3', 'risiko' => ['risiko31', 'risiko32', 'risiko33', 'risiko34', 'risiko35']],
	['sasaran_4', 'risiko' => ['risiko41', 'risiko42', 'risiko43']]
];

echo json_encode($sasaran)."<br><br>";
echo json_encode($sasaran[2])."<br><br>";
echo json_encode($sasaran[0]['risiko'])."<br><br>";
echo json_encode($sasaran[2]['risiko'])."<br><br>";
echo json_encode($sasaran[2]['risiko'][3])."<br><br>";
echo count($sasaran[2]['risiko'])."<br><br>";

$table = '<table border="1" cellspacing="0" cellpadding="5">';

$table .= '
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Sasaran</th>
			<th>Jumlah Risiko</th>
			<th>Risiko</th>
		</tr>
	</thead>';
	
$table .= '<tbody>';

for ($i = 0; $i < count($sasaran); $i++) {
	
	$x = $i + 1;
	
	$table .= '<tr>';
	
		$table .= '<th rowspan="'.count($sasaran[$i]['risiko']).'">'.$x.'</th>';

		$table .= '<th rowspan="'.count($sasaran[$i]['risiko']).'">'.$sasaran[$i][0].'</th>';
		
		$table .= '<th rowspan="'.count($sasaran[$i]['risiko']).'">'.count($sasaran[$i]['risiko']).'</th>';

		$table .= '<td>'.$sasaran[$i]['risiko'][0].'</td>';				

	$table .= '</tr>';
	
	for ($j = 0; $j < count($sasaran[$i]['risiko']); $j++) {

		$k = $j + 1;

		if($k < count($sasaran[$i]['risiko'])) {

			$table .= '<tr>
				<td>'.$sasaran[$i]['risiko'][$k].'</td>
			</tr>';
		
		}
	
	}

}

$table .= '</tbody>';

$table .= '</table>';

echo $table."<br><br>";

$html = '
	<table border="1">
		<thead>
			<tr>
				<th>Sasaran</th>
				<th>Risiko</th>
			</tr>
		</thead>
		
		<tbody>
			<tr>
				<td rowspan="3">Sasaran 1</td>
				<td>Risiko 11</td>
			</tr>
			<tr>
				<td>Risiko 12</td>
			</tr>
			<tr>
				<td>Risiko 13</td>
			</tr>
		</tbody>
	</table>';

//~ echo $html;
