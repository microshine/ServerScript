<?php

    require_once 'include/request.inc.php';

    header("Content-type: text/plain");

    $text = trim(getParameterFromGet('text'));
    echo preg_replace('/ {2,}/', ' ', $text);
    