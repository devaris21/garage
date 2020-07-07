<?php 
namespace Home;

$title = "GRG | Toutes les commandes en cours";

GROUPECOMMANDE::etat();
$groupes = GROUPECOMMANDE::encours();

?>