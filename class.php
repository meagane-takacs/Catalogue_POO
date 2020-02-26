<?php

//Création d'une classe Article ayant comme attributs : Nom - description - Prix - Image - Poids - Stock - Dispo
class Article
{
    public $Nom;
    public $description;
    public $Prix;
    public $Image;
    public $Poids;
    public $Stock;
    public $Disponible = false;

//Création d'une fonction displayArticle() qui admet en paramètre un objet Article

    public function __construct($name, $Prix, $Image)
    {
        $this->Nom = $name;
        $this->Prix = $Prix;
        $this->Image = $Image;
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


    public function __construct($name, $Prix, $Image, $Pointure)
    {
        parent::__construct($name, $Prix, $Image);
        $this->Pointure = $Pointure;
    }
}

class Vetements extends Article
{
    public $Taille;

    public function __construct($name, $Prix, $Image, $Taille)
    {
        parent::__construct($name, $Prix, $Image, $Taille);
        $this->Taille = $Taille;
    }
}


Class Panier {
    public $panier= array();

    public function addPanier($idArticle){
        if (array_key_exists($idArticle, $this->panier)) {
            $this->panier [$idArticle] += 1;
        } else {
            $this->panier [$idArticle] = 1;
        }
    }

    public function update ($idArticle,$qte){
        $this-> panier [$idArticle] += $qte;
    }

    public function delete($idArticle){
        unset($this -> panier[$idArticle]);
    }
}