<?php

require_once './include/common.inc.php';

//Если нет авторизации, то вернуться к login.php
if (!userIsLogged())
{
  getViewMessage("Авторизация", "Пользователь не зарегистрирован. Пожалуйста авторизируйтесь или пройдите регистрацию.", "login.php");
} else
{

//Начало HTML
  echo buildLayout("slideshow.html", array(
      "title" => HTML_TITLE . " Slideshow.",
      "slidshowScript" => "js/slidshowScript.js"
          )
  );
}