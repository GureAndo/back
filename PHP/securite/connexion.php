<?php
$pdo = new PDO('mysql:host=localhost;dbname=securite','root', '',array(

    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// en cas d'envoi de donnees dans le formulaire (if($_POST))
$erreur= '';
$content= '';

if($_POST){
    //avec cette requette je vais aller comparer le pseudo envoyer dans le formulaire avec un pseudo similaire exisantnt en bdd
    $_POST['pseudo'] = htmlentities($_POST['pseudo'],ENT_QUOTES);
    $_POST['mdp'] = htmlentities($_POST['mdp'],ENT_QUOTES);
    $rechercheMembre = $pdo->query("SELECT * FROM membre WHERE pseudo ='$_POST[pseudo]'AND mdp = '$_POST[mdp]'");

    $membre = $rechercheMembre->fetch(PDO::FETCH_ASSOC);
}



?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="container bg-dark text-danger">
    <h1 class="my-5 text-center">Espace Connexion</h1>

    <form class="py-5" method="post">
        <div class="mb-3 col-12">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
        </div>
        
        <div class="mb-3 col-12">
            <label for="mdp" class="form-label">Mot de passe</label>
            <input type="text" class="form-control" id="mdp" name="mdp" placeholder="Votre mot de passe">
        </div>

        <button type="submit" class="btn btn-danger">Connexion</button>

    </form>

    <?php if($_POST):?>
        <h2 class="my5 text-danger">votre profil</h2>
        <?php if(!empty($membre)):?>
            <?= print_r($rechercheMembre)?>
            <h3>felicitation, vous ete conecter</h3>
            <p>vous ete : <?= $membre['pseudo']?></p>
            <p>votre mail est : <?=$membre['email']?></p>
        <?php else:?>
            <h3 class="text-warning">votre conexion a echouer</h3>
        <?php endif?>
    <?php endif;?>    



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>