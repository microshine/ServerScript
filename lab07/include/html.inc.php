<?php
    function htmlOptionArray($from, $to){
        $result = "";
        for ($i = $from; $i <= $to ; $i++) {
            $result .= "<option>".$i."</option>";
        }        
        return $result;
    }
?>