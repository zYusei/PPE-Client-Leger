    <?php
    if (isset($_POST['AjoutMoniteur'])) {
        $unControleur->setTable("user");
        $tab = array(
            $id_u = null,
            $nom_u = $_POST['nom'],
            $prenom_u = $_POST['prenom'],
            $datenaissance_u = $_POST['datenaissance'],
            $email_u = $_POST['email'],
            $tel_u = $_POST['telephone'],
            $adresse_u = $_POST['adresse'],
            $ville_u = $_POST['ville'],
            $codepos_u = $_POST['codepostal'],
            $sexe_u = $_POST['sexe'],
            $role_u = "moniteur",
            $mdp_u = "ValAuto123",
            $security_question = 'En attente',
            $security_answer = 'En attente'
        );
        $unControleur->insert($tab);
        $unControleur->setTable("moniteur");
        $tab = array(
            $id_u = $unControleur->lastInsertId(),
            $dateembauche = $_POST['dateembauche'],
            $dateobtentionbafm = $_POST['dateobtentionbafm']
        );
        $unControleur->insert($tab);
    }

    $moniteurs = $unControleur->selectAllWhere("user", "role_u", "moniteur");

    if (isset($_POST['SuppMoniteur'])) {
        $unControleur->setTable("user");
        $unControleur->delete("id_u", $_POST['id_u']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>

    <body>
        <?php
        require_once("./views/_navbar.php");
        ?>

        <main class="py-5 bg-back">
            <div class="container">
                <div data-aos="fade-up" class="col-12 p-3 border rounded-3 my-2 bg-white">
                    <h5 class="text-center fw-bold text-dark py-3"> Insertion d'un moniteur </h5>
                    <form method="post">
                        <div class="col-10 mx-auto">
                            <div class="row justify-content-center">
                                <div class="col-xxl-3 mb-3">
                                    <label for="nom">Nom</label>
                                    <input id="nom" type="text" class="form-control" name="nom" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="prenom">Prénom</label>
                                    <input id="prenom" type="text" class="form-control" name="prenom" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="datenaissance">Date de naissance</label>
                                    <input id="datenaissance" type="date" class="form-control" name="datenaissance" required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xxl-3 mb-3">
                                    <label for="telephone">Téléphone</label>
                                    <input id="telephone" type="tel" class="form-control" name="telephone" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="adresse">Adresse</label>
                                    <input id="adresse" type="text" class="form-control" name="adresse" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="codepostal">Code postal</label>
                                    <input id="codepostal" type="text" class="form-control" name="codepostal" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="ville">Ville</label>
                                    <input id="ville" type="text" class="form-control" name="ville" required>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xxl-3 mb-3">
                                    <label for="sexe">Sexe</label>
                                    <select id="sexe" class="form-select pointer" name="sexe" required>
                                        <option value="M">Homme</option>
                                        <option value="F">Femme</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="motdepasse">Mot de passe temporaire</label>
                                    <div class="input-group">
                                        <input class="form-control" id="password" type="password" value="ValAuto123" readonly disabled>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" onclick="myFunction()">
                                                <svg id="old_eye" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                                <svg id="old_eye_slash" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                                                    <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z" />
                                                    <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z" />
                                                    <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="dateembauche">Date d'embauche</label>
                                    <input id="dateembauche" type="date" class="form-control" name="dateembauche" required>
                                </div>
                                <div class="col-xxl-3 mb-3">
                                    <label for="dateobtentionbafm">Date d'obtention du BAFM</label>
                                    <input id="dateobtentionbafm" type="date" class="form-control" name="dateobtentionbafm" required>
                                </div>
                            </div>
                            <div class="col-auto my-2 d-flex justify-content-center">
                                <button type="submit" value="AjoutMoniteur" name="AjoutMoniteur" class="btn col-2 btn-success my-2">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div data-aos="fade-up" class="col-12 p-3 border rounded-3 my-2 bg-white">
                    <h5 class="text-center fw-bold text-dark py-3"> Suppression d'un moniteur </h5>
                    <form method="post">
                        <div class="col-10 mx-auto">
                            <div class="row justify-content-center my-2">
                                <div class="col-xxl-3">
                                    <label for="idmoniteur">Moniteur</label>
                                    <select name="idmoniteur" id="idmoniteur" class="form-select pointer" required>
                                        <option value="">Choisir un moniteur</option>
                                        <?php
                                        foreach ($moniteurs as $moniteur) {
                                            echo "<option value='" . $moniteur['id_u'] . "'>" . $moniteur['nom_u'] . " " . $moniteur['prenom_u'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-auto my-2 d-flex justify-content-center">
                                <button type="submit" value="SuppMoniteur" name="SuppMoniteur" class="btn col-2 btn-danger my-2">Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php
        require_once("./views/_footer.php");
        ?>


    </body>

    </html>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Karla:wght@200;300;400;500;600;700;800&display=swap');

        html,
        body {
            font-family: 'Karla';
        }

        .text-green {
            color: #2B8C52;
        }

        .text-red {
            color: red;
        }

        .bg-back {
            background-color: #f9f9f9;
        }

        .bg-grey {
            background-color: #F4F4F4;
        }

        .bg-light-grey {
            background-color: #f9f9f9;
        }

        #mois {
            transform: translateY(12.5%);
        }

        #annee {
            transform: translateY(12.5%);
        }

        #AffTout {
            transform: translateY(50%);
        }

        .max-height {
            max-height: 19rem;
        }

        .scale-label {
            transition: transform 0.15s ease-in-out;
        }

        .scale-label:hover {
            transform: scale(1.25);
        }
    </style>
    <script>
        document.getElementById("old_eye_slash").style.display = "none";

        function myFunction() {
            var pwd = document.getElementById("password");
            if (pwd.getAttribute('type') == "password") {
                document.getElementById("old_eye").style.display = "none";
                document.getElementById("old_eye_slash").style.display = "block";
                pwd.setAttribute('type', "text");
            } else {
                document.getElementById("old_eye").style.display = "block";
                document.getElementById("old_eye_slash").style.display = "none";
                pwd.setAttribute('type', "password");
            }
        }
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>