<?php
session_start();

if (!isset($protected)) {
    header("Location: index.php?page=0");
}


$_SESSION['total_PermisB'] = $_POST['total_PermisB'];

$_SESSION['total_PermisA'] = $_POST['total_PermisA'];

$_SESSION['total_Code'] = $_POST['total_Code'];

$_SESSION['FinalQuestions'] = $_POST['FinalQuestions'];
