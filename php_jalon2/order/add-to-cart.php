<?php

// Contrôle de la validité des données avec la base de données
if (true) {
} else {
    // header("Location: error.php?case=corrupteddata&from=menu");
    // Ne rien mettre après le header
}

// Affichage des données du formulaire pour le panier
if (isset($_POST['item_count']) && isset($_POST['category']) && isset($_POST['item'])) {
    // echo "$_POST[item_count] "; // 3
    if (isset($_POST['menu']) && $_POST['menu'] == "Menu") {
        // echo "menu "; // menu
    }
    if ($_POST['category'] == "Kebab" && isset($_POST['sauce1'])) {
        if ($_POST['sauce1'] != "Pas de sauce") {
            // echo "$_POST[item], sauce $_POST[sauce]<br>";  // Kebab, sauce Samouraï
        } else {
            // echo "$_POST[item], sans sauce<br>"; // Kebab, sans sauce
        }
    } else if ($_POST['category'] == "Accompagnement") {
        echo "$_POST[item]"; // Oeuf
        if (isset($_POST['ingredients'])) {
            // echo "$_POST[ingredients]"; // Wings (5 pièces)
        }
        if (isset($_POST['sauce1'])) {
            // echo "$_POST[sauce1]"; // Algérienne (seulement pour les sauces seules)
        }
    } else if ($_POST['category'] != "Boisson") {
        if (isset($_POST['sauce1'])) {
            if ($_POST['sauce1'] != "Pas de sauce") {
                // echo "$_POST[category] $_POST[item], sauce $_POST[sauce1]<br>"; // Panini Mexicanos, sauce Samouraï
            } else {
                // echo "$_POST[category] $_POST[item], sans sauce<br>"; // Panini Mexicanos, sans sauce
            }
        }
    }
    if (isset($_POST['same_sauce']) && isset($_POST['sauce1']) && isset($_POST['sauce2'])) {
        if ($_POST['sauce2'] != $_POST['sauce1']) {
            // echo "Frites sauce $_POST[sauce2]<br>"; // Frites sauce Algérienne (seulement si effectivement différente)
        }
    }
    for ($i = 0; $i < 5; $i++) {
        if (isset($_POST['extra_' . $i . ''])) {
            $extra = $_POST['extra_' . $i . ''];
            // echo "Supplément $extra<br>"; // Supplément Fromage
        }
    }
    if (isset($_POST['drink'])) {
        if ($_POST['category'] == "Boisson") {
            // echo "$_POST[drink] $_POST[item]<br>"; // Coca 1,5 L
        } else if ($_POST['menu'] == "Menu") {
            // echo "$_POST[drink] 33 cL<br>"; // Coca 33 cL (menus)
        }
    }
    // Redirige vers le menu pour continuer la commande
    header("Location: menu.php?case=added&cat=$_POST[category]&item=$_POST[item]&count=$_POST[item_count]");
    // Ne rien mettre après le header
}
