<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'model.php';

$obj = new Model();
$data = $obj->getMonitoringRunningJobs();
$a=1;

echo '<pre>';
if(count($data) < 1) {
	echo "<br/>data tidak ditemukan";
} else {
	$tabel = '
		<table border="1" width="100%" cellspacing="0" cellpadding="1" style="font-size:120%">
			<thead>
				<tr>
					<th colspan="6"><h4>MONITORING RUNNING SCHEDULER JOBS</h4></th>
				</tr>
				<tr>
					<th width="2%" style="border-bottom:2px solid #000;">#</th>
					<th width="10%" style="border-bottom:2px solid #000;">LOG_DATE</th>
					<th width="5%" style="border-bottom:2px solid #000;">OWNER</th>
					<th width="18%" style="border-bottom:2px solid #000;">JOB_NAME</th>
					<th width="8%" style="border-bottom:2px solid #000;">STATUS</th>
					<th width="" style="border-bottom:2px solid #000;">INFO</th>
				</tr>
			</thead>
	';
	$tabel .= '<tbody>';
	foreach	($data as $row) {
		$tabel .= '
				<tr>
					<td style="vertical-align:top;text-align:center;">'.$a++.'.</td>
					<td style="vertical-align:top;">'.$row['LOG_DATE'].'</td>
					<td style="vertical-align:top;">'.$row['OWNER'].'</td>
					<td style="vertical-align:top;">'.$row['JOB_NAME'].'</td>
					<td style="vertical-align:top;">'.$row['STATUS'].'</td>
					<td style="vertical-align:top;">'.$row['INFO'].'</td>
				</tr>
			';
	}
	$tabel .= '</tbody>';
	$tabel .= '
		</tabel>';
	$tabel .= '</pre>';
		
	echo $tabel;
}
