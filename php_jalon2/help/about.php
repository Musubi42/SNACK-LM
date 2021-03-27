<?php session_start(); ?>
<?php include '../modules/head.php'; ?>


<style>
    #hour {
        margin: 0 auto;
        width: 80%;
    }
</style>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <div class="about">
        <h4>Horaires</h4>
        <?php
        $jour = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
        echo "<table id='hour'>";
        for ($i = 0; $i < count($jour); $i++) {
            echo "<tr>";
            echo "<td>$jour[$i]</td>";
            echo "<td>11h00 - 18h00</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>

        <h4>Contact</h4>
        <p>
            Téléphone : <a href="tel:+33 3 20 19 54 10">03 20 19 54 10</a>
        </p>
        <h4>Adresse</h4>
        <p>
            289 Rue Pierre Legrand<br>
            59800 Lille
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2530.8463434889477!2d3.0965207!3d50.6299712!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c2d5fd79bf6b87%3A0x9ef7557e4c7eb3c5!2sSNACK%20LM!5e0!3m2!1sfr!2sfr!4v1615746232368!5m2!1sfr!2sfr" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        <h4>Conditions Générales d'Utilisation</h4>
        <p>
            CGU à rédiger
        </p>
    </div>
</body>

</html>