<?php
require_once './include/common.inc.php';

function NavigationBar() {
    $rows = dbExecuteScalar("SELECT count(person_id) FROM person");
    $html = "";
    if (($rows / TABLE_LIST_AMOUNT) > 1) {
        $html .= "<div>";
        $html .= "<a href='?page=0'>&lt;&lt;</a>";
        for ($i=0; $i < ceil($rows / TABLE_LIST_AMOUNT); $i++){
            $html .= "<a href='?page=$i'>".($i+1)."</a>";
        }
        $html .= "<a href='?page=".(ceil($rows / TABLE_LIST_AMOUNT)-1)."'>&gt;&gt;|</a>";
        $html .= "</div>";
    }
    return $html;
}
?>
<!DOCTYPE HTML>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Задание 5.5 #20</title>
        <link type="text/css" rel="stylesheet" href="./css/lab05.css"/>
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
            $page = getParameterFromGet('page', 0);
            $startFrom = $page * TABLE_LIST_AMOUNT;
            $person = dbExecuteAssoc("SELECT * FROM person ORDER BY last_name, first_name LIMIT " . $startFrom . "," . TABLE_LIST_AMOUNT);
            for ($i = 0; $i < count($person); $i++) {
                echo "<tr>";
                echo "<td>" . ($i + 1+($page * TABLE_LIST_AMOUNT)) . "</td>";
                echo "<td>" . $person[$i][FORM_LAST_NAME] . "</td>";
                echo "<td>" . $person[$i][FORM_FIRST_NAME] . "</td>";
                echo "<td>"
                . "<a href='lab050402.php?id=" . $person[$i]['person_id'] . "'>" .
                $person[$i][FORM_EMAIL]
                . "</a>"
                . "</td>";
                echo "<td>" . $person[$i][FORM_SEX] . "</td>";
                echo "<td>" . $person[$i]['day'] . "-" . $person[$i]['month'] . "-" . $person[$i]['year'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <?php echo NavigationBar() ?>
    </body>
</html>