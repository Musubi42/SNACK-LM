<?php // Notes de MAJ
// Slideshow : v1.0 - 07/03/2021
// - Le module est terminé et prêt à être utilisé sur smartphone
// - Pistes d'amélioration :
//     - Rendre le module responsive tablette/PC
//     - Utiliser une flex box pour les boutons de saut afin d'éviter un dépassement si trop d'images
//     - Animer le défilement
?>

<style>
    body {
        background-color: white;
        margin: 0;
    }

    #slideshow-system {
        position: relative;
        display: block;
        width: 100%;
        margin: 0 auto;
        background-color: black;
    }

    #slideshow {
        width: auto;
        margin: 0 auto;
    }

    #slideshow img {
        display: none;
        width: 100%;
    }

    #next-slide,
    #previous-slide {
        margin: 8px auto;
        display: block;
        position: absolute;
        top: 50%;
        border: none;
        box-sizing: border-box;
        border-radius: 0;
        background-color: transparent;
        color: black;
        font-size: 32px;
        transform: translateY(-50%);
        text-shadow: 2px 2px 2px rgba(0, 0, 0);
    }

    #next-slide {
        right: 0;
    }

    #previous-slide {
        left: 0;
    }

    #leap {
        text-align: center;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.3);
    }

    .slide-button {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        background-color: grey;
        display: inline-block;
        border: 1px solid black;
        margin: 6px 20px;
        box-shadow: 1px 1px 2px 0px rgb(0, 0, 0);
    }

    .active {
        background-color: white;
    }
</style>

<div id="slideshow-system">

    <!-- Bouton de défilement manuel -->
    <button id="next-slide" onclick="nextSlide()">&gt;</button>
    <button id="previous-slide" onclick="previousSlide()">&lt;</button>

    <!-- Mode d'emploi : simplement ajouter ou retirer des <img> ci-dessous, le reste est automatique -->
    <div id="slideshow">
        <img src="slideshow/images/Kebab-frites.png" alt="Kebab-frites" />
        <img src="slideshow/images/Burger.png" alt="Burger" />
        <img src="slideshow/images/Assiette.png" alt="Assiette" />
    </div>

    <!-- Boutons de saut -->
    <div id="leap"></div>

</div>

<script>
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
        if (slideIndex == (images_count - 1)) {
            slideIndex = 0;
        } else {
            slideIndex++;
        }
    }

    function decrementIndex() { // Cibler l'image précédente
        if (slideIndex != 0) {
            slideIndex--;
        } else {
            slideIndex = (images_count - 1)
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
        slide = setInterval(function() {
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
</script>