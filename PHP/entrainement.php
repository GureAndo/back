<?php
//chapitre 1 affichage 
print "bjr <br>";
// ces deux instruction servent a afficher du contenu. mais on va utiliser tout le temps echo plus rapide a l'execution.
echo "bjr <br>";
// je peut aussi afficher avec de simple quote pas obligatoirment des des double quote 
// je doit terminer toute les instruction avec ; obligatoire
echo 'salut';
?>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit provident accusamus fuga laborum? Nihil molestiae quae temporibus id, iure quidem distinctio doloremque tempora optio cum, non consectetur repellendus blanditiis eum!</p>
<!-- cette syntaxe correspond a une passage PHP contracté
nous l'utiliserons moin, mais il sera tres utile pour des cas particularité dans un passage contracté, je n'ai pas besoin de l'instruction echo pour obtenir un affichage-->
<?= 'c lundi'?>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit provident accusamus fuga laborum? Nihil molestiae quae temporibus id, iure quidem distinctio doloremque tempora optio cum, non consectetur repellendus blanditiis eum!</p>

<?php
// permet d'ecrire un commentaire sur un ligne

/*permet d'ecrire du comentaire
sur plusieur 
lignes*/

// je mélange des balise html dans du php

echo '<strong> c l annee 2020</strong>';
echo "<h1>c'est l'acceuil de mon site </h1>";

?>
<!-- // attention cependant a ne pas faire d'allers retours de l'un vers l'autre tel que ci dessous -->
<h1><?php echo'ceci est ma premiere page'?></h1>

<?php


//Chapitre 2 les variables
// je nome ma veriable 
//le lui affectune une valeur grace au signe égal
$prenom = 'Fred  <br>';
echo $prenom;
// une variable ne peut d'ebuter par un chiffre (il peut y en avoir un par la suite , mais pas au debut)SI ELLE COMMENCE PAR UN CHIFFRE , tout le code sera interompu, erreur fatal
// pas de chara speciaux le code fonctionnera, mais par convention, pas d'accent, de @ ect...
// donner un nom pertinaent a vos variables. que l'on comprenne tres vite de quelles valeure elle contenir
// si vous composer pour la var ,vous pouvais utilierser le snack_case ,mais plus souven le camelCase (par contre pas de tiret du 6 ou d'espace entre les deux )
$couleur = 'orange';
//je peut changer la valeur d'un var
$prenom = 'aziz <br>';
// Attention , le nom d'une var est sensible a la case cela veut dire que si en dessous j'ecris echo $prenoms, ce nom ne sera pas reconnu  car je l'ai devlaré sans le s au prealable
echo $prenom;
// les type de variable

$prenom = 'fred';
$entier = 23;
$decimal = 2.52;
$booleen = TRUE;

echo gettype($prenom) . "<br>";
echo gettype($entier) . "<br>";
echo gettype($decimal) . "<br>";
echo gettype($booleen) . "<br>";

// les constantes

// la const doit etre declaree avec la fonction predefini define()
//le 1er argument qu'elle attend est le nom de cette const. obligatoirment ecrit en maj
//le segond argument sera la valeurs de la const ici Gonesse 
define('VILLE', 'Gonesse');
echo VILLE . '<br>';
// contrairment a kla variable ,je ne peux lui reafecter une nouvelle valeur
//cela generera un warning php constant VILLE already defined
// define('VILLE', 'paris');
// echo VILLE;


// je choisisrais la const plutot que la var , si je veut proteger cette valeur de toute modificationulterieur. si je suis sur que cette valeur sera la meme quelq ue soit x, et si en plus je doit empecher quiquonque de la modifier par megarde, alors je vais l'affecter a une const
//ce sera la cas par example pour le chemain vert un dossier ou je veut uploader tout les photo necessaire au bon fonctionnement de mon site.
// ce sera le chemain vers mon doss /img/ tout le temps et pas ailleurs.
//alors, autant protéger ce chemain dans une const


// les constantes magique 

echo __FILE__ . "<br>";
echo __LINE__ . '<br>';

// chapitre 3 concaténation et syntaxe 

echo "je m'apelle ", $prenom, ' et ma couleur préférée est le ', $couleur,  "<br>";
//je peux concaténer avec une virguel ou un point le resultat sera similaire mais en general c'est le point qui et le plus utiliser
echo "je m'apelle ". $prenom, ' et ma couleur préférée est le '.$couleur ."<br>";

// concatenation par affectation
$nombre1 = 45;
$nombre2 = 36;
// .= permet de concaténer par affectation . je concatenne avec le point et j'affecte un nouvelle valeurs avec le = 
echo $nombre1 .= $nombre2;
// attention en faisent cela vous perdez la valeur premiere ne $ nombre 1 (qui etais 45)
// verifier le avec le echo ci dessou
echo $nombre1 .'<br>';
// si vous avez besoin de conserver la valeur d'origine ,alors il faudrais mieux declarer une nouvelle variable qui prendra la valeur concatener comme si dessou 
// $nombre 3 = $nombre 1 . $nombre 2;

// differance entre simple quotes et doubles quotes 

echo "Aujourd'hui c'est lundi <br>";
//les deux permmettent de la meme maniere d'afficher une chaine de chara. par contre, vous aurez parfois besoin d'utiliser un \ caractere d'echappement pour que votre code continue a etre valide. voir ce dessous. sans les \ php pence que je ferme ma chaine de chara alors que c'est une apostrophe dans le mot ajourd'hui.
echo 'Aujourd\'hui c\'est lundi <br>';

// autre differance
echo 'ton prenom est $prenom <br> ' ;
// selon que j'utilise des double ou de simple quotes, ma var ser interpreter dans cas des double mais pas dans le cas des simple, elle devient un simple element de la chaine de chara
echo "ton prenom est $prenom <br> " ;

//Chapitre 4  les operateur ahrithmetiques

$premierNombre = 4;
$secondNombre =2;

//  je peux proceder a des calcul de maniere tres simple , en applant mes var .
echo $premierNombre + $secondNombre ."<br>";
echo $premierNombre - $secondNombre ."<br>";
echo $premierNombre / $secondNombre ."<br>";
echo $premierNombre * $secondNombre ."<br>";

// il existe deux autre , le modulo et l'exponentiation

//le modulo permet de connaitre le reste de la division
echo $premierNombre % $secondNombre ."<br>";
// l'exponentiation permet d'affecter la puissance du segond au premier. dans ce cas ci, 4 puissance 2 ou 4au carré
echo $premierNombre ** $secondNombre ."<br>";

// je peux aussi faire des operation avec des operateur d'affectation (+=, -=, *= ,/=)
//attention , comme pour tout a l'heure avec .= c'est pas une simple operation. j'ai reafecter automatiquement une nouvelle valeur et je perd donc c'elle d'origine.
//le <br> n'est pas concaténer a la suite mais posisioné en dessous volontermentpour ne pas generer un warning php (faite le teste en le concatenant).
echo $premierNombre += $secondNombre;
echo "<br>";

// Chapitre 5 les condition

$a = 22;
$b = 30;
$c = 48;
$d = 55;
$e = 60;
 
// premiere condision if/else

// dabns cette condition je demande a verifier si a est supperieur à b
if($a > $b){
    // si c'est le cas, alors il va m'afficher le msg ci-dessous
    //c'est le premier block d'instruction.il va entrer entre les acoloade
    echo "vrais $a est bien supperieur a $b";
    // si en revanche ce n'est oas vrais , alors il va entrer dans le else
}else{
    // pour m'afficher le msg du else
    //second block d'instruction , entre dans les acolade du else.
    echo 'faux $a n \'est pas supperieur a  $b <br>';
}

// noter que je suis pas oubliere de coder le else. je peut lui demander de verifier la condition, et si elle et vrais , m'afficher le 1er msg. mais si elle se verifie pas ,lui de son coté, il ne fera rien. je ne suis pas oubliger de coder la porte de sortie (le else). il devient implicite ...... tu ne fait rien, tu t'en fiche. cela peut arriver de ne pas coder le else.

// seconde condition avec le comparateur  && (AND)
//&& oblige a ce que les 2 condition soit vrais pour qu'il entre dans le TRUE
if($a  > $b && $b < $c){
    echo 'vrais les deux condition sont verifier';
}else{
    //a n'etaunt toujours pas supperieur a b, ememe si c'est b est bien inferieur à c , alors il va entrer dans le FALSE (else)
    echo" faut, au moins une des deux condition n'est pas verifier <br>";
}



