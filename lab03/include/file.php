<?php

function fileGetAll($email="", $extension="") {
    $condition = "";
    if ($email !== "") {
        $condition.="`email` = '" . $email . "'";
    }
    if ($extension !== "") {
        if ($condition !== "") {
            $condition.=" AND ";
        }
        $condition.="`extension` = '" . $extension . "'";
    }
    if ($condition !== "") {
        $condition=" AND ".$condition;
    }
    $sql = "SELECT `file_id`, `file_name`, `extension`, `file_size`, `uploaded`, "
            . "`last_name`, `first_name`, `email` FROM `person`, `file` "
            . "WHERE `file`.`person_id`=`person`.`person_id`".$condition;
    //echo $sql;
    return dbExecuteAssoc($sql);
}
