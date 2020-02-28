<?php

include('functions_BDD.php');
include('functions.php');
session_start();
var_dump($_SESSION);

$bdd = connection();
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

<div class="cmdOk"><?php
  echo "Votre commande a bien été prise en compte";
  ?>
</div>


</body>

