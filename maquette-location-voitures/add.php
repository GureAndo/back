<?php require_once('inc/header.php');

//if(POST) permet de dire à PHP de ne s'occuper du traitement qui va suivre seulement dans le cas ou des info auron ete envoyer dans le fromulaire.Sinon il ne fait rien 
// et c'est plutot bien, car au premiere chargement de catte page, au moment ou je l'affiche, je n'ai encore justement pas remplis le formulaire . sans cela , j'aurais eu le droit a un warning, unidentified $var ect.... 
if($_POST){
    //je verifie deux chose ici. la 1ere c'est que le champs est bien renseigne (avec isset, s'il ne l'est pas alors cela engendra une erreur) le second parametre conserne la longeur de chaine de chara (avec icon_strlen) il elle est inferieure a 3 ou supperieur a 20, cela engendra aussi un erreur
    //j'utilise iconv_strlen mais vous rencontrerez souvent la syntaxe avec strlen .c'est un choix de ma part  je le trouve plus judicieux mais l'autre et tres utilse aussi
    if(!isset($_POST['title']) || iconv_strlen($_POST['title']) <= 3  || iconv_strlen($_POST['title']) >20){
        //le msg d'erreur qui s'affiche si la donnéé n'existe pas ou si la longeure de la chaine de chare (string) ne corespond pas 
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur Titre/Marque !</div>';
    }

    // je fait la meme verification que precedament si la donner existe, et la longeur de la chaine de chara, sauf que j'autorise que cette longeur soit plus importante dans la meusur ou le texte a generer le necesite (description)
    if(!isset($_POST['description']) || iconv_strlen($_POST['description']) <= 3  || iconv_strlen($_POST['description']) >200){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur description !</div>';
    }

    //a nouveau verification si l'envoi de donnees a ete effectuer ou non.
    //j'utiliser cette fois un preg_match pour controler la valeur envoyee.
    //avec cette syntaxd j'autorise tous les chifre de 0 a 9 [0-9] et j'e veut obligatoirùent 5 chifre (ni plus ni moin c'est un code postal en france){5}
    if(!isset($_POST['code_postal']) || !preg_match("#^[0-9]{5}$#",$_POST['code_postal'])){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur code postal !</div>';
    }
    
    //la meme chose que les 2 premier on a juste changer les valeur a verifier
    if(!isset($_POST['city']) || iconv_strlen($_POST['city']) <= 2  || iconv_strlen($_POST['city']) >30){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur Ville !</div>';
    }

    //a nouveau verification si l'envoi de donnees a ete effectuer ou non.
    //j'utiliser cette fois un preg_match pour controler la valeur envoyee.
    //avec cette syntaxd j'autorise tous les chifre de 0 a 9 [0-9] et j'autorise aussi 1 seul chiffre (je loue a caisse 5€/j jusqua 7, je vend ma caisse 1 000 000 , de 1 jusqu'a 7){1,7}
    if(!isset($_POST['price']) || !preg_match("#^[0-9]{1,7}$#",$_POST['price'])){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur code prix !</div>';
    }
    
    //verification du champ selecteur.en plus de la donnee qui existe cette donner ne poura etre differante de location et vente si aucune des deux  ne correspond alors message d'erreur
    if(!isset($_POST['type']) || $_POST['type']  !='location' && $_POST['type'] != 'vente'){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format Type !</div>';
    }

    if(empty($erreur)){
        $ajoutVehicule = $pdo->prepare("INSERT INTO vehicule (title, description, code_postal, city, price, type, created_at)VALUE (:title, :description, :code_postal, :city, :price, :type,NOW())");
        $ajoutVehicule->bindValue(':title', $_POST['title'],PDO::PARAM_STR);
        $ajoutVehicule->bindValue(':description', $_POST['description'],PDO::PARAM_STR);
        $ajoutVehicule->bindValue(':code_postal', $_POST['code_postal'],PDO::PARAM_INT);
        $ajoutVehicule->bindValue(':city', $_POST['city'],PDO::PARAM_STR);
        $ajoutVehicule->bindValue(':price', $_POST['price'],PDO::PARAM_INT);
        $ajoutVehicule->bindValue(':type', $_POST['type'],PDO::PARAM_STR);
        $ajoutVehicule->execute();
        

        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">

                        <strong>Félicitations !</strong> Ajout du véhicule réussie !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>';
    }
}


//fermeture passage PHP
?>

<h1 class="text-center text-danger my-5">Ajouter une annonce</h1>

<?= $erreur?>
<?= $content?>

<form class="col-md-6 mb-5" method="post" action="">

    <p class= 'mb-2'> *Champs obligatoires</p>
    <div class="form-group my-2">
        <label for="title">Titre *</label>
        <input id="title" name="title" type="text" class="form-control" placeholder="La marque de votre véhicule..." required value="">
    </div>

    <div class="form-group my-2">
        <label for="description">Description *</label>
        <textarea id="description" name="description" id="" cols="30" rows="5" class="form-control" placeholder="Une description sincère de l'état du véhicule et de ses équipements !" required></textarea>
    </div>

    <div class="form-group my-2">
        <label for="code_postal">Code postal *</label>
        <input id="code_postal" name="code_postal" type="text" class="form-control" placeholder="code postal" value="" required>
    </div>

    <div class="form-group my-2">
        <label for="city">Ville *</label>
        <input id="city" name="city" type="text" class="form-control" placeholder="Ville" value="" required>
    </div>

    <div class="form-group my-2">
        <label for="price">Tarif *</label>
        <div class="input-group">
            <input id="price" name="price" type="price" class="form-control" placeholder="prix à la location/jour ou prix de vente" required>
            <div class="input-group-append">
                <div class="input-group-text">€</div>
            </div>
        </div>
    </div>

    <div class="form-group my-2">
        <label for="type">Type *</label>
        <select name="type" id="type" class="form-control" required>
            <option value="location" >Location</option>
            <option value="vente" >Vente</option>
        </select>
    </div>

    <button type="submit" class="btn btn-outline-danger mt-5">Créer une annonce</button>

  
</form>

<?php require_once('inc/footer.php');