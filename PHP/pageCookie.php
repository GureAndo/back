<?php
require_once('inc/header.inc.php');
?>

<div>
     <!-- pour chaque drapeau je vais faire transiter via la balise <a> (dans son attribut  href) une valeur affiler a l'indice pays( pays=en, pays=es ect ...)-->
    <a href="?pays=en"><img src="img/england.png" loading="lazy" alt="drapeau de l'Angleterre"></a>

    <a href="?pays=es"><img src="img/spain.png" loading="lazy" alt="drapeau de l'Espagne"></a>

    <a href="?pays=dz"><img src="img/algeria.png" loading="lazy" alt="drapeau de l'Algérie"></a>
</div>

<?php
//je debute par un condition pour verifier si l'indice pays existe ou pas dans l'url. le isset est impotant ici  pour cela si je ne le met pas alors php s'attend a le trouver des le premiere chargement de la page ce qui ne sera pas possible (je n'ai pas encore clicker sur un drapeau ) il me renverrra donc un erreur warning
if(isset($_GET['pays'])){
    //si il trouve cette indice dans l'url il affectera alors a la var $pays la valeur de cet indice
    $pays = $_GET['pays'];
    //dans le else if je vais verifier un autre cas de figurecelui ou un cookie(qui porte le nom d'un pays) existe deja (deja cree lors d'une precedente visite sur le site)
}elseif(isset($_COOKIE['pays'])){
    // si ce cookie existe alors $pays se verra affecter de la valeur qui a ete stoker das le cookie
    $pays = $_COOKIE['pays'];
    // il reste le eles le cas ou encore aucune info n'a transiter sans l'url et aucun cookie existe
}else{
    //dans ce cas la variable $pays se verra affecter de la valeur 'fr', ce qui entrainera par le bias de ma condition switch l'affichage du mot bonjour
    $pays = 'fr';
}
//la fonction setcookie permet de cree le cookie
//elle demande 3  parametre. Dans l'ordre,le nom du cookie (pays) le nom de la veriable qui va stoquer la valeur du cookie($pays) et en dernier la durée de vie du cookie. ici ,c'est le calcule pour une durée de 1 ans
//avec time() je recupere la date d'aujourd hui exprimer en seconde et je lui additionne 3600 s(dans une heur)multiplier pas 24 heur(dans une journee) multiplieret 356( pour faire l'anee)
setcookie('pays',$pays, time() + 3600 * 24 * 365);
//desormais mon cookie est ree je peut le retrouver stoker dans mon navigateur et si je quite mon onglet voir meme le navigateur lors de ma prochaine visite sur le site $_COOKIE retrouvra l'existance de ce cookie et recupera la valeur strocker(le elseif de la confision au dessu )
//le cookie se regenere automatiquement pour une annee a chaque visite de votre part sur le site
//pour qu'il s'auto-detruise au bout de un ans il faudrais que vous n'allier plus sur le site durant toute cette periode 

//dans cette switch je vais tester ma variable $pays
switch($pays){

    case 'fr' :
        //dans le cas ou elle a été affecter de la valeur 'fr',(dans le else) il sera afficher boujour en acceuil
        echo"<h1>Bonjour</h1>";
        break;
        //dans le cas ou elle a été affecter de la valeur 'en' il sera afficher welcome en acceuil
    case'en': 
        echo"<h1>Welcome</h1>";
        break;
        //dans le cas ou elle a été affecter de la valeur 'es' il sera afficher hola en acceuil
    case 'es':
        echo"<h1>hola</h1>";
        break; 
        //dans le cas ou elle a été affecter de la valeur 'dz' il sera afficher salaam en acceuil      
    case 'dz':
        echo"<h1>salaam</h1>";
        break; 
        // toujours prevoir un defalut si ce cas n'est pas prevu 
    default:
        echo '<h1>Vous n\'avais choisi aucune langue</h1>';
        break;         
}



require_once('inc/footer.inc.php');
?>