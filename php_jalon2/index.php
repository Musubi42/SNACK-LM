<?php session_start(); ?>
<?php include 'modules/head.php'; ?>

</head>

<body>

    <?php include 'modules/alert.php'; ?>

    <?php include 'modules/header.php'; ?>

    <h1 class="text-center">Bienvenue</h1>
    <p>
        Une faim de loup ?<br>
        Venez découvrir nos recettes : nos burger, nos kebab, de même que nos assiettes, galettes et tacos.<br>
    </p>
    <p>
        <em>Jusqu'au 31/08, bénéficiez de deux livraisons offertes.</em>
    </p>
    <a class="red-button large" href="order/menu.php">Voir la carte / Commander</a>
    <!-- <br> -->
    <?php
    // include 'modules/swiper.php';
    ?>
    <!-- <br> -->
    <a class="green-button large" href="tel:+33 3 20 19 54 10">Appeler</a>
    <br>
</body>



</html>