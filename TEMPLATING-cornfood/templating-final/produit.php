<?php

// CHARGE LES DATAS DES PRODUITS
require_once 'datas/products.php';

// VÉRIFIE SI ON A BIEN REÇU UNE DEMANDE DE PRODUIT
if (!isset($_GET['id'])){
    header('location:index.html');
    die();
}
$id = $_GET['id'];

// CHARGE LE PRODUIT DEMANDÉ
$product = $products[$id];

// CALCUL DU SCORE MOYEN DES COMMENTAIRES
$scoreMoy = 0;
foreach($product['customers_comm'] as $comm){
    $scoreMoy += $comm['score'];
}
$scoreMoy = round($scoreMoy/count($product['customers_comm']));

// CHARGE LE TEMPLATE DU DÉTAIL D'UN PRODUIT
require_once 'templates/produit.phtml';