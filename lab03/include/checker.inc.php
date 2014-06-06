<?php

  function _check($value, $msg = "")
  {
      if (!$value && $msg != "")
      {
          echo $msg;
      }
  }

  function checkNull($value, $msg = "")
  {
      $result = TRUE;
      if ($value != "")
      {
          $result = FALSE;
      }

      _check($result, $msg);

      return $result;
  }

  function checkNotNull($value, $msg = "")
  {
      $result = TRUE;
      if ($value == "")
      {
          $result = FALSE;
      }

      _check($result, $msg);

      return $result;
  }

  function checkRegEx($value, $regEx, $msg = "")
  {
      $result = preg_match($regEx, $value);

      _check($result, $msg);
      return $result;
  }

  function checkEquals($value1, $value2, $msg = "")
  {
      $result = TRUE;
      if ($value1 != $value2)
      {
          $result = FALSE;
      }

      _check($result, $msg);
      
      return $result;
  }
  
  //Проверка email
  function checkEmail($value)
  {
      if (checkNotNull($value, "Email: " . getError(5) . "<br/>"))
      {
          return checkRegEx($value, "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", "Email: " . getError(7) . "</br>");
      } else
      {
          return false;
      }
  }