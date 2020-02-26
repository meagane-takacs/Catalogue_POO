<!--MA PAGE PANIER EST LA PAGE QUI MONTRE A L'ACHETEUR CE QU'IL A SELECTIONNER DANS SON TABLEAU
 C'EST LE FICHIER QUI RECUPERE LES INFOS QUE L'UTILISATEUR A RENTRE-->

<?php //var_dump($_POST);

include_once('functions_BDD.php');
include_once('functions.php');
require_once('class.php');

session_start();

if(!empty($_POST))
{
    $_SESSION = $_POST;
    var_dump($_POST);
    $panier = new Panier();
        foreach ($_POST['choix'] as $productId)
        {
            $panier->addPanier($productId);
            $qty = $_POST['tentacles'][$productId];
        }
        var_dump($panier);

}



if (!isset ($_POST['choix'])) {
//J'affiche ceci:
    echo "Votre panier est vide";
} else {

$bdd = connection();
$idIn = implode(",", $_SESSION['choix']);
$tableArticle = $bdd->query('SELECT * FROM `articles` WHERE articles.idArticles IN (' . $idIn . ')');


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
   <form method="POST" action="panier.php">


        <?php
        $sum = 0;
        while ($donnees = $tableArticle->fetch()) {

//            $panier->afficheArticlepanier(new panier ($['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img'], $_POST['tentacles'][$donnees['idArticles']]));
//            $sum = totalPanier($sum, $donnees['prix'], $_SESSION['tentacles'][$donnees['idArticles']]);
//            displayPanier(new panier ($donnees['idArticles'], $donnees['nom'], $donnees['prix'], $donnees['img'], $_POST['tentacles'][$donnees['idArticles']]));
        }
        ?>
       <div class="TotalPanier">
           <?php
           echo "Total du panier : " . $sum . " euros"; ?>
       </div>

        <input class="submit" type="submit" value="Mettre à jour le panier">

    </form>

   <form  method="POST" action="commande_post.php">
       <input class="submit" type="submit" value="Commander">
   </form>

    <?php
}

?>


</body>
</html>