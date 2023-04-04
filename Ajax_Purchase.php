<?php
session_start();
require_once("controller/controleur.class.php");
require_once("controller/config_bdd.php");
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

if (!empty($_SESSION['typeBoite'])) { //On vérifie si la variable de session typeBoite existe, si oui on la set dans une variable, sinon on la set à null (Elle vient de la page purchase.php)
    $typeBoite = $_SESSION['typeBoite'];
} else {
    $typeBoite = null;
}

$unControleur->addFormuleToUser($_SESSION['User']['id_u'], $_SESSION['offre'], $_SESSION['lePrix'], $typeBoite); //On ajoute la formule à l'utilisateur avec les variables qui sont set dans la page purchase.php

$_SESSION['User'] = $unControleur->verifConnection($_SESSION['User']['email_u'], $_SESSION['User']['mdp_u']); //on met à jour les données de l'utilisateur
$_SESSION['User']['id_formation'] = $unControleur->selectWhere("eleve", "id_u", $_SESSION['User']['id_u'])['id_formation'];
$_SESSION['User']['dateinscription_u'] = $unControleur->selectWhere("eleve", "id_u", $_SESSION['User']['id_u'])['dateinscription'];

$_SESSION['formation'] = $unControleur->selectWhere("formule", "id_f", $_SESSION['User']['id_formation']); //on met à jour les données de la formation de l'utilisateur
echo json_encode(['success' => true]); //on renvoie un json pour dire que tout s'est bien passé à la fonction ajax qui vient de purchase.js
// unset($_SESSION['typeBoite']); //on supprime les variables de session qui ne sont plus utiles
// unset($_SESSION['lePrix']);
// unset($_SESSION['offre']);
