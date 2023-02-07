<?php
$arr1 = ['Kl', 'Lg', 'Pg', 'Pn', 'Wg'];
$arr2 = ['Ah', 'Sn', 'Sl', 'Rb', 'Km', 'Ju', 'Sb'];
//~ $arr2 = ['1', '2', '3', /*'III', 'IV', 'V', 'VI', 'VII'*/];

foreach($arr1 as $r) {
	//~ echo $r.'<br/>';

	foreach($arr2 as $s) {
		$data[] = $s.$r;
		//~ echo $s.$r.'<br/>';
	}
}

foreach($data as $key=>$val) {
	$key = $key + 1;
	//~ echo $val.'<br/>';
	if($key%7 == 1) {
		echo $val.'<br/>';
	} 
}

//~ echo json_encode($data);
echo '<br/><br/>';
echo 'jumlah kombinasi ada '. (int) count($arr1) * (int) count($arr2) .' pasang';
