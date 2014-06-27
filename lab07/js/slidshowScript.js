function onImageList(response, headers)
{
    if (response !== "0") {
        slide_image_list = slide_image_list.concat(response.split(","));
        console.log(slide_image_list);
    }else{
        slide_image=1;
    }
}

function getImageList(page, amount)
{
    var data = "";
    data += "page=" + page + "&";
    data += "amount=" + amount;
    getUrl("get_image_list.php", onImageList, data);
}

function showImage(image_name) {
    var slider = $("#sliderImage");
    slider.html("<img src='uploads/" + image_name + ".jpg'/>");
    //console.log(image_name);
}

function timeInit() {
    slideTimer = slideInterval + 1;
    window.clearInterval(slideIntervalListener);
    slideIntervalListener = window.setInterval(slideMessage, 1000);
}

function clickBack() {
    if (slide_image_list.length > 0) {
        slide_image--;
        if (slide_image===0){
            slide_image=slide_image_list.length-1;
        }
        showImage(slide_image_list[slide_image]);
    }
    timeInit();
}

function clickNext() {
    timeInit();
    slideNext();
}

function slideNext() {
    if (slide_image_list.length > 0) {
        showImage(slide_image_list[slide_image]);
        slide_image++;
        if (slide_image_list.length === slide_image) {
            //slide_image = 0;
            slide_page++;
            getImageList(slide_page, image_buffer);
        }
    }
}

function slideMessage() {
    --slideTimer;
    if (slideTimer === 0)
        slideTimer = slideInterval;
    $(".slideshowMessage").text("Переключение через " + slideTimer + " сек.");
    if (slideTimer === slideInterval)
        slideNext();
}

//init
var image_buffer = 5;
var slideInterval = 3;
var slideTimer = slideInterval + 1;
var slide_page = -1;
var slide_image = 0;
var slide_image_list = ["NoImage"];
slideMessage();

var slideIntervalListener = window.setInterval(slideMessage, 1000);