<?php require_once('inc/header.php'); 
//je verifie que je recois dans l'url (avec $_GET ) un valeures avec isset quelle et de type numerique avec le 'ctype_digit) et qu'elle ne soit pas inferieur a 1 la valeur minimal pour un id auto incrementer
if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])|| $_GET['id'] < 1){
    // si ce n'est pas le cas,j'empeche a'acceder a la page show avec une mavaise valeurs en renvoyant vers la page list.php
    //on renvoie vers une autre page avec header('location:versAutrePage.php')
    //header etant la fonctionn predefini et location le parametre a lui donner completer du nom du fichier vers le quel on veut rediriger
    header('location:list.php');
}

if($_POST){
    //je verifie le contenu du champs reservation_message
    //qu'il existe qu'il n'a pas reçu moins de 3 chara et plus de 200 chara sinon je genere un msg d'erreur
    if(!isset($_POST['reservation_message']) || iconv_strlen($_POST['reservation_message']) <= 3  || iconv_strlen($_POST['reservation_message']) >200){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur reservation message !</div>';
    }
    // si aucun msg d'erreur n'a ete generer,c'est que $erreur n'a pas recu de valeur donc je peut enclencher la precedure d'envoie des donner en BDD
    if(empty($erreur)){
        //j'utilise mon objet $pdo pour interagir avec la BDD
        //je fait un requete preparer pour securiser l'envoie des donnees
        //je vais faire une modif en BDD d'iu l'usage de la requete UPDATE
        //je fait correspondre les indice conserner en BDD avec son equivalent avec un marquer nomée(:)
        //le WHERE sert a  faire correspondre le vehicule qui a cette id (dans cette pages) avec le vehicule qui a le meme id en BDD
        $ajoutMessage = $pdo->prepare("UPDATE vehicule SET id = :id, reservation_message = :reservation_message WHERE id = :id");
        //je code les bindValue pour faire correspondre l'indice avec le pointeur nommeé(:) avec la valeur recu du formulaire + j'indique le type de cette valeur(PARAM_INT pour le type interger  )
        $ajoutMessage->bindValue(':id', $_POST['id'],PDO::PARAM_INT);
        $ajoutMessage->bindValue(':reservation_message', $_POST['reservation_message'],PDO::PARAM_STR);
        //une fois les blindValue scriptés, j'execute ma requete préparée (obligatoire)
        $ajoutMessage->execute();

        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">

        <strong>Félicitations !</strong> reservation reussi
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

            <span aria-hidden="true">&times;</span>

        </button>

        </div>';
    }
    

}

//avec l'objet $pdo je vais pouvoir aller selectionner tout ce qui conserne le vehicule je le fait avec la requete de type query
// je demande a $pdo de cibler l'id qui sera egale , similaire a l'id recuperer dans l'url ($_GET ['id])
$afficheInformation = $pdo->query("SELECT * FROM vehicule WHERE id=$_GET[id]");

// a present avec fetch je vais chercher les info concerner par la requete le select juste en haut
// je suis obliger de proceder aen 2 etape d'abort le select puis le fetch
$information = $afficheInformation->fetch(PDO::FETCH_ASSOC);
//desormais je dispose de toute les valeur stocker en en BDD il ne me restera plus qu'a crocheter les bon indice  du tableau


//je calcule le delai entre le jours ou l'utilisateur vois l'annonce et le jours ou elle a ete publier
//la date de publication je peut l'obtenir en crochetant a l'indice['created_at] present dans la BDD
//je doit utiliser strtotime () pour convertir cette valeur qui est stoquer en tant que string(chaine de chara)vers un type numerique
//cette valeurs desormais numerique aura comme uniter de valeur des sec
$date_debut = strtotime($information['created_at']);
//la date d'aujourd hui je la recupere avec date() celle ci aussi sera en seconde
$date_fin = time();
//je vais donc soustraire la valeur de date_fin a date_debut; puis convertir ce resultat exprimer en seconde en jours.
// pour cela je ddiviser ce nombre par 86400
//86400 et egale a 60(sec) x 60(min) x 24(heures)
//j'utilise la fonction predefini round()pour arrondir le resultat de cette soustraction au resultat inferieur
// il existe un autre fonction pour arondire au chiffre superieur, c'est ceil()
$delai =round (($date_fin - $date_debut) / 86400);

if (empty($information['reservation_message'])){
    echo'Je suis quand meme une vrais merde, je sais meme pas comment je fait pour y arriver';
}



?>
<!--je crochete a l'indice du tableau dont j'ai besoin pour avoir un h1 dynamique le titre generé sera differant selon la voiture sur la quelle on aura cliquer-->
<h1 class="text-center text-danger my-5">voiture <?=$information['title'] ?> en <?= $information['type']?></h1>

<a href="list.php"><button class="btn btn-outline-danger">Retour à la liste des biens</button></a>
<hr>
<?=$erreur?>
<?=$content?>

<div class="card col-md-6 my-5 border border-warning text-center">

    <div class="card-header">
        <!-- pareille que pour le h1 je crochete a l'indice du tableau qui m'intersse-->
    Le véhicule <?= $information['title']?> est disponible à <?= $information['city']?> (code postal: <?= $information['code_postal']?> )
    </div>

    <div class="card-body">
        <h5 class="card-title">Ce véhicule est proposé à la <?= $information['type']?> au prix de 
        <!--je fait une condition pour avoirun affichage differant selon si c'est une ventre ou une location-->
        <?php if($information['type'] == 'vente'){ echo $information['price'].'€';}else{echo $information['price'].' €/J';}?></h5>
        <!-- meme condition mais en contracter-->
        <!--<?php if($information['type'] == 'vente'): ?>
                <?= $information['price'] . "€" ?>
            <?php else: ?>
                <?= $information['price'] . "€/j" ?>
            <?php endif; ?>
        -->

        <p class="card-text"><?= $information['description']?></p>

    </div>

    <div class="card-footer text-muted">
    <!--je fait un condition pour prendre en compte deux cas de figure-->            
    <!--si le nombre de jours ecoule despuis la puiblication de l'anonce est egala 0 alors je ne veux pas afficher 0 jours mais aujourd'hui--> 
        <p>
            Annonce postée <?php if($delai == 0){echo "aujourd'hui";}else{ echo "il y'a ".  $delai .' jour(s)';}
            ?> 
        </p> 

    </div>
    <!--j'ajoute une condition ici car j'ai pour l'instant un deux msg contradictoir en front
    selon si le vehicule et soit reserver soit non seul un des 2 msg doit apparaitre, en revanche le message du haut ainsi que le formulaire pour reserver doit disparaitre-->           
    <?php if(empty($information['reservation_message'])):?>
        <p>
            <strong>
                Ce véhicule n'est pas réservé ! Soyez les premiers à laisser un message afin que le propriétaire vous recontacte.
            </strong>

            <form class="mx-5" action="" method="post">
                <!--je recupere l'id du vehicule ici pour envoyer cette info dans le if($_POST) pour que php sache quel id vehicule il doit modifieren BDD 
                je meten type=hidden car cet input de doit pas apparaitre en affichage j'en est besoin pour transmetre l'info au if POST mais il ne doit surtot pas apparaitre au risque d'entrainer des modif non voulu en BDD-->
                <input type="hidden" name="id" value="<?= $_GET['id']?>">
                <div class="form-group">
                    <label for="formReservationMessage">Message de réservation</label>
                    <textarea name="reservation_message" id="formReservationMessage" rows="5" class="form-control" placeholder="Donnez un maximum de coordonnées pour que le propriétaire vous recontacte !"></textarea>
                </div>

                <button class="btn btn-outline-danger mt-3">Je réserve ce véhicule !</button>
            </form>
        </p>
    <?php else:?>
        <div class="alert alert-warning">

            <p>
                Ce véhicule a été reservé, voici le message du futur conducteur :
                <hr>
                <em><?= $information['reservation_message']?></em>
            </p>
            
        </div>
    <?php endif?>

</div>

<?php require_once('inc/footer.php');

