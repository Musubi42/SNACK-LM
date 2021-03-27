<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <?php include '../db/bdd-de-test.php' ?>
    <div id="main">
        <a class="sneaky" href="account.php">&larr; Retour</a>
        <h1 class="text-center">Vos informations</h1>
        <form action='../db/user/db-user-edit.php' method='post'>
            <div class='margined'>
                <?php
                echo "<label for='mail'>Adresse e-mail</label><br>";
                echo "<input class='fill-in' type='email' id='email' name='email' value='" . htmlspecialchars($email) . "' required><br>";
                echo "<br>";
                echo "<label for='gender'>Sexe :</label>";
                echo "<br>";
                if ($gender === 'male') {
                    echo "<input type='radio' id='male' name='gender' value='male' checked required>";
                } else {
                    echo "<input type='radio' id='male' name='gender' value='male' required>";
                }
                echo "<label for='male'>Homme</label>";
                echo "<br>";
                if ($gender === 'female') {
                    echo "<input type='radio' id='female' name='gender' value='female' checked required>";
                } else {
                    echo "<input type='radio' id='female' name='gender' value='female' required>";
                }
                echo "<label for='female'>Femme</label>";
                echo "<br>";
                if ($gender === 'no_value') {
                    echo "<input type='radio' id='no_value' name='gender' value='no_value' checked required>";
                } else {
                    echo "<input type='radio' id='no_value' name='gender' value='no_value' required>";
                }
                echo "<label for='no_value'>Ne se prononce pas</label><br>";
                echo "<br>";
                echo "<label for='family-name'>Nom</label><br>";
                echo "<input class='fill-in' type='text' id='family-name' name='family-name' value='" . htmlspecialchars($fname) . "' required><br>";
                echo "<br>";
                echo "<label for='given-name'>Prénom</label><br>";
                echo "<input class='fill-in' type='text' id='given-name' name='given-name' value='" . htmlspecialchars($gname) . "' required><br>";
                ?>
            </div>
            <div class='flex-buttons'>
                <a class='red-button' href='account.php'>Annuler</a>
                <input class='green-button' type='submit' value='Enregistrer'>
            </div>
        </form>
    </div>
    <?php include '../modules/footer.php'; ?>
</body>

</html>