<?php
include_once('SCGenerator.php');

$scg = new SCGenerator();

// -- number
$char = 'abc';
$format = 'xxx';

$scg->setChars($char);
$scg->setFormat($format);
$scg->Generate();
print_r($scg->Result);

// -- alpabet
// $char = '012';
// $format = 'xx9';

// $scg->setChars($char);
// $scg->setFormat($format);
// $scg->Generate();
// $res = $scg->Result;
// print_r($res);
     
    // Trying another format
    //$char = '0123456789abcdefghijklmnopqrstuvwxyz';
    //$format = 'xxxxx';
