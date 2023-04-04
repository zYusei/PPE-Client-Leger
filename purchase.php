<?php
if (!isset($_SESSION['User'])) {
    header("Location: index.php?page=0");
}

if (!$_SESSION['achat']) {
    header("Location: index.php?page=0");
}
unset($_SESSION['achat']); //On supprime la variable de session achat pour éviter que l'utilisateur puisse revenir sur la page purchase.php sans avoir acheté de formule


$_SESSION['offre'] = $_GET['offre']; //On set la variable de session offre avec la valeur de l'offre choisie par l'utilisateur pour l'utiliser dans le fichier Ajax_purchase.php

if ($_SESSION['offre'] == "PermisB") {
    $_SESSION['lePrix'] = intval($_SESSION['total_PermisB'], 10); //On set la variable de session lePrix avec le prix de l'offre choisie par l'utilisateur pour l'utiliser dans le fichier Ajax_purchase.php et l'afficher sur la page juste en dessous
}

if ($_SESSION['offre'] == "PermisA") {
    $_SESSION['lePrix'] = intval($_SESSION['total_PermisA'], 10); //On set la variable de session lePrix avec le prix de l'offre choisie par l'utilisateur pour l'utiliser dans le fichier Ajax_purchase.php et l'afficher sur la page juste en dessous
}

if ($_SESSION['offre'] == "Code") {
    $_SESSION['lePrix'] = intval($_SESSION['total_Code'], 10); //On set la variable de session lePrix avec le prix de l'offre choisie par l'utilisateur pour l'utiliser dans le fichier Ajax_purchase.php et l'afficher sur la page juste en dessous
}

// if (isset($_POST['submitPurchase']) && $_POST['cvv'] != '' && $_POST['dateExpi'] != '' && $_POST['num'] != '' && $_POST['nom'] != '') {
//     $unControleur->addFormuleToUser($_SESSION['User']['id_e'], $_GET['offre'], $leprix, $typeBoite);
//     unset($_SESSION['typeBoite']);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Achat | Val'auto</title>
    <link rel="stylesheet" href="./css/purchase.css">
</head>

<body>
    <div id="flash">
        <p>Merci pour votre achat, vous allez être redirigé dans un instant...</p>
    </div>

    <div class="body">
        <div class="container">
            <form action="" method="POST" id="FormPurchase">
                <div class="header">
                    <h3>Paiement en ligne</h3>
                </div>
                <div class="main">
                    <div class="cards">
                        <img src="./images/visa.png" width="50px" height="18px" alt="">
                        <img class="mastercard" src="./images/mastercard.png" width="50px" alt="">
                    </div>
                    <h2>Montant du paiement</h2>
                    <p id="montant"><?php if ($_SESSION['lePrix'] != 0) {
                                        echo $_SESSION['lePrix'];
                                    } else {
                                        header("Location: index.php?page=1");
                                    } ?>€</p>

                    <label for="inputNom">Nom sur la carte :</label>
                    <input type="text" name="nom" id="inputNom">



                    <label for="inputNum">Numéro de carte :</label>
                    <input type="text" name="num" id="inputNum" class="inputNum" onkeyup="formatCardNumber(this)" maxlength="19">

                    <div class="d-flex-label">
                        <label for="inputDate">Date d'éxpiration</label>
                        <label for="inputCVV">CVV</label>
                    </div>
                    <div class="d-flex input">
                        <input type="text" placeholder="MM/YY" id="inputDate" name="dateExpi" maxlength="5">
                        <input type="number" min="100" max="999" id="inputCVV" name="cvv">
                    </div>
                    <button name="submitPurchase" id="submit">
                        <p id="textbtnSublit">Payer</p><img id="gif" src="./images/loading.gif" alt="">
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="./Js/purchase.js"></script>
</body>

</html>
<script>
    function formatCardNumber(input) {
        // Récupère la valeur de l'input
        var value = input.value;
        // Remplace les espaces par des vides
        value = value.replace(/\s+/g, '');
        // Boucle sur chaque 4 caractères pour ajouter un espace
        value = value.match(/.{1,4}/g).join(" ");
        // Met à jour la valeur de l'input avec les espaces
        input.value = value;
    }
</script>