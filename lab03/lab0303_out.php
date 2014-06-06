<?php
  require_once './include/common.inc.php';

  function personGetData($email)
  {
      $file = "data/" . $email . ".txt";
      if (checkEmail($email) && file_exists($file))
      {
          //Получение данных
          $fo = fopen($file, "r");
          $first_name = $last_name = $psw = $sex = $day = $month = $year = "";
          if ($fo)
          {
              $line = fgets($fo);
              if ($line)
              {
                  $arr = str_getcsv($line, ";");
                  $first_name = $arr[0];
                  $last_name = $arr[1];
                  $psw = $arr[3];
                  $sex = $arr[4];
                  $day = $arr[6];
                  $month = $arr[5];
                  $year = $arr[7];
              } else{
                  return "Пустой файл!";
              }
              fclose($fo);
          }

          //Печать анкетных данных
          include './form_person_data.php';
      } else
      {
          echo getError(9) . "<br/>";
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