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
    var el = document.getElementById(name);
    if (el === undefined)
        throw "[getFieldValue] Елемент не найден"
    else {
        return el.value;
    }
}


//Menu
function Menu(name) {
    //Привязка события
    function bindEvent(element, event, callback) {
        if (element.addEventListener) {  // Все браузеры за исключением IE версии 9
            element.addEventListener(event, callback, false);
        }
        else {
            if (element.attachEvent) {   // IE до версии 9
                element.attachEvent("on" + event, callback);
            }
        }
    }

    var el = document.getElementById(name);
    var arr = el.getElementsByTagName("li");
    for (var i = 0; i < arr.length; i++) {
        bindEvent(arr[i], "mouseover", toggleElement);
        bindEvent(arr[i], "mouseout", toggleElement);
    }
}

//Свернуть / Развернуть элемент
function toggleElement() {
    var arr = this.getElementsByTagName("ul");
    if (arr.length > 0) {
        var el = arr[0];
        if (el.style.display !== "block")
            el.style.display = "block";
        else
            el.style.display = "none";
    }
}
