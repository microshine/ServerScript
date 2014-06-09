<?php
  require_once './include/common.inc.php';
?>
<form action="" method="POST" class="login" id="formLogin">
    <h3>Вход</h3>
    <p>Скажи тук тук и входи.</p>
    <div class="spliter"></div>
    <table>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_EMAIL ?>">Email:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_EMAIL ?>" name="<?php echo FORM_EMAIL ?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_PASS?>">Пароль:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_PASS ?>" name="<?php echo FORM_PASS ?>"/>
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <a class="small" href="lab040101.php">Регистрация</a>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><input class="submit" type="submit" value="Sign Up" name="submit"/></td>
        </tr> 
    </table>
</form>

