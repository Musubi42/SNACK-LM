<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
<script src='../script/one-page-slider.js'></script>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <?php include '../db/bdd-de-test.php' ?>
    <div id='slider'>
        <div id='main'>
            <h1 class='text-center'>Votre commande</h1>
            <div id='main-msg'>
                <p class='text-center'>Que préférez-vous ?</p>
                <div class='flex-buttons'>
                    <a class='red-button' id='delivery-button' onclick="slideFromTo('main','delivery')">Livraison</a>
                    <a class='green-button' id='take-away-button' onclick="slideFromTo('main','take-away')">A emporter</a>
                </div>
            </div>
        </div>
        <div id='delivery' class='future'>
            <a onclick='slideBackward()'>&larr; Retour</a><br><br>
            <?php
            if (isset($_GET['user'])) {
                echo "<a href='order-recap.php'>Tester hors connexion</a>";
                echo "<h1 class='text-center'>Livraison</h1>";
                echo "<p class='text-center'>Choissisez une adresse de livraison</p>";
                echo "<form action='payment.php'>";
                for ($i = 0; $i < count($adresses); $i++) {
                    if ($i > 0) {
                        echo "<hr>";
                    }
                    echo "<div class='margined'><label for='address-$i'>Adresse " . ($i + 1) . " :<br>";
                    echo htmlspecialchars(strval($adresses[$i][0])) . "<br>";
                    echo htmlspecialchars(strval($adresses[$i][1])) . " ";
                    echo htmlspecialchars(strval($adresses[$i][2])) . "<br>";
                    echo htmlspecialchars(strval($adresses[$i][3])) . "</label></div>";
                    echo "<input type='submit' class='green-button' value='Choisir'><br>";
                }
                echo "</form>";
                echo "<hr>";
                echo "<p class='text-center'>Ou ajoutez-en une</p>";
                echo "<form action='../account/new-address.php'>";
                // input caché pour que new-address.php reçoive $_POST['from']='order-recap.php' afin de renvoyer sur cette page après l'ajout
                echo "<input type='hidden' name='from' value='order-recap.php'>";
                echo "<input type='submit' class='red-button large' value='Ajouter'><br>";
                echo "</form>";
            } else {
                echo "<a href='order-recap.php?user=1'>Tester connecté</a>";
                echo "<h1 class='text-center'>Livraison</h1>";
                echo "<a class='green-button medium' href='../login/signin.php?case=order'>Connectez-vous</a><br>";
                echo "<div class='text-center'>";
                echo "... ou entrez votre adresse<br><br>";
                echo "<form action='payment.php'>";
                echo "<div class='margined'>";
                echo "<label for='street-adress'>Adresse<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='street-adress' name='user_street_adress' autocomplete='street-address'><br>";
                echo "<br>";
                echo "<label for='postal-code'>Code postal<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='postal-code' name='user_postal_code' autocomplete='postal-code'><br>";
                echo "<br>";
                echo "<label for='town'>Ville<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='town' name='user_town'><br>";
                echo "<br>";
                echo "<label for='country-name'>Pays<span class='red'>*</span></label><br>";
                echo "<input class='fill-in' type='text' id='country-name' name='user_country_name' autocomplete='country-name'>";
                echo "</div><br></form></div>";
            }
            ?>
        </div>
        <div id='take-away' class='future'>
            <a onclick='slideBackward()'>&larr; Retour</a>
            <h1 class='text-center'>A emporter</h1>
            <div id='take-away-msg'></div>
            <h4>Adresse</h4>
            <p>
                289 Rue Pierre Legrand<br>
                59800 Lille
            </p>
            <iframe src='https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2530.8463434889477!2d3.0965207!3d50.6299712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d5fd79bf6b87%3A0x9ef7557e4c7eb3c5!2sSNACK%20LM!5e0!3m2!1sfr!2sfr!4v1615746232368!5m2!1sfr!2sfr' width='100%' height='50%' style='border:0;' allowfullscreen='' loading='lazy'></iframe>
            <a class='green-button' href='payment.php'>Payer</a>
            <br>
        </div>
    </div>
</body>
<script src='../script/func-library.js'></script>
<script>
    let nowTime = nowHour + 'h' + (nowMinutes < 10 ? '0' : '') + nowMinutes;
    let msg = "<p class='text-center'>Il est " + nowTime + ".</p>";
    if (isOpen && (nowHour == closingHour - 1 && nowMinutes >= 30) || !isOpen) {
        if (!isOpen) {
            msg += "<p class='text-center'>Notre restaurant est actuellement fermé.<br>" +
                "Veuillez revenir à " + openingHour + "h00.</p>";
        } else {
            msg += "<p class='text-center'>Notre restaurant ferme bientôt ses portes.<br>" +
                "Veuillez revenir demain ! :)</p>";
        }
        document.getElementById('main-msg').innerHTML = msg;
    } else {
        msg += "<p class='text-center'>Votre plat sera prêt dans 15min.<br>Veuillez entrer et vous présenter en arrivant.</p>"
        document.getElementById('take-away-msg').innerHTML = msg;
    }
</script>

</html>