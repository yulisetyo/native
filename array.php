<?php

$array = ['apple', 'banana'];
$addition = ['orange'];
$new = array_merge($array, $addition);
echo json_encode($new)."<br><br>";

$satu = [
	['kunci1'=>'nilai1', 'k1'=>'v1'],
	['kunci2'=>'nilai2', 'k2'=>'v2'],
	['kunci3'=>'nilai3', 'k3'=>'v3']
];
$dua = [['kunci4'=>'nilai4', 'k4'=>'v4']];
echo json_encode($satu)."<br><br>";
echo json_encode(array_merge($satu,$dua))."<br><br>";

$unit = "31.2";
$arrUnit = explode(".", $unit);
echo "id_unit = ".$unit."<br><br>";
echo count($arrUnit)."<br><br>";

