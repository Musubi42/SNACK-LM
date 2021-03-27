<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div id="main">
        <a class="sneaky" href="account.php">&larr; Retour</a>
        <h1 class="text-center">Modifier le mot de passe</h1>

        <form action="../db/login/db-password-edit.php" method="post">
            <div class="margined">
                <label for="password">Mot de passe actuel</label><br>
                <input class='fill-in' type="password" id="current_password" name="current_password" autocomplete="current-password"><br>
                <br>
                <label for="new_password">Nouveau mot de passe</label><br>
                <input class='fill-in' type="password" id="new_password" name="new_password"><br>
                <br>
                <label for="new_password_2">Confirmer le nouveau mot de passe</label><br>
                <input class='fill-in' type="password" id="new_password_2"><br>
            </div>
            <input class="green-button large" type="submit" value="Changer le mot de passe">
        </form>
    </div>
    <?php include '../modules/footer.php'; ?>
</body>

</html>