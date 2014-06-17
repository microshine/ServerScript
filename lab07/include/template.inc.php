<?php

function getView($templateName, $vars = array())
{
  $templatePath = TEMPLATE_DIR . "/" . $templateName;
  $content = file_get_contents($templatePath);
  if (!empty($vars))
  {
    foreach ($vars as $placeholder => $value)
    {
      $key = '{$' . $placeholder . "}";
      $content = str_replace($key, $value, $content);
    }
  }
  return $content;
}
