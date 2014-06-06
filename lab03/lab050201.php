<form class="form_signup" action="lab050202.php?id=<?php echo $person[0]["person_id"] ?>" method="post" enctype="multipart/form-data">

    <h3>Сохранение файла</h3>
    <p>Что-то вроде слогана!</p>
    <div class="spliter"></div>
    <table>
        <tr>
            <td class="label">
                <label>Файл:</label>
            </td>
            <td>
                <input name="file" type="file"/>    
            </td>
        <tr>
            <td></td>
            <td><input class="submit" type="submit" value="Сохранить"/></td>
        </tr>
        </tr>  
    </table>
</div>
</form>