<?php

  require_once './include/common.inc.php';

  header("Content-type: text/plain; charset=utf-8");

  /**
   * Считывает данные из POST
   * @return type
   */
  function readData()
  {
      $person = array();

      $person[FORM_FIRST_NAME] = getParameterFromPost(FORM_FIRST_NAME);
      $person[FORM_LAST_NAME] = getParameterFromPost(FORM_LAST_NAME);
      $person[FORM_EMAIL] = strtolower(getParameterFromPost(FORM_EMAIL));
      $person[FORM_REEMAIL] = strtolower(getParameterFromPost(FORM_REEMAIL));
      $person[FORM_PASS] = getParameterFromPost(FORM_PASS);
      $person[FORM_SEX] = getParameterFromPost(FORM_SEX);
      $person[FORM_SEX] = $person[FORM_SEX] == FORM_SEX_NULL ? "" : $person[FORM_SEX];
      $person[FORM_BIRTHDAY_DAY] = getParameterFromPost(FORM_BIRTHDAY_DAY);
      $person[FORM_BIRTHDAY_DAY] = $person[FORM_BIRTHDAY_DAY] == FORM_BIRTHDAY_DAY_NULL ? "" : $person[FORM_BIRTHDAY_DAY];
      $person[FORM_BIRTHDAY_MONTH] = getParameterFromPost(FORM_BIRTHDAY_MONTH);
      $person[FORM_BIRTHDAY_MONTH] = $person[FORM_BIRTHDAY_MONTH] == FORM_BIRTHDAY_MONTH_NULL ? "" : $person[FORM_BIRTHDAY_MONTH];
      $person[FORM_BIRTHDAY_YEAR] = getParameterFromPost(FORM_BIRTHDAY_YEAR);
      $person[FORM_BIRTHDAY_YEAR] = $person[FORM_BIRTHDAY_YEAR] == FORM_BIRTHDAY_YEAR_NULL ? "" : $person[FORM_BIRTHDAY_YEAR];

      return $person;
  }

  /**
   * Проверка значений полей
   * @return boolean
   */
  function checkData($person)
  {
      $result = TRUE;

      //Имя
      if (checkNotNull($person[FORM_FIRST_NAME], "Имя: " . getError(5) . "\n"))
      {
          $result *= checkRegEx($person[FORM_FIRST_NAME], "/^[A-Za-zА-ПР-Яа-пр-я\s\-]+$/", "Имя: " . getError(6) . "\n");
      } else
      {
          $result = false;
      }

      //Фамилия
      if (checkNotNull($person[FORM_LAST_NAME], "Фамилия: " . getError(5) . "\n"))
      {
          $result *= checkRegEx($person[FORM_LAST_NAME], "/^[A-Za-zА-ПР-Яа-пр-я\s\-]+$/", "Фамилия: " . getError(6) . "\n");
      } else
      {
          $result = false;
      }

      //Email
      if (checkNotNull($person[FORM_EMAIL], "Email: " . getError(5) . "\n"))
      {
          $result *= checkRegEx($person[FORM_EMAIL], "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", "Email: " . getError(7) . "\n");
          $result *= checkEquals(0, dbExecuteScalar("SELECT count(`person_id`) FROM `person` WHERE `email`='" . $person[FORM_EMAIL] . "'"), "Email: " . getError(10) . "\n");
      } else
      {
          $result = false;
      }

      //Re-Email
      $result *= checkEquals($person[FORM_EMAIL], $person[FORM_REEMAIL], "Re-enter Email: " . getError(8) . "\n");

      //Пароль
      if (checkNotNull($person[FORM_PASS], "Пароль: " . getError(5) . "\n"))
      {
          $result *= checkRegEx($person[FORM_PASS], "/^[a-zA-ZA-ПР-Яа-пр-я0-9]+$/", "Пароль: " . getError(3) . "\n");
      } else
      {
          $result = false;
      }

      //Пол
      //День рождения
      //День
      //Месяц
      //Год
//      //Проверка на инъекцию
//      for ($i=0;$i<count(person);$i++){
//          if (mysqli_real_escape_string($escapestr))
//      }
      return $result;
  }

  function personSaveToDB()
  {
      $result = false;
      $person = readData();
      if (checkData($person))
      {
          //Сохранение файла в БД
          $sql = "INSERT INTO `person` ("
                  . "`first_name`, "
                  . "`last_name`, "
                  . "`email`, "
                  . "`password`, "
                  . "`sex`, "
                  . "`day`, "
                  . "`month`, "
                  . "`year`)"
                  . "VALUES ("
                  . "'" . $person[FORM_FIRST_NAME] . "', "
                  . "'" . $person[FORM_LAST_NAME] . "', "
                  . "'" . $person[FORM_EMAIL] . "', "
                  . "'" . $person[FORM_PASS] . "', "
                  . "'" . $person[FORM_SEX] . "', "
                  . "" . $person[FORM_BIRTHDAY_DAY] . ", "
                  . "'" . $person[FORM_BIRTHDAY_MONTH] . "', "
                  . "" . $person[FORM_BIRTHDAY_YEAR]
                  . ")";
          $result = dbExecuteNoResult($sql);
      }
      //print_r($person);
      return $result;
  }

  if (personSaveToDB())
  {
      echo "Данные успешно сохранены.";
  } else
  {
      echo "Данные не сохранены.";
  }
  