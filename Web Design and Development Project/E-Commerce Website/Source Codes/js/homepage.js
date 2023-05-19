var isStarted = false;

var timing = 5000;
console.log(timing);
var timeoutHandle;
var path = "images/slideshow/";
var imageArray = ["slideshowimage1.jpg", "slideshowimage2.jpg", "slideshowimage3.jpg"];
var imageIndex = 0;
var myImage = document.getElementById('imgContainer');
var text = document.getElementById('text')
var textArray = ["HOMECOOKING MADE BETTER!", "TRADITIONAL TASTE FOR THE MODERN TABLE", "HEALTHIER CHOICE COOKING"];

function changeImage() {
    myImage.setAttribute("style", "background-image: url(" + path + imageArray[imageIndex] +")");
    text.innerHTML = textArray[imageIndex];
    console.log(imageIndex + " " + imageArray[imageIndex]);
    imageIndex+=1;
    if (imageIndex >= imageArray.length) {
       imageIndex = 0;
    }
    timeoutHandle = setTimeout(changeImage, timing);
}
timeoutHandle = setTimeout(changeImage, 0);

function Slide(){
    
}