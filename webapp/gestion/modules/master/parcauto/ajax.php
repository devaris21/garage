<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "newVehicule") {
	$vehicule = new VEHICULE;
	$vehicule->hydrater($_POST);
	$files = [];
	if (isset($_FILES)) {
		foreach ($_FILES as $key => $value) {
			if ($key !== "id" && $value != "") {
				$files[] = $value;
			}
		}
	}
	$vehicule->files = $files;
	$data = $vehicule->enregistre();
	if ($data->status) {
		$data->setUrl("gestion", "master", "vehicule", $vehicule->id);
		$info = new INFOVEHICULE;
		$info->hydrater($_POST);
		$info->vehicule_id = $vehicule->id;
		$data = $info->enregistre();
		if ($data->status) {
			$equipements = explode(",", $equipements);
			foreach ($equipements as $key => $value) {
				$equip = new EQUIPEMENT_INFOVEHICULE();
				$equip->equipement_id = $value;
				$equip->infovehicule_id = $info->id;
				$equip->enregistre();
			}

			$accessoires = explode(",", $accessoires);
			foreach ($accessoires as $key => $value) {
				$acce = new ACCESSOIRE_INFOVEHICULE();
				$acce->accessoire_id = $value;
				$acce->infovehicule_id = $info->id;
				$acce->enregistre();
			}
		}
	}
	echo json_encode($data);
}


