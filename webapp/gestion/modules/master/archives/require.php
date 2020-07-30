<?php 
namespace Home;

$tickets = TICKET::getAll();
foreach ($tickets as $key => $value) {
	$value->actualise();
}

$title = "GRG | Espace d'Administration ";
?>