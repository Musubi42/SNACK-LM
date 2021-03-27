<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
<style>
    /* En bas */
    #confirm-delete {
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 1000;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(32, 32, 32, 0.8);
        text-align: center;
        display: none;
    }

    #confirm-delete>div {
        width: 100%;
        position: fixed;
        z-index: 1000;
        bottom: 0;
        background-color: rgb(230, 230, 230);
    }
</style>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div id="main">
        <a class="sneaky" href="../index.php">&larr; Accueil</a>
        <h1 class="text-center">Mon compte</h1>
        <a class="wide sneaky" href="user-info.php">Mes informations</a>
        <a class="wide sneaky" href="addresses/addresses.php">Mes adresses de livraison</a>
        <a class="wide sneaky" href="password.php">Modifier mon mot de passe</a>
        <a class="wide sneaky" href="disconnect.php">Se déconnecter</a>
        <a class="wide sneaky red" id='remove-user'>Supprimer mon compte</a>

        <?php include '../modules/confirm-box.php' ?>

    </div>
    <?php include '../modules/footer.php'; ?>

    <script>
        // confirm-box
        confirmMsg.innerHTML = "Voulez-vous vraiment supprimer votre compte ?<br>" +
            "<span class='red'>Attention ! Cette action est irréversible !</span>";
        confirmButton.innerHTML = "Supprimer";
        confirmButton.addEventListener("click", function() {
            location.href = "../db/user/db-user-remove.php";
        }, false);
        cancelButton.addEventListener("click", function() {
            confirmBackground.style.display = "none";
        }, false);
        document.getElementById("remove-user").addEventListener("click", function() {
            confirmBackground.style.display = "block";
        }, false);
    </script>
</body>

</html>