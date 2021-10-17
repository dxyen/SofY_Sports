var slideIndex = 1;

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("promotion__item");
    var dots = document.getElementsByClassName("paging__item");

    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" paging__item__active", "");
    }

    slides[slideIndex - 1].style.display = "flex";
    dots[slideIndex - 1].className += " paging__item__active";
}

showSlides(slideIndex);

function pushSlide(n){
    slideIndex += n;
    showSlides(slideIndex);
}

function currentSlide(n){
    slideIndex = n;
    showSlides(slideIndex);
}
