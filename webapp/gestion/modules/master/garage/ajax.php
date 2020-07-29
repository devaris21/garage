<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);



if ($action == "verification") {
	$datas = TICKET::findBy(["id ="=> $ticket]);
	session("ticket_id", $ticket);
	if (count($datas) == 1) {
		$ticket = $datas[0];
		$data->status = true;
		if ($ticket->etatintervention_id != $cible) {
			session("cible_id", $cible);
			if (($ticket->etatintervention_id + 1) == $cible) {
				if ($ticket->isEnAttente()) {
					$data->status = false;
					$data->id = null;
					$data->message = "Le véhicule en question subit une opération en cours, veuillez d'abord la terminer";
				}
			}else{
				if ($ticket->etatintervention_id > $cible) {
					$data->id = 1;
					$data->status = false;
					$data->message = "Vous etes sur le point de retrograder le status de ce ticket, voulez-vous continuer ?";
				}else{
					if (!$ticket->isEnAttente()) {
						$data->id = 2;
						$data->status = false;
						$data->message = "Vous etes sur le point de sauter certaines étapes de ce ticket, voulez-vous continuer ?";
					}else{
						$data->status = false;
						$data->id = null;
						$data->message = "Le véhicule en question subit une opération en cours, veuillez d'abord la terminer";
					}
				}
			}
			$data->modal = !in_array($cible, [ETATINTERVENTION::DEVIS, ETATINTERVENTION::LIVRAISON, ETATINTERVENTION::TERMINE]);
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite lors de l'opération !";
	}
	echo json_encode($data);
}



if ($action == "retrograde") {
	$datas = TICKET::findBy(["id ="=> $ticket]);
	if (count($datas) == 1) {
		$ticket = $datas[0];
		$a = $ticket->etatintervention_id - $cible;
		for ($i=0; $i < $a; $i++) { 
			$ticket->back();
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite lors de l'opération !";
	}
	echo json_encode($data);
}





if ($action == "validerTache") {
	$ticket_id = getSession("ticket_id");
	$cible_id = getSession("cible_id");
	$datas = TICKET::findBy(["id ="=> $ticket_id]);
	if (count($datas) == 1) {
		$ticket = $datas[0];
		$data = $ticket->next($cible_id, $mecanicien);
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite lors de l'opération !";
	}
	echo json_encode($data);
}