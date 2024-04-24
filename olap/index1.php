<?php 

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'model.php';

$obj = new Model();
$data = $obj->getMonitoringUserDependencies();
$a = 1;

if (count($data) > 0) {
	$tabel = '<pre><table border="1" cellspacing="0" cellpadding="2">';
	
	$tabel .= '
				<thead>
					<tr>
						<th>SP_NAME</th>
						<th>REF_NAME</th>
						<th>REF_TYPE</th>
						<th>REF_LINK_NAME</th>
					</tr>
				</thead>
	';
	
	$tabel .= '	<tbody>';
	
	foreach ($data as $row) {
		$tabel .= '	<tr>';
		$tabel .= '		<td>'.$row['NAME'].'</td>';
		$tabel .= '		<td>'.$row['REF_NAME'].'</td>';
		$tabel .= '		<td>'.$row['REF_TYPE'].'</td>';
		$tabel .= '		<td>'.$row['REF_LINK_NAME'].'</td>';
		$tabel .= '	</tr>';
	}
	
	$tabel .= '</tbody>';
	
	$tabel .= '</table></pre>';
	
	echo $tabel;
} else {
	echo "No data found!";
}