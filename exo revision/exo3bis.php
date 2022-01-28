<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone VARCHAR(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

        /* SUITE DE L'EXERCICE 3
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".
 */




?>
<?php

// inisialisation de la BDD
$bdd = new PDO('mysql:host=localhost;dbname=contacts','root', '',array(
    
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
   
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));

$erreur= '';
$content= '';

//differante verif pour le formulaire 


if($_POST){

    if(!isset($_POST['nom']) || iconv_strlen($_POST['nom']) <= 2  || iconv_strlen($_POST['nom']) >20){  
        $erreur .= '<div ><p>Erreur Nom !</p></div>';
    }

    if(!isset($_POST['prenom']) || iconv_strlen($_POST['prenom']) <= 2  || iconv_strlen($_POST['prenom']) >20){  
        $erreur .= '<div >Erreur Prenom !</div>';
    }

    if(!isset($_POST['telephone']) || !preg_match("#^[0-9]{10}$#",$_POST['telephone'])){
        $erreur .= '<div >Erreur telephone !</div>';
    }
    // if(!isset($_POST['email']) || $_POST['email'])){
    //     $erreur .= '<div >Erreur mail !</div>';
    // }

    if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $erreur .= '<div >Erreur mail !</div>';
    }


    if(!isset($_POST['type_contact']) || $_POST['type_contact']  !='ami' && $_POST['type_contact'] != 'famille' && $_POST['type_contact']!='professionnel'  && $_POST['type_contact']!='autre'){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format Type !</div>';
    }
    
    if(empty($erreur)){
    $contact = $bdd->prepare("INSERT INTO contact (nom, prenom, telephone, annee_rencontre, email, type_contact)VALUE (:nom, :prenom, :telephone, :annee_rencontre, :email, :type_contact)");
    $contact->bindValue(':nom', $_POST['nom'],PDO::PARAM_STR);
    $contact->bindValue(':prenom', $_POST['prenom'],PDO::PARAM_STR);
    $contact->bindValue(':telephone', $_POST['telephone'],PDO::PARAM_INT);
    $contact->bindValue(':annee_rencontre', $_POST['annee_rencontre'],PDO::PARAM_STR);
    $contact->bindValue(':email', $_POST['email'],PDO::PARAM_STR);
    $contact->bindValue(':type_contact', $_POST['type_contact'],PDO::PARAM_STR);
    $contact->execute();
    }

    $content .= '<p> reussi</p>';

}

?>
<!-- // forumaire
// ---------------------------------- -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO 3</title>
</head>
<body>

    <?= $erreur?>
    <?= $content?>
    <form method="post">


        <div>
            <label for="nom">nom</label>
            <input id="nom" name="nom" type="text" class="form-control" placeholder="entrer votre nom" required value="">
        </div>

        <div>
            <label for="prenom">prenom</label>
            <input id="prenom" name="prenom" placeholder="entrer votre prenom" required></input>
        </div>

        <div>
            <label for="telephone">numero de telephone</label>
            <input id="telephone" name="telephone" type="text" placeholder="tel" value="" required>
        </div>

        <div>
            <label for="annee_rencontre">annees de rencontre</label>
            <select name="annee_rencontre" id="annee_rencontre">
                <option value="#">Selectionnez votre année</option>
                <?php
                for($annee = date('Y'); $annee >= date('Y') - 100; $annee--){
                echo "<option>$annee</option>";
                }
                ?>
            </select>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="text" placeholder="Mail" value="" required>
        </div>

        <div class="form-group my-2">
            <label for="type_contact">Type contact</label>
            <select name="type_contact" id="type_contact" class="form-control" required>
                <option value="ami" >ami</option>
                <option value="famille" >famille</option>
                <option value="professionnel" >professionnel</option>
                <option value="autre" >autre</option>
            </select>
        </div>

        <button type="submit">VALIDER</button>


    </form>



    <!-- suite la reucperation dans le tableau-->
    <?php 
    $afficheContact = $bdd->query("SELECT * from contact");

    ?>
    <table>
    <thead>
        <tr>
            <th>nom</th>
            <th>prenom</th>
            <th>tel</th>
            <th>autre info</th>
        </tr>
    </thead>
    <tbody>
        <!-- var contact2 pour stoquer les donnees et petite boucle pour les recuperer de la bdd grace a la function predefini fetch--->
        <?php while($contact2 = $afficheContact->fetch(PDO::FETCH_ASSOC)):?>
            <tr>
                <td>
                    <?=$contact2['nom'] ?>
                </td>

                <td>
                    <?=$contact2['prenom'] ?>
                </td>

                <td>
                    <?=$contact2['telephone'] ?>
                </td>
                <td>
                    <button>
                        <select name="#" id="#">
                            <option><?=$contact2['annee_rencontre'] ?></option>
                            <option><?=$contact2['email'] ?></option>
                            <option><?=$contact2['type_contact'] ?></option>
                        </select>
                    </button>
                </td>
            </tr>
        <?php endwhile?>
    </tbody>
</table>


</body>
</html>