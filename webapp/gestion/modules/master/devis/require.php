<?php 
namespace Home;

$title = "GRG | Liste des reservations ";
VEHICULE::etat();

$devis = DEVIS::findBy(["etat_id ="=>ETAT::ENCOURS], [], ["created"=>"DESC", "started"=>"ASC"]);
?>