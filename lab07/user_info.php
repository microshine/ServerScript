<?php

require_once './include/common.inc.php';

if (!userIsLogged())
{
  header("location: login.php");
} else
{
  echo getView("header.html", array("title" => HTML_TITLE . " UserInfo form."));

  //Инстркментарий пользователя
  echo getView(
          'logged.html', 
          array(
            "user_name" => $_SESSION["user_name"],
            "user_id" => $_SESSION["user_id"]
          )
  );

  //Информация о пользователе
  $user = userGetInfo(getParameterFromGet("id"));
  echo getView(
          "user_info.html", 
          array(
            "FIRST_NAME" => $user[0][FORM_FIRST_NAME],
            "LAST_NAME" => $user[0][FORM_LAST_NAME],
            "EMAIL" => $user[0][FORM_EMAIL],
            "PASS" => $user[0][FORM_PASS],
            "SEX" => $user[0][FORM_SEX],
            "BIRTHDAY" => $user[0][FORM_BIRTHDAY_DAY] . " " . $user[0][FORM_BIRTHDAY_MONTH] . " " . $user[0][FORM_BIRTHDAY_YEAR],
          )
  );

  echo "<br/>";
  //Добавление файлов
  echo getView(
          "file_add.html", 
          array(
            "user_id" => $user[0]["person_id"]
          )
  );


  echo getView("footer.html");
}
