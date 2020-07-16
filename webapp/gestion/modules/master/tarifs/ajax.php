<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "newTarif") {
	if ($fonctions != "") {
		$tarif = new TARIFVEHICULE;
		$tarif->hydrater($_POST);
		$data = $tarif->enregistre();
		if ($data->status) {
			$fonctions = explode(",", $fonctions);
			foreach ($fonctions as $key => $value) {
				$info = new TARIF_FONCTION;
				$info->tarifvehicule_id = $tarif->id;
				$info->fonctionvehicule_id = $value;
				$data = $info->enregistre();
			}
		}
	}else{
		$data->status = false;
		$data->status = "Veuillez selectionner les games de vehicules qui appliquent ce tarif !";
	}
	
	echo json_encode($data);
}


