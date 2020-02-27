<!--MA PAGE PANIER EST LA PAGE QUI MONTRE A L'ACHETEUR CE QU'IL A SELECTIONNER DANS SON TABLEAU
 C'EST LE FICHIER QUI RECUPERE LES INFOS QUE L'UTILISATEUR A RENTRE-->

<?php //var_dump($_POST);

include_once('functions_BDD.php');
include_once('functions.php');
require_once('class.php');
$bdd = connection();
session_start();

if (!empty($_POST)) {
    $_SESSION = $_POST;
//    var_dump($_POST);
    //je creer un nouveau panier dans l'instance panier
    $panier = new Panier();
    $catalogue = new Catalogue();
    //je fais une boucle sur mon tableau choix
    foreach ($_POST['choix'] as $productId) {
        //je passe dans le tableau tentacles qui définit mes quantité, et dans chacun de mes articles avec $idproduct
        $qty = $_POST['tentacles'][$productId];
        // j'apelle ma fonction get Article qui permet de récupérer les articles dans une variable
        $article = getArticles($productId, $bdd);

        //j'apelle la fonction addPanier qui me permet d'ajouter, modifier ou supprimer les quantités d'un article/un article
        $panier->addPanier($productId, $qty);
//            //je modifie mon panier a chaque fois que je passe dans un article
//            $panier->update($productId, $qty);
        $panier->addArticle($article[0]);
    }
    foreach ($panier->getArticle() as $article) {
        afficheArticlePanier($article->getId(), $article->getNom(), $article->getPrix(), $article->getImage(), $article->getQuantite());
    }
//    afficheArticlePanier($article->$productId, 'bla', '20', 'image.png', '2');
//    var_dump($panier);
//    die();
//    displayPanier(new Panier());

}


if (!isset ($_POST['choix'])) {
//J'affiche ceci:
    echo "Votre panier est vide";
} else {


$idIn = implode(",", $_SESSION['choix']);
$tableArticle = getArticles($idIn, $bdd);


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


    <div class="TotalPanier">
        <?php
        echo "Total du panier : " . $qty . " euros"; ?>
    </div>

    <input class="submit" type="submit" value="Mettre à jour le panier">

</form>

<form method="POST" action="commande_post.php">
    <input class="submit" type="submit" value="Commander">
</form>

<?php
}

?>


</body>
</html>