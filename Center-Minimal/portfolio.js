function openWebModal() { document.getElementById("basicWeb").style.display = "block"; }
function closeWebModal() { document.getElementById("basicWeb").style.display = "none"; }

var webIndex = 1;
showWebSlides(webIndex);

function moveWebSlides(n) { showWebSlides(webIndex += n); }
function currentWebSlide(n) { showWebSlides(webIndex = n); }

function showWebSlides(n) {
    var i;
    var slides = document.getElementsByClassName("webSlides");
    var dots = document.getElementsByClassName("webDemo");
    var txt = document.getElementById("basicWebInfo");
    
    if(n > slides.length) { webIndex = 1; }
    if(n < 1) { webIndex = slides.length; }
    
    for(i = 0; i < slides.length; i++) { slides[i].style.display = "none"; }
    for(i = 0; i < dots.length; i++) { dots[i].className = dots[i].className.replace(" active", ""); }
    
    slides[webIndex - 1].style.display = "block";
    dots[webIndex - 1].className += " active";
    txt.innerHTML = dots[webIndex - 1].alt;
}
