<?php session_start(); ?>
<?php include '../modules/head.php'; ?>

<style>
    #cart table {
        padding: 10px 7.5% 10px 2.5%;
    }

    #cart .details {
        font-size: 0.7rem;
    }

    #cart .item {
        font-size: 0.8rem;
        width: 65%;
    }

    #cart .count,
    #cart .middle {
        font-size: 0.8rem;
        width: 12.5%;
        text-align: right;
        padding-right: 10px;
    }

    #cart-is-empty {
        display: none;
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
        font-size: 1.5rem;
    }
</style>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div id="content">
        <?php include '../modules/loading.php'; ?>
        <?php include '../db/bdd-de-test.php'; ?>

        <a class="sneaky" href="menu.php">&larr; La carte</a>
        <h1 class="text-center">Mon panier</h1>


        <div id="cart">
            <?php
            $prix = 0;
            for ($i = 0; $i < count($panier); $i++) {
                $prix += (floatval($panier[$i][3]) * intval($panier[$i][0]));
                if ($i > 0) {
                    echo "<div class='separator no-display'>";
                    // echo "<br>";
                    echo "<hr>";
                    // echo "<br>";
                    echo "</div>";
                }
                echo "<table class='item-table one-by-one'>";
                echo "<tr>";
                echo "<td class='count' rowspan='2'>" . strval($panier[$i][0]) . "</td>";
                echo "<td class='item'><em>" . strval($panier[$i][1]) . "</em></td>";
                echo "<td class='price' rowspan='2'><span class='item-price'>" . number_format($panier[$i][3], 2, ".", null) . "</span> &euro; </td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class='details'>" . strval($panier[$i][2]) . "</td>";
                echo "</tr>";
                echo "</table>";
                // echo "<div class='flex-buttons'>";
                // echo "<a class='green-button'>Modifier</a>";
                echo "<div class='multiply-item flex-buttons'>";
                echo "<a class='red-button' onclick='decrementButton($i)'>-</a>";
                // echo "<span class='count-display'>" . strval($panier[$i][0]) . "</span>";
                echo "<input type='hidden' class='count-input' name='item_count_$i' value='1'>";
                echo "<a class='green-button' onclick='incrementButton($i)'>+</a>";
                // echo "<a class='red-button' onclick='deleteButton($i)'>Supprimer</a>";
                echo "</div>";
            }
            echo "<table><tr><td class='float-right'>";
            echo "<span class='black-price'>Total : </span>";
            echo "<span class='price'><span id='price-display'>" . number_format($prix, 2, ".", null) . "</span> &euro;</span>";
            echo "</td></tr></table>";
            echo "<a class='green-button' href='order-recap.php'>Commander</a><br>";
            ?>
        </div>

        <div id='cart-is-empty'>
            <p class="text-center">Panier vide.</p>
            <a href="menu.php" class="red-button">Commander</a>
        </div>
        <?php include '../modules/confirm-box.php' ?>

    </div>
    <script src="../script/func-library.js"></script>
    <script src="../script/collapsible.js"></script>
    <script>
        // confirm-box
        confirmMsg.innerHTML = "Voulez-vous vraiment supprimer cet article ?";
        confirmButton.innerHTML = "Supprimer";

        function confirmDelete(item) {
            confirmBackground.style.display = "block";
            confirmButton.onclick = function() {
                deleteButton(item);
            };
            cancelButton.onclick = function() {
                confirmBackground.style.display = "none";
            }
        }

        let itemCountDisplay = document.getElementsByClassName("count");
        let itemCount = new Array();
        let deleted = 0;
        let temp = false;
        let itemPricesDisplay = document.getElementsByClassName("item-price");
        let itemPrices = new Array();
        let totalPriceDisplay = document.getElementById("price-display");
        let totalPrice;

        for (let i = 0; i < itemCountDisplay.length; i++) {
            itemCount.push(parseInt(itemCountDisplay[i].innerHTML));
            itemPrices.push(parseFloat(itemPricesDisplay[i].innerHTML));
        }

        let itemTableDisplay = document.getElementsByClassName("item-table");
        itemTableDisplay[0].classList.add("first");
        let itemMultiplyDiv = document.getElementsByClassName("multiply-item");
        let itemSeparator = document.getElementsByClassName("separator");

        function deleteButton(item) {
            // Cacher l'article correspondant
            itemTableDisplay[item].style.display = "none";
            itemTableDisplay[item].classList.add("deleted");
            itemMultiplyDiv[item].style.display = "none";
            // Si l'élément supprimé est en haut de liste, 
            if (itemTableDisplay[item].classList.contains("deleted") && itemTableDisplay[item].classList.contains("first")) {
                for (let i = 0; i < itemSeparator.length; i++) {
                    if (itemSeparator[i].style.display != "none") {
                        itemSeparator[i].style.display = "none"; // supprimer le 1er séparateur non caché en dessous de l'élément s'il y en a un
                        break;
                    };
                }
                for (let i = 0; i < itemTableDisplay.length; i++) {
                    if (item + i < (itemTableDisplay.length) && itemTableDisplay[item + i].style.display != "none") {
                        itemTableDisplay[item + i].classList.add("first"); // et élire l'élément suivant "premier élément" s'il existe
                        break;
                    }
                }
            }
            // Sinon supprimer celui au-dessus
            else {
                itemSeparator[item - 1].style.display = "none";
            }
            // Corriger le prix total
            itemCount[item] = 0;
            displayTotalPrice();
            // Cacher la confirmation
            confirmBackground.style.display = "none";
        }

        function incrementButton(item) {
            itemCount[item]++;
            displayItemCount(item);
            displayTotalPrice();
        }

        function decrementButton(item) {
            if (itemCount[item] > 1) {
                itemCount[item]--;
                displayItemCount(item);
                displayTotalPrice();
            } else {
                confirmDelete(item);
            }
        }

        function displayTotalPrice() {
            totalPrice = 0;
            for (let i = 0; i < itemPricesDisplay.length; i++) {
                itemPricesDisplay[i].innerHTML = (itemCount[i] * parseFloat(itemPrices[i])).toFixed(2);
                totalPrice += parseFloat(itemPricesDisplay[i].innerHTML);
            }
            totalPriceDisplay.innerHTML = totalPrice.toFixed(2);
            isCartEmpty();
        }

        function isCartEmpty() {
            if (totalPrice == 0) {
                document.getElementById("cart").style.display = "none";
                document.getElementById("cart-is-empty").style.display = "block";
            }
        }

        function displayItemCount(item) {
            itemCountDisplay[item].innerHTML = itemCount[item];
        }

        // Afficher les prix totaux de chaque article / Vérifier que le panier n'est pas vide
        displayTotalPrice();
    </script>
</body>

</html>