<?php

session_start();

require_once('inc/header.inc.php');

echo "<h1 class = 'my-5 text- center'>Page Profil</h1>"; 

if(isset($_SESSION)){
    echo "bienvenue " . $_SESSION['prenom'] . ", vous aver le statut d' " . $_SESSION['statut'] . " sur ce site!";
}