<?php

    $fo = fopen('request.log', 'a'); //append
    if ($fo){
        fwirte($fo, $name."\n");
        fclose($fo);
    }

