<?php

require_once './include/common.inc.php';

//Если нет авторизации, то вернуться к login.php
if (!userIsLogged())
{
  getViewMessage("Авторизация", "Пользователь не зарегистрирован. Пожалуйста авторизируйтесь или пройдите регистрацию.", "login.php");
} else
{

//Начало HTML
  echo buildLayout("file_list.html", array(
      "title" => HTML_TITLE . " Список Файлов.",
      "file_list_filter" => getViewFileListFilter("Список файлов", getParameterFromGet("email"), getParameterFromGet("extension")),
      "file_list_rows" => getViewFileList(getParameterFromGet("email"), getParameterFromGet("extension"))
          )
  );
}