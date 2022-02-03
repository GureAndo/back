<?php

$bdd = new PDO('mysql:host=localhost;dbname=dialogue','root', '',array(
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// j'inisialise les variable erreur et content
$erreur= '';
$content= '';



if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])|| $_GET['id'] < 1){
    // si ce n'est pas le cas,j'empeche a'acceder a la page show avec une mavaise valeurs en renvoyant vers la page list.php
    //on renvoie vers une autre page avec header('location:versAutrePage.php')
    //header etant la fonctionn predefini et location le parametre a lui donner completer du nom du fichier vers le quel on veut rediriger
    header('dialogue.php');
}



$afficheInfo = $bdd->query("SELECT * FROM commentaire");
?>
<table class="table table-striped">
<thead>
    <tr>
        <th>prenom</th>
        <th>message</th>
        <th>message</th>
        <th>message</th>
    </tr>
</thead>
<tbody>
    <?php while($info = $afficheInfo->fetch(PDO::FETCH_ASSOC)):?>
        <tr>
            <td>
                <strong><?= strtoupper($info['pseudo']) ?></strong>
            </td>
            <td>
            <a href="test2.php?id=<?= $info['id_commentaire'] ?>"><button type="button" class="btn btn-danger">Voir le reste</button></a>
            </td>
        </tr>
    <?php endwhile?>
</tbody>
</table>
  