<?php 
namespace Home;
unset_session("tableau");

$devis = DEVIS::findBy(["etat_id ="=>ETAT::ENCOURS]);
foreach ($devis as $key => $value) {
	$value->actualise();
	if ($value->ticket->etat_id != ETAT::ENCOURS) {
		unset($datas[$key]);
	}
}
$title = "GRG | Espace d'Administration ";
?>