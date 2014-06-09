<?php
function checkAuthentication(){
    if (!userIsLogged()){
        header("location: lab0603_index.php");
    }
}

function userIsLogged() {
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function userDrawForm() {
    if (userIsLogged()) {
        include './form_logged.php';
    } else {
        include './form_login.php';
    }
}

function userCheckLoginData() {
    if (getParameterFromPost("submit") === "Sign Up") {
        $email = getParameterFromPost(FORM_EMAIL);
        $password = getParameterFromPost(FORM_PASS);
        $person = userGetByEmailPassword($email, $password);
        if (count($person) === 0) {
            echo "Неверный логин или пароль.";
        } else {
            $_SESSION['user_name'] = $person[0][FORM_LAST_NAME] . ' ' . $person[0][FORM_FIRST_NAME];
            $_SESSION['user_id'] = $person[0]['person_id'];
        }
    }
}

function userGetByEmailPassword($email, $password) {
    $email = dbStringInjection($email);
    $password = dbStringInjection($password);
    $sql = "SELECT * FROM `person` WHERE `email`='$email' AND `password`='$password';";
    return dbExecuteAssoc($sql);
}
