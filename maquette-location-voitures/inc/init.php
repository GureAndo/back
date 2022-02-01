<?php
// PDO est une surcouche de PHP, surcouche d'abstraction, qui permet d'interagir avec la base de donnees.
//Nous disposerons ainsi de plusieurs function predefinipropres a la class PDO
//pour pouvoir les exploiter, je doit cree un objet $pdo de ma classe PDO
// je ne suis pas oubliger de l'appeler ainsi. vous trouverais parfois le nom $bdd. le plus importatn est quelle ai un nom cohérantt
//pour me conecter a la base de donnees je doit renseigner le host.Comme nous somme en local ca sera localhost
//le dbname ,c'est le nom de la base de donnees (nous avons choisi voiture)
//root et le nom du dbuser(identifiant utilisateur) en localhost
//les quotes vide '' son pour le mot de dbpassword(mot de passe pour la base de donnees) en local il doit rester vide pas de ndp
$pdo = new PDO('mysql:host=localhost;dbname=voiture','root', '',array(
    //dans ce tableau(array) ,je vais definir deux parametre 
    //le premier concerne le mode d'erreur que je veut recevoir en affichage lorsqu'il y en a . je choisi le mode warning
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
    // ci dessou je decide du type d'encodage que je veut vert la base de donnees (utf8, comme dans le doctype)
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// j'inisialise ici aussi ces deux variables, a vide(ne rien ecrire entre les qotes, meme pas un espace) car je vais en avoir besoin dans toute mes page du site
$erreur= '';
$content= '';