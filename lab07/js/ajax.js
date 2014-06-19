function getXmlHttp()
{
    var xhr = false;
    try
    {
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e)
    {
        try
        {
            xhr = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e)
        {
            // do nothing.
        }
    }

    if (typeof XMLHttpRequest != 'undefined')
    {
        xhr = new XMLHttpRequest();
    }

    return xhr;
}

function getUrl(url, callback, data)
{
    var xhr = getXmlHttp();
    if (!xhr)
    {
        return;
    }

    var async = true;
    xhr.open("POST", url, async);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function()
    {
        if ((xhr.readyState == 4) && (xhr.status == 200))
        {
            callback(xhr.responseText, xhr.getAllResponseHeaders());
        }
    };
    xhr.send(data);
}
