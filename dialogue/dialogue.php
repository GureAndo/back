<?php
// initsialisation de la BDD
$bdd = new PDO('mysql:host=localhost;dbname=dialogue','root', '',array(
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// j'inisialise les variable erreur et content
$erreur= '';
$content= '';

if($_POST){
    // controle syntaxe pour un preg_match() qui permet les chara speciaux
    if(!isset($_POST['pseudo']) || !preg_match("#^[a-zA-Z0-9._-ô]{1,20}$#", $_POST['pseudo'])){
        $erreur .="<div class='alert alert-warning' role='alert'> Format Pseudo </div>";
    }
    // controle du nombre de chara pour le mdg
    if(!isset($_POST['message']) || iconv_strlen($_POST['message']) <= 3  || iconv_strlen($_POST['message']) >300){
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur message !</div>';
    }
    
    //insertion des donner dans la BDD si erreur est vide 
    if(empty($erreur)){
        $ajoutMessage = $bdd->prepare("INSERT INTO commentaire (pseudo, message, date_enregistrement)VALUE (:pseudo, :message,NOW())");
        $ajoutMessage->bindValue(':pseudo', $_POST['pseudo'],PDO::PARAM_STR);
        $ajoutMessage->bindValue(':message', $_POST['message'],PDO::PARAM_STR);
        $ajoutMessage->execute();
        

        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">

                        <strong>Félicitations !</strong> Ajout du message réussie !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

                            <span aria-hidden="true">&times;</span>

                        </button>

                    </div>';
    }

}
//affichage des donner dans la page
// $afficheMessage = $bdd->query("SELECT * FROM commentaire ORDER BY pseudo LIMIT 8");
$afficheMessage = $bdd->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS dateFR, DATE_FORMAT(date_enregistrement, '%H/%i/%s') AS heureFR  FROM commentaire ORDER BY pseudo LIMIT 8");


// $message = $afficheMessage->fetch(PDO::FETCH_ASSOC);
// $date_debut = strtotime($message['date_enregistrement']);
// $date_fin = time();
// $delai = round (($date_fin - $date_debut) / 86400);



?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dialogue</title>
    <!--cdn css de bootstap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-black container">

    <!--petite bannier et le h1 pour rendre sa plus agrable-->
    <img src="img/cc18109e-18a4-4f01-a35b-be91dddb6701-profile_banner-480.png" alt="bannier guren" loading = 'lazy' title="Andô" class="col-12">

    <h1 class="text-center mt-5 text-danger">Exo Boite de dialogue</h1>

    <!--mes varriable d'erreur et de de reussite-->
    <?= $erreur?>
    <?= $content?>

    <!--formulaire le pseudo, le message, la date et le button-->   
    <form class="py-5" method="POST" action="">

        <!--pseudo-->
        <div class='mb3 - col-12'>
            <label for="pseudo" class="form-label text-danger">pseudo</label>
            <input type="text" id="pseudo" name="pseudo" class="form-control" placeholder="Votre pseudo" class="bg-danger">
        </div>

        <!--message-->
        <div class="mb-3 col-12">
            <label for="message" class="form-label text-danger">message</label>
            <textarea class="form-control" name="message" id="message" cols="30" rows="10" placeholder="Votre Message" class="bg-danger"></textarea>
        </div>
    
        <!--bouton-->
        <button type="submit" class="btn btn-danger col-12">envoyer</button>

    </form>
    <!--la boucle while qui sert a afficher les pseudo, la date et les commentaire -->
    <h2 class="container text-center text-danger"><?= $afficheMessage->rowCount()?> Message envoyer</h2>
    <div class='blockquote p-5 text-justify shadow mt-5 bg-white rounded'>
        <?php while($info = $afficheMessage->fetch(PDO::FETCH_ASSOC)):?>     
        <h3 class="md-5"> par: <?=$info['pseudo']?> . poster le: <?=$info['dateFR']?></h3>
        <p>Commentaire: </p>
        <p><?=$info['message']?></p>
        <?php endwhile?>
    </div> 
    <a href="test.php?id=<?= $info['id']?>" class="btn btn-danger">Voir l'annonce</a> 
    

<!-- cdn js bootsrap-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>