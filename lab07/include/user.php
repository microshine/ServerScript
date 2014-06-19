<?php

function checkAuthentication()
{
  if (!userIsLogged())
  {
    header("location: login.php");
  }
}

function userIsLogged()
{
  if (isset($_SESSION['user_id']))
  {
    return true;
  } else
  {
    return false;
  }
}

function userDrawForm()
{
  if (userIsLogged())
  {
    echo getView(
            'logged.html', array(
        "user_name" => $_SESSION["user_name"],
        "user_id" => $_SESSION["user_id"]
            )
    );
  } else
  {
    echo getView(
            'login.html', array(
        "FORM_EMAIL" => FORM_EMAIL,
        "FORM_PASS" => FORM_PASS,
            )
    );
  }
}

function userCheckLoginData()
{
  if (getParameterFromPost("submit") === "Sign Up")
  {
    $email = getParameterFromPost(FORM_EMAIL);
    $password = getParameterFromPost(FORM_PASS);
    $person = userGetByEmailPassword($email, $password);
    if (count($person) === 0)
    {
      echo "Неверный логин или пароль.";
    } else
    {
      $_SESSION['user_name'] = $person[0][FORM_LAST_NAME] . ' ' . $person[0][FORM_FIRST_NAME];
      $_SESSION['user_id'] = $person[0]['person_id'];
    }
  }
}

function userGetByEmailPassword($email, $password)
{
  $email = dbStringInjection($email);
  $password = dbStringInjection($password);
  $sql = "SELECT * FROM `person` WHERE `email`='$email' AND `password`='$password';";
  return dbExecuteAssoc($sql);
}

function userGetInfo($id)
{
  if ($id != "")
  {
    if (dbExecuteScalar("SELECT count(person_id) FROM `person` WHERE `person_id`=" . $id) > 0)
    {
      $person = dbExecuteAssoc("SELECT * FROM `person` WHERE `person_id`=" . $id);
      return $person;
    }
  }
}

/**
 * Считывает данные из POST
 * @return array
 */
function userLoadFromPOST()
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
function userCheckData($person)
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

function userSaveToDB($person)
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

  //print_r($person);
  return $result;
}

function userCount()
{
  return dbExecuteScalar("SELECT count(person_id) FROM person");
}

function userList($start = 0, $limit = 0)
{
  $person=NULL;
  if ($limit > 0)
  {
    $person = dbExecuteAssoc("SELECT * FROM person ORDER BY last_name, first_name LIMIT " . $start . "," . $limit);
  } else
  {
    $person = dbExecuteAssoc("SELECT * FROM person ORDER BY last_name, first_name");
  }
  return $person;
}


function pswStrength($password)
  {
      $error = $numCount = $lowLCount = $upLCount = $repeatCount = $strong = 0;
      $repeatLetter = array();

      //Обработка даных
      for ($i = 0; $i < strlen($password); $i++)
      {
          $repeatLetter[$password[$i]] ++;
          $numCount += preg_match("/[0-9]/", $password[$i]);
          $lowLCount+=preg_match("/[a-z]/", $password[$i]);
          $upLCount+=preg_match("/[A-Z]/", $password[$i]);
          if (!preg_match("/[A-Za-z0-9]/", $password[$i]))
          {
              $error = 3;
              break;
          }
      }

      if ($error != 0)
      {
          echo getError($error) . "\n";
      } else
      {
          //Суммирование повторов
          foreach ($repeatLetter as $j)
          {
              $repeatCount+=$j != 1 ? $j : 0;
          }
          //Рассчет сложности пароля
          $len = strlen($password);
          $strong += 4 * $len;                                        //1
          $strong+=4 * $numCount;                                     //2
          $strong+=$upLCount != 0 ? ($len - $upLCount) * 2 : 0;       //3
          $strong+=$lowLCount != 0 ? ($len - $lowLCount) * 2 : 0;     //4
          $strong+=$lowLCount + $upLCount != $len ? 0 : $len;         //5
          $strong+=$numCount != $len ? 0 : $len;                      //6
          $strong+=$repeatCount;                                      //7
      }
      return $strong;
  }