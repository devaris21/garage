<?php 
namespace Home;
VEHICULE::ETAT();
unset_session("produits");
unset_session("commande-encours");

$reservations = RESERVATION::findBy(["etat_id ="=>ETAT::ENCOURS, "started >="=>dateAjoute(), "started <="=>dateAjoute(8)], [], ["started"=>"ASC"]);

$title = "LOCA // Tableau de bord";
?>