<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Snack LM</title>
</head>

<!-- Site conçu d'abord pour smartphone puis à adapter tablette et PC plus tard
car cible davantage une utilisation smartphone -->

<body>

    <?php include 'alert/alert.html'; ?>

    <?php include 'header/header.html'; ?>
    <div class="center">
        <a href="tel:+33 3 20 19 54 10"><button id="call">APPELEZ-NOUS</button></a>
        <button id="order">COMMANDEZ EN LIGNE</button>
    </div>

    <h2 class="center">Snack LM : N°1 à Marbrerie</h2>
    <p>
        Une faim de loup ? Pas d'inquiétude, nous prenons la situation en main.<br>
        Venez découvrir nos recettes : nos burger, nos kebab, de même que nos assiettes, galettes et tacos.<br>
        Une envie soudaine de vous régaler ? Alors n'hésitez plus,
        appelez-nous ou passez commande en ligne.<br>
        <em>Jusqu'au 31/08, bénéficiez de deux livraisons offertes.</em>
    </p>
    <p>
        Quelques photos prises par nos heureux clients :
    </p>

    <?php include 'swiper/swiper.html'; ?>

</body>



</html>