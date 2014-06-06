<?php

  function Connect()
  {
      $g_link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
      if (!$g_link)
      {
          die("Ошибка соединения: " . mysqli_error($g_link));
      }
      mysqli_query($g_link, 'SET NAMES `utf8`');
      return $g_link;
  }

  /***
   * Выполняет запрос. Возвращает набор данных
   */
  function dbExecute($sql)
  {
      $g_link = Connect();

      $new_array = array();
      if ($result = mysqli_query($g_link, $sql))
      {
          while ($row = mysqli_fetch_assoc($result))
          {
              $new_array[] = $row;
          }
          return $new_array;
      }

      die("Ошибка запроса: " . mysqli_error($g_link));
  }

  function dbExecuteAssoc($sql)
  {
      $g_link = Connect();

      $new_array = array();
      if ($result = mysqli_query($g_link, $sql))
      {
          while ($row = mysqli_fetch_assoc($result))
          {
              $new_array[] = $row;
          }
          return $new_array;
      }

      die("Ошибка запроса: " . mysqli_error($g_link));
  }
  
  /***
   * Выполняет SQL скрипт. Не возвращает результаты.
   */
  function dbExecuteNoResult($sql)
  {
      $g_link = Connect();

      $new_array = array();
      if ($result = mysqli_query($g_link, $sql))
      {
          return true;
      }

      return false;
  }

  /**
   * Возвращает первое значение первого поля
   * @param type $sql
   * @return type
   */
  function dbExecuteScalar($sql)
  {
      $g_link = Connect();

      $new_array = array();
      if ($result = mysqli_query($g_link, $sql))
      {
          $row = mysqli_fetch_array($result);
          return $row[0];
      }

      die("Ошибка запроса: " . mysqli_error($g_link));
  }
  