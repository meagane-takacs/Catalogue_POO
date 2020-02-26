<?php
include_once('functions.php');
include_once('functions_BDD.php');
$bdd = connection();
require_once('class.php');

$tableClients = $bdd->query('SELECT * FROM clients');

//Je creer un nouveau clients mais vide que je stocke dans la variable $clients
$ListeClients = new ListeClients();
//Je fais une boucle sur mon tableau clients dans ma BDD
while ($donnees = $tableClients->fetch()) {
    //Je stocke ma fonction add clients, dans ma variable $catalogue qui était vide au départ
    $ListeClients->addClient(new Client($donnees['idClients'], $donnees['nom']));
    //Ceci permet l'affichage html de ma list Client.
    displayCli(new Client($donnees['idClients'],$donnees['nom']));
}
