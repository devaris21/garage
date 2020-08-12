<?php 
namespace Home;

$title = "GRG | Liste des reservations ";
VEHICULE::etat();

$reservations = DEVIS::findBy(["etat_id ="=>ETAT::ENCOURS], [], ["started"=>"ASC", "finished"=>"ASC", "created"=>"ASC"]);
?>