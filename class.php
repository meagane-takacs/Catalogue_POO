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
    public $Article = [];

    public function __construct($name, $Prix, $Image)
    {
        $this->Nom = $name;
        $this->Prix = $Prix;
        $this->Image = $Image;
    }

    

    public function displayCat(Catalogue $Catalogue)
    {
        //permet l'affichage du catalogue en Html
    }
}

class Clients
{

}

class ListeClients
{
}

