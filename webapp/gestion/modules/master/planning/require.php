<?php 
namespace Home;
$title = "GRG | Attribution de travail ";

$groupes = GROUPEMECANICIEN::getAll();

$tickets = TICKET::enAttente();

?>