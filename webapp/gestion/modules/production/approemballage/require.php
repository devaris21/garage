<?php 
namespace Home;

unset_session("ressources");

$title = "GRG | Toutes les livraisons en cours";

$approvisionnements = APPROEMBALLAGE::getAll();
$total = 0;
foreach ($approvisionnements as $key => $liv) {
	if ($liv->etat_id == ETAT::ENCOURS) {
		$total++;
	}
}


?>