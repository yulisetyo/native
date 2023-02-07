<?php
define('__ROOT__', dirname(dirname(__FILE__)));
include_once(__ROOT__.DIRECTORY_SEPARATOR.'models'.DIRECTORY_SEPARATOR.'MReferensiBulan.php');

$obj = new MReferensiBulan();
$rows = $obj->getData();

echo json_encode($rows);
echo "<br><br>";

foreach	($rows as $row) {
  	echo $row['nm_bulan']."<br>";
}
 
var_dump(dirname(dirname(__FILE__)));
