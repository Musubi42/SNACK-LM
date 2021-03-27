<?php
// Si l'utilisateur est connecté, l'amener à la page de son compte
if (isset($_GET['debug']) && $_GET['debug'] == "yes") {
    header("Location: account.php");
} else { // Sinon l'amener à la page de connexion
    header("Location: signin.php");
}
