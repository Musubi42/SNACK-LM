// Diaporama
let slideshow = document.getElementById("slideshow");
let slideshow_images = slideshow.children;
let images_count = slideshow_images.length;
let slideControl = document.getElementById("leap");
let slideIndex = 0;
var slide;

for (let i = 0; i < images_count; i++) { // Créer les boutons 1, 2, 3...
    slideControl.innerHTML += "<div id=\"" + i + "\" onclick=\"goToIndex(" + i + ")\" class=\"slide-button\"></div>"
}
let slideButtons = slideControl.children;

function incrementIndex() { // Cibler l'image suivante
    if (slideIndex == (images_count-1)) {
        slideIndex = 0;
    } else {
        slideIndex++;
    }
}

function decrementIndex(){ // Cibler l'image précédente
    if (slideIndex != 0) { 
        slideIndex--;
    } else{
        slideIndex = (images_count-1)
    }
}

function refreshSlide() { // Afficher l'image ciblée
    for (let i = 0; i < images_count; i++) {
        slideshow_images[i].style.display = "none";
        slideButtons[i].classList.remove("active");
    }
    slideshow_images[slideIndex].style.display = "block";
    slideButtons[slideIndex].classList.add("active");
}

function autoSlide() { // Démarrer le mode automatique
    slide = setInterval(function () {
        incrementIndex(); // Cibler l'image suivante
        refreshSlide(); // Afficher l'image ciblée
    }, 4500);
}

function nextSlide() {
    clearInterval(window.slide); // Arrêter le mode automatique
    incrementIndex(); // Cibler l'image suivante
    refreshSlide(); // Afficher l'image ciblée
    autoSlide(); // Démarrer le mode automatique
}

function previousSlide() {
    clearInterval(window.slide); // Arrêter le mode automatique
    decrementIndex() // Cibler l'image précédente
    refreshSlide(); // Afficher l'image ciblée
    autoSlide(); // Démarrer le mode automatique
}

function goToIndex(j) {
    slideIndex = j; // Cibler l'image j
    refreshSlide(); // Afficher l'image ciblée
}

refreshSlide(); // Afficher l'image ciblée
autoSlide(); // Démarrer le mode automatique