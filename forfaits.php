    <?php

    if (isset($_POST['Submit-PermisB'])) {
        if (!isset($_SESSION['User'])) { //Si pas connecté, redirect login/register
            $_SESSION['redirection'] = "index.php?page=1"; // on set une variable de session qui est un lien de redirection
            header("location: index.php?page=9"); // cette variable de session sera utiliser dans l'accueil puis "unset" pour revenir à cette page après inscription/connexion
        } else if (!empty($_SESSION['formation'])) { //Si connecté et déjà inscrit à une formation
            echo "<div class='col-md-3 alert alert-danger'>Vous avez déjà une formation<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";
        } else {
            $_SESSION['achat'] = true;
            switch ($_POST['typeBoite']) {
                case "0": //Manuelle
                    $_SESSION['typeBoite'] = "Manuelle";
                    break;
                case "300": //Automatique
                    $_SESSION['typeBoite'] = "Automatique";
                    break;
            }
            header("location: index.php?page=99&offre=PermisB");
        }
    }

    if (isset($_POST['Submit-PermisA'])) {
        if (!isset($_SESSION['User'])) { //Si pas connecté, redirect login/register
            $_SESSION['redirection'] = "index.php?page=1"; // on set une variable de session qui est un lien de redirection
            header("location: index.php?page=9"); // cette variable de session sera utiliser dans l'accueil puis "unset" pour revenir à cette page après inscription/connexion
        } else if (!empty($_SESSION['formation'])) { //Si connecté et déjà inscrit à une formation
            echo "<div class='col-md-3 alert alert-danger'>Vous avez déjà une formation<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";
        } else {
            $_SESSION['achat'] = true;
            header("location: index.php?page=99&offre=PermisA");
        }
    }


    if (isset($_POST['Submit-Code'])) {
        if (!isset($_SESSION['User'])) { //Si pas connecté, redirect login/register
            $_SESSION['redirection'] = "index.php?page=1"; // on set une variable de session qui est un lien de redirection
            header("location: index.php?page=9"); // cette variable de session sera utiliser dans l'accueil puis "unset" pour revenir à cette page après inscription/connexion
        } else if (!empty($_SESSION['formation'])) { //Si connecté et déjà inscrit à une formation
            echo "<div class='col-md-3 alert alert-danger'>Vous avez déjà une formation<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";
        } else {
            $_SESSION['achat'] = true;
            header("location: index.php?page=99&offre=Code");
        }
    }

    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nos forfaits | Val'auto</title>
        <link rel="stylesheet" href="./css/forfaits.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    </head>

    <body>
        <?php
        require_once("./views/_navbar.php");
        ?>

        <div class="banner">
            <div class="container">
                <h1 class="slogan my-5 text-center">Nos formations!</h1>


                <div class="bouttons-container py-5">
                    <div id="btn-PermisB" class="boutton rounded-2 boutton-active" onclick="Display_PermisB()">Permis B</div>
                    <div id="btn-PermisA" class="boutton rounded-2" onclick="Display_PermisA()">Permis A</div>
                    <div id="btn-Code" class="boutton rounded-2" onclick="Display_Code()">Code</div>
                </div>
            </div>
        </div>


        <!-- PERMIS B -->
        <div class="d-flex flex-column align-items-center">
            <div class="form" id="form-PermisB">
                <form action="" method="post">
                    <div class="form-title">
                        <h1>Inscrivez vous au Permis B</h1>
                    </div>
                    <div class="d-flex">
                        <div class="form-gauche">
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="Permis-B" type="radio" name="typePermis" value="599" required>
                                <div class="d-flex">
                                    <label for="Permis-B">Permis B</label>
                                    <div title="Permis B simple" class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="Permis-B-accompagné" type="radio" name="typePermis" value="739" required>
                                <div class="d-flex">
                                    <label for="Permis-B-accompagné">Permis B accompagné</label>
                                    <div title="L’AAC (apprentissage anticipé de la conduite) permet de commencer l’apprentissage dès 15 ans. Dès la fin de tes cours, tu pourras partir en conduite accompagnée avec tes parents." class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="Permis-B-acceléré" type="radio" name="typePermis" value="899" required>
                                <div class="d-flex">
                                    <label for="Permis-B-acceléré">Permis B acceléré</label>
                                    <div title="Des formules complètes avec une formation en 30 jours et une présentation prioritaire à l’examen du permis pour réussir rapidement son permis" class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-milieu">
                            <div class="d-flex input-form-milieu">
                                <input class="form-check-input" id="Boite-automatique" type="radio" name="typeBoite" value="300" required>
                                <label for="Boite-automatique">Boite automatique</label>
                            </div>
                            <div class="d-flex input-form-milieu">
                                <input class="form-check-input" id="Boite-manuelle" type="radio" name="typeBoite" value="0" required>
                                <label for="Boite-manuelle">Boite manuelle</label>
                            </div>
                        </div>
                        <div class="form-droite">
                            <div class="d-flex input-form-droite">
                                <input class="form-check-input" id="20" type="radio" name="nbCours" value="0" required>
                                <label for="20">20</label>
                            </div>
                            <div class="d-flex input-form-droite">
                                <input class="form-check-input" id="25" type="radio" name="nbCours" value="150" required>
                                <label for="25">25</label>
                            </div>
                            <div class="d-flex input-form-droite">
                                <input class="form-check-input" id="30" type="radio" name="nbCours" value="460" required>
                                <label for="30">30</label>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="btn-sinscrire" id="validate-PermisB">
                <p id="Montant-Display"></p>
                <button type="submit" name="Submit-PermisB" id="validate-form-forfaits">S'inscrire</button>
            </div>
            </form>





























            <!-- PERMIS A -->
            <div class="form" id="form-PermisA">
                <form action="" method="POST">


                    <div class="form-title">
                        <h1>Inscrivez vous au Permis A</h1>
                    </div>
                    <div class="d-flex">
                        <div class="form-total">
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="Permis-A" type="radio" name="typePermisA" value="560" required>
                                <div class="d-flex">
                                    <label for="Permis-A">Permis A1</label>
                                    <div title="Le permis A1 permet à toute personne à partir de 16 ans de conduire les 2-roues de petite cylindrée (125cc, soit 11 kW)." class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="Permis-A2" type="radio" name="typePermisA" value="560" required>
                                <div class="d-flex">
                                    <label for="Permis-A2">Permis A2</label>
                                    <div title="A partir de 18 ans, le permis A2 est nécessaire pour conduire les 2 roues de moyenne cylindrée (puissance maximum de 35kW)." class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="PassA2-A" type="radio" name="typePermisA" value="225" required>
                                <div class="d-flex">
                                    <label for="PassA2-A">Passerelle A2 vers A</label>
                                    <div title="La mention A est indispensable pour conduire une moto grosse cylindrée (puissance supérieure à 35kW). Il est nécessaire d’avoir d’abord le permis A2 et 2 ans de pratique pour effectuer la formation. La mention A ne peut pas être obtenue avant l’âge de 20 ans." class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input ms-5" id="BSR" type="radio" name="typePermisA" value="243" required>
                                <div class="d-flex">
                                    <label for="BSR">Parmis AM / BSR</label>
                                    <div title="À partir de 14 ans, il est nécessaire pour conduire un scooter jusqu’à 50cc ou une voiturette." class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="btn-sinscrire" id="validate-PermisA">
                <p id="Montant-Display2"></p>
                <button id="validate-form-forfaits" name="Submit-PermisA">S'inscrire</button>
            </div>
            </form>



















            <!-- CODE -->
            <div class="form" id="form-Code">
                <form action="" method="POST">

                    <div class="form-title">
                        <h1>Le code de la route</h1>
                    </div>
                    <div class="d-flex">
                        <div class="form-total">
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="Code" type="radio" name="Code" value="10" required>
                                <div class="d-flex">
                                    <label for="Code">Code</label>
                                    <div title="Accès à une interface pour réviser le code sur Ornikar" class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex input-form-gauche">
                                <input class="form-check-input" id="CodeR" type="radio" name="Code" value="30" required>
                                <div class="d-flex">
                                    <label for="CodeR">Code Réussite</label>
                                    <div title="Accès à une interface pour réviser le code sur Ornikar + une session pour passer l'examen" class="infos">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                            <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="btn-sinscrire" id="validate-Code">
                <p id="Montant-Display3"></p>
                <button id="validate-form-forfaits" name="Submit-Code">S'inscrire</button>
            </div>

            </form>



















        </div>

        <?php require_once('./views/_footer.php') ?>
        <script src="./Js/forfaits.js"></script>
    </body>

    </html>

    <?php

    if (isset($_GET['type']) && $_GET['type'] == "A") {
        echo "<script>Display_PermisA()</script>";
    }

    if (isset($_GET['type']) && $_GET['type'] == "code") {
        echo "<script>Display_Code()</script>";
    }

    ?>

    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>