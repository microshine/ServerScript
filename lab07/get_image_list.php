<?php

require_once('include/common.inc.php');

$page = getParameterFromPost("page");
$amount = getParameterFromPost("amount");

$image_count = dbExecuteScalar("SELECT count(`file_id`) FROM `file` WHERE `extension`='jpg'");
if (($page > 0 && ceil(($page * $amount) / $image_count) > 1) || (($page * $amount) == $image_count)) {
    echo 0;
    exit;
//$page = (($page * $amount) % $image_count)/$amount;
}

$sql = "SELECT `file_id` FROM `file` WHERE `extension`='jpg' LIMIT " . ($page * $amount) . "," . $amount;
$rows = dbExecuteAssoc($sql);
$result = "";
$length = count($rows);
$index = 0;
foreach ($rows as $row) {
    $result.=$row['file_id'];
    if (++$index != $length) {
        $result.=",";
    }
}
echo $result;
