<?php 
namespace Home;
unset_session("vehicules-louer");
unset_session("vehicules-preter");

$locations = LOCATION::getAll();
// $loues = VEHICULE::loues();
// $pretes = VEHICULE::pretes();

$title = "AMB | Locations & prets de véhicules ";
?>