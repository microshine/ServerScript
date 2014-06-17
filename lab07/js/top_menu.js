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