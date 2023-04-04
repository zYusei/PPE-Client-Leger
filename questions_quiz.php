<?php
session_start();

require_once("controller/config_bdd.php");
require_once("controller/controleur.class.php");
$unControleur = new Controleur($serveur, $bdd, $user, $mdp);

$questions = $unControleur->selectAll("questions_quiz");

$json_questions = json_encode($questions, JSON_UNESCAPED_UNICODE);
echo $json_questions;