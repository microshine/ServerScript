ERR = {
    EMPTY: "Пустое выражение",
    REGEXP: "Не соответствует регуляному выражению",
    NOT_EQUALS: "Значения не равны"
};

SignUpFields = {
    firstName: "first_name",
    lastName: "last_name",
    email: "email",
    reemail: "reemail",
    password: "password",
    sex: "sex",
    day: "day",
    month: "month",
    year: "year"
};

function formSubmit() {
    if (checkSignupData()) {
        document.getElementById("formSignup").submit();
    }
}

function checkSignupData() {
    var person = personInit();
    var msg = [];
    //First name
    if (person.first_name === "") {
        msg.push(SignUpFields.firstName + ": " + ERR.EMPTY);
    } else if (person.first_name.match(/^[A-Za-zА-ПР-Яа-пр-я\s\-]+$/) === null) {
        msg.push(SignUpFields.firstName + ": " + ERR.REGEXP);
    }
    //Last name
    if (person.last_name === "") {
        msg.push(SignUpFields.lastName + ": " + ERR.EMPTY);
    } else if (person.last_name.match(/^[A-Za-zА-ПР-Яа-пр-я\s\-]+$/) === null) {
        msg.push(SignUpFields.lastName + ": " + ERR.REGEXP);
    }
    //Email
    if (person.email === "") {
        msg.push(SignUpFields.email + ": " + ERR.EMPTY);
    } else if (person.email.match(/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/) === null) {
        msg.push(SignUpFields.email + ": " + ERR.REGEXP);
    }
    //ReEmail
    if (person.reemail !== person.email)
        msg.push(SignUpFields.reemail + ": " + ERR.NOT_EQUALS);
    //Password
    if (person.password === "") {
        msg.push(SignUpFields.password + ": " + ERR.EMPTY);
    } else if (person.password.match(/^[a-zA-ZA-ПР-Яа-пр-я0-9]+$/) === null) {
        msg.push(SignUpFields.password + ": " + ERR.REGEXP);
    }

    if (msg.length > 0) {
        alert(msg.join("\n"));
        return false;
    }
    else
        return true;
}

function personInit() {
    var person = {};
    person.first_name = getFieldValue(SignUpFields.firstName);
    person.last_name = getFieldValue(SignUpFields.lastName);
    person.email = getFieldValue(SignUpFields.email);
    person.reemail = getFieldValue(SignUpFields.reemail);
    person.password = getFieldValue(SignUpFields.password);
    person.sex = getFieldValue(SignUpFields.sex);
    person.day = getFieldValue(SignUpFields.day);
    person.month = getFieldValue(SignUpFields.month);
    person.year = getFieldValue(SignUpFields.year);
    return person;
}

function getFieldValue(name) {
    console.log(name);
    var el = document.getElementById(name);
    if (el === undefined)
        throw "[getFieldValue] Елемент не найден"
    else {
        return el.value;
    }
}

function onPasswordChange()
{
    var password = document.getElementById('password').value;
    if (password !== "") {
        if (password.match(/^[a-zA-ZA-ПР-Яа-пр-я0-9]+$/) === null) {
            //Не соответствует регулярному выражению
        } else {
            var PASSWORD_STRENGTH_URL = "password_strength.php";
            var data = "password=" + encodeURIComponent(password);

            getUrl(PASSWORD_STRENGTH_URL, onPasswordStrengthCheck, data);
            return;
        }
    }
    var pswStrength = document.getElementById('password_strength');
    pswStrength.innerHTML = "";
}

function onPasswordStrengthCheck(response, headers) {
    var pswStrength = document.getElementById('password_strength');

    if (response >= 0 && response < 50) {
        pswStrength.innerHTML = 'weak';
        pswStrength.style.color = 'red';
    } else
    if (response > 50 && response < 100) {
        pswStrength.innerHTML = 'good';
            pswStrength.style.color = 'orange';
    } else
    if (response >= 100) {
        pswStrength.innerHTML = 'strong';
            pswStrength.style.color = 'green';
    }

    console.log(response);
}
