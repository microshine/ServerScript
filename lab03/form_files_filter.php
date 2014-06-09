<?php
require_once './include/common.inc.php';
?>

<form method="GET" action="">
    <h3>Фильтр фалов</h3>
    <div class="spliter"></div>
    <table>
        <tr>
            <td class="label">
                <label target="email">Email</label>
            </td>
            <td><input type="text" id="email" name="email" value="<?php echo getParameterFromGet("email") ?>"/></td>
        </tr>
        <tr>
            <td class="label">
                <label target="extension">Расширение</label>
            </td>
            <td><input type="text" id="extension" name="extension" value="<?php echo getParameterFromGet("extension") ?>"/></td>
        </tr>
        <tr>
            <td >
            </td>
            <td><input class="submit" type="submit" value="Поиск"/></td>
        </tr>
    </table>
</form>

