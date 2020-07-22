<?php 
namespace Home;
$title = "GRG | Attribution de travail ";

$groupes = GROUPEMECANICIEN::getAll();

$tickets = TICKET::findBy(["etatintervention_id >"=>ETATINTERVENTION::ESSAI_AVANT_CHEF, "etatintervention_id <"=>ETATINTERVENTION::ESSAI_APRES_CHEF]);


?>