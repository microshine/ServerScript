<?php

require_once('include/common.inc.php');

$password = getParameterFromPost("password");
$strength = pswStrength($password);

echo $strength;
