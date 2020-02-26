<!--LE FICHIER CATALOGUE EST LA PREMIERE PAGE QUE L'ON VOIT EN TAPANT SUR INTERNET POUR CHOISIR UN PRODUIT SI ON EST UN ACHETEUR-->


<!-- on affiche le tableau qui nous servira plus tard-->
<?php
session_start();

//if (!empty ($_POST))
//{
//    $_SESSION=$_POST;
//}

include('functions_BDD.php');
$bdd = connection();

$tableArticle = $bdd->query('SELECT * FROM articles');


//On inclut la fonction (c'est la boite à outils)
include("functions.php");


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
    //Je stocke ma fonction add article, dans ma variable $catalogue qui était vide au départ
    $catalogue ->addArticle(new Article($donnees['nom'], $donnees['prix'], $donnees['img']));
    //Ceci permet l'affichage html de mon catalogue.
    displayCat(new Article($donnees['nom'],$donnees['prix'], $donnees['img']));
    }



    var_dump($catalogue);
    ?>


    <input class="submit" type="submit" value="Ajoutez au panier">



</form>



</body>

