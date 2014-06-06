function getXmlHttp() {
    var xhr = null;
    try {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");

        } catch (e) {
            //do nothing
        }
    }
    if (XMLHttpRequest !== undefined){
        xhr = new XMLHttpRequest();
    }
    return xhr;
}

function getURL(url, callback){
    var xhr = getXmlHttp();
    if (!xhr){
        return;
    }
    
    xhr.open("GET", url);
    xhr.onreadystatechange = function(){
        if (xhr.readyState == 4 && xhr.status == 200){
            callback(xhr.responseText, xhr.getAllResponseHeaders());
        }
        xhr.send();
    }
}