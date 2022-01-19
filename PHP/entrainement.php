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
echo $nombre1 .= $nombre2 .'<br>';
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

//Chapitre 4  les operateur ahrithmetiques ^^ 

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

// noter que je suis pas obliger de coder le else. je peut lui demander de verifier la condition, et si elle et vrais , m'afficher le 1er msg. mais si elle se verifie pas ,lui de son coté, il ne fera rien. je ne suis pas oubliger de coder la porte de sortie (le else). il devient implicite ...... tu ne fait rien, tu t'en fiche. cela peut arriver de ne pas coder le else.

// seconde condition avec le comparateur  && (AND)
//&& oblige a ce que les 2 condition soit vrais pour qu'il entre dans le TRUE
if($a  > $b && $b < $c){
    echo 'vrais les deux condition sont verifier';
}else{
    //a n'etaitant toujours pas supperieur a b, ememe si c'est b est bien inferieur à c , alors il va entrer dans le FALSE (else)
    echo" faux, au moins une des deux condition n'est pas verifier <br>";
}

//troisieme condition avec le or || cette fois ,si j'ai une des deux condition qui est bonne , alors il va se diriger vers le premier block d'instruction. si aucune n'est verifiees alors il ira vers le segond bloc d'intruction, le else car c'est FALSE
if($a  > $b || $b < $c){
    echo 'vrais au moins une des deux condition sont verifier <br>';
}else{
    // la seconde condition etant verifier,il ne va pas entrer dans le else
    echo" faux, aucune des deux condition n'est pas verifier <br>";
}

// xor est appler le OU exectif si je decide de soumettre deux condition, il faudra absolument qu'il y'en est une de TRUE et l'autre FALSE
// si les deux sont TRUE ou FALSE il se dirigera obligatoirment vers le else, comme dans le cas presrent
if($a == 22 XOR $b == 30){
    echo 'vrais une seul des deux condition sont verifier';
}else{
    //xor se dirige vers ce else car effectivement  $a est bien egal à 22 et $b est aussi egale a 30.
    echo " faux, les deux condition sont verifier <br>";
}

//cinqueme condition, avec l'aternative elseif entre la premiere condition et le else 
if($a > $b){
    echo"vrais, $a est bien supperieur a $b";
    // la condition du dessu est fause , il se dirige ver le elseif  pour verifier cette nouvelle condition qui la ai proposer.il va donc verifier si celle ci est TURE ou FALSE, a son tour
    // ci dessou le ! signifie NOT le "contraire de ". avec ses coté on pourais le traduire par 'differant de'
}else if($a != 22){
    echo'vrais, $a est differant de 22';
}else{
    // la condition du elseif etant aussi fausse il devie ver le else
    echo'Aucune des deux condition ne se verifie <br>';
}


// sixeme condition, une forme contracter di if/else aussi applere ternaire
// avec une ternaire, on commence avec la condition($d > $e) puis arrive le if (remplacer par le ?) juste apres c'est le bloc d'instruction a executer si c'est TRUE (vrais: d est bien superieur a e). si je n'entre pas dans le TRUE, alors je me dirige vers le else (remplacer par les : ) et j'execute son bloc d'instruction (c'est faux)
echo($d > $e) ? 'vrai, d est bien superieur a e' : "c'est faux <br>" ;

//septieme condition avec le == et ===

$var = 100;
$var2 = '100';

if($var == $var2){
    echo"vrai, elles ont la meme valeur <br>";
}else{
    echo'faux leur leur valeur sont differante';
}
// dans le cas si dessu , on va rentrer dans le TRUE car == va comparer les valeur
// dans le cas ve dessou on va entrer dans le FALSE (else) car === va aussi comparer leur type, qui sera differant un et un interger et l'autre un string 

if($var === $var2){
    echo"vrai, elles ont la meme valeur et le meme type <br>";
}else{
    echo'faux leur leur valeur sont la meme, mais pas le type  <br>';
}

//huiteme condition, avec la fonction predifinie isset()
//isset()est un instruction qui permet de tester si l'element soumit existe ou non 
// je pourais aussi tester si !isset(), c'est a dire n'existe pas. 
if(isset($test)){
    echo"vrais cette var existe";
}else{
    //dans la mesure ou elle n'a pas ete declarer au prealable, j'entre dans le else ... c'est FALSE
    echo "faux, cette var n'existe pas <br>"; 
}

//huit_bis syntaxe contracté
// ci dessous , pour s'habituer a la syntaxe ternaire, la meme condition que celle au-dessus 
echo(isset($test)) ? 'vrais cette variable existe' :" faux raté <br>";

// neuvieme condition, la switch

$couleur ='bleu';
// elle est equivalente a if/elseif. et plus rapide a l'execution si j'ai trop de elseif a tester (en temps relatif)
switch($couleur){
    case "vert":
        echo'la couleur est bien vert';
        // le break doit etre codé, car meme si la condition est verifier
        break;        
    case "rouge":
        echo'la couleur est bien rouge';
        break;        
    case "bleu":
        echo'la couleur est bien bleu <br>';
        break;
    default:
        echo"aucune couleur ne corespond";
        break;            
}

if($couleur == "vert"){
    echo"la couleur est vert";
}elseif($couleur == "rouge"){
    echo "la couleur est rouge";
}elseif($couleur == "bleu"){
    echo "la couleur est bleu <br>";
}else{
    echo "aucune couleur correspond";
}

// chapitre 6 les fonction predefinies

$phrase ="la vie est juste drole matashiku jinsei wa omoshiroi";
// strlen est iconv_strlen servent tout les 2 a calculer la longeur d'une chaine de chara.
echo iconv_strlen($phrase) . "<br>";
echo strlen($phrase) . "<br>";

$phrase2 ="étés";
// la differance entre les deux c'est que strlen va aussi comptabiliser les chara speciaux alors que iconev_strlen non.
// concretement avec l'exemple ci-dessous, strlen va compter 6 chara (avec les 2 accents) alors que iconv_strlen ca en trouver selement 4 
//il faudra donc decider du moment ou on va plutot l'une et pas l'autre.
echo iconv_strlen($phrase2) ."<br>";
echo strlen($phrase2) ."<br>";

//function predefinie substring()
//substr() permet de couper un morceau d'une chaine de chara. elle me permet de n'en garder qu'une partie
// ci dessous, je decide de couper ma phrase du haut en sa moiter je sais que sa longeur est de 44 (avec le strlen)
// je vais donner 3 arguments/parametres a ma function. le 1er ,c'est la var qu'elle doit traiter. le 2nd c'est le point de depart (tout retirer avant) et en dernier mon point d'arriver (tout retirer apres)
//comme je veut garder que la moitier est que je sais qu'elle fait 43 chara je decide de supprimer tout ce qui vient apes le 22 eme chara.
echo substr($phrase, 0, 22)." <br>";

// ci dessous je veut retirer le pluriel du mots étés (retirer le s) pour cela mon point d'arriver sera negatif cela signifie que je vais partir de la fin, et retirer le dernier (-1) 
// si j'avais voulu retirer les 2 dernier mot ,'jaurais ecrit -2 ect ....
echo substr($phrase2, 0,-1). "<br>";

// function predefini date()

// la function date() permet de recupere la date du jour
// et selon les argument que je lui donne, le format qui apparais au final poura etre differant 
// je peut ne demander que  le jour, le mois ou l'annee je ne suis pas de recupere la totalité des information elle nous sera utile pour par example connaitrre la date ou le client a passer sa commande
echo date("d / m / Y") . "<br>";

// function predefinie empty()
// elle va permetre de verifier si une var a recu un contenu si une valeur alui a ete ajouer. c'est differant de isset() qui lui verifie si la var declaree existe
//empty verifie si un contenue a ete afecté


if (empty($phrase)){
    echo "vrai, cette var n'a pas de contenu";
}else{
    echo "faux, cette var n'est pas vide <br>";
}

if (!empty($phrase)){
    echo "vrai, cette var n'a pas de contenu <br>";
}else{
    echo "faux, cette var n'est pas vide <br>";
}

//chapitre 7 fonction utilisateur ou developper

// ce sont celles qui ne me sont pas fournie par php, et qque je vais devoir coder pour un besoin precis
//celle ci -dessous prend un argument ($prenom). et c'est un argument que je devrais lui renseigner au moment de son execution('aziz').
function salut($prenom){
    echo'salut ' .$prenom . "<br>";
}

salut("aziz");
// function pour calculer le prix d'un produit TVA comprise 
// fonction que je vais compliquer pour la rendre plus interessante
//cette premiere function ne prend aucun argument
// ses resultat et figé il n'est pas modulable pour le moment
function claculTva(){
    //ici elle va me calculer le prix ttc(en apliquant une TVA de 20%) a une produit qui coute 100€ ht
    return 100*1.2;
}
echo claculTva() . "<br>";
//le resultat sera tjr 120€


//celle ci va me permettre d'appliquer un taux de TVA de 20%, mais a differant produits qui on differant prix
//elle prend donc un argument , le prix. valeur que je renseigerais au moment de son execution
function claculTva2($prix){
    return $prix*1.2;
}

echo claculTva2(55) . "<br>";
echo claculTva2(155) . "<br>";

//ma function evolue elle peut desormais calculer differant taux de TVA (20% et 5%) sur differant prix
// elle prend un segond argument ..... le taux de TVA qui sera rensaiger en segond ,lors de l'execution de cette function
function claculTva3($prix, $taux){
    return $prix * $taux;
}

echo "45€ ht avec un taux de TVA de 5% me donnera un prix TTC de " . claculTva3(45, 1.05) . "€<br>";

echo "45€ ht avec un taux de TVA de 20% me donnera un prix TTC de " . claculTva3(45, 1.20) . "€<br>";

//derniere amelioration.elle  peut calculer selon differant prix, mais , si je ne lui renseigne pas de le taux de TVA, elle saura qu'elle peut en appliquer par defaut($taux = 1.2/20%)
function claculTva4($prix,$taux = 1.2 ){
   return $prix * $taux;
}

// et effectivement , en dessous, si je renseigne le taux de TVA, elle appliquera celui la (1.05) mais s'il n'est pas indiquer comme le second cas, alors elle appliquera celui par defaut
echo "55€ ht avec un taux de TVA de 5% me donnera un prix TTC de " . claculTva4(55,1.05) . "€<br>";
echo "55€ ht avec un taux de TVA apr defaut de 20% me donnera un prix TTC de " . claculTva4(55) . "€<br>";

// chapitre 8 la portée de variables
//espace local = bloc d'instruction = { }

?>


-------------espace global----------------<br><br>
<!--tout code qui precede une accolade ouvrante fait partie de l'espace glo-->
                  code<br>

function monScript(){<br>
-------------espace local------------------<br><br>
<!-- l'espace local corespond a tout le code qui figure entre une acolade ouvrante et une fermanter

je peut considerer comme mon block d'instruction-->
            bloc d'instruction<br><br>

----------------espace local----------------<br>    
}<br><br>
<!-- une fois sortie de mon espace local (acolade fermante) le code qui suis fait partie de l'espace global-->
                    code<br>

-------------espace global----------------
<br>
<br>
<?php

//de l'espace glo vers l'espace local
//je declare ma var dans l'espace global
$pays = 'france';

function affichePays(){
    //le mot clef global me permet de l'importer dans l'espace local. sans cela je ne peut pas l'utiliser.'undefined variable'
    global $pays;
    echo $pays . "<br>";
}

affichePays();


// de l'espace local a l'espace gobal

function afficheJour(){
    //cette var est declarée dans l'esepace local (dans le bloc d'instructions)
    $jour = "mercredi";
    //pour la recuperer dans l'espace global, je doit utiliser le mots clef return pour 'l'exporter' ver le global
    return $jour;
}

echo afficheJour() ."<br>" ;


function afficheJour2(){
    $jour = "jeudi";
    return $jour;
    //je ne pourais executer cette instruction ci-dessous.
    //le mot clef return la precedant, il empeche toute instruction qui la suis de s'executer
    echo "demain c'est vendredi";
}

echo afficheJour2() ."<br>" ;

//chapitre 9 les boucle

// la boucle while
//j'inisialise ma var $i
//$i pour intergger, mais ce n'est pas oubligé de l'apeller ainsi
// la valeur affectée de 0 n'est pas obligatoir ici non. mais c'est une syntaxe que vous rencontrerez souvent car on travaille souvent sur les tableau avec les boucle. Et il faut savoir que la 1ere valeur d'un tab a pour indice 0, la second valeur a un indice 1, la troisiemme 2 ect .....
$i = 0;

//je debute ma boucle while, et entre ses parentheses je lui donne la condition pour qu'elle puisse s'executer . ici tant que $i est inferieur ou egale a 5, cette boucle peut tourner. si elle atteint le chiffre de 6 alors son execution s'arrete
while( $i <= 5){
    //dans son Block d'instruction ,concatenee a la valeur de $idurant  ce tour .les triter servent de separateurentre chaque boucle
    echo  "tour n° " . $i . " --- " ;
    //une fois terminer cette instruction d'affichage je demande a ce que la valeur de $i s'incremante de +1
    //$i++ est equivalent a $i = $i +1
    $i++;
    // cela veut dire qu'apres le 1er affichage ou $i a pour valeur 0, au tour suivant il aura pour valeur de 1 (0+1).
    // et ainsi de suite, a chaque tour de boucle, il prend un unitee de plus (1+1=2 puis 2+1=3 ect jusqua'a 5+1=6 ) et l'orsque sa valeur sera supperieur a la condition mise entre parenthese (<=5), l'execution de la boucle (l'affichage de echo) ne s'executra plus .$1 aura la valeur de 6 mais l'execution de l'echo ne poura pas se faire
}
echo '<br>';
//$i == 0
//while ($i <= 5){
//     echo "tour n° " . $i . " ---";
//     $i ++;
// }
$i = 0;
while($i <= 5){
    $texte ="tour n° " . $i . " --- " ;

    if($i < 5){
        echo $texte;
    }
    elseif($i == 5){
        echo substr($texte, 0, -4);
    }
    $i++;
}
// la meme boucle sans les 3 tirets apres le tours 5
echo"<br>";


$j = 0;
//equivalent a $i <=5
while ($j < 6){
    //pour ne pas avoir les tirets apres le 5eme tours je vais cibler le moment ou $j prend la valeur de 5
    if($j == 5){
        // je lui demande d'afficher ceci ,sans les tirer
        echo "tour n° " . $j . "<br>" ;
    }
    else{
        //si $j n'est pas egale a 5 (c'est a dire tout les cas de figure il affichera la meme chose , mais avec les tirets)
       echo "tour n° " . $j . " --- " ;
    }
    // attention l'incrementation de $j se fait a l'exterieurde la condition if
    $j++;
}
// while ($j < 6){

//     if($j == 5){
//         echo "tour n° " . $j ;
//     }
//     else{
//        echo "tour n° " . $j . " --- " ;
//     }
//     $j++;
// }

//la boucle do while

// l'inisialisation se faut aussi au debut
$i = 0;

//elle debute par do , qui introduit le bloc d'instruction
do{
    //l'intruction d'affichage
    echo "tour n° " . $i . " --- " ;
    // une incrementation qui ajoute +2 a chaque tour volonterment, pour montrer qu'il exsiste des technique si besoin pour ne pas sement incrementer de +1 
    $i+=2;
    // elle se termine par while, qui introduit la condition/argument
}while($i <= 10);

// do{
//     echo "tour n° " . $i . " --- " ;
//     $i+=2;
// }while($i <= 10);

echo "<br>";

// la boucle for

// son utilité est strictement similaire a celui de la while. elles font le meme travail
//la differance reside dans la syntaxe le for prend l'initialisation , la condition ainsi que l'incrementation dans ses parenthese
for($i = 0 ; $i<= 5; $i++ ){
    // reste l'instruction d'affichage dans le bloc d'instruction
    echo'tour ' . $i . "<br>";
}
//la boucle sans les commentaire
// for($i = 0 ; $i<= 5; $i++ ){
//     echo'tour' . $i . "<br>";
// }

//boucle for cas pratique
echo"<br>";
echo "<form>";
    echo "<select>";
        echo "<option selected> selectionnez l'année </option>";
        //boucle for pour cree un selecteur qui va afficher toutes les annee, de l'annee en cour(2022) a 100 en arriere (1922)
        //pour faciliter le choix je commence par l'annee la plus proche vers la plus ancienne
        //a partir de la je vais aller dans l'ordre croissant mais decroissant
        //c'est pour cela que ma condition indique que ma var $annee devras etre supperieur a lanner en cours -100 c'est (1922) c'est la date a la quelle devra se stopper ma boucle
        //ensuite ilme reste a devrementer pour diminuer la valeur de $annee pour attendre 1922
        for($annee = date('Y'); $annee >= date('Y') - 100; $annee--){
            //j'affiche m'a valeur de $anne dans le selecteur
            echo "<option>$annee</option>";
        }
    echo "</select>";
echo "</form>";
echo"<br>";
?>
<!-- le meme formulaire mais en html-->
<form action="#">
    <select name="#" id="#">
        <option value="#">Selectionnez votre année</option>
        <?php
            for($annee = date('Y'); $annee >= date('Y') - 100; $annee--){
                echo "<option>$annee</option>";
            }
        ?>
    </select>
</form>

<?php

// boucle for imbriqué

echo"<table border = '1' style = 'border-collapse:collapse'>";
    echo "<tr>";
        for($i = 1 ; $i <=10; $i++){
            echo "<td style='padding : 42px'>" . $i . "</td>";
        }
    echo "</tr>";       
echo"</table>";

echo "<br>";
echo "<br>";

echo"<table border = '1' style = 'border-collapse:collapse'>";
    for($ligne = 0 ; $ligne <=9; $ligne++){
        echo "<tr>";
            for($cellule = 1; $cellule <=10; $cellule ++){
                echo "<td style='padding : 39px'>" . (10* $ligne + $cellule) . "</td>";  
            }
        echo "</tr>";  
    }   
echo"</table>";

// chapitre 10 les inclusion de fichiers