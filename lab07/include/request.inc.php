<?php

    function getParameterFromGet($name, $defaultValue = "") {
        $result = $_GET[$name];
        return isset($result) ? $result : $defaultValue;
    }

    function getParameterFromPost($name, $defaultValue = "") {
        $result = $_POST[$name];
        return isset($result) ? $result : $defaultValue;
    }
    
    function getFileFromPost($name) {
        $result = $_FILES[$name];
        return isset($result) ? $result : NULL;
    }
    
    function getFileFromGet($name) {
        $result = $_FILES[$name];
        return isset($result) ? $result : NULL;
    }