<pre>

<p style="font-size:36px;">

<?php

$arrChar = [ // LETTER OF ASCII CHARACTER
	'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I',
	'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R',
	'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '0',
	'1', '2', '3', '4', '5', '6', '7', '8', '9',
	' '
];


$arrZigzag = [ // ASCII TO ZIGZAG
	'A', 'E', 'I', 'M', 'Q', 'U', 'Y', '2', '6',
	'7', 'B', 'F', 'J', 'N', 'R', 'V', 'Z', '3',
	'4', '8', 'C', 'G', 'K', 'O', 'S', 'W', '0',
	'1', '5', '9', 'D', 'H', 'L', 'P', 'T', 'X',
	' '
];

$arrDec = [ // ZIGZAG TO DECIMAL
	'65', '69', '73', '77', '81', '85', '89', '50', '54',
	'55', '66', '70', '74', '78', '82', '86', '90', '51',
	'52', '56', '67', '71', '75', '79', '83', '87', '48',
	'49', '53', '57', '68', '72', '76', '80', '84', '88',
	'32'
];

$arrHex = [ // DECIMAL TO HEXADECIMAL
	'41', '45', '49', '4D', '51', '55', '59', '32', '36',
	'37', '42', '46', '4A', '4E', '52', '56', '5A', '33',
	'34', '38', '43', '47', '4B', '4F', '53', '57', '30',
	'31', '35', '39', '44', '48', '4C', '50', '54', '58',
	'20'
];

$arrBin = [ // HEXADECIMAL TO BINARY
	'01000001', '01000101', '01001001', '01001101', '01010001', '01010101', '01011001', '00110010', '00110110',
	'00110111', '01000010', '01000110', '01001010', '01001110', '01010010', '01010110', '01011010', '00110011',
	'00110100', '00111000', '01000011', '01000111', '01001011', '01001111', '01010011', '01010111', '00110000',
	'00110001', '00110101', '00111001', '01000100', '01001000', '01001100', '01010000', '01010100', '01011000',
	'00100000'
];

$arrExor = [
	'0000', '0001', '0010', '0011',
	'0100', '0101', '0110', '0111',
	'1000', '1001', '1010', '1011',
	'1100', '1101', '1110', '1111'
];

$text = "bunuh";

$words = strtoupper($text);

echo "kata asli: " . $words . "<br>";

$cWords = strlen($words);

echo "jumlah karakter: " . $cWords . "<br>";

for ($i = 0; $i < $cWords; $i++) {

	$piece[] = substr($words, $i, 1);

	$key[] = array_search($piece[$i], $arrChar);
}

$join = implode("|", $key);

$zig = explode("|", $join);

$cZig = count($zig);

for ($i = 0; $i < $cZig; $i++) {

	$zag[] = $arrZigzag[$zig[$i]];

	$hex[] = $arrHex[$zig[$i]];

	$dec[] = $arrDec[$zig[$i]];

	$bin[] = $arrBin[$zig[$i]];
}

$newZag = implode("", $zag);

$newHex = implode("", $hex);

$newDec = implode("", $dec);

$newBin = implode("", $bin);

// echo "acak: ".strtolower($newZag)."<br><br>";
echo "konversi <br>";
echo "- kata asli ke zizag: " . strtoupper($newZag) . "<br>";

// echo "acak hexa: ".strtoupper($newHex)."<br><br>";

echo "- zigzag ke hexa: " . strtoupper($newHex) . "<br>";

echo "- hex ke biner &nbsp;:" . strtoupper($newBin) . "<br>";

echo "- reverse biner&nbsp;:" . strrev($newBin) . "<br>";

$newbin = $newBin;

$reverse = strrev($newbin);

$cnb = strlen($newbin);

for ($i = 0; $i < $cnb; $i++) {

	$pieceNb[] = substr($newbin, $i, 1);

	$pieceRv[] = substr($reverse, $i, 1);

	if ($pieceNb[$i] == 0 and $pieceRv[$i] == 0) {

		$exor[$i] = 0;
	} else if ($pieceNb[$i] == 1 and $pieceRv[$i] == 0) {

		$exor[$i] = 1;
	} else if ($pieceNb[$i] == 0 and $pieceRv[$i] == 1) {

		$exor[$i] = 1;
	} else {

		$exor[$i] = 0;
	}
}

$newExor = implode("", $exor);

echo  "- exor biner &nbsp;&nbsp;&nbsp;:" . $newExor . "<br><br>";

$cnt = strlen($newExor) / 4;

for ($i = 0; $i < $cnt; $i++) {

	if ($i == 0) {
		$strExor[] = substr($newExor, $i, 4);
	} else {
		$n = $i * 4;
		$max = $cnt - 4;
		$d = ($cnt);
		if($n < $max) {
			$strExor[] = substr($newExor, $n, 4);
		} else {
			$strExor[] = null;
		}
		
	}

	$keys[] = array_search($strExor[$i], $arrExor);

	// echo $strExor[$i]."<br>";

	
}

echo json_encode($strExor);

for ($j = 0; $j < count($keys); $j++) {

	//echo $strExor[$j] . " => " . $keys[$j] . "<br>";

	// echo $keys[$j]."<br>";

}

?>

</p>

</pre>