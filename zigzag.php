<?php 

$arrChar = [
	'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 
	'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 
	'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0', 
	'1', '2', '3', '4', '5', '6', '7', '8', '9',
	' '
];


$arrZigzag = [
	'A', 'E', 'I', 'M', 'Q', 'U', 'Y', '2', '6',
	'7', 'B', 'F', 'J', 'N', 'R', 'V', 'Z', '3',
	'4', '8', 'C', 'G', 'K', 'O', 'S', 'W', '0',
	'1', '5', '9', 'D', 'H', 'L', 'P', 'T', 'X',
	' '
];

$arrDec = [
	'65', '66', '67', '68', '69', '70', '71', '72', '73',
	'74', '75', '76', '77', '78', '79', '80', '81', '82',
	'83', '84', '85', '86', '87', '88', '89', '90', '48',
	'49', '50', '51', '52', '53', '54', '55', '56', '57',
	'32'
];

$arrHexa = [
	'41', '42', '43', '44', '45', '46', '47', '48', '49',
	'4A', '4B', '4C', '4D', '4E', '4F', '50', '51', '52',
	'53', '54', '55', '56', '57', '58', '59', '5A', '30',
	'31', '32', '33', '34', '35', '36', '37', '38', '39',
	'20'
];
	

$kata = "jangkrik boss";
$words = strtoupper($kata);

echo "kata: " . $words . "<br><br>";

$cWords = strlen($words);

echo "jumlah karakter: " . $cnt."<br><br>";

for ($i = 0; $i < $cWords; $i++) {
	$piece[] = substr($words, $i, 1);
	$key[] = array_search($piece[$i], $arrChar);
}

$join = implode("|", $key);
$zig = explode("|", $join);

$cZig = count($zig);

for ($i = 0; $i < $cZig; $i++) {
	$zag[] = $arrZigzag[$zig[$i]];
	$hex[] = $arrHexa[$zig[$i]];
	$dec[] = $arrDec[$zig[$i]];
}

$newZag = implode("", $zag);
$newHexa = implode("", $hex);
$newDec = implode("", $dec);

echo "acak: ".strtolower($newZag)."<br><br>";
echo "acak zizag: ".strtoupper($newZag)."<br><br>";
echo "acak hexa: ".strtoupper($newHexa)."<br><br>";
echo "acak hexa: ".strtolower($newDec)."<br><br>";
