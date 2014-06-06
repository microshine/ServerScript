<?php
  require_once './include/common.inc.php';

  function personGetData($id)
  {
      if ($id != "")
      {
          if (dbExecuteScalar("SELECT count(person_id) FROM `person` WHERE `person_id`=" . $id) > 0)
          {
              $person = dbExecuteAssoc("SELECT * FROM `person` WHERE `person_id`=" . $id);
              //Печать анкетных данных
              include './form_person_data.php';
              echo "<br/>";
              include './lab050201.php';
              return;
          }
      }
      header('location: lab040103.php');
  }
?>

<html>
    <head>
        <meta charset="utf-8"/>
        <title>Задание 5.4 #10</title>
        <link rel="stylesheet" type="text/css" href="css/form_sign.css"/>
    </head>
    <body>
        <?php
          personGetData(strtolower(getParameterFromGet("id")));
        ?>
    </body>
</html>