<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div id="main">
        <?php
        if (isset($_GET['case']) && isset($_GET['name'])) {
            if ($_GET['case'] == "welcome") {
                echo "Bienvenue $_GET[name] !<br>Vous pouvez désormais vous connecter.";
            } else if ($_GET['case'] == "disconnected") {
                echo "Déconnexion réussie.";
            }
        }
        ?>
        <a class="sneaky" href="../index.php">&larr; Accueil</a>
        <h1 class="text-center">Connexion</h1>
        <form action="db-signin.php" method="post">
            <div class="margined">
                <label for="mail">Adresse e-mail</label><br>
                <input class="fill-in" type="email" id="mail" name="user_mail" autocomplete="email"><br>
                <br>
                <label for="password">Mot de passe</label><br>
                <input class="fill-in" type="password" id="password" name="password" autocomplete="current-password"><br>
            </div>
            <input class="green-button medium" type="submit" value="Se connecter">
        </form>
        <a class="red-button medium" href="signup.php">S'incrire</a><br>
        <a href="../account/account.php"><button>Mon compte (debug)</button></a>
    </div>

    <script src="../script/func-library.js"></script>
</body>

</html>