<?php

// j'ouvre mon script avec cette condition de manière à ne pas avoir d'erreur/warning php dans le cas où aucune information n'aura transité dans l'URL
if($_GET){
    // Pour récupérer les valeurs transitées via l'URL, je fais appel à la Superglobale $_GET
    // C'est une variable de type tableau, et c'est pour cela que je crochète à l'indice désiré pour récupérer la valeur de cet indice
    echo $_GET['produit'] . " au " . $_GET['variete'] . "<br>";
    echo "Vendu " . $_GET['prix'] . " €, aujourd'hui seulement";
}