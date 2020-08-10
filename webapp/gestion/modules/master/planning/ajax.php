<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);

if ($action == "changement") {
	$data->status = false;
	if ($type == "reservation") {
		$datas = RESERVATION::findBy(["id ="=>$id, "etat_id ="=>ETAT::ENCOURS]);
		if (count($datas) == 1) {
			$data->status = true;
			$item = $datas[0];
		}
	}else {
		$datas = LOCATION::findBy(["id ="=>$id, "etat_id ="=>ETAT::ENCOURS]);
		if (count($datas) == 1) {
			$data->status = true;
			$item = $datas[0];
		}
	}

	if ($data->status) {
		$item->started = date("Y-m-d", strtotime($start));
		$item->finished = dateAjoute1(date("Y-m-d", strtotime($end)), -1);
		$item->sentense = "Changement de date pour la $type N°$item->reference";
		$data = $item->save();
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
	}
	echo json_encode($data);
}


