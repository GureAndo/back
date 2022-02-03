<?php
$pdo = new PDO('mysql:host=localhost;dbname=dialogue','root', '',array(
    PDO::ATTR_ERRMODE=> PDO::ERRMODE_WARNING, 
    PDO:: MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
));
// j'inisialise les variable erreur et content
$erreur= '';
$content= '';

if(!isset($_GET['id'])|| !ctype_digit($_GET['id'])|| $_GET['id'] < 1){

    header('test.php');
}


$afficheInformation = $pdo->query("SELECT * FROM commentaire WHERE id_commentaire = $_GET[id]");
$info= $afficheInformation->fetch(PDO::FETCH_ASSOC);;
?>

<table>
    <thead>
        <tr>
            <th>
                prenom
            </th>
            <th>
                message
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
            <strong><?= strtoupper($info['pseudo']) ?></strong>
            </td>
            <td>
            <strong><?= strtoupper($info['message']) ?></strong>
            </td>

        </tr>
    </tbody>
</table>