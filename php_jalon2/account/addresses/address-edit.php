<?php session_start(); ?>
<?php include '../../modules/head.php'; ?>
</head>

<body>
    <?php include '../../modules/header.php'; ?>
    <?php include '../../db/bdd-de-test.php' ?>
    <div id="main">
        <a class="sneaky" href="addresses.php">&larr; Retour</a>
        <?php
        if (isset($_GET['id'])) {
            echo "<h1 class='text-center'>Adresse " . ($_GET['id'] + 1) . "</h1>";
        } else {
            echo "<h1 class='text-center'>Oups</h1>";
        }
        ?>
        </h1>
        <form action="../../db/user/addresses/db-address-edit.php" method="post">
            <div class="margined">
                <?php
                if (isset($_GET['id'])) {
                    echo "<input type='hidden'>";
                    echo "<label for='street-adress'>Adresse<span class='red'>*</span></label><br>";
                    echo "<input class='fill-in' type='text' id='street-adress' name='user_street_adress' autocomplete='street-address' value='" . htmlspecialchars(strval($adresses[$_GET['id']][0])) . "' required><br>";
                    echo "<br>";
                    echo "<label for='postal-code'>Code postal<span class='red'>*</span></label><br>";
                    echo "<input class='fill-in' type='text' id='postal-code' name='user_postal_code' autocomplete='postal-code' value='" . htmlspecialchars(strval($adresses[$_GET['id']][1])) . "' required><br>";
                    echo "<br>";
                    echo "<label for='town'>Ville<span class='red'>*</span></label><br>";
                    echo "<input class='fill-in' type='text' id='town' name='user_town' value='" . htmlspecialchars(strval($adresses[$_GET['id']][2])) . "' required><br>";
                    echo "<br>";
                    echo "<label for='country-name'>Pays<span class='red'>*</span></label><br>";
                    echo "<input class='fill-in' type='text' id='country-name' name='user_country_name' autocomplete='country-name' value='" . htmlspecialchars(strval($adresses[$_GET['id']][3])) . "' required><br>";
                } else {
                    echo "ERREUR : Réessayez plus tard.";
                } ?>
            </div>
            <div class='flex-buttons'>
                <a class='red-button' href='addresses.php'>Annuler</a>
                <input class="green-button" type="submit" value="Enregistrer">
            </div>
        </form>
    </div>
    <?php include '../../modules/footer.php'; ?>
</body>

</html>