/* Gestion animation page unique (prise en compte native des boutons précédents et suivants) */

let hashes = new Array();
location.hash = "#main";
hashes.push(location.hash);

function slideFromTo(departureDivId, destinationDivId) {
    document.getElementById(destinationDivId).classList.remove("future");
    document.getElementById(departureDivId).classList.add("past");
    hashes.push("#" + destinationDivId);
    history.pushState({}, "", "#" + destinationDivId);
}

function slideBackward(delta = 1) {
    for (let i = 0; i < delta; i++) {
        history.back();
    }
}

window.addEventListener('popstate', function () {
    if (hashes.includes(location.hash)) { // Bouton précédent
        if (typeof hashes[1] !== 'undefined') {
            let departureDivId = hashes[hashes.length - 1].substring(1, hashes[hashes.length - 1].length);
            let destinationDivId = hashes[hashes.length - 2].substring(1, hashes[hashes.length - 2].length);
            document.getElementById(destinationDivId).classList.remove("past");
            document.getElementById(departureDivId).classList.add("future");
            hashes.pop();
        }
        if (typeof (resetPage) !== 'undefined') {
            // utile pour menu.php car resetPage doit être joué quand on retourne à la carte,
            // sinon on voit tous les sous-menus se refermer en arrivant sur la page détails et ce n'est pas beau
            resetPage();
        }
    } else { // Bouton suivant
        let destinationDivId = location.hash.substring(1, location.hash.length);
        let departureDivId = hashes[hashes.length - 1].substring(1, hashes[hashes.length - 1].length);
        document.getElementById(destinationDivId).classList.remove("future");
        document.getElementById(departureDivId).classList.add("past");
        hashes.push(location.hash);
    }
}, false);