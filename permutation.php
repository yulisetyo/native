<?php
$arr1 = ['5'=>'A', '9'=>'B', '7'=>'C', '4'=>'D', '8'=>'E', '8'=>'F', '8'=>'G'];
$pj1 = count($arr1);
$arr2 = ['5'=>'I', '9'=>'II', '7'=>'III', '4'=>'IV', '8'=>'V'];
$pj2 = count($arr2);
$arr3 = array(
	array('A', 5),
	array('B', 9),
	//~ array('C', 7),
	//~ array('D', 4),
	//~ array('E', 8)
);
$pj3 = count($arr3);
$arr4 = array(
	array('I', 11),
	array('II', 10),
	array('III', 5),
	//~ array('IV', 9),
	//~ array('V', 7),
	//~ array('VI', 6),
	//~ array('VII', 8)
);
$pj4 = count($arr4);

for($i = 0; $i < (int)$pj4; $i++) 
{
	for($j = 0; $j < (int)$pj3 ; $i++) 
	{
		echo ($arr4[$j][0]).'<br>';
	} 
	
	echo ($arr3[$i][0]).'<br>';
} 
