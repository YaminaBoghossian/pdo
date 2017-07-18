<?php
function myLoader($className) {
    $class = str_replace('\\', '/', $className);
    require ($class .'.php');
}

spl_autoload_register('myLoader');

//fonction qui par defaut va appliquer un auto include en se basant
//sur le namespace . Elle va tt mettre en minuscule, et regarder si un fichier sapelle de la 
//meme maniere que la classe en minuscule. Quand on est sur windows, ca marche automatiquement
//mais sur linux, le spl autoload va chercher uniquement ceux en minuscule et nos noms de fichiers 
//ne sont pas en minuscule.
//la convention est de marquer nom de la classe avec premiere lettre en maj, donc il y a une 
//fonction auto load perso (que l'on a utilisé)qui nous permettra de chercher les noms des classes correspondant, 
//elle fait un require des classes.
//sinon utiliser un autre editeur de texte pour creer nom de la classe en minuscule 
//

use entities\lildoggo;
var_dump(new lildoggo('test', 'test', new DateTime(), false));

try{
    
//on cree une instance de pdo en lui fournissant le domaine ou 
//se trouve notre mysql on lui indique le nom de la bdd a laquelle on
//se connecte avec dbname puis on lui donne 
//le username et le password en deuxieme et troisieme argument.

$db = new PDO ('mysql:host=localhost;dbname=firstdb','admin','simplon');

//On utilise la methode query de notre database pdo qui attend
//en argument une requete sql classique
//on selectionne tous les lildoggo

$query = $db->query('SELECT * FROM lildoggo');
//On lui dit dexecuter la requete 

//On utilise le fetch() pour positionner le curseur sur la ligne de resultat suicant on le fait
//a linterieur dun while afin de recuperer tout les resultats de notre requete.

//Il y a plusieurs manieres de faire mais le fetch est une bonne methode.


//pour afficher la liste de tous les chiens avec leur attributs on utilise un while et 
//des echos 
$chiens = [];
while ($ligne = $query->fetch()){
 
        echo '<ul>';
        echo '<li>'. $ligne['id'] . '</li>';
        echo'<li>'. $ligne['name'].'</li>';
        echo'<li>'.$ligne['race'].'</li>';
        echo'<li>'.$ligne['birthdate'].'</li>';
        echo'<li>'.$ligne['isgood'].'</li>';
        echo '</ul>';
    }
    var_dump($chiens);
  
} catch (PDOException $exception) {
    echo $exception->getMessage();
 
}


