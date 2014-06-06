<?php
  require_once './include/common.inc.php';

  function personGetData($email)
  {
      if (checkEmail($email))
      {
          $person = dbExecute("SELECT * FROM `person` WHERE `email`='" . $email . "'");
          if (count($person) > 0)
          {
              //Печать анкетных данных
              include './form_person_data.php';
              echo "<br/>";
              include './lab050201.php';
          }
          else{
              echo "Пользователь с email: ".$email." не найден. <a href='lab040101.php'>Зарегистрируйтесь</a>";
          }
      } else
      {
          echo getError(7) . "<br/>";
      }
  }
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>Задание 3.2 анкета</title>
        <link rel="stylesheet" type="text/css" href="css/form_sign.css"/>
    </head>
    <body>
        <?php
          personGetData(strtolower(getParameterFromPost("email")));
        ?>
    </body>
</html>