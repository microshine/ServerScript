<?php

    function getParameterFromGet($name, $defaultValue = "") {
        $result = $_GET[$name];
        return isset($result) ? $result : $defaultValue;
    }

    function getParameterFromPost($name, $defaultValue = "") {
        $result = $_POST[$name];
        return isset($result) ? $result : $defaultValue;
    }
    