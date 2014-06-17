<?php

function fileGetAll($email = "", $extension = "")
{
  $condition = "";
  if ($email !== "")
  {
    $condition.="`email` = '" . $email . "'";
  }
  if ($extension !== "")
  {
    if ($condition !== "")
    {
      $condition.=" AND ";
    }
    $condition.="`extension` = '" . $extension . "'";
  }
  if ($condition !== "")
  {
    $condition = " AND " . $condition;
  }
  $sql = "SELECT `file_id`, `file_name`, `extension`, `file_size`, `uploaded`, "
          . "`last_name`, `first_name`, `email` FROM `person`, `file` "
          . "WHERE `file`.`person_id`=`person`.`person_id`" . $condition;
  //echo $sql;
  return dbExecuteAssoc($sql);
}

function fileSaveFileToDB($file, $person_id)
{
  dbExecuteNoResult(
          "INSERT INTO file(file_name, file_size, extension, person_id) VALUES ("
          . "'" . $_FILES[$file]['name'] . "', "
          . $_FILES[$file]['size'] . ","
          . "'" . end(explode(".", $_FILES[$file]["name"])) . "',"
          . $person_id . ")"
  );
  $id = dbExecuteScalar("SELECT max(file_id) FROM file");
  $extension = dbExecuteScalar("SELECT extension FROM file WHERE file_id=" . $id);
  $dir = $_SERVER['DOCUMENT_ROOT'] . '/lab07/uploads/';
  $file = $dir . $id . "." . $extension;
  if (move_uploaded_file($_FILES['file']['tmp_name'], $file))
  {
    echo "Файл успешно загружен.";
  } else
  {
    echo "Произошла ошибка";
  }
}
