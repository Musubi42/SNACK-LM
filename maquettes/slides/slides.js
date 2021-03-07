// Diaporama
let slideshow = document.getElementById("slideshow");
let slideshow_images = slideshow.children;
let images_count = slideshow_images.length;
let slideIndex = 0;
var slide;

function autoSlide() {
    slide = setInterval(function () {
        nextSlide();
    }, 3000);
}

function manualSlide() {
    nextSlide();
    clearInterval(slide);
    autoSlide();
}

function nextSlide() {
    for (let i = 0; i < images_count; i++) {
        slideshow_images[i].style.display = "none";
    }
    slideshow_images[slideIndex].style.display = "block";
    slideIndex++;
    if (slideIndex == images_count) {
        slideIndex = 0;
    }
}

nextSlide();
autoSlide();