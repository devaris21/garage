<?php 
namespace Home;
unset_session("tableau");

$interventions = INTERVENTION::findBy(["etat_id ="=>ETAT::ENCOURS]);
foreach ($interventions as $key => $value) {
	$value->actualise();
	if ($value->ticket->etat_id != ETAT::ENCOURS) {
		unset($datas[$key]);
	}
}
$title = "GRG | Espace d'Administration ";
?>