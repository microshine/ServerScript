function onPlusClicked(file_id, user_id)
{
    changeRating(file_id, user_id, 1);
}
function onMinusClicked(file_id, user_id)
{
    changeRating(file_id, user_id, -1);
}

function changeRating(file_id, user_id, value)
{
    var data = "";
    data += "file_id=" + file_id + "&";
    data += "user_id=" + user_id + "&";
    data += "rating=" + value;
    getUrl("file_rating_change.php", onRatingChanged, data);
}

function onRatingChanged(response, headers)
{
    response = JSON.parse(response);
    var rating = document.getElementById("rating"+response.file_id);
    rating.innerHTML = response.rating;
    console.log(response);
}
