<!--MA PAGE PANIER EST LA PAGE QUI MONTRE A L'ACHETEUR CE QU'IL A SELECTIONNER DANS SON TABLEAU
 C'EST LE FICHIER QUI RECUPERE LES INFOS QUE L'UTILISATEUR A RENTRE-->

<?php //var_dump($_POST);

include_once('functions_BDD.php');
include_once('functions.php');
require_once('class.php');
$bdd = connection();
session_start();

//je creer un nouveau panier dans l'instance panier
$panier = new Panier();
$sum = 0;
if (!isset($_POST['choix'])) {
    echo "Votre panier est vide";
} else {
    $_SESSION = $_POST;
    //je fais une boucle sur mon tableau choix
    foreach ($_POST['choix'] as $productId) {
        //je passe dans le tableau tentacles qui définit mes quantité, et dans chacun de mes articles avec $idproduct
        $qty = $_POST['tentacles'][$productId];
        // j'apelle ma fonction get Article qui permet de récupérer les articles dans une variable (mais on a que l'id des articles)
        $article = getArticles($productId, $bdd);
        //j'apelle la fonction addPanier qui me permet d'ajouter, modifier ou supprimer les quantités d'un article/un article
        $panier->addPanier($productId, $qty);
        //l'add article reste toujours sur l'index 0 puisque c'est une boucle. On lui dit donc tu appelle la fonction add article qui permet de récupérer les données de l'article et pas seulement
        //l'id pour ensuite pouvoir l'afficher dans mon panier
        $panier->addArticle($article[0]);
    }
    //pour chaque article du panier

    foreach ($panier->getArticle() as $article) {
        // Je calcule la somme en faisant prix * qte pour chaque article
        $sum = $sum + ($article->getPrix() * $article->getQuantite());
    }

}


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
    foreach ($panier->getArticle() as $article) {
        //je prend la fonction affiche Article Panier pour récupérer toute mes données d'articles et pouvoir les afficher dans mon panier
        afficheArticlePanier($article->getId(), $article->getNom(), $article->getPrix(), $article->getImage(), (int)$article->getQuantite());
    }
    ?>
    <div class="TotalPanier">
        <?php
        //J'affiche ma somme dans mon html
        echo "Total du panier : " . $sum . " euros"; ?>
    </div>





</form>

<?php

//var_dump($_SESSION);
?>

<form method="POST" action="commande_post.php">
    <?php foreach ($panier->getArticle() as $article) {
        ?>
        <input type="hidden" name="choix[]" class="choice" value="<?php echo $article->getId() ?>">
    <?php }

    if (!isset($_POST['choix'])) {

    } else { ?>
            <input class="submit" type="submit" value="Commander"> <?php

    }?>

</form>

<?php


?>


</body>
</html>