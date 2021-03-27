<?php
$categories = array(
    "Sandwich froid",
    "Sandwich chaud",
    "Panini",
    "Galette",
    "Kebab",
    "Assiette",
    "Accompagnement",
    "Boisson"
);
$plats = array(
    // Sandwich froid
    array(0, "Thon crudités", "", 2.50, 4.50),
    array(0, "Thon piquant", "", 2.50, 4.50),
    array(0, "Crabe crudités", "", 2.50, 4.50),
    array(0, "Poulet", "", 2.80, 4.80),
    array(0, "Poulet andalouse", "", 2.80, 4.80),
    array(0, "Poulet curry", "", 2.80, 4.80),
    // Sandwich chaud
    array(1, "Mexicanos", "", 3.00, 5.00),
    array(1, "Fricadelle", "", 3.00, 5.00),
    array(1, "Hamburger", "", 3.00, 5.00),
    array(1, "Fishburger", "", 3.00, 5.00),
    array(1, "Chicken burger", "", 3.00, 5.00),
    array(1, "Merguez", "", 4.00, 6.00),
    array(1, "Kefta", "", 4.00, 6.00),
    array(1, "Dinde", "", 4.20, 6.20),
    array(1, "Brochette", "(bœuf, dinde, mixte)", 4.20, 6.20),
    // Panini
    array(2, "Fromage", "", 3.00, 5.00),
    array(2, "Mexicanos", "", 3.50, 5.50),
    array(2, "Fricadelle", "", 3.50, 5.50),
    array(2, "Merguez", "", 4.00, 6.00),
    array(2, "Kefta", "", 4.00, 6.00),
    array(2, "Kebab", "(bœuf, poulet, mixte)", 4.30, 6.30),
    array(2, "Brochette", "(bœuf, dinde, mixte)", 4.50, 6.50),
    // Galette
    array(3, "Mexicanos", "", 3.50, 5.50),
    array(3, "Fricadelle", "", 3.50, 5.50),
    array(3, "Merguez", "", 4.00, 6.00),
    array(3, "Kefta", "", 4.00, 6.00),
    array(3, "Kebab", "(bœuf, poulet, mixte)", 4.00, 6.00),
    array(3, "Brochette", "(bœuf, dinde, mixte)", 4.20, 6.20),
    // Kebab
    array(4, "Kebab bœuf", "", 4.00, 6.00),
    array(4, "Kebab poulet", "", 4.00, 6.00),
    array(4, "Kebab mixte", "", 4.00, 6.00),
    // Assiette
    array(5, "Salade composée", "", 4.00, 0),
    array(5, "Mexicanos", "", 7.00, 8.00),
    array(5, "Fricadelle", "", 7.00, 8.00),
    array(5, "Merguez", "", 7.00, 8.00),
    array(5, "Kefta", "", 7.00, 8.00),
    array(5, "Kebab", "(bœuf, poulet, mixte)", 7.00, 8.00),
    array(5, "Brochette", "(bœuf, dinde, mixte)", 7.00, 8.00),
    // Accompagnement
    array(6, "Wings", "(5 pièces)", 0, 3.80),
    array(6, "Nuggets", "(5 pièces)", 0, 3.80),
    array(6, "Sauce", "", 0, 0.30),
    array(6, "Fromage", "", 0, 0.30),
    array(6, "Oeuf", "", 0, 0.30),
    array(6, "Frite moyenne", "", 0, 1.50),
    array(6, "Frite grande", "", 0, 2.50),
    // Boisson
    array(7, "33 cL", "", 0, 1.20),
    array(7, "50 cL", "", 0, 1.70),
    array(7, "1,5 L", "", 0, 2.50),
    array(7, "2 L", "", 0, 3.00),
);
$supplements = array(
    array("Fromage", 0.30),
    array("Oeuf", 0.30),
    array("Sauce", 0.30),
    array("Moyenne frite", 1.50),
    array("Grande frite", 2.50)
);
$sauces = array(
    "Algérienne",
    "Samouraï",
    "Burger",
    "Pas de sauce"
);
$boissons = array(
    "Coca-Cola",
    "Fanta",
    "Ice-Tea",
    "Oasis"
);
$email = 'nicolas@valade.mobi';
$gender = 'male';
$fname = 'VALADE';
$gname = 'Nicolas';
$adresses = array(
    array("35 RUE DENIS DU PEAGE", "59800", "LILLE", "FRANCE"),
    array("48 RUE DES PYRAMIDES", "59000", "LILLE", "FRANCE")
);
$panier = array(

    array(
        5,
        "Menu Kebab boeuf, sauce Samouraï",
        "Frites sauce Algérienne<br>Supplément Fromage<br>Coca-Cola 33 cL",
        6.30
    ),

    array(
        3,
        "Menu Assiette Merguez, sauce Samouraï",
        "Frites sauce Algérienne<br>Supplément Fromage<br>Supplément Oeuf<br>Ice-Tea 33 cL",
        8.60
    ),

    array(
        3,
        "Sauce Burger",
        "",
        0.90
    ),

    array(
        2,
        "Coca-Cola 2 L",
        "",
        3.00
    ),

    array(
        2,
        "Sandwich froid Thon crudités, sauce Algérienne",
        "",
        2.50
    ),

    array(
        4,
        "Nuggets (5 pièces)",
        "",
        3.80
    )
);
