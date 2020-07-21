<?php 
namespace Home;

$essais = ESSAI::findBy(["typeessai_id != "=>TYPEESSAI::APRES, "etat_id ="=>ETAT::ENCOURS]);
foreach ($essais as $key => $value) {
	$value->actualise();
	if ($value->ticket->etat_id != ETAT::ENCOURS) {
		unset($datas[$key]);
	}
}
$title = "GRG | Espace d'Administration ";
?>