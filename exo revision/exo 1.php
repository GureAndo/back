<!-- /* vous cree un tableau PHP consernant les pays suivant : France, italie, espagne ,Allemagne, Inconu aux quel vous assoucierles valeurs suivante : paris, rome ,madrid; berlin,'?' */ -->
<!-- vous parcourer ce tableau pour afficher la phrase "la capital x se situe en y dans un paragraphe (ou x remplace la capitale et y le pays"  -->
<!-- pour le pays 'inconue vous afficher ca n'esxiqste pas a la place de ka phrase precedente -->

<?php
//ici je cree un variable ou je stock un tableau associatif
$TablePays = array('France'=>'paris', 'Italie'=>'Rome', 'Espagne'=>'Madrid', 'Allmagne'=>'Berlin', 'inconnu'=>'?' );
// ici je verifie mon tableau 
echo print_r($TablePays ) . "<br>";

// la boucle foreach pour sortir les indice et les valeur de mon tableau sous forme de phrase 
// foreach($TablePays as $key => $value){
//     echo "<p>la capitale " . $value ." se situe en " . $key. "</p>";
// }
$TablePays['japon'] = 'Tokyo';
 echo count($TablePays) . "<br>";// la je compte le nombrre de valeur de mon tableeu
// dans la boucle foreach j'y est ajouter une condition pour lui dire que ci l'indicee est egale a inconnu alors a la place de m'afficher la phrase de base elle m'affiche que le pays n'existe pas et que sinon sa ecrit la phrase normalment
foreach($TablePays as $key => $value){
    if($key == 'inconnu'){
        echo'ce pays n\'existe pas';
    }else{  
    echo "<p>la capitale " . $value ." se situe en " . $key. "</p>";
    }
}


echo "<br>";
echo "<br>";
echo "________________________________________________________________________________________________________________";

//j'ai rajouter le la capital tokyo et la pays japon pour tester la 2eme methode d'ajoue dans un tableau et pour rendre la condition plus "complexe on va dire " psk on peut pas dire 'en' japon mais 'au' japon 


foreach($TablePays as $key => $value){
    
    if($key == 'inconnu'){
        echo'ce pays n\'existe pas';
    }elseif($key =='japon'){
        echo'<p> la capitale ' . $value . ' se situe  au ' . $key . '</p>';
    }
    else{  
    echo "<p>la capitale " . $value ." se situe en " . $key. "</p>";
    }
}

