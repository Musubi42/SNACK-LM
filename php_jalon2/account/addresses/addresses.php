<?php session_start(); ?>
<?php include '../../modules/head.php'; ?>
</head>

<body>
    <?php include '../../modules/header.php'; ?>
    <?php include '../../db/bdd-de-test.php' ?>
    <div id="main">
        <a class="sneaky" href="../account.php">&larr; Retour</a>
        <h1 class="text-center">Mes adresses</h1>
        <a class='green-button large add-button' href="add-address.php">Ajouter une adresse</a>
        <?php
        for ($i = 0; $i < count($adresses); $i++) {
            echo "<div class='margined'>";
            echo "<br>Adresse " . ($i + 1) . " :<br>";
            echo htmlspecialchars(strval($adresses[$i][0])) . "<br>";
            echo htmlspecialchars(strval($adresses[$i][1])) . " " . htmlspecialchars(strval($adresses[$i][2])) . "<br>";
            echo htmlspecialchars(strval($adresses[$i][3])) . "<br><br>";
            echo "</div>";
            echo "<div class='flex-buttons'>";
            echo "<a class='green-button' href='address-edit.php?id=$i'>Modifier</a>";
            echo "<a class='red-button' href='../../db/user/addresses/db-address-remove.php?id=$i'>Supprimer</a>";
            echo "</div><br>";
        }
        ?>
    </div>
    <?php include '../../modules/footer.php'; ?>
</body>

</html>