<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "calculReservation") {
	$data = new RESPONSE;

	$typefonction = " AND typevehicule_id = $typevehicule_id AND fonctionvehicule_id = $fonctionvehicule_id";
	$place = " AND nbPlaces >= $min AND nbPlaces <= $max";

	$clim = "";
	if ($climatisation != "a") {
		$clim = " AND climatisation = $climatisation";
	}

	$energie = "";
	if ($energie_id != 1) {
		$energie = " AND energie = $energie_id";
	}

	$transmission = "";
	if ($transmission_id != 1) {
		$transmission = " AND transmission = $transmission_id";
	}

	$requette = "SELECT * FROM infovehicule WHERE 1 $typefonction $place $energie $transmission $clim ";
	//var_dump($requette);

	if ($marques != "") {
		$marques = explode(",", $marques);
	}else{
		$marques = [];
	}
	
	if ($equipements != "") {
		$equipements = explode(",", $equipements);
	}else{
		$equipements = [];
	}

	$datas = INFOVEHICULE::execute($requette, []);

	foreach ($datas as $key => $info) {
		$info->actualise();
		if (count($marques) > 0 && !in_array($info->vehicule->marque_id, $marques)) {
			unset($datas[$key]);
			continue;
		}

		foreach ($equipements as $key => $value) {
			if (count($info->fourni("equipement_infovehicule", ["equipement_id ="=>$value])) == 0) {
				unset($datas[$key]);
				continue;
			}
		}
	}

	$data->nb = count($datas);
	echo json_encode($data);
}

