<?php
require_once('inc/header.inc.php');

echo "<h1 class='my-5 text-center'>Initiation au PHP Orienté Objet</h1>";
echo "<h2>Introduction</h2>";
echo"<p>La Programmation Orienté Objet / POO (qui concerne tous les langages, pas que PHP) s'est imposée au dépend de la programmation procédurale, car elle permet une <strong>meilleure maintenance</strong> des sites webs </p>";
echo"<p>Programmer en procédural reste gérable pour de petits projets, mais pas pour les gros</p>";
echo"<p>Néanmoins, sa syntaxe est totalement valide. Aucune différence en terme de performances, fonctionnalités ou validité. Le procédural est équivalent à l'orienté objet dans ces domaines</p>";
echo"<p>Mais, la norme aujourd'hui est l'orienté objet</p>";
echo"<p>La POO repose sur <strong>4 principes</strong>: Abstraction, Encapsulation, Héritage et Polymorphisme</p>";
echo "Durant cette initiation nous ne ferons qu'effleurer le concept d'<strong>encapsulation</strong>";
echo '<p>Le principe d\'encapsulation permet de regrouper toutes les caractéristiques (propriétés ou attributs et méthodes) communes à un même classe. Il sera plus facile ensuite de venir faire des corrections, modifications ou ajouts dans un même fichier plutot que de chercher dans un dossier, différents fichiers ces mêmes caractéristiques. Cela rend plus facile cette maintenance</p>';
echo "<h2 class='mt-5'>Syntaxe</h2>";
echo "<p>Par convention, chaque classe est codée dans son propre fichier </p>";
echo "<p>Chaque fichier devra débuter par le <strong>mot clé \"class\"</strong>, suivi du nom de la classe qui devra etre similaire au nom du fichier, en commençant par une majuscule</p>";
echo "<p>En Php OO, nous ne parlerons plus de variables, mais de <strong>propriétés</strong> ou d'<strong>attributs</strong>. Ces derniers vont avoir la même fonction que la variable en procédural, mais ils porteront ce nom désormais</p>";
echo "<p>En Php OO, nous ne parlerons plus non plus de fonctions, mais de <strong>méthodes</strong>. Utilité similaire, mais comme pour les variables, il s'agit juste d'un changement de vocabulaire</p>";
echo "<p>En Php OO, il existe trois niveaux de visibilité. <strong>Private</strong>, le plus restrictif. <strong>Protected</strong> et <strong>public</strong>, le plus permissif, code qui est le plus ouvert / visible / lisible dans tout le projet</p>";
echo "<p>Nous utiliserons ici seulement le niveau public, qui nous simplifiera le code pour une première approche.</p>";
echo "<p>Pour exploiter les caractèristiques de ma classe (ses propriétés, et méthodes) je vais devoir créer un objet de ma classe</p>";
echo'<p>Pour le créer je dois utiliser le <strong>mot clé new</strong> tel que ceci: <mark>$habitant = new Habitant</mark></p>';
echo "<p>On dira que j'ai <strong>instancié</strong> ma classe Habitant. Mon objet sera une <strong>instance</strong> de ma classe. Je peux ainsi créer plusieurs objets de cette classe. Elle leur servira de moule</p>";

class Habitant{

    // je declare la propriété $prenom à laquelle j'affecte la valeur 'Aziz', avec un niveau de visibilité public
    public $prenom = 'Aziz';
    public $age = 53;

    public function ville(){
        // ma méthode ville(), de niveau de visibilité public, aura pour seule fonction de me retourner le mot 'Créteil' lors de son exécution
        return 'Créteil';
    }
}

// pour créer un objet (queje nomme $habitant) de ma classe Habitant, je dois utiliser le mot clé new
// si je dois créer un second objet de cette même classe, je le nommerais, par exemple, $habitant2, toujours en utilisant le mot clé new
$habitant = new Habitant;
$habitant2 = new Habitant;

echo "<p>Voici le résultat du var_dump de cet objet crée</p>";
echo "<pre>"; var_dump($habitant); echo "</pre>";
echo '<p>Le résultat m\'indique que $habitant est bien un objet de ma classe Habitant</p>';
echo '<p>Pour récupérer les valeurs de mes attributs/propriétés et exécuter mes méthodes, je vais devoir utiliser une syntaxe particulière</p>';
echo '<p>Pour récupérer la valeur d\'un attribut, je vais utiliser cette syntaxe <mark>$habitant->prenom</mark> ou <mark>$habitant->age</mark>. Je dois faire correspondre à mon objet son attribut avec la fleche -></p>';
echo '<p>Pour exécuter ma méthode, je vais utiliser cette syntaxe <mark>$habitant->ville()</mark>. Je dois faire correspondre à mon objet sa méthode avec la fleche -> . Je n\'oublie pas les parenthèses car c\'est une méthode et non une propriété</p>';

echo "Je me prénomme " . $habitant->prenom . ", j'ai " . $habitant->age . " ans et je réside à " . $habitant->ville() . ".";

echo "<h2 class='mt-5'>En résumé</h2>";
echo "<p>Je peux considérer que ma classe est un moule, qui servira à <strong>instancier</strong> différents objets (autant que je le veux) que je pourrai différencier plus tard les uns par rapport aux autres (nous verrons comment plus tard)</p>";



require_once('inc/footer.inc.php');