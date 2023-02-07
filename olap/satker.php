<?php

include_once dirname(__FILE__).DIRECTORY_SEPARATOR.'modeldash.php';

$obj = new ModelDash();
$data = $obj->getSatker();
echo json_encode($data);