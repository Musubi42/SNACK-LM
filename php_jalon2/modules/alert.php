<style>
    #alert {
        height: 100%;
        width: 100%;
        position: fixed;
        z-index: 4000;
        top: 0;
        left: 0;
        background-color: rgba(64, 64, 64, 0.9);
        padding-top: 60px;
        z-index: 10000;
    }

    #alert a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 24px;
        color: white;
        display: block;
        overflow: hidden;
        white-space: nowrap;
    }

    #alert a:hover {
        color: black;
    }

    #alert .close-button {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 32px;
        margin-left: 50px;
        z-index: 6000;
    }

    #alert p {
        color: white;
        font-size: 18px;
        position: absolute;
        word-wrap: break-word;
        width: 250px;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -100%);
    }
</style>

<script>
    function closeAlert() {
        document.getElementById("alert").style.display = "none";
    }
</script>

<div id="alert">
    <a href="javascript:void(0)" class="close-button" onclick="closeAlert()">&times;</a>
    <p style="text-align: left;">
        Cher client de Snack LM,<br><br>
        Ce site internet est en cours de développement par un groupe d'étudiants.<br>
        Il est non officiel et ne saurait engager la responsabilité du restaurant SNACK LM.<br><br>
        Cordialement,<br>
        Le groupe d'étudiants
    </p>
</div>