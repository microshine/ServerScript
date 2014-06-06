<?php

    require_once 'include/common.inc.php';

    header("Content-type: text/plain; charset=utf-8");

    
    function surveyInfo($email) {
        define("TAB", "  ");
        
        $fo = fopen("data/'.$email.'.txt", 'r');
        if ($fo) {
            $i = 0;
            while ($line = fgets($fo)) {
                $arr = str_getcsv($line, ";");
                echo "Запись #" . ++$i . "\n";
                echo TAB . "Имя: " . $arr[0] . "\n";
                echo TAB . "Фамилия: " . $arr[1] . "\n";
                echo TAB . "Email: " . $arr[2] . "\n";
                echo TAB . "Возраст: " . $arr[3] . "\n\n";
            }
            fclose($fo);
        }
    }
    
    $email=getParameterFromGet('email');
    
    surveyInfo($email);
    