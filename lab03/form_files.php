<form>
    <h3>Список файлов</h3>
    <div class="spliter"></div>
    <table>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Имя</th>
            <th>Расширение</th>
            <th>Размер</th>
            <th>Загружен</th>
            <th>Пользователь</th>
            <th>email</th>
        </tr>
        <?php
        $i=0;
        foreach (fileGetAll(getParameterFromGet("email"),getParameterFromGet("extension")) as $file){
            echo "<tr>";
            echo "<td>".++$i."</td>";
            echo "<td>".$file['file_id']."</td>";
            echo "<td>".$file['file_name']."</td>";
            echo "<td>".$file['extension']."</td>";
            echo "<td>".$file['file_size']."</td>";
            echo "<td>".$file['uploaded']."</td>";
            echo "<td>".$file['last_name']." ".$file['first_name']."</td>";
            echo "<td>".$file['email']."</td>";
            echo "</tr>";
        }
        ?>
    </table>
</form>