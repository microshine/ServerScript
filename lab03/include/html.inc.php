<?php
    function htmlOptionArray($from, $to){
        for ($i = $from; $i <= $to ; $i++) {
            echo "<option>".$i."</option>";
        }        
    }
?>