<?php

  require_once 'include/common.inc.php';

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

  header("Content-type: text/plain; charset=utf-8");

  echo "Пароль: " . getParameterFromGet("password") . "\n";
  echo "Сложность: " . pswStrength(getParameterFromGet("password"));


  