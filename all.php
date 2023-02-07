<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>untitled</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.32" />
	<meta http-equiv="refresh" content="3000">
</head>
<body>

<!-- BEGIN OF PHP -->
<?php 

$words = "hari_ini_saya_sedang_bekerja_dari_rumah";

$arr_words = explode("_", $words);

echo $words;

echo "<br><br>";

foreach($arr_words as $aw => $v) {
	echo $aw;
	echo " => ";
	echo $v;
	echo "<br>";
}

echo "<br>";

echo json_encode(array_keys($arr_words));

echo "<br><br>";

echo json_encode($arr_words);

echo "<br><br>";

$join_words = implode(" ", $arr_words);

echo "<br>";

echo $join_words;

?> 
<!-- END OF PHP -->

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

</body>
</html>
