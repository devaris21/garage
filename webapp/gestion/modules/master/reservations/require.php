<?php 
namespace Home;

$title = "GRG | Liste des reservations ";

$reservations = RESERVATION::findBy(["etat_id ="=>ETAT::ENCOURS], [], ["started"=>"ASC", "finished"=>"ASC", "created"=>"ASC"]);
?>