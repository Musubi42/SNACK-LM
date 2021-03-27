<?php // création d'un compte utilisateur

$prenom = "Nicolas";

if (true) {
    header("Location: sign-in.php#sign-in?case=welcome&name=$prenom");
} else {
    header("Location: sign-up.php#sign-in?error=1");
}
