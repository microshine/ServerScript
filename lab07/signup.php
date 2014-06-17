<?php

require_once './include/common.inc.php';

echo getView("header.html", array("title" => HTML_TITLE . " UserInfo form."));

if (getParameterFromPost("sub") !== ""){
  //userSave();
  echo 'Here';
}
else
{
  //Форма регистрации
  echo getView(
          'signup.html'
          , array(
              "FIRST_NAME" => FORM_FIRST_NAME,
              "LAST_NAME" => FORM_LAST_NAME,
              "EMAIL" => FORM_EMAIL,
              "REEMAIL" => FORM_REEMAIL,
              "PASS" => FORM_PASS,
              "SEX" => FORM_SEX,
              "SEX_NULL" => FORM_SEX_NULL,
              "BIRTHDAY_DAY" => FORM_BIRTHDAY_DAY,
              "BIRTHDAY_DAY_NULL" => FORM_BIRTHDAY_DAY_NULL,
              "BIRTHDAY_DAY_ARRAY" => htmlOptionArray(1, 31),
              "BIRTHDAY_MONTH" => FORM_BIRTHDAY_MONTH,
              "BIRTHDAY_MONTH_NULL" => FORM_BIRTHDAY_MONTH_NULL,
              "BIRTHDAY_YEAR" => FORM_BIRTHDAY_YEAR,
              "BIRTHDAY_YEAR_NULL" => FORM_BIRTHDAY_YEAR_NULL,
              "BIRTHDAY_YEAR_ARRAY" => htmlOptionArray(1900, 2014),
          )
  );
}

echo getView("footer.html");
