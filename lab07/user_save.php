<?php

require_once './include/common.inc.php';

//Если не переданны данные, то вернуться к index.php
if ($_SERVER['REQUEST_METHOD'] !== "POST")
{
  header("location: index.php");
}

//Начало HTML
echo getView("header.html", array("title" => HTML_TITLE . " Сохранение данных пользователя."));

$person = userLoadFromPOST();

if (!userCheckData($person))
{
  getViewMessage("Сохранение пользователя", "Ошибка сохранения пользователя.", "index.php");
} else
{
  userSaveToDB($person);
  getViewMessage("Сохранение пользователя", "Пользователь успешно сохранен.", "index.php");
}

//Конец HTML
echo getView("footer.html");
