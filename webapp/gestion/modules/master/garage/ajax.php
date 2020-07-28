<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);



if ($action == "verification") {
	$datas = TICKET::findBy(["id ="=> $ticket]);
	if (count($datas) == 1) {
		$ticket = $datas[0];
		$data->status = true;
		if ($ticket->etatintervention_id != $cible) {
			if (($ticket->etatintervention_id + 1) == $cible) {

			}else{
				if ($ticket->etatintervention_id > $cible) {
					$data->status = false;
					$data->message = "Vous etes sur le point de retrograder le status de ce ticket, voulez-vous continuer ?";
				}else{
					$data->status = false;
					$data->message = "Vous etes sur le point de sauter certaines étapes de ce ticket, voulez-vous continuer ?";
				}
			}
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite lors de l'opération !";
	}
	echo json_encode($data);
}



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
				if ($ticket->isEnAttente()) {
					$data = $ticket->back();
				}
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

