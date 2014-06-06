<?php 
require_once './include/common.inc.php';
?>
<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Задание 5.3 #10</title>
        <link type="text/css" rel="stylesheet" href="./css/form_sign.css"/>
    </head>
    <body>
        <table>
            <tr>
                <th>#</th>
                <th>Last name</th>
                <th>First name</th>
                <th>sex</th>
                <th>email</th>
                <th>Birthday</th>
            </tr>
        <?php
            $person = dbExecuteAssoc("SELECT * FROM person ORDER BY last_name, first_name");
            for ($i=0; $i<count($person); $i++){
                echo "<tr>";
                echo "<td>".($i+1)."</td>";
                echo "<td>".$person[$i][FORM_LAST_NAME]."</td>";
                echo "<td>".$person[$i][FORM_FIRST_NAME]."</td>";
                echo "<td>".$person[$i][FORM_EMAIL]."</td>";
                echo "<td>".$person[$i][FORM_SEX]."</td>";
                echo "<td>".$person[$i]['day']."-".$person[$i]['month']."-".$person[$i]['year']."</td>";
                echo "</tr>";
            }
        ?>
        </table>
    </body>
</html>
