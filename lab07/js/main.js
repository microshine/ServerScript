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