<?php

  header("content-type: text/html; charset=utf-8");
  require_once ("include/common.inc.php");

  $result = dbExecuteScalar("SELECT count(dvd_id) as dvd_count from dvd;");
  
  echo "Таблица DVD содержит ".$result." записей";
  
  $result = dbExecute("SELECT * FROM dvd");
  
  //print_r($result);
  
  for ($i=0; $i < count($result); $i++){
      echo ("<p>".$result[$i]['title']."</p>");
  }

  ?>