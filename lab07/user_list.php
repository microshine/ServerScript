<?php

require_once './include/common.inc.php';

//Если нет авторизации, то вернуться к login.php
if (!userIsLogged())
{
  getViewMessage("Авторизация", "Пользователь не зарегистрирован. Пожалуйста авторизируйтесь или пройдите регистрацию.", "login.php");
} else
{
//Начало HTML
  echo buildLayout("user_list.html", array(
      "title" => HTML_TITLE . " Список пользователей.",
      "userListRows" => getViewUserList(getParameterFromGet("page"), userList(getParameterFromGet("page") * TABLE_LIST_AMOUNT, TABLE_LIST_AMOUNT)),
      "userListNavigation" => getViewNavigation(userCount())
          )
  );
}
