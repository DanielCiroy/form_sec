<?php
try
{
    // On se connecte à MySQL
    $mysqlClient = new PDO('mysql:host=localhost;dbname=my_recipes;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM recipes';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();

// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['author']; ?></p>
<?php
}
?>
Affichez seulement le contenu de quelques champs
Avec ce que je vous ai appris, vous devriez être capable d'afficher ce que vous voulez.
Personne ne vous oblige à afficher tous les champs !

Par exemple, si j'avais juste voulu lister les noms des recettes et le nom de l'auteur, j'aurais utilisé la requête SQL suivante :

<?php

$sqlQuery = 'SELECT title, author FROM recipes';