<?php

require_once('include/common.inc.php');

$file_id = getParameterFromPost("file_id");

fileSaveRating(
        $file_id, 
        getParameterFromPost("user_id"), 
        getParameterFromPost("rating")
        );

$result = '{"file_id": '.$file_id.', "rating": '.fileRating($file_id).'}';
echo $result;
