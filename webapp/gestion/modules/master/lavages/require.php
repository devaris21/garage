<?php 
namespace Home;
unset_session("tableau");

$lavages = LAVAGE::findBy(["etat_id ="=>ETAT::ENCOURS]);
foreach ($lavages as $key => $value) {
	$value->actualise();
	if ($value->ticket->etat_id != ETAT::ENCOURS) {
		unset($datas[$key]);
	}
}
$title = "GRG | Espace d'Administration ";
?>