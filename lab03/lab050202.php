<?php
require_once './include/common.inc.php';

header("content-type: text/plain; charset=utf-8");

function SaveFileToDB($file, $person_id) {
     dbExecuteNoResult(
            "INSERT INTO file(file_name, file_size, extension, person_id) VALUES ("
            . "'" . $_FILES[$file]['name'] . "', "
            . $_FILES[$file]['size'].","
            . "'".end(explode(".", $_FILES[$file]["name"]))."',"
            . $person_id . ")"
    );
    return dbExecuteScalar("SELECT max(file_id) FROM file");
}

$id = SaveFileToDB('file', $_GET[id]);
$extension = dbExecuteScalar("SELECT extension FROM file WHERE file_id=".$id);

$dir = $_SERVER['DOCUMENT_ROOT'] . '/lab03/uploads/';
$file = $dir . $id.".".$extension;

if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {
    echo "Файл успешно загружен.";
} else {
    echo "Произошла ошибка";
    exit;
}