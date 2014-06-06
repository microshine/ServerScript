<html>
    <head>
        <meta charset="utf-8"/>
        <title>Задание 3.2 запрос</title>
        <link rel="stylesheet" type="text/css" href="css/form_sign.css"/>
    </head>
    <body>
        <form action="lab0303_out.php" method="POST" class="form_signup">
            <h3>Запрос анкеты</h3>
            <div class="spliter"></div>
            <table>
                <tr>
                    <td class="label">
                        <label target="email">Email:</label>
                    </td>
                    <td>
                        <input type="text" id="email" name="email"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="submit" type="submit" value="Sign Up"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>