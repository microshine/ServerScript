<?php

    require_once 'include/common.inc.php';

    function surveySaver($first_name, $last_name, $email, $age) {
        $fo = fopen("data/'.$email.'.txt", 'a');
        if ($fo) {
            if (!($first_name == "" && $last_name == "" && $email == "" && $age == "")) {
                $text = $first_name . ";" . $last_name . ";" . $email . ";" . $age . "\n";
                fwrite($fo, $text);
                echo "Добавлена запись: " . $text;
            }
            else{
                echo getError(4);
            }
            fclose($fo);
        }
    }
    
    header("Content-type: text/plain; charset=utf-8");

    surveySaver(
            getParameterFromGet("first_name"), 
            getParameterFromGet("last_name"), 
            getParameterFromGet("email"), 
            getParameterFromGet("age"));
    