<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
<script src="../script/one-page-slider.js"></script>
<style>
    #main th {
        font-size: 0.7rem;
        padding: 4px 8px;
        box-sizing: border-box;
        color: rgb(32, 32, 32);
        margin: 0;
    }

    #main td {
        padding: 12px 8px;
        box-sizing: border-box;
        margin: 0;
    }

    #main td.meal {
        width: 55%;
        font-size: 0.9rem;
        font-style: italic;
    }

    #main td .ingredients {
        font-size: 0.5rem;
    }

    #details-form #multiply-item {
        margin: 0 auto;
        text-align: center;
    }

    #details-form .space {
        height: 20px;
    }
</style>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <?php include '../modules/loading.php'; ?>
    <?php include '../db/bdd-de-test.php' ?>


    <!-- Page menu -->
    <div id="slider">
        <div id='main'>
            <a class="sneaky" href="../index.php">&larr; Accueil</a>
            <h1 class='text-center'>La carte</h1>
            <?php
            if (
                isset($_GET['case']) &&
                isset($_GET['cat']) &&
                isset($_GET['item']) &&
                isset($_GET['count'])
            ) {
                if ($_GET['case'] == "added") {
                    if ($_GET['cat'] == "Kebab") {
                        $_GET['cat'] = "";
                    }
                    if ($_GET['count'] > 1) {
                        echo "$_GET[count] $_GET[cat] $_GET[item] ajouté(e)s au panier.";
                    } else if ($_GET['count'] == 1) {
                        echo "1 $_GET[cat] $_GET[item] ajouté(e) au panier.";
                    } else {
                        echo "Erreur.";
                    }
                }
            }

            for ($i = 0, $j = 0; $i < count($categories); $i++) {
                echo "<a class='wide one-by-one-arrow'><span>$categories[$i]</span></a>";
                echo "<table class='category-table'>";

                // Ne pas mettre d'en-tête pour les suppléments et boissons
                if ($i < 6) {
                    echo "<tr>";
                    echo "<th class='recipe text-left'>Recette</th>";
                    echo "<th class='text-right'>Seul</th>";
                    echo "<th class='text-right'>Menu</th>";
                    echo "</tr>";
                }

                while ($plats[$j][0] == $i) {
                    echo "<tr class='clickable item'>";
                    echo "<td class='meal'><span>" . strval($plats[$j][1]) . "</span><br>";
                    echo "<span class='ingredients'> " . strval($plats[$j][2]) . "</span></td>";

                    // Ne pas afficher le prix si = 0
                    if (floatval($plats[$j][3]) != 0) {
                        echo "<td class='price'>" . number_format(floatval($plats[$j][3]), 2, ".", null) . " &euro;</td>";
                    } else {
                        echo "<td class='price'></td>";
                    }

                    // Ne pas afficher le prix si = 0
                    if (floatval($plats[$j][4]) != 0) {
                        echo "<td class='price'>" . number_format(floatval($plats[$j][4]), 2, ".", null) . " &euro;</td>";
                    } else {
                        echo "<td class='price'></td>";
                    }

                    echo "</tr>";
                    if ($j == count($plats) - 1) {
                        break;
                    }
                    $j++;
                }
                echo "</table>";
            } ?>
        </div>

        <!-- Page détails -->
        <div id="details-box" class="future">
            <!-- Bouton fermer -->
            <a class="sneaky" onclick="slideBackward()">&larr; Retour</a>
            <form id="details-form" action="add-to-cart.php" method="post">

                <!-- Inputs cachés (calculés en JS) -->
                <input type="hidden" name='item' id="item-input" value="">
                <input type="hidden" name='category' id="category-input" value="">
                <input type="hidden" name='ingredients' id="ingredients-input" value="">
                <input type="hidden" name='item_count' id="count-input" value='1'>



                <!-- Informations plat -->
                <section>
                    <div class="text-center">
                        <span id="details"></span>

                        <div class='space'></div>
                    </div>
                </section>

                <div class="margined">

                    <!-- Choix menu -->
                    <section>
                        <div id="menu-choice">
                            Menu :<br>
                            <input type="radio" class='menu-input' id="menu-yes" name="menu" value="Menu">
                            <label for="menu-yes">Oui : plat + frites + boisson</label><br>
                            <input type="radio" class='menu-input' id="menu-no" name="menu" value="Seul">
                            <label for="menu-no">Non : plat seul</label>
                            <div class='space'></div>
                        </div>
                    </section>

                    <!-- Choix sauce plat -->
                    <section>
                        <div id="sauce" class="force-coll">
                            Sauce :<br>
                            <?php
                            for ($i = 0; $i < count($sauces); $i++) {
                                echo "<input type='radio' class='sauce-input' id='sauce1-$i' name='sauce1' value='$sauces[$i]'>";
                                echo "<label for='sauce1-$i'> $sauces[$i]</label><br>";
                            }
                            ?>
                            <div class='space'></div>
                        </div>
                    </section>

                    <!-- Choix sauce frites, en deux div pour afficher/cacher la liste selon coché/décoché -->
                    <section>
                        <div id="sauce-option" class="force-coll">
                            <input type='checkbox' id='differente' name='same_sauce'>
                            <label for='differente'>Sauce différente pour les frites</label>
                        </div>
                        <div id="sauce-fries" class="force-coll">
                            <?php
                            for ($i = 0; $i < count($sauces); $i++) {
                                echo "<input type='radio' class='sauce2-input' id='sauce2-$i' name='sauce2' value='$sauces[$i]'>";
                                echo "<label for='sauce2-$i'> $sauces[$i]</label><br>";
                            }
                            ?>
                        </div>
                        <div class='space'></div>
                    </section>

                    <!-- Choix suppléments -->
                    <section>
                        <table id="extra" class="force-coll">
                            <tr>
                                <td colspan='3'>
                                    Suppléments :
                                </td>
                            </tr>
                            <?php
                            for ($i = 0; $i < count($supplements); $i++) {
                                echo "<tr>";
                                echo "<td class='checkbox float-left'>";
                                echo "<input class='extra-input' type='checkbox' id='extra-$i' name='extra_$i' value='" . strval($supplements[$i][0]) . "'>";
                                echo "</td>";
                                echo "<td class='float-left'>";
                                echo "<label for='extra-$i'>  " . strval($supplements[$i][0]) . "</label>";
                                echo "</td>";
                                echo "<td class='price'>";
                                echo "<span>" . number_format(floatval($supplements[$i][1]), 2, ".", null) . " &euro;</span>";
                                echo "</td>";
                                echo "</tr>";
                            } ?>
                            <tr>
                                <td colspan='3'>
                                    <div class='space'></div>
                                </td>
                            </tr>
                        </table>
                    </section>

                    <!-- Choix boisson -->
                    <section>
                        <div id="drink" class="force-coll">
                            Boisson<br>
                            <?php
                            foreach ($boissons as $element) {
                                echo "<input type='radio' class='drink-input' id='$element' name='drink' value='$element'>";
                                echo "<label for='$element'> $element</label><br>";
                            } ?>
                            <div class='space'></div>
                        </div>
                    </section>

                </div> <!-- Fin de la margin -->

                <!-- Choix quantité -->
                <section>
                    <div id="multiply-item" class="force-coll">
                        Quantité<br>
                        <a class="minus-button" id="minus-button">-</a>
                        <span id="count-display"></span>
                        <a class="plus-button" id="plus-button">+</a>
                        <div class='space'></div>
                    </div>
                </section>

                <!-- Ajouter au panier -->
                <section>
                    <input class="green-button full no-display" type="submit" id="add-button">
                    <div class='space'></div>
                </section>

            </form>
        </div>
    </div>
    <script src="../script/func-library.js"></script>
    <script src="../script/collapsible.js"></script>

    <script>
        // Page menu
        let menuBox = document.getElementById("main");
        let items = document.getElementsByClassName("item");

        // Elements page détails
        let detailsDiv = document.getElementById("details-box"); // Div principale de la page de selection menu/sauce/boisson etc
        let detailsLabel = document.getElementById("details"); // Span du titre du plat
        let menuChoice = document.getElementById("menu-choice"); // Div contenant les radios de menu oui/non
        let sauceDiv = document.getElementById("sauce"); // Div contenant les radios de la sauce
        let noSauceRadio = sauceDiv.lastElementChild.previousElementSibling.previousElementSibling.previousElementSibling; // Radio pas de sauce
        let noSauceText = sauceDiv.lastElementChild.previousElementSibling.previousElementSibling; // Texte pas de sauce
        let sauce2ParentDiv = document.getElementById("sauce-option"); // Div parent 2ème sauce
        let sauce2Checkbox = document.getElementById("differente"); // Checkbox ouvrant la div de la 2ème sauce
        let sauce2Div = document.getElementById("sauce-fries"); // Div contenant les radios de la 2ème sauce 
        let extraDiv = document.getElementById("extra"); // Div contenant les checkbox des suppléments
        let drinkDiv = document.getElementById("drink"); // Div contenant les radios de la boisson
        let itemCountDiv = document.getElementById("multiply-item"); // Div contenant quantité et boutons + et -
        let itemCountDisplay = document.getElementById("count-display"); // Span de la quantité choisie
        let addButton = document.getElementById("add-button"); // Bouton ajouter au panier
        let plusButton = document.getElementById("plus-button"); // Bouton +
        let minusButton = document.getElementById("minus-button"); // Bouton -

        // Inputs
        let inputElementsMenu = document.getElementsByClassName("menu-input");
        let inputElementsSauce = document.getElementsByClassName("sauce-input");
        let inputElementsSauce2 = document.getElementsByClassName("sauce2-input");
        let inputElementsExtra = document.getElementsByClassName("extra-input");
        let inputElementsDrink = document.getElementsByClassName("drink-input");
        let menuYesRadio = document.getElementById("menu-yes");
        let menuNoRadio = document.getElementById("menu-no");

        // Inputs cachés
        let itemInput = document.getElementById("item-input");
        let categoryInput = document.getElementById("category-input");
        let ingredientsInput = document.getElementById("ingredients-input");
        let itemCountInput = document.getElementById("count-input");

        // Variables globales
        let itemCount = itemCountInput.value;
        let category; // Pour converser la catégorie en global
        let dish; // Pour converser le plat en global
        let dishInfo; // Pour converser les ingrédients en global
        let price = [0, 0, 0]; // [Prix seul, prix en menu, prix des suppléments]
        let totalPrice;
        let optionMenu = -1; // (-1 pas de choix, 0 choix seul, 1 choix menu)

        // Onclick functions
        for (i = 0; i < items.length; i++) {
            items[i].addEventListener("click", function() {
                // Fetch catégorie, plat, prix de l'élément sélectionné
                let ancestor = findAncestor(this, "category-table");
                category = ancestor.previousElementSibling.firstElementChild.innerHTML;
                dish = this.firstElementChild.firstElementChild.innerHTML;
                dishInfo = this.firstElementChild.lastElementChild.innerHTML;
                price[0] = parseFloat(this.lastElementChild.previousElementSibling.innerHTML.slice(0, 4));
                price[1] = parseFloat(this.lastElementChild.innerHTML.slice(0, 4));
                // Afficher les informations
                details.innerHTML = "<b>" + category + "</b><br>" + dish;
                if (category == "Accompagnement") {
                    details.innerHTML += dishInfo;
                }
                itemInput.value = dish;
                categoryInput.value = category;
                ingredientsInput.value = dishInfo;
                displayItemCount();

                // Cas particuliers
                if (dish == "Salade composée") {
                    disableMenuYes();
                } else if (category == "Boisson") {
                    onlyDrinks();
                } else if (category == "Accompagnement") {
                    onlyExtras();
                }
                // Afficher la page détails
                slideFromTo('main', 'details-box');
            });
        }

        menuNoRadio.addEventListener("click", function() {
            optionMenu = 0;
            unrequireInputs(inputElementsDrink);
            requireInputs(inputElementsSauce);
            showOptions();
            refreshPrice();
        });

        menuYesRadio.addEventListener("click", function() {
            optionMenu = 1;
            requireInputs(inputElementsDrink);
            requireInputs(inputElementsSauce);
            showOptions();
            refreshPrice();
        });

        // Sauce différente oui/non
        sauce2Checkbox.addEventListener("click", function() {
            if (sauce2Div.style.maxHeight) {
                sauce2Div.style.maxHeight = null;
                unrequireInputs(inputElementsSauce2);
                uncheckInputs(inputElementsSauce2);
            } else {
                sauce2Div.style.maxHeight = sauce2Div.scrollHeight + "px";
                requireInputs(inputElementsSauce2);
            }
        });

        plusButton.addEventListener("click", function() {
            itemCount++;
            refreshPrice();
            displayItemCount();
        });

        minusButton.addEventListener("click", function() {
            if (itemCount > 1) {
                itemCount--;
            }
            refreshPrice();
            displayItemCount();
        });

        for (let i = 0; i < inputElementsExtra.length; i++) {
            inputElementsExtra[i].addEventListener("click", function() {
                refreshPrice();
            });
        }

        // Cas particuliers
        function disableMenuYes() {
            optionMenu = 0;
            menuYesRadio.disabled = true;
            menuNoRadio.checked = true;
            sauce2ParentDiv.classList.add("no-display");
            showOptions();
            refreshPrice();
        }

        function onlyDrinks() {
            menuChoice.classList.add("no-display");
            drinkDiv.classList.add("force-display");
            itemCountDiv.classList.add("force-display");
            requireInputs(inputElementsDrink);
            unrequireInputs(inputElementsMenu);
            refreshPrice();
        }

        function onlyExtras() {
            menuChoice.classList.add("no-display");
            itemCountDiv.classList.add("force-display");
            unrequireInputs(inputElementsMenu);
            if (dish == "Sauce") {
                requireInputs(inputElementsSauce);
                sauceDiv.classList.add("force-display");
                noSauceRadio.classList.add("no-display");
                noSauceText.classList.add("no-display");
            } else {
                unrequireInputs(inputElementsSauce);
            }
            refreshPrice();
        }

        // Gestion du prix
        function refreshPrice() {
            // Fetch prix de base
            if (optionMenu == 0) {
                totalPrice = price[0];
            } else if (optionMenu == 1 || category == "Boisson" || category == "Accompagnement") {
                totalPrice = price[1];
            } else {
                alert("ERREUR: Rafraichissez la page et réessayez.");
            }
            // Ajouter suppléments
            for (let i = 0; inputElementsExtra[i]; ++i) {
                if (inputElementsExtra[i].checked) { // Trouver le prix des suppléments cochés
                    totalPrice += parseFloat(findAncestor(inputElementsExtra[i], "checkbox").nextElementSibling.nextElementSibling.firstElementChild.innerHTML.slice(0, 4));
                }
            }
            // Afficher prix
            addButton.value = parseFloat(totalPrice * itemCount).toFixed(2) + " \u20ac";
            addButton.classList.add("force-display");
        }

        function displayItemCount() {
            itemCountInput.value = itemCount;
            itemCountDisplay.innerHTML = itemCountInput.value;
        }


        // Gestion de l'affichage animé
        function showOptions() {
            if (optionMenu == 0) {
                drinkDiv.style.maxHeight = null;
                extraDiv.style.maxHeight = extraDiv.scrollHeight + "px";
                sauceDiv.style.maxHeight = sauceDiv.scrollHeight + "px";
                sauce2ParentDiv.style.maxHeight = sauce2ParentDiv.scrollHeight + "px";
                itemCountDiv.style.maxHeight = itemCountDiv.scrollHeight + "px";
            } else if (optionMenu == 1) {
                drinkDiv.style.maxHeight = drinkDiv.scrollHeight + "px";
                extraDiv.style.maxHeight = extraDiv.scrollHeight + "px";
                sauceDiv.style.maxHeight = sauceDiv.scrollHeight + "px";
                sauce2ParentDiv.style.maxHeight = sauce2ParentDiv.scrollHeight + "px";
                itemCountDiv.style.maxHeight = itemCountDiv.scrollHeight + "px";
            } else {
                alert("ERREUR: Rafraichissez la page et réessayez.");
            }
        }

        // Réinitilisation complète
        function resetPage() {
            optionMenu = -1; // Oublier le menu
            uncheckInputs(inputElementsMenu); // Oublier le menu

            // Réinitialiser l'affichage
            addButton.classList.add("no-display"); // force-display par refreshPrice()
            drinkDiv.classList.remove("force-display"); // force-display par onlyDrinks()
            sauceDiv.classList.remove("force-display"); // force-display par onlyExtras()
            itemCountDiv.classList.remove("force-display"); // force-display par onlyDrinks() et onlyExtras()
            menuChoice.classList.remove("no-display"); // no-display par onlyExtras()
            sauce2ParentDiv.classList.remove("no-display"); // no-display par disableMenuYes()
            noSauceRadio.classList.remove("no-display"); // no-display par onlyExtras()
            noSauceText.classList.remove("no-display"); // no-display par onlyExtras()
            drinkDiv.style.maxHeight = null; // maxheight = 0 dans le CSS
            sauceDiv.style.maxHeight = null; // maxheight = 0 dans le CSS
            sauce2ParentDiv.style.maxHeight = null; // maxheight = 0 dans le CSS
            itemCountDiv.style.maxHeight = null; // maxheight = 0 dans le CSS
            extraDiv.style.maxHeight = null; // maxheight = 0 dans le CSS
            sauce2Div.style.maxHeight = null; // maxheight = 0 dans le CSS

            // Réinitialiser le formulaire
            itemCount = 1;
            uncheckInputs(inputElementsSauce); // Oublier la sauce
            sauce2Checkbox.checked = false; // Oublier la coche sauce 2
            sauce2Checkbox.required = false;
            uncheckInputs(inputElementsSauce2); // Oublier la sauce 2
            uncheckInputs(inputElementsExtra); // Oublier les suppléments
            uncheckInputs(inputElementsDrink); // Oublier les boissons
            requireInputs(inputElementsMenu); // required=false par onlyDrinks() et onlyExtras()
            unrequireInputs(inputElementsDrink); // required=true par onlyDrinks() et menuYes()
            unrequireInputs(inputElementsSauce2); // required=true par toggleSauce()
            unrequireInputs(inputElementsSauce); // required=true par onlyExtras() et menuYes()
            menuYesRadio.disabled = false; // disabled=true par disableMenuYes()
        }
    </script>
</body>

</html>