<?php
  require_once './include/common.inc.php';
?>
    <table class="login">
        <tr>
            <td class="label">
                <?php echo $_SESSION['user_name'] ?>
            </td>
            <td>
                <a href="./lab050402.php?id=<?php echo $_SESSION['user_id'] ?>">Профиль</a>
            </td>
            <td>
                <a href="./logout.php">Выйти</a>
            </td>
        </tr>
    </table>

