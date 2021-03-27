<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div id="main">
        <a class="sneaky" href="addresses.php">&larr; Retour</a>
        <h1 class="text-center">Nouvelle adresse</h1>
        <form action="address-new.php" method="post">
            <div class="margined">
                <?php
                echo "<input type='hidden'>";
                echo "<label for='delete-street-adress'>Adresse<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='delete-street-adress' name='user_street_adress' autocomplete='street-address' required><br>";
                echo "<br>";
                echo "<label for='delete-postal-code'>Code postal<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='delete-postal-code' name='user_postal_code' autocomplete='postal-code' required><br>";
                echo "<br>";
                echo "<label for='delete-town'>Ville<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='delete-town' name='user_town' required><br>";
                echo "<br>";
                echo "<label for='delete-country-name'>Pays<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='delete-country-name' name='user_country_name' autocomplete='country-name' required><br>";
                ?>
            </div>
            <div class='flex-buttons'>
                <a class='red-button' href='addresses.php'>Annuler</a>
                <input class="green-button" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
    <?php include '../modules/footer.php'; ?>
</body>

</html>