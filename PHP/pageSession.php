<?php

session_start();

require_once('inc/header.inc.php');

$_SESSION["prenom"] = "Andô";
$_SESSION['statut'] = "user";

echo"<div>
<button class='btn btn-primary my-2'><a class='text-light' href='profil.php' target='_blank'>vers le profil</a></button>
</div>";

require_once('inc/footer.inc.php');
?>