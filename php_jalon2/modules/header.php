<style>
    header {
        position: sticky;
        top: 0;
        z-index: 9999;
    }

    #top-bar {
        display: block;
        width: 100%;
        height: 60px;
        box-sizing: border-box;
        background-color: #fff426;
        border-bottom: 1px black solid;
    }

    #top-bar a {
        display: inline-block;
        height: 40px;
        width: 40px;
        line-height: 40px;
        padding: 10px 10px;
        font-size: 30px;
        text-decoration: none;
        position: absolute;
        color: #352C2C;
        font-weight: bold;
        font-family: Georgia, 'Times New Roman', Times, serif;
        text-shadow: 0px 0px 1px black;
    }

    #top-nav-button {
        left: 0px;
    }

    #top-name {
        left: 60px;
        width: auto !important;
    }

    #top-cart-button {
        right: 60px;
    }

    #top-user-button {
        right: 0px;
    }

    #top-bar img {
        width: 100%;
    }

    #top-nav {
        background-color: white;
        overflow: hidden;
        max-height: 0;
        transition: max-height 0.2s ease-out;
        box-sizing: border-box;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        position: absolute;
        z-index: 5000;
        width: 100%;
        top: 60px;
    }

    #top-nav a {
        padding: 18px 16px;
        text-decoration: none;
        font-size: 1.1rem;
        font-family: Georgia, 'Times New Roman', Times, serif;
        color: black;
        display: table;
        width: 100%;
    }

    #top-nav a:hover {
        color: black;
    }
</style>

<header>
    <div id="top-bar">
        <a id="top-nav-button"><span onclick="openNav()">&#9776;</span></a>
        <a id="top-name" href="<?= $domain ?>/index.php">Snack LM</a>
        <a id="top-cart-button" href="<?= $domain ?>/order/cart.php">
            <img src="https://image.flaticon.com/icons/png/512/126/126087.png" alt="Panier">
        </a>
        <a id="top-user-button" href="<?= $domain ?>/login/isconnected.php">
            <img src="https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png" alt="Compte">
        </a>
    </div>
    <nav>
        <div id="top-nav">
            <a href="<?= $domain ?>/index.php">Accueil</a>
            <a href="<?= $domain ?>/order/menu.php">La carte</a>
            <a href="<?= $domain ?>/help/about.php">A propos</a>
            <a href="<?= $domain ?>/help/contact.php">Contact</a>
        </div>
    </nav>
</header>

<script>
    // Menu navigation smartphone
    function openNav() {
        if (!topNav.style.maxHeight) {
            topNav.style.maxHeight = topNav.scrollHeight + "px";
            topNav.style.borderBottom = "1px solid black";
        } else {
            topNav.style.maxHeight = null;
            topNav.style.border = "0px solid black";
        }
    }

    let topNavButton = document.getElementById("top-nav-button");
    let topNav = document.getElementById("top-nav");
</script>