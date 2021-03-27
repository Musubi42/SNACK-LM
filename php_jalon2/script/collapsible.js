// Donner la classe "collapsible" à un élément le rend cliquable pour réduire/agrandir l'élément qui le suit immédiatement (nextElementSibling)
// Fonctionne avec ce CSS (implémenté dans style.css) :
// .collapsible+* {
//     overflow: hidden;
//     max-height: 0;
//     transition: max-height 0.2s ease-out;
// }
// Mettre table en display:block et tbody en display:table permet de réduire les tableaux avec collapsible et ses dérivés //
// JS d'origine : https://www.w3schools.com/howto/howto_js_collapsible.asp
// Script amélioré par mes soins + ajout de ce CSS qui rend autosuffisante la classe collapsible
let coll = document.getElementsByClassName("collapsible");
for (let i = 0; i < coll.length; i++) {
    coll[i].addEventListener("click", function () {
        let content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}

// Arrow -> Classe dérivée de collapsible implémentant une flèche animée, arrow est autosuffisante aussi
// .arrow+* {
//     overflow: hidden;
//     max-height: 0;
//     transition: max-height 0.2s ease-out;
// }
// .arrow-icon {
//     background-image: url('http://www.snack-lm.fr/img/arrow-icon.png');
//     background-size: 12px;
//     background-position: 0px;
//     background-repeat: no-repeat;
//     display: inline-block;
//     margin-left: 5px;
//     width: 12px;
//     height: 12px;
//     transition: transform 0.2s ease-out;
//     /* Rendre la flèche noire */
//     filter: brightness(0);
// }
// .rotate {
//     transform: rotate(-180deg);
//     transition: transform 0.2s ease-out;
// }
let arrow = document.getElementsByClassName("arrow");
let arrowIcon = document.createElement("div");
arrowIcon.classList.add("arrow-icon");
for (let i = 0; i < arrow.length; i++) {
    arrow[i].appendChild(arrowIcon.cloneNode()); // Attention, ne pas utiliser arrow si besoin du lastElementChild pour autre chose
    arrow[i].addEventListener("click", function () {
        // Rotate the arrow 
        this.lastElementChild.classList.toggle("rotate"); // Voir ici
        let content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}

// oneByOneColl -> Classe dérivée de collapsible permettant de s'assurer que l'élément cliqué sera le seul de sa classe à être agrandi
// Fonctionne avec ce CSS (implémenté dans style.css) :
// .oneByOneColl+* {
//     overflow: hidden;
//     max-height: 0;
//     transition: max-height 0.2s ease-out;
// }
let oneByOne = document.getElementsByClassName("one-by-one");

for (let i = 0; i < oneByOne.length; i++) {
    oneByOne[i].addEventListener("click", function () {
        for (let j = 0; j < oneByOne.length; j++) {
            if (oneByOne[j] != this) {
                oneByOne[j].nextElementSibling.style.maxHeight = null;
            }
        }
        let content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}

// oneByOneArrow -> Classe dérivée de collapsible permettant de s'assurer que l'élément cliqué sera le seul de sa classe à être agrandi
// Fonctionne avec ce CSS (implémenté dans style.css) :
// .oneByOneColl+* {
//     overflow: hidden;
//     max-height: 0;
//     transition: max-height 0.2s ease-out;
// }
let oneByOneArrow = document.getElementsByClassName("one-by-one-arrow");
let oboArrowIcon = document.createElement("div");
oboArrowIcon.classList.add("arrow-icon");
for (let i = 0; i < oneByOneArrow.length; i++) {
    oneByOneArrow[i].appendChild(oboArrowIcon.cloneNode()); // Attention, ne pas utiliser arrow si besoin du lastElementChild pour autre chose
    oneByOneArrow[i].addEventListener("click", function () {
        for (let j = 0; j < oneByOneArrow.length; j++) {
            if (oneByOneArrow[j] != this) {
                oneByOneArrow[j].nextElementSibling.style.maxHeight = null;
                oneByOneArrow[j].lastElementChild.classList.remove("rotate");
            }
        }
        this.lastElementChild.classList.toggle("rotate");
        let content = this.nextElementSibling;
        if (content.style.maxHeight) {
            content.style.maxHeight = null;
        } else {
            content.style.maxHeight = content.scrollHeight + "px";
        }
    });
}