<?php

//par défaut on met le mois et l'année actuel pour les boutons du calendrier
if (isset($_POST['mois'])) {
    $mois = $_POST['mois'];
} else {
    $mois = date('m');
}

if (isset($_POST['annee'])) {
    $annee = $_POST['annee'];
} else {
    $annee = date('Y');
}

$heuresAValider = $unControleur->selectWhere2("planning", "id_m", $_SESSION['Moniteur']['id_u'], "etat", "En attente user");

$heures = $unControleur->selectHeuresMonit("planning", "id_m", $_SESSION['Moniteur']['id_u'], "etat", "En attente user", $mois, $annee);

$toutesLesHeures = $unControleur->selectAllHeuresMonit("planning", $_SESSION['Moniteur']['id_u']);


if (isset($_POST['AccepterHeure'])) {
    $unControleur->setTable("planning");
    $tab = array(
        "etat" => "Valider"
    );
    $unControleur->update($tab, 'id_cc', $_POST['AccepterHeure']);

    header("location: index.php?page=2");
}

if (isset($_POST['ProposerHeure'])) {
    $dateDebut = new DateTime($_POST['datehd'] . " " . $_POST['heurehd']);

    $heureF = $dateDebut->format('H:i:s');
    $heureF = date('H:i:s', strtotime($heureF . ' + ' . $_POST['heurehf'] . ' minutes'));

    $dateFin = new DateTime($_POST['datehd'] . " " . $heureF);

    $unControleur->setTable("planning");
    $tab = array(
        "datehd" => $dateDebut->format('Y-m-d H:i:s'),
        "datehf" => $dateFin->format('Y-m-d H:i:s'),
        "etat" => "En attente moniteur"
    );
    $unControleur->update($tab, 'id_cc', $_POST['idhd']);

    header("location: index.php?page=2");
}

if (isset($_POST["AnnulerHeure"])) {
    $unControleur->setTable("planning");
    $tab = array(
        "etat" => "Annuler",
        "motifAnnulation" => $_POST["motifAutre"] != "" ? $_POST["motifAutre"] : $_POST["motif"]
    );

    $id_v = $unControleur->selectWhere("cours_conduite", "id_cc", $_POST["id_cc"])["id_v"];

    // $tab2 = array(
    //     "id_v" => $id_v,
    //     "annee_mois" = date()

    // );

   
    $unControleur->update($tab, 'id_cc', $_POST['id-cc']);

    header("location: index.php?page=2");
}

if(isset($_POST['btnSubmitNbkm'])){
    $unControleur->setTable("planning");
    $tab = array(
        "NbkmStatus" => 1
    );
    $unControleur->update($tab, 'id_cc', $_POST['id_cc']);

    header("location: index.php?page=2");
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
            <div class="row justify-content-between">
                <div data-aos="fade-up" class="col-xl-5 p-3 border rounded-3 text-center my-2 bg-white">
                    <h5 class="text-center fw-bold text-dark pt-3"> Heures à valider </h5>
                    <?php
                    if ($heuresAValider != null) {
                        $first = true;
                        foreach ($heuresAValider as $uneHeure) {
                            $eleve = $unControleur->selectWhere("user", "id_u", $uneHeure['id_e']);

                            $date = date("d-m-Y", strtotime($uneHeure['datehd']));
                            $dateInput = date("Y-m-d", strtotime($uneHeure['datehd']));

                            //transforme la date en lettres et en français en majuscules
                            setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                            $jour = substr(strtoupper(strftime("%A", strtotime($date))), 0, 3) . ".";
                            $jour_chiffres = substr($date, 0, 2);
                            $moisHeure = utf8_encode(strtoupper(strftime("%b", strtotime($date))));
                            // strlen($moisHeure) > 4 ? $moisHeure = substr($moisHeure, 0, 4) . "." : $moisHeure = $moisHeure;

                            $dureeHeure = floor((strtotime($uneHeure['datehf']) - strtotime($uneHeure['datehd'])) / 3600);
                            $dureeMinute = (strtotime($uneHeure['datehf']) - strtotime($uneHeure['datehd'])) / 60;
                            $dureeMinute = $dureeMinute - ($dureeHeure * 60);
                                echo
                                "
                            <div class='col-12 p-3'>
                                <div class='row'>
                                    <div class='col-2'>
                                        <div class='col-auto text-center";
                                echo ($first) ? " bg-green " : " bg-light-grey ";
                                echo "rounded-4 d-flex flex-column justify-content-center'>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'><small> $jour </small></p>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'> $jour_chiffres </p>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'> $moisHeure </p>
                                        </div>
                                    </div>
                                    <div class='col-10 my-auto'>
                                        <div class='row'>
                                            <div class='col-12 bg-grey rounded d-flex'>
                                                <div>
                                                    <h5 class='text-start fs-6 fw-bold text-dark pt-1'> Session de conduite <span class='fw-normal'>(Élève : $eleve[nom_u] $eleve[prenom_u])</span> </h5>
                                                    <h6 class='text-start fw-bold text-dark'> $dureeHeure.$dureeMinute" . "h (" . date("H:i", strtotime($uneHeure['datehd'])) . " - " . date("H:i", strtotime($uneHeure['datehf'])) . ")</h6>
                                                </div>
                                                <div class='align-self-center ms-auto d-flex'>
                                            <form method='POST'>
                                                <label class='pointer scale-label'>
                                                <input type='submit' name='AccepterHeure' class='d-none' value='$uneHeure[id_cc]'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='green' class='bi bi-check' viewBox='0 0 16 16'>
                                                    <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                                                    </svg>
                                                </label>
                                            </form>
                                                <label class='pointer scale-label'>
                                                <button class='d-none Proposition' data-bs-toggle='modal' data-bs-target='#modalRefusMonit' data-idhd='$uneHeure[id_cc]' data-datehd='$dateInput'>
                                                    Demander une heure
                                                </button>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='red' class='bi bi-x' viewBox='0 0 16 16'>
                                                <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                                </svg>
                                                </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>";
                            $first = false;
                        }
                    } else {
                        echo "
                        <div class='col-12 p-3 mt-5 text-center'>
                        <h5> Aucune heure à valider 😪 </h5>
                        </div>
                        ";
                    }
                    ?>
                </div>
                <div data-aos="fade-up" class="col-xl-5 p-3 border rounded-3 my-2 bg-white">
                    <div class="row mx-auto">
                        <div class="col-1 my-auto">
                            <div class="border border-dark rounded text-center pointer" onclick="changeMonth(-1);document.getElementById('filtreMois').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-1 my-auto">
                            <div class="border border-dark rounded text-center pointer" onclick="changeMonth(1);document.getElementById('filtreMois').submit();">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </div>
                        </div>
                        <div class="col-3">
                            <form id="filtreMois" method="POST">
                                <h5>
                                    <select name="mois" id="mois" class="form-select pointer">
                                        <option value="1" <?php if ($mois == 1) echo "selected" ?>>Janvier</option>
                                        <option value="2" <?php if ($mois == 2) echo "selected" ?>>Février</option>
                                        <option value="3" <?php if ($mois == 3) echo "selected" ?>>Mars</option>
                                        <option value="4" <?php if ($mois == 4) echo "selected" ?>>Avril</option>
                                        <option value="5" <?php if ($mois == 5) echo "selected" ?>>Mai</option>
                                        <option value="6" <?php if ($mois == 6) echo "selected" ?>>Juin</option>
                                        <option value="7" <?php if ($mois == 7) echo "selected" ?>>Juillet</option>
                                        <option value="8" <?php if ($mois == 8) echo "selected" ?>>Août</option>
                                        <option value="9" <?php if ($mois == 9) echo "selected" ?>>Septembre</option>
                                        <option value="10" <?php if ($mois == 10) echo "selected" ?>>Octobre</option>
                                        <option value="11" <?php if ($mois == 11) echo "selected" ?>>Novembre</option>
                                        <option value="12" <?php if ($mois == 12) echo "selected" ?>>Décembre</option>
                                    </select>
                                </h5>
                        </div>
                        <div class="col-3">
                            <h5>
                                <select name="annee" id="annee" class="form-select pointer">
                                    <option value="2021" <?php if ($annee == 2021) echo "selected" ?>>2021</option>
                                    <option value="2022" <?php if ($annee == 2022) echo "selected" ?>>2022</option>
                                    <option value="2023" <?php if ($annee == 2023) echo "selected" ?>>2023</option>
                                    <option value="2024" <?php if ($annee == 2024) echo "selected" ?>>2024</option>
                                    <option value="2025" <?php if ($annee == 2025) echo "selected" ?>>2025</option>
                                    <option value="2026" <?php if ($annee == 2026) echo "selected" ?>>2026</option>
                                    <option value="2027" <?php if ($annee == 2027) echo "selected" ?>>2027</option>
                                    <option value="2028" <?php if ($annee == 2028) echo "selected" ?>>2028</option>
                                    <option value="2029" <?php if ($annee == 2029) echo "selected" ?>>2029</option>
                                    <option value="2030" <?php if ($annee == 2030) echo "selected" ?>>2030</option>
                                </select>
                            </h5>
                            </form>
                        </div>
                        <div class="col-4 text-center text-green">
                            <!-- Button trigger modal -->
                            <button id="AffTout" type="button" class="rounded border-0 bg-green text-white col-12" data-bs-toggle="modal" data-bs-target="#modalToutesLesHeures">
                                Afficher tout
                            </button>

                            <!-- require_once('./views/_modalToutesHeuresMonit.php'); -->

                        </div>
                    </div>
                    <div class="row mx-auto max-height overflow-auto">
                        <?php
                        $first = true;
                        foreach ($heures as $heure) {
                            $eleve = $unControleur->selectWhere("user", "id_u", $heure['id_e']);
                            $date = date("d-m-Y", strtotime($heure['datehd']));

                            if (date("m", strtotime($date)) == $mois) {

                                //transforme la date en lettres et en français en majuscules
                                setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                $jour = substr(strtoupper(strftime("%A", strtotime($date))), 0, 3) . ".";
                                $jour_chiffres = substr($date, 0, 2);
                                $moisHeure = utf8_encode(strtoupper(strftime("%b", strtotime($date))));
                                // strlen($moisHeure) > 4 ? $moisHeure = substr($moisHeure, 0, 4) . "." : $moisHeure = $moisHeure;

                                $dureeHeure = floor((strtotime($heure['datehf']) - strtotime($heure['datehd'])) / 3600);
                                $dureeMinute = (strtotime($heure['datehf']) - strtotime($heure['datehd'])) / 60;
                                $dureeMinute = $dureeMinute - ($dureeHeure * 60);


                                echo "
                            <div class='col-12 p-3'>
                                <div class='row'>
                                    <div class='col-2'>
                                        <div class='col-auto text-center";
                                echo ($first) ? " bg-green " : " bg-light-grey ";
                                echo "rounded-4 d-flex flex-column justify-content-center'>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'><small> $jour </small></p>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'> $jour_chiffres </p>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'> $moisHeure </p>
                                        </div>
                                    </div>
                                    <div class='col-10 my-auto'>
                                        <div class='row'>
                                            <div class='col-12 bg-grey rounded d-flex'>
                                                <div>
                                                    <h5 class='text-start fs-6 fw-bold text-dark pt-1'> Session de conduite <span class='fw-normal'>(Élève : $eleve[nom_u] $eleve[prenom_u])</span></h5>
                                                    <h6 class='text-start fw-bold text-dark'> $dureeHeure.$dureeMinute" . "h (" . date("H:i", strtotime($heure['datehd'])) . " - " . date("H:i", strtotime($heure['datehf'])) . ")</h6>
                                                </div>
                                                <div class='align-self-center ms-auto'>
                                                    ";
                                if ($heure['etat'] == "Valider") {
                                    echo
                                    "<div title='Validée'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='green' class='bi bi-check' viewBox='0 0 16 16'>
                                            <path d='M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z'/>
                                        </svg></div>";
                                } elseif ($heure['etat'] == "Refuser") {
                                    echo "<div title='Refusée'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='red' class='bi bi-chat-left-text' viewBox='0 0 16 16'>
                                            <path d='M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
                                            <path d='M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
                                          </svg></div>";
                                } elseif ($heure['etat'] == "Annuler") {
                                    echo "<div title='Annulée, $heure[motifAnnulation]'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='red' class='bi bi-x' viewBox='0 0 16 16'>
                                                <path d='M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z'/>
                                            </svg></div>";
                                } elseif ($heure['etat'] == "Effectuer") {
                                    echo "<div class='d-flex align-items-center'>";

                                    //si la date_diff() est > 7 jours
                                    if (date_diff(date_create(date("Y-m-d")), date_create($heure['datehf']))->format("%a") <= 15) {
                                        echo
                                        "
                                        <button type='button' class='btn btn-link text-danger text-decoration-none Annuler' data-bs-toggle='modal' data-id_cc='$heure[id_cc]' data-bs-target='#modalAnnulerHeure'>
                                            Annuler
                                        </button>";
                                    }
                                    echo
                                    "<div title='Effectuée'><svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' fill='green' class='bi bi-check-all' viewBox='0 0 16 16'>
                                        <path d='M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z'/>
                                    </svg></div>
                                    </div>";
                                } elseif ($heure['etat'] == "En attente moniteur") {
                                    echo "<div title='En attente réponse moniteur'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='orange' class='bi bi-hourglass-split' viewBox='0 0 16 16'>
                                                                <path d='M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z'/>
                                                                </svg></div>";
                                }
                                echo "
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>";
                            }
                            $first = false;
                        }

                        if (empty($heures)) {
                            echo "
                            <div class='col-12 p-3 text-center mt-5'>
                            <h5> Aucune heure de conduite pour ce mois 😪 </h5>
                            </div>
                            ";
                        }
                        ?>

                    </div>
                </div>
                <div data-aos="fade-up" class="p-3 border rounded-3 my-2 bg-white">
                <?php
                        $first = true;
                        $toutesLesHeuresSansNbmk = array_filter($toutesLesHeures, function($heure) {
                            return $heure['NbkmStatus'] == 0 && $heure['etat'] == "Effectuer";
                        });
                        if(empty($toutesLesHeuresSansNbmk)){
                            echo "
                            <div class='col-12 text-center mt-1'>
                            <h5> Aucune heure de conduite à completer 😪 </h5>
                            </div>
                            ";
                        }else{
                        foreach ($toutesLesHeuresSansNbmk as $heure) {
                            if($heure['NbkmStatus'] == 0){
                            $eleve = $unControleur->selectWhere("user", "id_u", $heure['id_e']);
                            $date = date("d-m-Y", strtotime($heure['datehd']));


                                //transforme la date en lettres et en français en majuscules
                                setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
                                $jour = substr(strtoupper(strftime("%A", strtotime($date))), 0, 3) . ".";
                                $jour_chiffres = substr($date, 0, 2);
                                $moisHeure = utf8_encode(strtoupper(strftime("%b", strtotime($date))));
                                // strlen($moisHeure) > 4 ? $moisHeure = substr($moisHeure, 0, 4) . "." : $moisHeure = $moisHeure;

                                $dureeHeure = floor((strtotime($heure['datehf']) - strtotime($heure['datehd'])) / 3600);
                                $dureeMinute = (strtotime($heure['datehf']) - strtotime($heure['datehd'])) / 60;
                                $dureeMinute = $dureeMinute - ($dureeHeure * 60);


                                echo "
                            <div class='col-12 p-3'>
                                <div class='row'>
                                    <div class='col-2'>
                                        <div class='col-auto text-center";
                                echo ($first) ? " bg-green " : " bg-light-grey ";
                                echo "rounded-4 d-flex flex-column justify-content-center'>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'><small> $jour </small></p>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'> $jour_chiffres </p>
                                            <p class='p-0 m-0";
                                echo ($first) ? " text-white " : "";
                                echo "'> $moisHeure </p>
                                        </div>
                                    </div>
                                    <div class='col-10 my-auto'>
                                        <div class='row'>
                                            <div class='col-12 bg-grey rounded d-flex justify-content-between align-items-center'>
                                                <div>
                                                    <h5 class='text-start fs-6 fw-bold text-dark pt-1'> Session de conduite <span class='fw-normal'>(Élève : $eleve[nom_u] $eleve[prenom_u])</span></h5>
                                                    <h6 class='text-start fw-bold text-dark'> $dureeHeure.$dureeMinute" . "h (" . date("H:i", strtotime($heure['datehd'])) . " - " . date("H:i", strtotime($heure['datehf'])) . ")</h6>
                                                </div>
                                                <form class='d-flex col-4' method='POST'>
                                                    <input type='number' name='nbkm' id='nbkm' class=' form-control' placeholder='Nombre de km effectués'>
                                                    <input type='hidden' name='id_cc' id='id_cc' value='$heure[id_cc]'>
                                                    <button type='submit' class='btn btn-success ms-3' name='btnSubmitNbkm'>Valider</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                            </div>";
                            $first = false;
                            }
                        }
                    }
                        ?>
                </div>
            </div>
        </div>
    </main>
    <?php
    require_once('./views/_modalRefusMonit.php');
    require_once('./views/_modalAnnulerHeure.php');
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
<script src="Js/Account.js"></script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // listener click sur tous les boutons ayant la classe Proposition (croix rouge dans la liste des heures à valider)
    $(document).on("click", ".Proposition", function() {
        // récupère la valeur de data-idhd dan le boutton
        var id = $(this).data('idhd');
        // met la valeur de id dans le champ idhd du modal (champ caché nécessaire pour le update)
        $(".modal-body #idhd").val(id);

        // récupère la valeur de data-datehd dans le boutton
        var date = $(this).data('datehd');
        // met la valeur de date dans le champ datehd du modal
        $(".modal-body #datehd").val(date);
    });

    // listener click sur tous les boutons ayant la classe Annuler (croix rouge dans la liste des heures à valider)
    $(document).on("click", ".Annuler", function() {
        // récupère la valeur de data-idhd dan le boutton
        var id = $(this).data('id_cc');
        // met la valeur de id dans le champ idhd du modal (champ caché nécessaire pour le update)
        $(".modal-body-refus #id-cc").val(id);
    });
</script>