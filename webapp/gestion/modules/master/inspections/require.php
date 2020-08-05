<?php 
namespace Home;

$title = "GRG | Liste des reservations ";
VEHICULE::etat();

$inspections = INSPECTION::findBy(["etat_id ="=>ETAT::ENCOURS]);
?>