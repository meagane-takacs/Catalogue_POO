<?php

//Création d'une classe Article ayant comme attributs : Nom - description - Prix - Image - Poids - Stock - Dispo
class Article
{
    private $id;
    private $Nom;
    private $description;
    private $Prix;
    private $Image;
    private $Poids;
    private $Stock;
    private $Disponible = false;
    private $quantite;
//Création d'une fonction displayArticle() qui admet en paramètre un objet Article

    public function __construct($id, $name, $Prix, $Image)
    {
        $this->id = $id;
        $this->Nom = $name;
        $this->Prix = $Prix;
        $this->Image = $Image;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getNom()
    {
        return $this->Nom;
    }

    public function setNom($Nom)
    {
        $this->Nom = $Nom;
    }


    public function getDescription()
    {
        return $this->description;
    }


    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getPrix()
    {
        return $this->Prix;
    }


    public function setPrix($Prix)
    {
        $this->Prix = $Prix;
    }


    public function getImage()
    {
        return $this->Image;
    }

    public function setImage($Image)
    {
        $this->Image = $Image;
    }

    public function getPoids()
    {
        return $this->Poids;
    }

    public function setPoids($Poids)
    {
        $this->Poids = $Poids;
    }

    public function getStock()
    {
        return $this->Stock;
    }


    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }


    public function isDisponible()
    {
        return $this->Disponible;
    }

    public function setDisponible($Disponible)
    {
        $this->Disponible = $Disponible;
    }

    public function addQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function getQuantite()
    {
        return $this->quantite;
    }

}

class Catalogue
{
    //Je creer un tableau d'articles
    public $Article = [];

//Ma fonction addArticle permet de ne pas passer par le construct et par un tableau tmp qui stockera mes données
    public function addArticle($Article)
    {
        // La variable $Article que j'ai en paramètre  est égal au tableau d'objet article, et tout cela est contenu ça $this (donc objet courant
        $this->Article[] = $Article;

    }

    public function addArticleShoes($Article)
    {
        // La variable $Article que j'ai en paramètre  est égal au tableau d'objet article, et tout cela est contenu ça $this (donc objet courant
        $this->Article[] = $Article;

    }

    public function addArticleVet($Article)
    {
        // La variable $Article que j'ai en paramètre  est égal au tableau d'objet article, et tout cela est contenu ça $this (donc objet courant
        $this->Article[] = $Article;

    }
}

// Similaire à mon article
class Client
{
    public function __construct($id, $nom)
    {
        $this->id = $id;
        $this->nom = $nom;
    }

}

//Similaire à mon catalogue
class ListeClients
{
    // Je creer un tableau clients
    public $Client = [];

    public function addClient($Client)
    {
        $this->Client[] = $Client;
    }
}


class Chaussure extends Article
{

    public $Pointure;


    public function __construct($id, $name, $Prix, $Image, $Pointure)
    {
        parent::__construct($id, $name, $Prix, $Image);
        $this->Pointure = $Pointure;
    }
}

class Vetements extends Article
{
    public $Taille;

    public function __construct($id, $name, $Prix, $Image, $Taille)
    {
        parent::__construct($id, $name, $Prix, $Image);
        $this->Taille = $Taille;
    }
}


Class Panier {

    public $panier= array();
    public $article= array();

    public function addPanier($idArticle, $qty){
        if (array_key_exists($idArticle, $this->panier)) {
            $this->panier [$idArticle] += $qty;
        } else {
            $this->panier [$idArticle] = $qty;
        }
    }

    public function update ($idArticle,$qte){
        $this-> panier [$idArticle] += $qte;
    }

    public function delete($idArticle){
        unset($this -> panier[$idArticle]);
    }

    public function addArticle($article)
    {
        $articleObject = new Article($article['idArticles'], $article['nom'], $article['prix'], $article['img']);
        $articleObject->addQuantite($this->panier[$article['idArticles']]);
        $this->article[] = $articleObject;
        // La variable $Article que j'ai en paramètre  est égal au tableau d'objet article, et tout cela est contenu ça $this (donc objet courant
    }


    public function getArticle()
    {
        return $this->article;
    }


}