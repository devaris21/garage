<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\BINDING;
use Native\RESPONSE;

$params = PARAMS::findLastId();

$data = new RESPONSE;
extract($_POST);


if ($action == "validerLocation") {
	if (isset($vehicule_id)) {
		$datas = RESERVATION::findBy(["id ="=>$reservation_id]);
		if (count($datas) > 0) {
			$reservation = $datas[0];
			$datas = VEHICULE::findBy(["id ="=>$vehicule_id]);
			if (count($datas) > 0) {
				$vehicule = $datas[0];
				$location = new LOCATION;
				$location->cloner($reservation);
				$location->id = null;
				$location->typelocation_id = TYPELOCATION::DIRECT;
				$location->vehicule_id = $vehicule->id;
				$location->location_id_reservation = $reservation->id;
				$location->started = date("Y-m-d");
				$data = $location->enregistre();
				if ($data->status) {
					$data = $reservation->valider();
					if ($data->status) {
						$datas = $reservation->fourni("reglementclient");
						foreach ($datas as $key => $value) {
							$value->location_id = $location->id;
							$value->save();
						}
					}
				}
			}else{
				$data->status = false;
				$data->message = "Veuillez verifier les dates pour cette opération !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez verifier les dates pour cette opération !";
		}
	}else{
		$data->status = false;
		$data->message = "Veuillez selectionner un vehicule pour commencer la location !";
	}
	echo json_encode($data);
}