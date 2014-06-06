<?php

  require_once 'include/common.inc.php';

  //Обработка данных
  /**
   * Проверяет имя индентификатора на соответствие правилу SR3
   * @param String $identifire 
   * Идентификатор
   * @return int
   * Возвращает 0 если идентификатор соответствует правилу SR3, 
   * иначе возвращает код ошибки.
   */
  function checkIdentifier($identifire = "")
  {
      IF ($identifire==""){
          return 8;
      }
      $error = 0;
      $i = 0;
      for ($i = 0; $i < strlen($identifire); $i++)
      {
          if ($i == 0 && !(preg_match("/^[A-Za-z]/", $identifire[$i])))
          {
              $error = 1;
              break;
          } elseif (!(preg_match("/^[A-Za-z0-9]/", $identifire[$i])))
          {
              $error = 2;
              break;
          }
      }
      return $error;
  }

  header("Content-type: text/plain; charset=utf-8");

  $id = getParameterFromGet("identifire");
  if ($id == "")
  {
      echo "Идентификатор не может быть пустым значением";
  } else
  {
      echo "Идентификатор: " . $id . "\n";
      $id = checkIdentifier(getParameterFromGet("identifire"));
      echo $id != 0 ? getError($id) : "Верный идентификатор";
  }
//    //Вывод информации
//    echo $identifire . "\n";
//    for ($j = 0; $j < strlen($identifire) && $error_index != 0; $j++) {
//        echo $j == $i ? '^' : ' ';
//    }
//    echo getError($error_index);



    