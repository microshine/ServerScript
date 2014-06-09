<?php
require_once './include/common.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Задание 6.3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <link href="css/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <form>
            <h3>Карта сайта:</h3>
            <ul>
                <li>
                    <a href="./lab050401.php">Список пользователей</a>
                </li>
                <li>
                    <a href="./lab0506.php">Загруженные файлы</a>
                </li>
            </ul>
        </form>
        <?php
        userCheckLoginData();
        userDrawForm();
        ?> 
    </body>
</html>
