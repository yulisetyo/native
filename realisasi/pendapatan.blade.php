<?php include "../css.php"; 

$data = [
	['uraian'=>'Pengembangan Aset', 'rkap'=>2500, 'rc'=>2500, 'rl'=>2450, 'ps1'=>(2450/2500), 'rcsd'=>2450, 'rlsd'=>2350, 'ps2'=>(2350/2450), 'ps3'=>(2350/2500)],
	['uraian'=>'Pengelolaan Aset', 'rkap'=>3500, 'rc'=>3000, 'rl'=>2750, 'ps1'=>(2750/3000), 'rcsd'=>2650, 'rlsd'=>2500, 'ps2'=>(2350/2450), 'ps3'=>(2350/2500)],
];

?>

<table width="100%" border="1" cellspacing="0" cellpadding="0" style="border:1px solid #000;">
	<thead>
		<tr>
			<th colspan="9" class="">
				<h3>RINCIAN REALISASI PENDAPATAN TAHUN 20XX</h3>
				<br>
				(Disajikan dalam Jutaan Rupiah)
			</th>
		</tr>
		<tr>
			<th colspan="9" class="">&nbsp;</th>
		</tr>
		<tr>
			<th class="plr3">Uraian</th>
			<th class="plr3 wd12">RKAP 20XX</th>
			<th class="plr3 wd12">Rencana TW.II 20XX</th>
			<th class="plr3 wd12">Realisasi TW.II 20XX</th>
			<th class="plr3 wd5">%</th>
			<th class="plr3 wd12">Rencana s.d TW.II 20XX</th>
			<th class="plr3 wd12">Realisasi s.d TW.II 20XX</th>
			<th class="plr3 wd5">%</th>
			<th class="plr3 wd5">%</th>
		</tr>
		<tr>
			<td class="plr3 ac fs10">1</td>
			<td class="plr3 ac fs10">2</td>
			<td class="plr3 ac fs10">3</td>
			<td class="plr3 ac fs10">4</td>
			<td class="plr3 ac fs10">5 (4:3)</td>
			<td class="plr3 ac fs10">6</td>
			<td class="plr3 ac fs10">7</td>
			<td class="plr3 ac fs10">8 (7:6)</td>
			<td class="plr3 ac fs10">9 (7:2)</td>
		</tr>
	</thead>
	<tbody>
	
<?php foreach($data as $row) {?>
		<tr>
			<td class="plr3"><?php echo $row['uraian'];?></td>
			<td class="plr3 ar"><?php echo $row['rkap'];?></td>
			<td class="plr3 ar"><?php echo $row['rc'];?></td>
			<td class="plr3 ar"><?php echo $row['rl'];?></td>
			<td class="plr3 ar"><?php echo round(($row['rl']/$row['rc']),2);?></td>
			<td class="plr3 ar"><?php echo $row['rcsd'];?></td>
			<td class="plr3 ar"><?php echo $row['rlsd'];?></td>
			<td class="plr3 ar"><?php echo round(($row['rlsd']/$row['rcsd']),2);?></td>
			<td class="plr3 ar"><?php echo round(($row['rlsd']/$row['rkap']),2);?></td>
		</tr>
<?php } ?>

		<tr>
			<td class="plr3 ar">Jumlah</td>
			<td class="plr3 ar"><?php echo ($data[0]['rkap'] + $data[1]['rkap']);?></td>
			<td class="plr3 ar"><?php echo ($data[0]['rc'] + $data[1]['rc']);?></td>
			<td class="plr3 ar"><?php echo ($data[0]['rl'] + $data[1]['rl']);?></td>
			<td class="plr3 ar">0.15</td>
			<td class="plr3 ar"><?php echo ($data[0]['rcsd'] + $data[1]['rcsd']);?></td>
			<td class="plr3 ar"><?php echo ($data[0]['rlsd'] + $data[1]['rlsd']);?></td>
			<td class="plr3 ar">0.15</td>
			<td class="plr3 ar">0.15</td>
		</tr>
	</tbody>
</table>
