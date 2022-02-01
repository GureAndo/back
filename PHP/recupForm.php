<?php

if($_POST){
    echo "<ul>";
    // pour récupérer les valeurs qui arrivent de 'netrainement.php, je fais appel à la superglobale $_POST
    // Comme $_GETet les autres superglobales, $_POST est un type array, d'où la syntaxe ci-dessous pour récupérer les valeurs avec l'indice entre []
        echo "<li>Prénom: $_POST[prenom]</li>";
        echo "<li>Description: $_POST[description]</li>";
        echo "<li>Année de naissance: $_POST[annee]</li>";
    echo "</ul>";

    // fopen() permet d'ouvrir un fichier
    // prend deux arguments. Le premier, le nom du fichier. le second, le mode d'ouverture (ici a )
    // le mode d'ouverture a permet d'ouvrir un fichier, mais s'il n'existe pas encore, il va le créer
    // j'affecte le résultat de cette opération (ouvrir fichier en mode a) dans une variable que je nomme $fichier
    $fichier = fopen('recupDonnees.txt', 'a');
    // fwrite() me permet d'ecrire dans ce fichier
    // elle prend aussi deux arguments,le premier c'est le fichier ouvert (ici $fichier), le second argument sera le contenu a ecrire dans le fichier.
    // le \n en fin de string est un équivalent de <br>, retour à la ligne
    fwrite($fichier, "Prénom: " . $_POST['prenom'] . "\n");
    fwrite($fichier, "Description: " . $_POST['description'] . "\n");
    fwrite($fichier, "Année de naissance: " . $_POST['annee'] . "\n");
    // la ligne ci dessous me sert de séparateur entre chaque nouvel envoi du formulaire par un nouvel utilisateur
    fwrite($fichier, "-----------------------\n");
    // fclose() va fermer le fichier, avec en argument, le fichier a fermer
    $fichier = fclose($fichier);
}
