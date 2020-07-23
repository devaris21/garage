<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "planning") {
	$datas = TICKET::findBy(["id ="=> $ticket]);
	if (count($datas) == 1) {
		$ticket = $datas[0];
		if ($cible == "attente") {
			$data = $ticket->back();
		}else{
			$datas = MECANICIEN::findBy(["id ="=> $cible]);
			if (count($datas) == 1) {
				$mecanicien = $datas[0];
				$data = $ticket->next(null, $mecanicien->id);
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération !";
			}
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite lors de l'opération !";
	}
	echo json_encode($data);
}

