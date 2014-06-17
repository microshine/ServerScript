<?php

require_once './include/common.inc.php';

echo getView("header.html", array("title" => HTML_TITLE . " Форма LogIn"));

userCheckLoginData();
userDrawForm();

echo getView("footer.html", null);
