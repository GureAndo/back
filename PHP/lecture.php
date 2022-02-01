<?php

// je declare une variable $nomFichier à laquelle j'affecte le fichier que je veux explorer
$nomFichier = "recupDonnees.txt";
//  file() est une fonction prédéfinie qui permet d'ouvrir un fichier et retourner son contenu sous la forme d'un tableau
// je lui donne en parametre mon fichier à explorer (affecté dans la variable $nomFichier)
// j'affecte ce résultat contenu dans un tableau désormais à la variable $folder
$folder = file($nomFichier);
// J'aurai pu ecrire ceci plus rapidement, sans la ligne 4
// $folder = file("recupDonnees.txt");
// mais beaucoup de développeur préfèrent l'autre logique, l'autre syntaxe, un peu plus longue, donc pour vous habituer... 

// j'affiche les informations contenues dans $folder avec un print_r
echo "<pre>"; print_r($folder); echo "</pre>";

// affichage conventionnel des données collectées grace à une boucle foreach
foreach($folder as $ligne){
    echo $ligne . "<br>";
}

// encore un autre affichage possible de ces données grace a implode
echo implode(' / ', $folder);