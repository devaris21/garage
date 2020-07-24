<?php 
namespace Home;
unset_session("taches");
unset_session("pieces");

$diagnostics = DIAGNOSTIC::findBy(["etat_id ="=>ETAT::ENCOURS]);
foreach ($diagnostics as $key => $value) {
	$value->actualise();
	if ($value->ticket->etat_id != ETAT::ENCOURS) {
		unset($datas[$key]);
	}
}
$title = "GRG | Espace d'Administration ";
?>