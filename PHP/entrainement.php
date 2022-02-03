<?php
//------------------------------------------------------------
// session_start () permet de cree une session , ou de la reouvrir. Cette declaration doit se faire obligatoirment tout en haut du fichier , avant le doctype sinon cela generera un bug 
session_start();

//session_unset est une autre fonction predefini liee aux session. elle permet de videe un fichier session d'une ou toute les finformation qui y sont contenue
session_unset();

//celle ci permet de detruire le fichier dans son ensemble pas que les infomation qu'il contient
session_destroy();

//------------------------------------------------------------


require_once('inc/header.inc.php');

// Chapitre 1 Affichage

print "Bonjour <br>";
// ces deux instructions servent a afficher du contenu. Mais on va utiliser tout le temps echo. Plus rapide à l'exécution
echo "Bonjour <br>";
// je peux aussi afficher avec des simple quotes. Pas obligatoirement des doubles quotes
// je dois terminer toutes mes instructions avec le ;. Obligatoire
echo 'Salut <br>';

?>

<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit ipsam voluptatibus quisquam non pariatur cumque nisi temporibus accusantium, aliquam sint nesciunt tempora in modi distinctio repudiandae incidunt quidem quod deleniti?</p>
<!-- Cette syntaxe correspond a un passage PHP contracté
Nous l'utiliserons moins, mais il sera très pratique pour des cas particulier
Dans un passage contracté, je n'ai pas besoin de l'instruction echo pour obtenir un affichage -->
<?= "C'est lundi <br>" ?>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Fugit ipsam voluptatibus quisquam non pariatur cumque nisi temporibus accusantium, aliquam sint nesciunt tempora in modi distinctio repudiandae incidunt quidem quod deleniti?</p>

<?php

// permet d'ecrire un commetaire sur une ligne

/* permet d'ecrire du commentaire
sur plusieurs lignes*/

// je mélange des balises html dans du php
echo "<strong>C'est l'année 2022</strong>";
echo "<h1>C'est l'accueil de mon site</h1>";
?>
<!-- attention cependant à ne pas faire trop d'allers retours de l'un vers l'autre tel que ci-dessous. C'est le début d'un code "sale" -->
<h1><?php echo"Ceci est ma première page" ?></h1>

<?php

// Chapitre 2 les variables
// je nomme ma variable.
// Je lui affecte une valeur grace au signe égal
$prenom = "Fred <br>";
echo $prenom;
// Une variable ne peut débuter par un chiffre (il peut y en avoir un par la suite, mais pas au début).Si elle commence par un chiffre, tout le code sera interrompu, erreur fatale.
// pas de caractères spéciaux. Le code fonctionnera, mais par convention,pas d'accent, de @ de / etc...
// donner un nom pertinent a vos variables. Que l'on comprenne très vite quelles valeurs elles vont contenir
// Si vous avec un nom composé pour la variable, vous pouvez utliser le snake_case, mais plus souvent le camelCase (par contre, pas de tiret du 6 entre les deux mots ou un espace)
$couleur = "orange";

// je peux changer la valeur de ma variable.
$prenom = "Aziz <br>";
// Attention, le nom d'une variable est sensible à la casse. Cela veut dire que si en dessous j'ecris echo $prenoms, ce nom ne sera pas reconnu, car je l'ai declaré au préalable sans le s à la fin
echo $prenom;

// les types de variables

$prenom = "Fred";
$entier = 23;
$decimal = 2.52;
$booleen = TRUE;

echo gettype($prenom) . "<br>";
echo gettype($entier) . "<br>";
echo gettype($decimal) . "<br>";
echo gettype($booleen) . "<br>";

// les constantes

// la constante doit etre declarée avec la fonction prédéfinie define()
// le premier argument qu'elle attend est le nom de cette constante. Obligatoirement ecrit en majuscules
//  le second argument sera la valeur de la constante, ici, Gonesse
define('VILLE', 'Gonesse');
echo VILLE . "<br>";

// contrairement à la variable, je ne peux lui réaffecter une nouvelle valeur.
// Cela générera un warning php Constant VILLE already defined
// define('VILLE', 'Paris');
// echo VILLE;

// Je choisirai la constante plutot que la variable, si je veux protéger cette valeur de toute modification ultérieure. Si je suis sur que cette valeur sera la même qlq soit x, et si en plus je dois empecher quiconque de la modifier par mégarde, alors je vais l'affecter à une constante
// ca sera le cas par exemple pour le chemin vers le dossier ou je veux uploader toutes les photos nécessaires au bon fonctionnement de mon site.
// ca sera le chemin vers mon dossier /img/ tout le temps et pas ailleurs.
// Alors, autant protéger ce chemin dans une constante

// les constantes magiques

echo __FILE__ . "<br>";
echo __LINE__ . "<br>";

// Chapitre 3 Concaténation et syntaxe

echo "Je m'appelle " , $prenom , " et ma couleur préférée est le " , $couleur , "<br>";
// je peux concaténer avec une virgule ou un point, le résultat sera similaire. Mais en général c'est le point qui est utilisé massivement
echo "Je m'appelle " . $prenom . " et ma couleur préférée est le " . $couleur . "<br>";

// Concaténation par affectation

$nombre1 = 45;
$nombre2 = 36;
// .= permet de concaténer par affectation. Je concatène avec le point, et j'affecte une nouvelle valeur avec le égal
echo $nombre1 .= $nombre2 . "<br>";
// attention, en faisant cela, vous perdez la valeur première de $nombre1 (qui était 45)
// vérifiez le avec le echo ci-dessous
echo $nombre1 . "<br>";
// si vous avez besoin de conserver  la valeur d'origine, alors il faudrait mieux declarer une nouvelle variable qui prendra la valeur concaténée comme ci-dessous
// $nombre3 = $nombre1 . $nombre2;

// Différence entre simples quotes et doubles quotes
echo "Aujourd'hui c'est lundi <br>";
// les deux permettent de la même manière d'afficher une chaine de caractères. Par contre, vous aurez parfois besoin d'un \ caracrtère d'échappement pour que votre code continue a etre valide. Voir ci-dessous. Sans les \, php pense que je ferme ma chaine de caractère alors que c'est une apostrophe dans le mot aujourd'hui.
echo 'Aujourd\'hui c\'est lundi <br>';

// Autre différence

echo "Ton prénom est $prenom <br>";
// selon que j'utilise des doubles ou simples quotes, ma variable sera interprétée dans le premier cas. Mais pas dans le deuxième, elle devient un simple élément de la chaine de carctères
echo 'Ton prénom est $prenom <br>';

// Chapitre 4 les opérateurs arithmétiques

$premierNombre = 4;
$secondNombre = 2;

// je peuxprocédr a des calculs de manière très simple, en appelant mes variables.
echo $premierNombre + $secondNombre . "<br>";
echo $premierNombre - $secondNombre . "<br>";
echo $premierNombre * $secondNombre . "<br>";
echo $premierNombre / $secondNombre . "<br>";

// il en existe deux autres, le modulo et l'exponentiation

// le modulo permet de connaitre le reste de la division
echo $premierNombre % $secondNombre . "<br>";
// l'exponentiation permet d'affecter la puissance du second au premier. Dans ce cas ci, 4 puissance 2 ou 4 au carré 
echo $premierNombre ** $secondNombre . "<br>";

// je peux aussi faire des opérations avec des opérateurs d'affectation ( +=, -=, *=, /=)
// Attention , comme pour tout à l'heure avec .=, cen 'est pas une simple opération. Je réaffecte automatiquement une nouvelle valeur et je perds donc celle d'origine.
// Le <br> n'est pas concaténer à la suite mais positionné en dessous volontairement pour ne pas générer un warning php (faites le test en le concaténant)
echo $premierNombre += $secondNombre;
echo "<br>";

//  Chapitre 5 Les conditions

$a = 22;
$b = 30;
$c = 48;
$d = 55;
$e = 60;

// première condition avec if/else

// dans cette condition je demande a vérifier si a est supérieur à b
if( $a > $b){
    // si c'est le cas, alors il va m'afficher le message ci-dessous
    // C'est le premier bloc d'instruction. Il est entre accolades
    echo ' Vrai, $a est bien supérieur à $b';
    // si en revanche ce n'est pas vrai, alors il va entrer dans le else
}else{
    // pour m'afficher le message du else
    // le second bloc d'instructions, les accolades du else
    echo 'Faux, $a n\'est pas supérieur à $b <br>';
}
// noter que je ne suis pas obligé de lui coder le else. Je peux lui demander de vérifier la condition, et si elle est vraie, m'afficher le premier message. Mais si elle ne se vérifie pas, lui de son coté, il ne fera rien. Je ne suis pas obligé de coder la porte de sortie (le else). Il devient implicite...tu ne fais rien, tu t'en fiches. Cela peut arriver de ne pas coder le else.

// seconde condition avec l'opérateur de comparaison && (AND)
// && oblige a ce que les deux conditions soient vérifiées pour qu'il entre de le TRUE
if($a > $b && $b < $c){
    echo "Vrai, les deux conditions sont vérifiées";
    // a n'étant toujours pas supérieur à b, et même si b est bien inférieur à c, alors il va entrer dans le else, le FALSE
}else{
    echo "Faux, au moins une des deux conditions n'est pas vérifiée <br>";
}

// troisième condition avec le OR ||. Cette fois, si j'ai une des deux conditions qui est vérifiée, alors il va se diriger vers le premier bloc d'instruction. Si aucune n'est vérifiée, alors il ire vers le second bloc d'instructions, le else, car c'est FALSE
if($a > $b || $b < $c){
    echo "Vrai, au moins une des deux conditions est vérifiée <br>";
}else{
    // la seconde condition étant vérifiée, il ne vas pas entrer dans le else
    echo "Faux, aucune condition n'est vérifiée";
}

// quatrième condition avec XOR
// XOR est appelé le OU exclusif. Si je décide de lui soumettre deux conditions, il faudra absolument qu'il y'en ai une TRUE et l'autre FALSE
// si les deux sont TRUE ou FALSE, il se dirigera obligatoirement vers le else, comme dans le cas présent
if($a == 22 XOR $b == 30){
    echo "Vrai, une seule des deux conditions est vérifiée";
}else{
    // XOR se dirige vers ce else, car effectivement $a est bien égal à 22 et $b est aussi égal à 30.
    echo "Faux, les deux conditions sont vérifiées (sont vraies toutes les deux) <br>";
}

// cinquième condition, avec l'aternative elseif, positionné entre la première condition et le else
if($a > $b){
    echo 'Vrai, $a est bien supérieur à $b';
    // la condition du dessus étant fausse, il se dirige vers le elseif pour vérifier cette nouvelle condition qui lui ai proposée. Il va donc vérifier si celle ci est TRUE ou FALSE, a son tour
    // ci dessous, le ! signifie NOT, le "contraire de". avec = a ses cotés, on pourrait le traduire pas "différent de"
}elseif( $a != 22 ){
    echo 'Vrai, $a est différent de 22';
}else{
    // la condition du elseif étant aussi fausse, il dévie vers le else
    echo "Aucune des deux conditions ne se vérifie <br>";
}

//  sixième condition, une forme contractée du if/else, aussi appelée ternaire
// avec une ternaire, on commence avec la condition ($d > $e) puis arrive le if (remplacé par le ?) Juste après c'est le bloc d'instruction a exécuter si c'est TRUE (vrai: d est bien supérieur à e). Si je n'entre pas dans le TRUE, alors je me dirige vers le else (remplacé par les :) et j'exécute son bloc d'instructions (c'est faux)
echo ($d > $e) ? "Vrai, d est bien supérieur a e" : "C'est faux <br>" ;

// septième condition avec == et ===

$var1 = 100;
$var2 ='100';

if($var1 == $var2){
    echo "Vrai, elles ont la même valeur <br>";
}else{
    echo "Faux, leurs valeurs sont différentes";
}
// dans le cas ci-dessus, on va rentrer dans le TRUE car == va comparer les valeurs
// dans le cas du dessous on va entrer dans le FALSE (else) car === va aussi comparer leur type, qui sera différent. Un integer vs un string
if($var1 === $var2){
    echo "Vrai, elles ont la même valeur et le même type";
}else{
    echo "Faux, leurs valeurs sont similaires, mais pas le type <br>";
}

// huitème condition, avec la fonction prédéfinie isset()
// isset() est une instruction qui permet de tester si l'élément soumis existe ou non
// je pourrais aussi tester si !isset(), c'est a dire n'existe pas
if(isset($test)){
    echo "Vrai, cette variable existe";
}else{
    // dans la mesure où elle n'a pas été declarée préalablement, j'entre dans le else...c'est FALSE
    echo "Faux, cette variable n'existe pas<br>";
}
// huit-bis, syntaxe contractée
// ci dessous, pour s'habituer à la syntaxe ternaire, la même condition que celle au-dessus
echo (isset($test)) ? "Vrai, cette variable existe" : "Faux, cette variable n'existe pas <br>" ;

// neuvieme condition, la switch

$couleur = "bleu";
// elle est équivalente à if/elseif. Et plus rapide à l'execution si j'ai trop de elseif a tester (en temps relatif)
switch($couleur){
    case "vert":
        echo "La couleur est bien vert";
        // le break doit etre codé, car même si la condition est vraie, il va passer à la condition suivante, sans s'arreter et afficher ce qui correspond au TRUE
        break;
    case "rouge":
        echo "La couleur est bien rouge";
        break;
    case "bleu":
        echo "La couleur est bien bleu <br>";
        break;
    default:
        echo "Aucune couleur ne correspond";
        break;
}
// son équivalent avec if/elseif
if($couleur == "vert"){
    echo "La couleur est bien vert";
}elseif($couleur == "rouge"){
    echo "La couleur est bien rouge";
}elseif($couleur == "bleu"){
    echo "La couleur est bien bleu <br>";
}else{
    echo "Aucune couleur ne correspond";
}

// Chapitre 6 Les fonctions prédéfinies

$phrase = "Je travaille actuellement au PoleS Gonesse";
// strlen et iconv_strlen servent toutes les deux a calculer la longueur d'une chaine de caractères.
echo iconv_strlen($phrase) . "<br>";
echo strlen($phrase) . "<br>";

$phrase2 = "étés";
// la différecne entre les deux c'est que strlen va aussi comptabiliser les caractères spéciaux alors iconv_strlen non.
// Concrètement, avec l'exemple ci-dessous, strlen va compter 6 caractères (avec les deux accents) alors que iconv_strlen va en trouver seulement 4
// Il faudra donc décider du moment ou on va plutot utiliser l'une et pas l'autre
echo iconv_strlen($phrase2) . "<br>";
echo strlen($phrase2) . "<br>";

// fonction prédéfinie substr()
// substr() permet de couper un morceau d'une chaine de caractères. Elle me permet de n'en garder qu'une partie
// ci dessous, je déide de couper ma phrase du haut en sa moitié. Je sais que sa longueur est de 42 (avec strlen).
// je vais donner trois arguments/parametres a m a fonction. Le premier, c'est la variable qu'elle doit traiter. Le second, c'est le point de départ (tout retirer avant) et en dernier, mon point d'arrivée (tout retirer après). Comme je veux garder la moitié et que je sais qu'elle fait 42 caractères, je décide de supprimer tout ce qui vient après le 21 caractère.
echo substr($phrase,0, 21) . "<br>";

// ce dessous, je veux retirer le pluriel du mot étés (retirer le s). Pour cela, mon point d'arrivée sera négatif. Cela signifie que je vais partir de la fin, et retirer le dernier (-1)
// Si j'avais voulu retirer les deux derniers, j'aurais ecrit -2 etc...
echo substr($phrase2, 0, -1) . "<br>";

// fonction prédéfinie date()

// la fonction date() permet de récupérer la date du jour
// et selon les arguments que je lui donne, le format qui apparaitra au final pourra différer
// je peux ne demander que le jour, le mois ou l'année. je ne suis pas obligé de récupérer la totalité des informations. Elle nous sera utile pour par exmple connaitre la date ou le client a passé sa commande
echo date("d / m / Y") . "<br>";
echo date("D / M / y") . "<br>";

// fonction prédéfinie empty()
// elle va me permettre de vérifier si une variable a reçu un contenu. Si une valeur lui a été affectée. C'est différent de isset() qui vérifie si la variable a été declarée (si elle existe).
// empty vérifie si un contenu a été affecté

if(empty($phrase)){
    echo "Vrai, cette variable n'a pas de contenu";
}else{
    echo "Faux, cette variable n'est pas vide <br>";
}

// 7 Les fonctions utilisateur ou développeur

// Ce sont celles qui ne me sont pas fournies par PHP, et que je vais devoir coder, pour un besoin précis
// celle ci-dessous prend un argument ($prenom). Et c'est un argument que je devrais lui renseigner au moment de son exécution ('Aziz).
function salut($prenom){
    echo "Bonjour " . $prenom . "<br>";
}

salut("Aziz");

// fonction pour calculer le prix d'un produit TVA comprise
//  fonction que je vais compliquer progressivement pour la rendre plus interessante
// cette première fonction ne prend aucun argument.
// son résultat est figé. Il n'est pas modulable pour l'instant
function calculTva(){
    // ici, elle va me calculer le prix TTC (en appliquant une TVA de 20%) à un produit qui coute 100€ HT
    return 100*1.2;
}

echo calculTva() . "<br>";
// le résultat sera toujours 120€

// celle ci va me permettre d'appliquer un taux de TVA de 20%, mais a différents produits qui ont différents prix
// elle prend donc un argument, le prix. Valeur que je renseignerai au moment de son exécution (dans le echo en bas)
function calculTva2($prix){
    return $prix*1.2;
}

echo calculTva2(55) . "<br>";
echo calculTva2(155) . "<br>";

// ma fonction évolue, elle peut désormais calculer différents taux de TVA (20% et 5%) sur différents prix
// elle prend un second argument....le taux de TVA, qui sera rensigné en second, lors de l'exécution de cette fonction
function calculTva3($prix, $taux){
    return $prix * $taux;
}

echo "45€ HT avec un taux de TVA de 5% me donnera un prix TTC de " . calculTva3(45, 1.05) . " €<br>";
echo "45€ HT avec un taux de TVA de 20% me donnera un prix TTC de " . calculTva3(45, 1.20) . "€<br>";

// dernière amélioration. Elle peut calculer selon différents taux, différents prix, mais, si je ne lui renseigne pas le taux de TVA, elle saura qu'elle peut en appliquer un par défaut ($taux = 1.2)
function calculTva4($prix, $taux = 1.2){
    return $prix * $taux;
}

// et effectivement, en dessous, si je renseigne le taux de TVA, elle appliquera celui là (1.05) mais s'il n'est pas indiqué comme dans le second cas, alors elle appliquera celui  par défaut
echo "55€ HT avec un taux de TVA de 5% me donnera un prix TTC de " .  calculTva4(55, 1.05) . " €<br>";
echo "55€ HT avec un taux de TVA par défaut me donnera un prix TTC de " .   calculTva4(55) . " €<br>";

// chapitre 8 La portée des variables

?>

<br><br>-----------------espace global-----------------------<br><br>

code<br><br>
<!-- tout le code qui précéde une accolade ouvrante fait partie de l'espace global -->
function monScript(){<br>
----------------espace local-------------------------<br><br>
<!-- l'espace local correspond a tout le code qui figure entre une accolade ouvrante et une accolade fermante -->
<!-- je peux le considérer comme mon bloc d'instructions -->
            bloc d'instructions<br><br>

---------------espace local -------------------------<br>
}<br><br>
<!-- une fois sorti de mon espace local (accolade fermante) le code qui suit fait partie del 'espace global -->
code<br><br>

-----------------espace global-----------------------<br><br>

<?php

// de l'espace global vers l'espace local
// je declare ma variable dans l'espace global
$pays = 'France';

function affichePays(){
    // le mot clé global me permet de l'importer dans l'espace local. sans cela je ne peux l'utiliser. Undefined variable
    global $pays;
    echo $pays . "<br>";
}

affichePays();

// de l'espace local vers le global

function afficheJour(){
    // cette variable est declarée dans l'espace local (dans mon bloc d'instructions)
    $jour = "mercredi";
    // pour la récupérer dans mon espace global, je dois utiliser le mot clé return pour "l'exporter" vers le global
    return $jour;
}

echo afficheJour() . "<br>";

function afficheJour2(){
    $jour = " jeudi";
    return $jour;
    // je ne pourrai exécuter cette instruction ci-dessous.
    // le mot clé return la précédent, il empeche toute instruction qui le suit de s'exécuter
    echo "Demain c'est vendredi";
}

echo afficheJour2() . "<br>";

// Chapitre 9 Les boucles

// la boucle while

// j'initialise ma variable $i
// $i pour integer, mais ce n'est pas obligé de l'appeler ainsi
//  la valeur affectée de 0 n'est pas obligatoire ici non. Mais c'est une syntaxe que vous rencontrerez souvent car on travaille souvent sur les tableaux avec les boucles. Et il faut savoir que la première valeur d'un tableau a un indice 0, la seconde valeur un indice 1, la troisième valeur un indice 2 etc...
$i = 0;

// je débute ma boucle while, et entre ses parenthèses je lui donne la condition pour qu'elle puisse s'exécuter. Ici, tant que $i est inférieur ou égal à 5, cette boucle peut tourner. Si elle atteint le chiffre de 6, alors son exécution sera stoppée.
while( $i <= 5 ){
    // dans son bloc d'instruction, je lui demande de faire de l'affichage
    // affichage de la chaine de caractère, concaténée à la valeur de $i durant ce tour. Les trois tirets servent de séparateur entre chaque tour de boucle.
    echo "Tour n° " . $i . " --- ";
    // une fois fois terminée cette instruction d'  affichage, je demande a ce que la valeur de $ i s'incrémente de +1
    // $i++ est équivalent à $i = $i + 1
    $i++;
    // cela veut dire qu'apres le premier affichage, ou $i a pour valeur 0, au tour suivant, il aura la valeur de 1 ( 0 + 1 ).
    //Et ainsi de suite, a chaque tour de boucle, il prendra une unité de plus ( 1 + 1 = 2 puis 2 + 1 = 3 etc...jusqu'à 5 + 1 = 6) et lorsque sa valeur sera supérieur a la condition mise entre parenthèses (<= 5), l'execution de la boucle (l'affichage de echo) ne s'exécutera plus. $i aura la valeur de 6, mais l'execution de l'echo ne pourra se faire.
    // ci-dessous la boucle dans son intégralité sans les commentaires

    // ----------------------
    // $i = 0;

    // while( $i <= 5){
    //     echo "Tour n° " . $i . " --- ";
    //     $i++;
    // }
    // ------------------------
}

// la même boucle sans les trois tirets après tour n°5
echo "<br>";

$i = 0;
// équivalent à $i <= 5
while($i < 6){
    // pour ne pas avoir les tirets après le 5è tour, je vais cibler le moment où $i prend a valeur de 5
    if( $i == 5){
        // je lui demanderais d'afficher ceci, sans les tirets
        echo "Tour n° " . $i . "<br>";
    }else{
        // si $i n'est pas égal à 5 (c'est a dire tous les autres cas de figure), il affichera la même chose, mais avec les tirets
        echo "Tour n° " . $i . " --- ";
    }
    // attention, l'incrémentation de $i se fait à l'extérieur de la condition if
    $i++;

    // ci-dessous l'intégralité de la boucle et de la condition sans les commentaires
    // $i = 0;

    // while($i < 6){
    //     if($i == 5){
    //         echo "Tour n° " . $i;
    //     }else{
    //         echo "Tour n° " . $i . " --- ";
    //     }
    //     $i++;
    // }
}

// la boucle do while

// l'initialisation se fait aussi au début
$i = 0;

// elle débute par do, qui introduit le bloc d'instruction
do{
    // l'instruction d'affichage
    echo "Tour n° " . $i . " --- ";
    // une incrémentation qui ajoute +2 a chaque tour de boucle (volontairement, pour montrer qu'il existe des techniques si besoin pour ne pas seulement incrémenter de +1)
    $i+=2;
    // elle se termine par while, qui introduit la condition
}while($i <= 10);

// la même boucle sans les commentaires
// $i = 0;

// do{
//     echo "Tour n° " . $i . " --- ";
//     $i+=2;
// }while($i <= 10);

echo "<br>";

// boucle for

// son utilité est strictement similaire a celui de la while. Elles vont faire le même travail
// la différence réside dans sa syntaxe. La for prend l'initialisation, la condition ainsi que l'incrémentation dans la parenthèse
for($i = 0; $i <= 5; $i++){
    // reste l'instruction d'affichage dans le bloc d'instruction
    echo "Tour " . $i . "<br>";
}
// la boucle sans les commentaires
// for($i = 0; $i <= 5; $i++){
//     echo "Tour " . $i . "<br>";
// }

// boucle for, cas pratique
echo "<br>";
echo "<form>";
    echo "<select>";
    echo "<option selected>Selectionnez l'année</option>";
    // boucle for pour créer un selecteur qui va afficher toutes les années, de l'année en cours (2022) à 100 ans en arrière (1922)
    // pour faciliter le choix, je commence par l'année la plus proche vers les plus anciennes.
    // A partir de là, je ne vais plus aller en ordre croissant mais décroissant
    // C'est pour cela que ma condition indique que ma variable $annee devra etre supérieure à l'année en cours - 100 (1922). C'est la date à laquelle devra stopper ma boucle
    // Ensuite il me reste a décrémenter pour diminuer la valeur de $annee pour atteindre l'année 1922
    for($annee = date('Y'); $annee >= date('Y') - 100; $annee--){
        // j'affiche la valeur de l'année dans le selecteur
        echo "<option>$annee</option>";
    }
    echo "</select>";
echo "</form>";
echo "<br>";

// boucle for imbriquée

echo "<table border='1' style='border-collapse: collapse'>";
    echo "<tr>";
        for($i =0; $i <= 9; $i++){
            echo "<td style='padding: 3px'>" . $i + 1 . "</td>";
        }
    echo "</tr>";
echo "</table>";
echo "<br><br>";
echo "<div class='row'>";
    echo "<div class='col-6'>";
        echo "<table class='table'>";
                for($ligne = 0; $ligne <= 9; $ligne++){
                    echo "<tr>";
                        for($cellule = 0; $cellule <= 9; $cellule++ ){
                            echo "<td style='padding: 3px'>" . (10*$ligne+$cellule) . "</td>";
                        }
                    echo "</tr>";
                }
        echo "</table>";
    echo "</div>";
echo "</div>";

// Chapitre 10 Inclusion de fichiers

echo "-----------je suis dans le fichier entrainement.php-----------------";
// la fonction include() permet d'importer du contenu
include('inc/fichier.inc.php');
// require() permet d'importer de la même manière que include(). La différence entre les deux c'est que si il y a une erreur dans le code, include() va notifier l'erreur/warning mais permettre au reste du code de s'exécuter. Alors que require() va bloquer le code dans son intégralité (en notifiant l'erreur)
require('inc/fichier.inc.php');

// il existe deux autres fonctions prédéfinies qui vont me permettrent de n'importer le fichier qu'une seule fois dans ma page.
// elles vont m'assurer cette sécurité, car il serait illogique, inepte d'importer ce même contenu ou code deux fois. Je pourrai l'importer dans d'autres pages, mais une seule fois
//  il s'agit de include_once() et require_once()
echo "-----------je suis revenu dans le fichier entrainement.php-----------------<br><br>";

// Chapitre 11 Les tableaux / Arrays

// un tableau est un type de variables https://www.php.net/manual/fr/language.types.php. Elle a la particularité de pouvoir stocker plusieurs valeurs et les restituer telles que si on en a besoin.

// cette variable ci dessous, ne sera pas capable de séparer les valeurs lors de l'affichage. Elle va afficher la totalité, comme une chaine de caractères
$listePrenoms = "Inès, Yann, Aziz, Julien, Mathilde";
echo $listePrenoms . "<br>";

// voici la syntaxe classique pour declarer un tableau
// je nomme mon tableau (ici en camelCase) et je lui affecte sa liste de valeurs en l'introduisant avec le mot clé array
// je donne les valeurs entre parenthèses, chacune séparée de l'autre avec une virgule
$tableauPrenoms = array('Inès', 'Yann', 'Aziz', 'Julien', 'Mathilde');

// la syntaxe en dessous se rencontre parfois, mais moins souvent. Le développeur aura voulu aérer son code car la liste des valeurs était longue
// $tableauPrenoms = array(
//     'Inès',
//     'Yann',
//     'Aziz',
//     'Julien',
//     'Mathilde',
// )

// l'instruction print_r() permet un affichage non-conventionnel (affichage pour un développeur mais pas pour un utilisateur). Il va me permettre de voir tout ce que contient ma variable
echo print_r($tableauPrenoms) . "<br>";

// la balise <pre> permet un meilleure lisibilité de ce résultat
echo "<pre>"; print_r($tableauPrenoms); echo "</pre>";
echo "----------------------<br>";
// var_dump() est une instruction qui permet d'afficher les informations contenues dans une variable, comme print_r(), mais de manière encore plus précise
// j'aurais dès le début le nombre de valeurs qu'elle contient. Le type de chaque valeur, la longueur de la chaine de caractères si c'est un string
// noter que pour inès, la longueur de a chaine de caractères est de 5 et non de 4, a cause de l'accent sur le 2
echo "<pre>"; var_dump($tableauPrenoms); echo "</pre>";

// syntaxe pour réupérer une valeur en particulier
// je vais crocheter (car c'est une valeur donnée entre crochets, d'où le nom) à l'indice du tableau. Je donne donc le nom du tableau, puis entre crochet l'indice.
echo $tableauPrenoms[0] . "<br>";

// autre syntaxe pour un tableau, qui a pour avantage de pouvoir ajouter des valeurs qui ne sont pas connues dès le début.
// rien ne m'empechera de declarer deux valeurs, continuer mon code sur vingt lignes, puis ajouter une nouvelle valeur etc...
$listePays[] = "France";
$listePays[] = "Espagne";
$listePays[] = "Algérie";
$listePays[] = "Italie";
$listePays[] = "Russie";

// print_r pour avoir les informations sur ce array
echo "<pre>"; print_r($listePays); echo "</pre>";

// la boucle foreach, adaptée pour les tableaux

// la boucle foreach necessite en premier lieu le nom de la variable/tableau/array sur laquelle elle doit travailler. Ensuite le mot clé as pour donner un alias a la variable/tableau (ici cet alias sera $indice). Enfin, elle fera correspondre cet alias ($indice) avec sa valeur ($valeur) grace à => (fleche)
// dans cette syntaxe, les éléments les plus importants sont le as et =>
// le nom de l'alias ainsi que le nom de la valeur n'ont aucune importance pour PHP (tant qu'on leur donne un nom)
foreach($listePays as $indice => $valeur){
    echo "<p>L'indice " . $indice . " a pour valeur le pays " . $valeur . "</p>";
}

// je donne dans cette foreach les noms de $key et $value, car ils sont très utilisés pour l'alias et la valeur (même si ce n'est pas une obligation comme on a dit)
// ce n'est que pour vous habituer a cette syntaxe qui revient très fréquemment
foreach($tableauPrenoms as $key => $value){
    echo "<p>L'indice " . $key . " a pour valeur le prénom " . $value . "</p>";
}

// fonction prédéfinie implode()
// implode() permet d'afficher les valeurs d'un tableau sous une forme de chaine de caractères
// elle peut prendre un séparateur (ici / ) en argument pour séparer/aérer les éléments entre eux, et dans ce cas là, ça sera le premier argument (syntaxe obligatoire)
echo "<p>" . implode(' / ', $listePays) . "</p>";

// les fonctions prédéfinies sizeof() et count()
// chacune des ses fonctions prédéfinies sert a compter le nombre d'éléments/valeurs contenus dans un tableau
echo sizeof($tableauPrenoms) . "<br>";
echo count($tableauPrenoms) . "<br>";

// La boucle for() pour un tableau
// J'utilise count() pour dénombrer les éléments de mon tableau et délimiter les conditions dans laquelle ma boucle for() doit s'exécuter.
for($i = 0; $i < count($listePays); $i++){
    echo "<ul>";
        echo "<li>" . $listePays[$i] . "</li>";
    echo "</ul>";
}

// Tableau associatif
// on parle de tableau associatif lorsqu'on décide de donner un "nom" à l'indice (ici j r et v), plutot que de laisser un indice par défaut etre affilié à la valeur
$listeCouleurs = array('j' => 'jaune', 'r' => 'rouge', 'v' => 'vert');
echo "<pre>"; print_r($listeCouleurs); echo "</pre>";

// désormais pour crocheter je vais indiquer l'indice nommé pour récupérer ma valeur
echo $listeCouleurs['v'] . "<br>";

// je declare un nouveau tableau associatif (je nomme les indices)
$tableauFruit = array('fruit1' => 'orange', 'fruit2' => 'pomme', 'fruit3' => 'fraise');
// cas particulier selon que je crochète durant une concaténation (et donc avant de simples quotes)
echo 'Le fruit 1 est : ' . $tableauFruit['fruit1'] . '<br>';
// ou selon que je crochète entre des doubles quotes
echo "Le fruit 2 est: $tableauFruit[fruit2]<br>";
// dans le premier cas j'aurai besoin de simples quotes pour entourer ma valeur entre crochets. Dans le second cas, pas besoin de quote. Je crochète et appelle mon indice directement (si je mets des quotes => erreur/warning)

// tableau multidimensionnel

// un tableau multi-dimensionnel ou bi-dimensionnel est un tableau qui contient un autre tableau qui est son indice
// Ce tableau/indice va contenir plusieurs valeurs
$listeMarvel = array(
    // Ce premier tableau (ci dessous) va contenir plusieurs valeurs telles que, Spiderman (qui a pour indice personnage), Peter (qui a pour indice prénom), Parker (qui a pour indice nom))
    // Ce premier tableau possède aussi l'indice 0 du tableau $listeMarvel dont il fait partie
    array('personnage' => 'Spiderman', 'prénom' => 'Peter', 'nom' => 'Parker'),
    // Ce second tableau (ci dessous) va contenir plusieurs valeurs telles que, Iron Man (qui a pour indice personnage), Tony (qui a pour indice prénom), Stark (qui a pour indice nom))
    // Ce second tableau possède aussi l'indice 1 du tableau $listeMarvel dont il fait partie
    array('personnage' => 'Iron Man', 'prénom' => 'Tony', 'nom' => 'Stark'),
    // Ce troisième tableau (ci dessous) va contenir plusieurs valeurs telles que, Black Widow (qui a pour indice personnage), Natasha (qui a pour indice prénom), Romanoff (qui a pour indice nom))
    // Ce troisième tableau possède aussi l'indice 2 du tableau $listeMarvel dont il fait partie
    array('personnage' => 'Black Widow', 'prénom' => 'Natasha', 'nom' => 'Romanoff'),
);
// avec le var_dump ci-dessous vous pourrez vérifier les indices et valeurs de chaque tableau
echo "<br><pre>"; var_dump($listeMarvel); echo "</pre>";
// syntaxe pour afficher une valeur d'un tableau multi-dimensionnel
// Je crochète une première fois à l'indice du premier tableau, puis à l'indice du second tableau
echo "<p>" . $listeMarvel[2]['prénom'] . "</p><br>";

// seconde syntaxe pour un tableau bi-multidimensionnel
// je vais aussi nommer les indices du tableau $tableauMarvel
$tableauMarvel = array(
    // au lieu que PHP me donne un indice 0 par défaut pour le premier tableau, je lui associe le nom de spiderman.
    'Spiderman' => array('prénom' => "Peter", 'nom' => 'Parker'),
    // le second indice ne sera pas 1 par défaut, mais je lui associe le nom de Iron Man
    'Iron Man' => array('prénom' => "Tony", 'nom' => 'Stark'),
    // le troisième indice ne sera pas 2 par défaut, mais je lui associe le nom de Black Widow
    'Black Widow' => array('prénom' => "Natasha", 'nom' => 'Romanoff'),
);

// var_dump pour récupérer en affichage non conventionnel les informations du second tableau
echo "<pre>"; var_dump($tableauMarvel); echo "</pre>";

// pour afficher une donnée précise. Je crochète toujours aux deux indices l'un derrière l'autre, sauf que désormais le premier est nommé aussi
echo "<p>" . $tableauMarvel['Iron Man']['prénom'] . "</p><br>";

// pour récupérer toutes les données de mon second tableau je vais utiliser une double boucle foreach (boucle imbriquée)
foreach($tableauMarvel as $key => $value){
    echo "<ul>";
        if(is_array($value)){
            echo "<li>";
                echo "<h4>" . $key . "</h4>";
                foreach($value as $key2 => $value2){
                    echo "<p>" . $key2 . ": " . $value2 . "</p>";
                }
            echo "</li>";
        }
    echo "</ul>";
};

echo "----------la même boucle, sans afficher les indices du second tableau---------------<br>";

// la même double boucle avec une variation pour la récupération des valeurs du second tableau
foreach($tableauMarvel as $key => $value){
    echo "<ul>";
        if(is_array($value)){
            echo "<li>";
                echo "<h4>" . $key . "</h4>";
                // Pour cette seconde foreach, avec cette syntaxe, je vais récupérer directement les valeurs (sans afficher l'indice)
                // si je ne scripte pas la fleche de correspondance =>, PHP traduit cela comme "il ne veut que la valeur" (même si je l'ai appelée key2)
                // Par contre, si je scripte le "as" (de l'alias) puis sa fleche de correspondance =>, alors il m' affichera en premier lieu l'indice, auquel il fera correspondre sa valeur
                // comme toujours j'aurais pu choisir un autre nom de variable
                foreach($value as $key2){
                    echo "<p>" . $key2 . "</p>";
                }
            echo "</li>";
        }
    echo "</ul>";
};

echo "<br>------------Les Superglobales-----------<br>";

// Chapitre 12 Les Superglobales
// elles ont la particularité d'etre de type array, et cela aura son importance au niveau de leur syntaxe, notamment tout ce qui sera compris entre leurs parenthèses
// Du fait que ce soit des tableaux, on va pouvoir les explorer avec print_r et var_dump
// Elles sont disponibles indifféremment dans l'espace global comme local, sans syntaxe particulière
// Elles s'ecrivent toutes avec un _ entre $ et leur nom, hormis $GLOBALS (malgrè qu'elles s'ecrivent en majuscules, ce sont des variables et non des constantes)

// la Superglobale $GLOBALS regroupe toutes les autres (Superglobales), dont elle même (d'où le mot RECURSION dans son array particulier)
echo "<pre>"; print_r($GLOBALS); echo "</pre>";
echo '<br>------------$_SERVER-----------<br>';
// $_SERVER va me donner toutes les informations concernant le serveur
echo "<pre>"; print_r($_SERVER); echo "</pre>";
// dont une, très intéressante que je pourrai exploiter plus tard: DOCUMENT_ROOT.
// Il contient la valeur du chemin vers mon dossier htdocs.
// je pourrai ainsi l'exploiter pour par exemple indiquer le chemin (dans une constante) vers un dossier img dans lequel j'uploaderais toutes mes futures images que j'utiliserai ensuite sur le site pour les afficher.
define('RACINE_SITE', $_SERVER['DOCUMENT_ROOT'] . '/boutique/');

// Chapitre 13 La méthode GET

// la méthode GET permet de faire transiter des informations d'une page vers une autre par le biais de l'URL
// Les informtaions récupérables avec la méthode GET ne peuvent etre envoyées que par le biais d'une balise <a> à l'intérieur de son attribut href
// je sépare dans le href l'adresse du fichier d'accueil avec la première information avec un ?
// Cette première information (en fait un indice) je lui donne une valeur avec un =
// si je dois faire transiter une seconde information dans l'URL, je devrais la séparer de la première  avec un & puis j'ecris le second indice auquel j'affecte sa valeur avec =) etc...ect...si j'a i une troisième, quatrième information
// on ne fait pas transiter d'informations sensibles dans l'URL tel que un mot de passe. Il sera visible pour tous
// l'attribut target dans la balise <a> me permet d'ouvrir la page dans un nouvel onglet
echo "<button type='submit' class='btn btn-primary'><a class='text-light' href='page_get.php?produit=Gateau&variete=chocolat&prix=12' target='_blank'>Aller vers la page de récupération</a></button>";
?>

<!-- Chapitre 14 La méthode POST -->

<!-- pour envoyer un formulaire en PHP, je dois renseigner l'attribut method de la balise avec la valeur 'post'. Dans la mesure ou je vais récupérer les informations sur cette même page, je ne renseigne pas l'attribut action (mais je le ferais pour le prochain formulaire) -->
<form class="my-5 col-4" method="post" action="">

  <div class="mb-3">
    <label for="prenom" class="form-label">Votre Prénom</label>
    <!-- L'attribut name est très important pour php. Il est même incontournable. Sans lui, et sa valeur renseignée, je ne pourrais récupérer les informations transmises dans le formulaire, pour les afficher sur une page, comme les enregistrer en BDD -->
    <!-- les attributs for et id sont liés. Ils ne sont pas importants pour PHP, ils sont même inutiles. Mais ils sont important pour la W3C, Google, l'UX etc...pour tout le coté FRONT -->
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Votre description</label>
    <textarea class="form-control" id="description" name="description" placeholder="description" rows="3"></textarea>
  </div>

  <label for="annee" class="form-label">Année de naissance</label>
  <select class="form-select mb-3" id="annee" name="annee">
    <?php
        // boucle for qui décrémente pour retourner de 2022 jusqu'en 1922
        for($i = date('Y'); $i >= date('Y') - 100; $i--){
            echo "<option>$i</option>";
        }
    ?>
  </select>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<!-- A nouveau je suis obligé de mettre mon code pour récupérer les infos dans une condition if -->
<!-- si je ne le fais pas, php m'enverra un warning car au premier chargement de la page il ne pourra trouver les infos...normal, je ne les ai pas encore envoyées. Le if permet lepremier chargement de la page sans avoir encore rempli le formulaire -->
<?php if($_POST): ?>
<ul>
    <li>Prénom: <?= $_POST['prenom'] ?></li>
    <li>Description: <?= $_POST['description'] ?></li>
    <li>Année de naissance: <?= $_POST['annee'] ?></li>
</ul>
<?php endif; ?>

<!-- pour ce second formulaire, je vais renseigner l'attribut action car je veux récupérer mes données sur une autre page (le fichier recupForm.php) -->
<form class="my-5 col-4" method="post" action="recupForm.php">

  <div class="mb-3">
    <label for="prenom" class="form-label">Votre Prénom</label>
    <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom">
  </div>

  <div class="mb-3">
    <label for="description" class="form-label">Votre description</label>
    <textarea class="form-control" id="description" name="description" placeholder="description" rows="3"></textarea>
  </div>

  <label for="annee" class="form-label">Année de naissance</label>
  <select class="form-select mb-3" id="annee" name="annee">
    <?php
        for($i = date('Y'); $i >= date('Y') - 100; $i--){
            echo "<option>$i</option>";
        }
    ?>
  </select>

  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<div>
<button class='btn btn-primary my-2'><a class='text-light' href='lecture.php' target='_blank'>Aller vers la page de lecture des données</a></button>
</div>

<div>
<button class='btn btn-primary my-2'><a class='text-light' href='pageCookie.php' target='_blank'>Aller vers la page des cookies</a></button>
</div>

<!-- Chapitre 15 :les session
 
pour la declaration de session_start() voir tout en hayt de ce fichier car il doit etre posstisionezr tout en haut-->
<div>
<button class='btn btn-primary my-2'><a class='text-light' href='pageSession.php' target='_blank'>vers la page session</a></button>
</div>


<?php


// Chapite 16 PDO et requete SQL

//PDO php DATA Object est une surcouche d'abstraxction liee a PHP elle permet l'interaction avec la base de donnees . 
//connexion  a la base de donnee
//pour me relier a ma BDD je doit au prealable cree un ovjett de ma classee PDOpour pouvoir beneficier des ses proprieter/attribut et methodes predefinie
//En local c'est a dire que mon projet n'est pas encore en ligne pour me conecter a ma BDD je vais devoir generer une syntaxe en respectant un norme(on peut dire que la syntaxe et rigide, figée)
// en local le host sera  = a localhost, dbuser egal a root et de dbpassword(mots de passe) =''(simple quote vides ,sans rien a l'interieur meem pas un espace).Seul dbname(apres localhost) poura varier en fonction du nom de la base de donnee (qui poura donc changer selon celles vers laquelle vous voulais vous conecter)

$pdo = new PDO('mysql:host=localhost;dbname=voiture','root', '',array(
    //je decide ici du mode d'erreur que je veut que phph m'envoie(en cas d'erreurdans mon code)
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING,
    // je decide du mode d'encodage des charavers la base de donnee (similaire a celui dans le DOCTYPE dans le header.inc.php) 
    //le type d'encodage utf8 et celui qui me permet de lire les chara speciaux de differants alphabet 
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// get_class_methods me permet de visualiser les differantes methode predefini de la classe pdo qui seront utilisable, prete a l'emploi 
echo "<pre>";print_r(get_class_methods($pdo));echo "</pre>";
echo'-----------------------------------';
//method query (select)
//je seclectionne dans ma base de donnees a la tablevehicule toutes les valeurs du vheicule dont le titresera egale a pagani
$afficheVehicule = $pdo->query("SELECT * FROM vehicule WHERE title = 'pagani zonda'");
//le var_dump de afficheVehicule m'indiqueque c'est un objet de la classe PDOStatement
//PDOStatement est directement liee a la classe PDO elle intervient des que la requete SELECT est entamé
echo "<pre>";var_dump($afficheVehicule);echo "</pre>";

//meme si c'est possible de faire INSERT INTO, UPDATE ou DELETE avecla methode queryil faut l'utiliser selment pour le SELECT
// si je doit modifier ma base de donneee( avec une insertion ,modification ou suppretion il faudra faire une requete preparer avec prepare())

echo'-----------------------------------';
//method query fetch()
//$afficheVehicule est la variable a laquelle on a affecter le resultat de la requete query (elle stock les information de tous les vehicule conserner par la selection)
//la method fetch va a present rechercher en BDD tous les vehicule concerner par la selection et affecter ce resultat dns la variable $vehicule
// PDO::FETCH_ASSOC permet de cibler la colone par son nom(FETCH_BOTH permet d'utiliser des chaine de chara et les numero des indice tandis que  FETCH_NUM permet d'utiliser uniquerment des numero d'indice)
$vehicule = $afficheVehicule->fetch(PDO::FETCH_ASSOC);
//print_r pour afficher les resultat (de maniere non conventionelle ) stocker dans $vehicule
echo "<pre>"; print_r($vehicule); echo"</pre>";

//le resulmtat du fetch etant stocker dans le $vehicule c'est manitent cette variable que je vais utiliser pour apller les valeur qui m'interesse 
// je les cible en crochetant a l'indice qui m'interesse
//dans le syntaxe ci dessou, volontairment je n'ai pas concatener $vehicule ['price'] comme pour les autre indices.
//c'est pour rappeler que entre bdouble quotes("") un variable sera interpreter par contre je devrais suprimer les simple quotes a l'interieur des crochets.
echo "<p>le vehicule " . $vehicule['title'] . " est disponible dans la ville de " . $vehicule['city'] . " au prix de $vehicule[price]  €</p>";


?>
<!--je fait une nouvelle requete de selection , cette fois pour recuperer tout les vehicule de la bdd pas seilment ceux de la pagani 

pour le thead:
la boucle for va me permmettre de generer autant de th qu'il ya de monbre de colonne en BDD pour cela j'utilise la fonction predefini colnumCount ma boucle for() s'exectutra tant que il ya des collone a afficher
une fois ce nombre determiner je vais recuperer touts les metas contenue dans mon tableau en BDD et je'affecte ce resultat a $colonne
la meta qui m'interesse ici c'est 'name' c'est pour cela que c'estla que je crochete(je ^peut le voir dans le var_dump au dessu ce chaque non il ya [name]) le $colonne elle va me permetre de recuperer toutes les valeurs, les noms de mes colonnes

pour le tbody:
cette while va permetre de recupere chaque ligne qu'elle va rencontrer en BDD.
la foreach quand a elle sert a recupere chaque valeurs de vehicule sur la quel elle boucle
donc en soit la while cree un ligne la foreach prend le relais la remplis et ainsi de suite jusqu'a ce qu'il n'y est plus de donnees a metre dans une ligne.
-->
<table class="table md-12 text-danger">

<?php $afficheVoiture = $pdo->query("SELECT * FROM vehicule LIMIT 10 ")?> 

    <thead>
        <tr>
            <?php for($i = 0;$i < $afficheVoiture->columnCount() ;$i++): $colonne = $afficheVoiture->getColumnMeta($i)?>
            <!-- <?php echo "<pre>"; var_dump($colonne);echo"</pre>";?> -->
            <th><?=$colonne['name']?></th>
            <?php endfor;?>
        </tr>
    </thead>

    <tbody>
        <?php while($voiture = $afficheVoiture->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <?php foreach ($voiture as $key => $value):?>
                <?php if ($key == 'price') :?>
                    <td><?=$value?> €</td>
                <?php else :?>
                    <td><?=$value?></td>
                <?php endif?>        
            <?php endforeach?>
        </tr>
        <?php endwhile;?>
    </tbody>

</table>
<a href="../dialogue/dialogue.php" target="_blank"><button type="submit" class="btn btn-danger">vers la page dialogue</button></a>
<!--Chapitre 17 Securité-->
<!--securisation en FRONT -->
<!--la verification des champ leur controle ne peut etre fait en front/ html comme ci dessou le max-length ou le pattern
il suffirais au haker d'ouvrir l'inspecteur le supprimer et cette obstacle sera lever-->
<form class="my-3" action="">
<div class="mb-3">
    <label for="pseudo" class="form-label">pseudo</label>
    <input type="text" class="form-control" id='pseudo' name="pseudo" placeholder="voutre pseudo" maxlength="20" pattern="[a-zA-Z0-9.-_ô]{2,20}" title="ecrire un pseudo valide">
</div>
    <button type="submit" class="btn btn-danger">envoyer</button>
</form>
<!--verification de champ en traitement php-->
<!--vous trouverais des verification de chams dans le projet location de voiture ou alors dans dialogue. referez vous y pour celle deja codée-->

<?php 
$erreur='';

//verification du champ email, non travailler dans les 2 projet juste cités
//la fonction filter_var en lui donnant en 1er parametre le champs conserner, pui en seconparametre FILTER_VALIDATE_EMAIL, va verifier si l'input de l'utilisateur correspond a un format d'adresse email ou non
if(isset($_POST[''])|| !filter_var ($_POST[''], FILTER_VALIDATE_EMAIL)){
    $erreur .="<p>Erreur format email</p>";
    // l'erreur est du au fait qu'il n'y a aucun indice dans le if $_POST
}

//requette preparer elle permette un meilleur securisation de l'envoie vers la BDD il faut la privilegier a la methode query (ne garder celle ci que pour une requete de selection nous avont fait plusieur requete)

?>

<div>
<button class='btn btn-danger my-2'><a class='text-light' href='securite/connexion.php' target='_blank'>vers la page connexion(securiter)</a></button>
</div>

<!-- ces particulariter pour afficher des valeur au format differant-->
<!-- je doit afficher une photo, ou afficher un pris, je vais devoir faire des condition pour les differant cas de figure -->
<!-- <?php while($produit = $afficheProduit->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <?php foreach ($produit as $key => $value):?>
            cette condition if() va donner un affichage differant pour les prix ou autre 
            si l'indice == photo je veut afficher la photo
            le $value et le nom de la photo stoquer en BDD
            c'est pour cela que je doit faire la balise img
            <?php if($key == 'photo'):?>
            <td><img src="img/<?=$value?>" alt"..." title="..."></td>
            si c'est 'prix je veut afficher le petit €
            <?php elseif($key == 'prix'):?>   
            <td><?=$value?> €</td>
            dans le reste des cas de figure affiche juste la valeur
            <?php else:?>
            <td><?=$value?></td>
            <?php endif?>
        <?php endforeach?>
    </tr>
<?php endwhile;?> -->

>

<?php
require_once('inc/footer.inc.php');