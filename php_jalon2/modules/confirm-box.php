<style>
    /* En bas */
    #confirm-background {
        width: 100%;
        height: 100%;
        position: fixed;
        z-index: 1000;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgba(32, 32, 32, 0.8);
        text-align: center;
        display: none;
    }

    #confirm-box {
        width: 100%;
        position: fixed;
        z-index: 1000;
        bottom: 0;
        background-color: rgb(230, 230, 230);
    }

    /* Au milieu */
    /* #confirm-background {
            width: 100%;
            height: 100%;
            position: absolute;
            z-index: 1000;
            top: 0;
            left: 0;
            background-color: rgba(32, 32, 32, 0.8);
            text-align: center;
            display: none;
        }

        #confirm-box {
            width: 85%;
            position: absolute;
            z-index: 1000;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(230, 230, 230);
            border-radius: 15px;
        } */
</style>

<div id='confirm-background'>
    <div id='confirm-box'>
        <p id='confirm-msg'>xx</p>
        <div class="flex-buttons">
            <a class="green-button" id='cancel-button'>xx</a>
            <a class="red-button" id='confirm-button'>xx</a>
        </div>
    </div>
</div>

<script>
    // raccourcis vers les éléments + textes par défaut
    let confirmBackground = document.getElementById("confirm-background");
    let confirmButton = document.getElementById("confirm-button");
    let cancelButton = document.getElementById("cancel-button");
    let confirmMsg = document.getElementById('confirm-msg');
    confirmMsg.innerHTML = "Veuillez confirmer.";
    cancelButton.innerHTML = "Annuler";
    confirmButton.innerHTML = "Confirmer";
    // confirmButton.onclick = function() {
    //     };
    //     cancelButton.onclick = function() {
    //     }
</script>