<?php

require_once './include/request.inc.php';

$first_name=  getParameterFromPost("first_name");
$last_name=  getParameterFromPost("last_name");

$fileInfo=getFileFromPost("avatar");
$tmpPath = $fileInfo['tmp_name'];
$filePath='uploads/'.$fileInfo['name'];
move_uploaded_file($tmpPath, $filePath);

