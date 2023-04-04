<?php
if (isset($_SESSION['Moniteur'])) {
    if ($unControleur->selectWhere("user", "id_u", $_SESSION['Moniteur']["id_u"])["mdp_u"] == "ValAuto123") {
        header("Location: index.php?page=6");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>Accueil</title>
</head>

<body>
    <?php
    require_once("./views/_navbar.php");

    if (isset($_SESSION['redirect']) && $_SESSION['redirect'] == true) {
        echo "<div class='col-md-3 alert alert-danger'>Veuillez vous connecter<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";

        unset($_SESSION['redirect']);
    }
    if (isset($_SESSION['redirectFormation']) && $_SESSION['redirectFormation'] == true) {
        echo "<div class='col-md-3 alert alert-danger'>Veuillez souscrire à une formation<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";

        unset($_SESSION['redirectFormation']);
    }
    ?>

    <div class="banner mb-5">
        <div class="container-xs">
            <h1 data-aos="fade-up" class="slogan py-5 text-center">Du permis voiture à moto!</h1>
            <div data-aos="fade-up" class="mt-5 row text-center justify-content-around">
                <div class="card-top col-md-5 py-4">
                    <h3 class="fw-bold">Formation Permis B</h3>
                    <small class="text-muted">à partir de 599€</small><br>
                    <a href="index.php?page=1">
                        <button class="py-3 mt-2 px-3 fw-bold">VOIR LES OFFRES</button>
                    </a>
                </div>
                <div class="card-top col-md-5 py-4">
                    <h3 class="fw-bold">Formation Permis A</h3>
                    <small class="text-muted">à partir de 243€</small><br>
                    <a href="index.php?page=1&type=A">
                        <button class="py-3 mt-2 px-3 fw-bold">VOIR LES OFFRES</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="container">
            <div class="row justify-content-between mb-5">
                <div class="col-md-6">
                    <h2 class="pt-5 title">Passez votre permis de conduire aux côtés d’experts</h2>
                    <p class="fs-5">Nous avons choisis les meilleurs formateurs pour votre réussite.
                        Tous pationnés par leur métier, ils sauront vous guider afin de
                        vous mener vers l’obtention de votre permis de conduire</p>
                </div>
                <div class="col-md-6">
                    <img class="img-fluid" src="./images/photos.png" alt="">
                </div>
            </div>
        </div>

        <div data-aos="fade-right" class="bg-grey">
            <div class="container-xxl">
                <div class="col-md-12">
                    <h2 class="title text-center pt-4">Pourquoi choisir Val’auto ?</h2>
                    <div class="row pt-5 text-center">
                        <div class="col-lg-3">
                            <div class="card card-choix mb-5 pt-2 px-2 shadow"><img class="mx-auto" src="./images/pin.png" alt="" height="110px" width="110px">
                                <p class="fw-bold">Des agences dans toutes la france</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-choix mb-5 pt-2 px-2 shadow"><img class="mx-auto" src="./images/check.png" alt="" height="110px" width="110px">
                                <p class="fw-bold">De nombreux avis de satisfaction</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-choix mb-5 pt-2 px-2 shadow"><img class="mx-auto" src="./images/cb.png" alt="" height="110px" width="110px">
                                <p class="fw-bold">Une interface et un suivis complet et intelligent</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="card card-choix mb-5 pt-2 px-2 shadow"><img class="mx-auto" src="./images/reveil.png" alt="" height="110px" width="110px">
                                <p class="fw-bold">Formations rapides pour passer le permis en un temps record</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-md-12 mb-5">
                <div class="row pt-5">
                    <div class="col-md-6">
                        <div class="col">
                            <div class="my-3 avis-sm p-3">
                                <p class="fw-bold">Auto-école supèrbe <br>
                                    Moniteur pationné !</p>
                                <img class="me-2" src="./images/stars.png" alt="" width="100px">Daniel
                            </div>
                            <div class="my-3 avis-lg p-3">
                                <p class="fw-bold">J’ai eu mon permis moto en 1 mois ! <br>
                                    Ambiance très agréable je recommande !</p>
                                <img class="me-2" src="./images/stars.png" alt="" width="100px">Magalie
                            </div>
                            <div class="my-3 avis-md p-3">
                                <p class="fw-bold">J’ai passé mon code et mon permis <br>
                                    en 1 mois ! Les moniteus sont top et passionnés.</p>
                                <img class="me-2" src="./images/stars.png" alt="" width="100px">Ahmed
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 my-auto">
                        <h1 class="title ps-5">Plus de 500 000 retours positifs ! <img src="./images/trust.png" alt="" width="100px"></h1>
                        <img class="ps-5 img-fluid" src="./images/stars.png" alt="" width="500px">
                    </div>
                </div>
            </div>
        </div>

        <div data-aos="fade-right" class="bg-grey">
            <div class="container-xxl">
                <div class="col-md-12">
                    <h2 class="title text-center pt-4">Des offres allant du code de la route <br> au permis B et A !</h2>
                    <div class="row pt-5 text-center">
                        <div class="col-xl-4">
                            <div class="card card-offres mb-5 p-3 shadow pt-5">
                                <h3 class="title">Formation Permis B</h3>
                                <p class="text-muted fs-4">à partir de 599€</p>
                                <div class="boutton">
                                    <a href="index.php?page=1">
                                        <button class="title py-3 mt-2 px-3 mx-auto">VOIR LES OFFRES</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-offres mb-5 p-3 shadow pt-5">
                                <h3 class="title">Formation Permis A</h3>
                                <p class="text-muted fs-4">à partir de 243€</p>
                                <div class="boutton">
                                    <a href="index.php?page=1&type=A">
                                        <button class="title py-3 mt-2 px-3 mx-auto">VOIR LES OFFRES</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card card-offres mb-5 p-3 shadow pt-5">
                                <h3 class="title">Formation Code</h3>
                                <p class="text-muted fs-4">à partir de 10€</p>
                                <div class="boutton">
                                    <a href="index.php?page=1&type=code">
                                        <button class="title py-3 mt-2 px-3 mx-auto">VOIR LES OFFRES</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="topFunction()" id="myBtn" title="Go to top">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-caret-up-fill" viewBox="0 0 16 16" style="margin-bottom: 2px;">
                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z" />
            </svg>
        </button>
    </main>
    <?php
    require_once("./views/_footer.php");
    ?>
</body>

</html>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->

<style>
    @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

    html,
    body {
        font-family: 'Karla';
        overflow-x: hidden;
    }

    #Accueil {
        text-decoration: underline;
        text-underline-offset: 5px;
    }

    .banner {
        background-color: #2B8C52;
        width: 100%;
        min-height: 60vh;
    }

    .slogan {
        color: white;
        font-weight: 900;
        font-size: 80px;
    }

    .card-top {
        width: 400px;
        background-color: white;
        margin-bottom: 50px;
        border-radius: 10px;
    }

    .card-top button {
        background-color: #2B8C52;
        border: none;
        border-radius: 30px;
        color: white;
    }

    .container-xs {
        max-width: 75%;
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        width: 100%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-right: auto;
        margin-left: auto;
    }

    .title {
        font-weight: 900;
    }

    .bg-grey {
        margin-top: 100px;
        background-color: #e9e9e9;
    }

    .card-choix {
        width: 200px;
        height: 200px;
        margin: 0 auto;
        border: none;
        border-radius: 30px;
    }

    .avis-sm {
        width: 45%;
        color: white;
        background-color: #2B8C52;
        border-radius: 25px;
    }

    .avis-md {
        width: 65%;
        color: white;
        background-color: #2B8C52;
        border-radius: 25px;
    }

    .avis-lg {
        width: 85%;
        color: white;
        background-color: #2B8C52;
        border-radius: 25px;
    }

    .card-offres {
        position: relative;
        width: 325px;
        height: 275px;
        margin: 0 auto;
        border: none;
        border-radius: 30px;
    }

    .card-offres button {
        background-color: #2B8C52;
        width: 200px;
        border: none;
        border-radius: 30px;
        color: white;
    }

    .boutton {
        width: 90%;
        position: absolute;
        bottom: 30px;
    }

    button:hover {
        filter: brightness(85%);
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 99;
        border: none;
        outline: none;
        background-color: #2B8C52;
        color: white;
        cursor: pointer;
        width: 50px;
        height: 50px;
        border-radius: 50px;
        font-size: 18px;
        transition: 0.3s;
    }

    #myBtn:hover {
        background-color: #555;
    }
</style>

<script>
    // Get the button:
    let mybutton = document.getElementById("myBtn");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>