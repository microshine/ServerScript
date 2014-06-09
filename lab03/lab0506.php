<?php
require_once './include/common.inc.php';
checkAuthentication();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Задание 5.6</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
        include("./form_files_filter.php");
        echo '</br>';
        include("./form_files.php");
        ?>
    </body>
</html>
