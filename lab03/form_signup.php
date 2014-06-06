<?php
  require_once './include/common.inc.php';
?>
<form action="<?= $_SESSION["signup_action"] ?>" method="POST" class="form_signup" id="formSignup">
    <h3>Sign Up</h3>
    <p>It's free and always will be.</p>
    <div class="spliter"></div>
    <table>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_FIRST_NAME ?>">First Name:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_FIRST_NAME ?>" name="<?php echo FORM_FIRST_NAME ?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_LAST_NAME ?>">Last Name:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_LAST_NAME ?>" name="<?php echo FORM_LAST_NAME ?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_EMAIL ?>">Your Email:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_EMAIL ?>" name="<?php echo FORM_EMAIL ?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_REEMAIL ?>">Re-enter Email:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_REEMAIL ?>" name="<?php echo FORM_REEMAIL ?>"/>
            </td>
        </tr>
        <tr>
            <td class="label">
                <label target="<?php echo FORM_PASS ?>">New Password:</label>
            </td>
            <td>
                <input type="text" id="<?php echo FORM_PASS ?>" name="<?php echo FORM_PASS ?>"/>
            </td>
        </tr> 
        <tr>
            <td class="label">
                <label target="<?php echo FORM_SEX ?>">Sex:</label>
            </td>
            <td>
                <select id="<?php echo FORM_SEX ?>" name="<?php echo FORM_SEX ?>">
                    <option hidden selected><?PHP echo FORM_SEX_NULL?></option>
                    <option >Male</option>
                    <option >Female</option>
                </select>
            </td>
        </tr> 
        <tr>
            <td class="label">
                <label target="<?php echo FORM_BIRTHDAY_MONTH ?>">Birthday:</label>
            </td>
            <td>
                <select id="<?php echo FORM_BIRTHDAY_MONTH ?>" name="<?php echo FORM_BIRTHDAY_MONTH ?>">
                    <option hidden selected><?PHP echo FORM_BIRTHDAY_MONTH_NULL?></option>
                    <option >Январь</option>
                    <option >Февраль</option>
                    <option >Март</option>
                    <option >Апрель</option>
                    <option >Май</option>
                    <option >Июнь</option>
                    <option >Июль</option>
                    <option >Август</option>
                    <option >Сентябрь</option>
                    <option >Октябрь</option>
                    <option >Ноябрь</option>
                    <option >Декабрь</option>
                </select>
                <select id="<?php echo FORM_BIRTHDAY_DAY ?>" name="<?php echo FORM_BIRTHDAY_DAY ?>">
                    <option hidden selected><?PHP echo FORM_BIRTHDAY_DAY_NULL?></option>
                    <?php
                      htmlOptionArray(1, 31);
                    ?>
                </select>
                <select id="<?php echo FORM_BIRTHDAY_YEAR ?>" name="<?php echo FORM_BIRTHDAY_YEAR ?>">
                    <option hidden selected><?php echo FORM_BIRTHDAY_YEAR_NULL ?></option>
                    <?php
                      htmlOptionArray(1900, 2014);
                    ?>
                </select>
                <a href="">Why do I need to provide this?</a>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td><input class="submit" type="button" value="Sign Up" onclick="formSubmit()"/></td>
        </tr> 
    </table>
</form>