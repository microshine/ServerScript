<?php

require_once './include/common.inc.php';

echo getView("header.html", array("title" => HTML_TITLE . " UserInfo form."));

if (!userIsLogged())
{
  hedaer("location: login.php");
} else
{
  //Инстркментарий пользователя
  echo getView(
          'logged.html', 
          array(
            "user_name" => $_SESSION["user_name"],
            "user_id" => $_SESSION["user_id"]
          )
  );

  fileSaveFileToDB('file', $_SESSION["user_id"]);
}

echo getView("footer.html");
