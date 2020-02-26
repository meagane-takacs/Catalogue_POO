<!--LE FICHIER CATALOGUE EST LA PREMIERE PAGE QUE L'ON VOIT EN TAPANT SUR INTERNET POUR CHOISIR UN PRODUIT SI ON EST UN ACHETEUR-->


<!-- on affiche le tableau qui nous servira plus tard-->
<?php
session_start();

//if (!empty ($_POST))
//{
//    $_SESSION=$_POST;
//}

include_once('functions_BDD.php');
$bdd = connection();

$tableArticle = $bdd->query('SELECT * FROM `articles` LEFT JOIN chaussures ON articles.idArticles = chaussures.idArticle LEFT JOIN vetements ON articles.idArticles = vetements.idArticle');


//On inclut la fonction (c'est la boite à outils)
include_once("functions.php");
require_once("class.php")


?>

<!DOCTYPE html>
<html>
<head>
    <title>Catalogue</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style_catalogue5.css">
</head>
<body>

<div id="Boutique">BOUTIQUE</div>

<!--Je creer mon formulaire globale qui permet de submiter-->
<form method="POST" action="panier.php">


    <?php
    //Je creer un nouveau catalogue mais vide que je stocke dans la variable $catalogue
    $catalogue = new Catalogue();
    //Je fais une boucle sur mon tableua d'article dans ma BDD
    while ($donnees = $tableArticle->fetch()) {
        //si il existe une pointure
        if (isset($donnees['Pointure'])) {
            $catalogue->addArticleShoes(new Chaussure($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img'], $donnees['Pointure']));
            displayCat(new Article($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img']));
        } else if (isset($donnees['Taille'])) {
            $catalogue->addArticleVet(new Vetements($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img'], $donnees['Taille']));
            displayCat(new Article($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img']));
        } else {
            $catalogue->addArticle(new Article($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img']));
            displayCat(new Article($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img']));
        }
    }
    //Ceci permet l'affichage html de mon catalogue.


    var_dump($catalogue);
    ?>


    <input class="submit" type="submit" value="Ajoutez au panier">


</form>


</body>

