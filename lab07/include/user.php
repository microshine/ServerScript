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
            'logged.html',
            array(
                "user_name" => $_SESSION["user_name"],
                "user_id" => $_SESSION["user_id"]
            )
          );
  } else
  {
    echo getView(
            'login.html',
            array(
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