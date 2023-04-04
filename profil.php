<?php


if (!empty($_SESSION['User'])) {
    $profil = array(
        "nom" => $_SESSION['User']['nom_u'],
        "prenom" => $_SESSION['User']['prenom_u'],
        "email" => $_SESSION['User']['email_u'],
        "tel" => $_SESSION['User']['tel_u'],
        "adresse" => $_SESSION['User']['adresse_u'],
        "ville" => $_SESSION['User']['ville_u'],
        "codepostal" => $_SESSION['User']['codepos_u'],
        "dateprofil" => $_SESSION['User']['dateinscription_u'],
        "id" => $_SESSION['User']['id_u'],
    );
} elseif (!empty($_SESSION['Moniteur'])) {
    $profil = array(
        "nom" => $_SESSION['Moniteur']['nom_u'],
        "prenom" => $_SESSION['Moniteur']['prenom_u'],
        "email" => $_SESSION['Moniteur']['email_u'],
        "tel" => $_SESSION['Moniteur']['tel_u'],
        "adresse" => $_SESSION['Moniteur']['adresse_u'],
        "ville" => $_SESSION['Moniteur']['ville_u'],
        "codepostal" => $_SESSION['Moniteur']['codepos_u'],
        "dateprofil" => $_SESSION['Moniteur']['dateembauche_u'],
        "id" => $_SESSION['Moniteur']['id_u'],
    );
} elseif (!empty($_SESSION['Admin'])) {
    $profil = array(
        "nom" => $_SESSION['Admin']['nom_u'],
        "prenom" => $_SESSION['Admin']['prenom_u'],
        "email" => $_SESSION['Admin']['email_u'],
        "tel" => $_SESSION['Admin']['tel_u'],
        "adresse" => $_SESSION['Admin']['adresse_u'],
        "ville" => $_SESSION['Admin']['ville_u'],
        "codepostal" => $_SESSION['Admin']['codepos_u'],
        "id" => $_SESSION['Admin']['id_u'],
    );
} else {
    header("Location: index.php?page=0");
}

if (isset($_POST["modifier_information"])) {

    $nom = $_POST['nom_u'];
    $prenom = $_POST['prenom_u'];
    $email = $_POST['email_u'];
    $tel = $_POST['tel_u'];
    $adresse = $_POST['adresse_u'];
    $ville = $_POST['ville_u'];
    $codepostal = $_POST['codepos_u'];

    $role = $_SESSION['User']['role_u'];


    if ($role == "eleve" || $role == "moniteur" || $role == "admin") {
        $unControleur->setTable("user");
        $tab = array("nom_u" => $nom, "prenom_u" => $prenom, "email_u" => $email, "tel_u" => $tel, "adresse_u" => $adresse, "ville_u" => $ville, "codepos_u" => $codepostal);
        $unControleur->update($tab, "id_u", $_SESSION['User']['id_u']);

        echo "<div class='col-md-3 alert alert-success'>Vos informations ont été modifiées avec succes !<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                    <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                    </svg> </span> </div>";

        $email = $_SESSION['User']['email_u'];
        $mdp = $_SESSION['User']['mdp_u'];

        $_SESSION['User'] = $unControleur->verifConnection($email, $mdp);
        if ($_SESSION['User'] != null && $_SESSION['User']['role_u'] == "eleve") {
            $_SESSION['User']['id_formation'] = $unControleur->selectWhere("eleve", "id_u", $_SESSION['User']['id_u'])['id_formation'];
            $_SESSION['User']['dateinscription_u'] = $unControleur->selectWhere("eleve", "id_u", $_SESSION['User']['id_u'])['dateinscription'];
        } elseif ($_SESSION['User'] != null && $_SESSION['User']['role_u'] == "moniteur") {
            $_SESSION['Moniteur'] = $_SESSION['User'];
            unset($_SESSION['User']);
            $_SESSION['Moniteur']['dateembauche_u'] = $unControleur->selectWhere("moniteur", "id_u", $_SESSION['Moniteur']['id_u'])['dateembauche'];
        } elseif ($_SESSION['User'] != null && $_SESSION['User']['role_u'] == "admin") {
            $_SESSION['Admin'] = $_SESSION['User'];
            unset($_SESSION['User']);
        }
        header("Location: index.php?page=6");
    }
}


if (isset($_POST['userPasswordReset'])) {
    if (empty($_POST['old_password']) || empty($_POST['new_password'])) {
        echo "<div class='col-md-3 alert alert-danger'>L'ancien et le nouveau mot de passe sont obligatoires.<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
            <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
            </svg> </span> </div>";
    } else {
        $unControleur->setTable("user");
        $old_password = sha1($_POST['old_password']);
        $new_password = $_POST['new_password'];
        if (!empty($_SESSION['User'])) {
            $currentPassword = $_SESSION['User']['mdp_u'];
        } elseif (!empty($_SESSION['Moniteur'])) {
            $currentPassword = $_SESSION['Moniteur']['mdp_u'];
        } elseif (!empty($_SESSION['Admin'])) {
            $currentPassword = $_SESSION['Admin']['mdp_u'];
        }
        if ($old_password != $currentPassword) {
            echo "<div class='col-md-3 alert alert-danger'>L'ancien mot de passe est incorrect.<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                </svg> </span> </div>";
        } else {
            $tab = array("mdp_u" => $new_password);
            if (!empty($_SESSION['User'])) {
                $unControleur->update($tab, 'id_u', $_SESSION['User']['id_u']);
            } elseif (!empty($_SESSION['Moniteur'])) {
                $unControleur->update($tab, 'id_u', $_SESSION['Moniteur']['id_u']);
            } elseif (!empty($_SESSION['Admin'])) {
                $unControleur->update($tab, 'id_u', $_SESSION['Admin']['id_u']);
            }
            // $unControleur->update($tab, 'id_u', isset($_SESSION['User']) ? $_SESSION['User']['id_u'] : (isset($_SESSION['Moniteur']) ? $_SESSION['Moniteur']['id_u'] : (isset($_SESSION['Admin']) ? $_SESSION['Admin']['id_u'] : null)));
            // $_SESSION['User'] = $unControleur->verifConnection($_SESSION['User']['email_e'], $new_password);
            if (!empty($_SESSION['User'])) {
                $_SESSION['User'] = $unControleur->verifConnection($_SESSION['User']['email_u'], sha1($new_password));
                $_SESSION['User']['id_formation'] = $unControleur->selectWhere("eleve", "id_u", $_SESSION['User']['id_u'])['id_formation'];
                $_SESSION['User']['dateinscription_u'] = $unControleur->selectWhere("eleve", "id_u", $_SESSION['User']['id_u'])['dateinscription'];
                $formation = $unControleur->selectWhere("formule", "id_f", $_SESSION['User']['id_formation']);
                $_SESSION['formation'] = $formation;
            } elseif (!empty($_SESSION['Moniteur'])) {
                $_SESSION['Moniteur'] = $unControleur->verifConnection($_SESSION['Moniteur']['email_u'], sha1($new_password));
                $_SESSION['Moniteur']['dateembauche_u'] = $unControleur->selectWhere("moniteur", "id_u", $_SESSION['Moniteur']['id_u'])['dateembauche'];
            } elseif (!empty($_SESSION['Admin'])) {
                $_SESSION['Admin'] = $unControleur->verifConnection($_SESSION['Admin']['email_u'], sha1($new_password));
            }
            echo "<div class='col-md-3 alert alert-success'>Votre mot de passe a été modifié avec succes !<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                </svg> </span> </div>";
        }
    }
}

if (isset($_POST['MonitInfosChange'])) {
    if (empty($_POST['old_password']) || empty($_POST['new_password']) || empty($_POST['security_question']) || empty($_POST['security_answer'])) {
        echo "<div class='col-md-3 alert alert-danger'>Toutes les informations sont obligatoires.<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
            <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
            </svg> </span> </div>";
    } else {
        $old_password = sha1($_POST['old_password']);
        $new_password = $_POST['new_password'];
        if (!empty($_SESSION['User'])) {
            $currentPassword = $_SESSION['User']['mdp_u'];
        } elseif (!empty($_SESSION['Moniteur'])) {
            $currentPassword = $_SESSION['Moniteur']['mdp_u'];
        } elseif (!empty($_SESSION['Admin'])) {
            $currentPassword = $_SESSION['Admin']['mdp_u'];
        }
        if ($old_password != $currentPassword) {
            echo "<div class='col-md-3 alert alert-danger'>Ancien mot de passe est incorrect.<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                </svg> </span> </div>";
        } else {
            $unControleur->setTable("user");
            $tab = array("mdp_u" => $_POST['new_password'], "security_question" => $_POST['security_question'], "security_answer" => $_POST['security_answer']);
            $unControleur->update($tab, 'id_u', $_SESSION['Moniteur']['id_u']);
            $_SESSION['Moniteur'] = $unControleur->verifConnection($_SESSION['Moniteur']['email_u'], $_POST['new_password']);
            $_SESSION['Moniteur']['dateembauche_u'] = $unControleur->selectWhere("moniteur", "id_u", $_SESSION['Moniteur']['id_u'])['dateembauche'];
            echo
            "<div class='col-md-3 alert alert-success'>Vos informations ont été modifiées avec succes !<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                    <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
                    </svg> </span> </div>";
        }
    }
} else {
    if (isset($_SESSION['Moniteur'])) {
        if ($unControleur->selectWhere("user", "id_u", $_SESSION['Moniteur']["id_u"])["mdp_u"] == sha1("ValAuto123")) {
            echo "<div class='col-md-3 alert alert-danger'>Veuillez modifier votre mot de passe et vos questions de sécurité<span onclick='closeAlertDanger()'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-x-lg' viewBox='0 0 16 16'>
                <path d='M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z'/>
              </svg> </span> </div>";
        }
    }
}
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
$date = !empty($profil['dateprofil']) ? utf8_encode(strftime("%d %b %Y", strtotime($profil['dateprofil']))) : null;


?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon profil | Val'auto</title>
    <link rel="stylesheet" href="./css/profil.css">
</head>

<body>
    <?php
    $default = "https://cdn.pixabay.com/photo/2018/11/13/21/43/avatar-3814049_960_720.png";

    $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower(trim($profil['email']))) . "?d=" . urlencode($default);
    require_once("views/_navbar.php");
    ?>
    <div class="body d-flex justify-content-center">
        <div class="main">
            <div data-aos="fade-up" class="profil-container mt-5">
                <div class="profil-img">
                    <img class="rounded-circle" src="<?php echo $grav_url; ?>" alt="">
                </div>
                <div class="profil-name">
                    <p class="nom-prenom"><?php echo $profil['nom'] . ' ' . $profil['prenom'] ?></p>
                    <?php
                    if (!isset($_SESSION['Admin'])) {
                        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                        echo "
                    <p class='date-inscri'>
                        Actif depuis le $date
                    </p>";
                    }
                    ?>
                    <?php
                    if (isset($_SESSION['Moniteur'])) {
                        if ($unControleur->selectWhere("user", "id_u", $_SESSION['Moniteur']["id_u"])["mdp_u"] == sha1("ValAuto123")) {
                            echo '<button class="btn-reset-password" data-bs-toggle="modal" data-bs-target="#modalInfosMonit">Changer mes informations</button>';
                        } else {
                            echo '<button class="btn-reset-password" data-bs-toggle="modal" data-bs-target="#exampleModal">Changer mon mot de passe</button>';
                        }
                    } else {
                        echo '<button class="btn-reset-password" data-bs-toggle="modal" data-bs-target="#exampleModal">Changer mon mot de passe</button>';
                    }
                    ?>
                </div>
            </div>

            <div data-aos="fade-up" class="infos-container mt-5">
                <div class="ligne">
                    <div class="label">
                        <p>Nom Complet</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['nom'] . ' ' . $profil['prenom'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Email</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['email'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Téléphone</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['tel'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Adresse</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['adresse'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Ville</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['ville'] ?></p>
                    </div>
                </div>

                <div class="ligne">
                    <div class="label">
                        <p>Code Postal</p>
                    </div>
                    <div class="value">
                        <p><?php echo $profil['codepostal'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <button type="button" class="btn btn-primary rounded-0" data-bs-toggle="modal" data-bs-target="#form-modification-modal">
        Modifier le profil
    </button>



    <div class="modal fade" id="form-modification-modal" tabindex="-1" aria-labelledby="form-modification-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form-modification-modal-label">Modifier le profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <strong>Nom:</strong>
                        <input type="text" class="form-control" name="nom_u" placeholder="Nom" value="<?php echo $profil['nom']; ?>"><br>
                        <strong>Prénom:</strong>
                        <input type="text" class="form-control" name="prenom_u" placeholder="Prénom" value="<?php echo $profil['prenom']; ?>"><br>
                        <strong>Email:</strong>
                        <input type="email" class="form-control" name="email_u" placeholder="Email" value="<?php echo $profil['email']; ?>"><br>
                        <strong>Numéro de téléphone:</strong>
                        <input type="text" class="form-control" name="tel_u" placeholder="Téléphone" value="<?php echo $profil['tel']; ?>"><br>
                        <strong>Addresse</strong>
                        <input type="text" class="form-control" name="adresse_u" placeholder="Adresse" value="<?php echo $profil['adresse']; ?>"><br>
                        <strong>Ville:</strong>
                        <input type="text" class="form-control" name="ville_u" placeholder="Ville" value="<?php echo $profil['ville']; ?>"><br>
                        <strong>Code Postal:</strong>
                        <input type="text" class="form-control" name="codepos_u" placeholder="Code Postal" value="<?php echo $profil['codepostal']; ?>"><br>
                        <button type="submit" name="modifier_information" class="btn btn-primary mt-3">Enregistrer les modifications</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <?php
    if (isset($_SESSION['Moniteur'])) {
        if ($unControleur->selectWhere("user", "id_u", $_SESSION['Moniteur']["id_u"])["mdp_u"] == sha1("ValAuto123")) {
            require_once("views/_modalInfosMonit.php");
        } else {
            require_once("views/_modalResetPassword.php");
        }
    } else {
        require_once("views/_modalResetPassword.php");
    }
    ?>

    <?php
    require_once("views/_footer.php");
    ?>
</body>
<script>
    var btnModifier = document.getElementById('btn-modifier');
    var formModification = document.getElementById('form-modification');
    var isEditing = false;

    btnModifier.addEventListener('click', function() {
        if (!isEditing) {
            // Afficher le formulaire de modification et masquer les informations personnelles
            formModification.style.display = 'block';
            btnModifier.innerHTML = 'Annuler';
            isEditing = true;
        } else {
            // Masquer le formulaire de modification et afficher les informations personnelles
            formModification.style.display = 'none';
            btnModifier.innerHTML = 'Modifier';
            isEditing = false;
        }
    });
</script>
<script src="./Js/profil.js"></script>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>

</html>