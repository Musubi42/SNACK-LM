<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
<script src="../script/func-library.js"></script>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div id="main" class="future">
        <a class="sneaky" href="signin.php">&larr; Retour</a>
        <h1 class="text-center">Inscription</h1>
        <form action="db-signup.php" method="post">
            <div class="margined">
                <h4>Informations de connexion :</h4>
                <label for="mail">Adresse e-mail<span class='red'>*</span></label><br>
                <input class="fill-in" type="email" id="mail" name="user_mail" autocomplete="email" placeholder="pseudo@exemple.com" required><br>
                <br>
                <label for="password">Mot de passe<span class='red'>*</span></label><br>
                <input class="fill-in" type="password" id="password" name="user_password" required><br>
                <span style="font-size:14px">Le mot de passe doit contenir :<br>
                    - 10 caractères<br>
                    - lettre majuscule, minuscule, chiffre, symbole</span>
                <br>
                <h4>A propos de vous :</h4>
                <label for="gender">Sexe<span class='red'>*</span> :</label>
                <br>
                <input type="radio" id="male" name="user_gender" value="male" required>
                <label for="gender">Homme</label>
                <br>
                <input type="radio" id="female" name="user_gender" value="female" required>
                <label for="gender">Femme</label>
                <br>
                <input type="radio" id="no_value" name="user_gender" value="no_value" required>
                <label for="gender">Ne se prononce pas</label><br>
                <br>
                <label for="family-name">Nom<span class='red'>*</span></label><br>
                <input class="fill-in" type="text" id="family-name" name="user_family_name" autocomplete="family-name" required><br>
                <br>
                <label for="given-name">Prénom</label><br>
                <input class="fill-in" type="text" id="given-name" name="user_given_name" autocomplete="given-name" required><br>
                <br>
                <label for="street-adress">Adresse<span class='red'>*</span></label><br>
                <input class="fill-in" type="text" id="street-adress" name="user_street_adress" autocomplete="street-address" required><br>
                <br>
                <label for="postal-code">Code postal<span class='red'>*</span></label><br>
                <input class="fill-in" type="text" id="postal-code" name="user_postal_code" autocomplete="postal-code" required><br>
                <br>
                <label for="town">Ville<span class='red'>*</span></label><br>
                <input class="fill-in" type="text" id="town" name="user_town" required><br>
                <br>
                <label for="country-name">Pays<span class='red'>*</span></label><br>
                <input class="fill-in" type="text" id="country-name" name="user_country_name" autocomplete="country-name" required><br>
            </div>
            <input class="green-button center" type="submit" value="S'incrire">
        </form>
    </div>
    <script src="../script/func-library.js"></script>
</body>

</html>