<div class="form_signup">
    <h3>Анкетные данные</h3>
    <p>It's free and always will be.</p>
    <div class="spliter"></div>
    <table>
        <tr>
            <td class="label">
                <label>First Name:</label>
            </td>
            <td>
                <?=$person[0][FORM_FIRST_NAME]?>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label>Last Name:</label>
            </td>
            <td>
                <?=$person[0][FORM_LAST_NAME]?>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label>Your Email:</label>
            </td>
            <td>
                <?=$person[0][FORM_EMAIL]?>
            </td>
        </tr>
            <td class="label">
                <label>Password:</label>
            </td>
            <td>
                <?=$person[0][FORM_PASS]?>
            </td>
        </tr> 
        <tr>
            <td class="label">
                <label>Sex:</label>
            </td>
            <td>
                <?=$person[0][FORM_SEX]?>
            </td>
        </tr> 
        <tr>
            <td class="label">
                <label>Birthday:</label>
            </td>
            <td>
                <?php echo $person[0][FORM_BIRTHDAY_MONTH]." ".$person[0][FORM_BIRTHDAY_DAY]." ".$person[0][FORM_BIRTHDAY_YEAR] ?>
            </td>
        </tr>  
    </table>
</div>