<?php

  function buildLayout($templateName, $templateVars, $pageVars)
  {
      $html = getView("header.html", $pageVars);
      $html .= getView($templateName, $templateVars);
      $html .= getView("footer.html", $pageVars);
      return $html;
  }
  