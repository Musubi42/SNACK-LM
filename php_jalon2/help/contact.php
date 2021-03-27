<?php session_start(); ?>
<?php include '../modules/head.php'; ?>
</head>

<body>
    <?php include '../modules/header.php'; ?>
    <h1 class="text-center">Nous contacter</h1>
    <form action="mailto:nicolas@valade.mobi" method="post">
        <div class="margined">
            <h4>A propos de vous :</h4>
            <label for="mail">Adresse e-mail<span class='red'>*</span></label><br>
            <input class="fill-in" type="email" id="mail" name="user_mail" autocomplete="email" placeholder="pseudo@exemple.com"><br>
            <br>
            <label for="family-name">Nom</label><br>
            <input class="fill-in" type="text" id="family-name" name="user_family_name" autocomplete="family-name"><br>
            <br>
            <label for="given-name">Prénom</label><br>
            <input class="fill-in" type="text" id="given-name" name="user_given_name" autocomplete="given-name"><br>
            <h4>Votre message</h4>
            <textarea></textarea><br>
        </div>
        <input class="green-button" type="submit" value="Envoyer">

    </form>

</body>

</html>