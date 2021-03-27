<!DOCTYPE html>
<html lang="fr">

<head>
    <?php $domain = "http://www.snack-lm.fr"; ?>
    <script>
        let openingHour = 11;
        let closingHour = 19;
        let nowDate = new Date();
        let nowHour = 17;
        let nowMinutes = nowDate.getMinutes();
        let isOpen = (openingHour <= nowHour) && (nowHour < closingHour);
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= $domain ?>/img/favicon.ico" />
    <link rel="stylesheet" href="<?= $domain ?>/style/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <title>SNACK LM</title>