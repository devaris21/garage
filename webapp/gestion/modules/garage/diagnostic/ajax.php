<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);
var_dump($_POST);



exit;
if ($action == "enregistrerDiagnostic") {
	$datas = TICKETREPARATION::findBy(["id = "=>$ticket_id, "etat_id ="=>ETAT::ENCOURS]);
	if (count($datas) > 0) {
		$ticket = $datas[0];

		$mecaniciens = explode(",", $mecaniciens);
		$pannes = explode(",", $pannes);
		$reparations = explode(",", $reparations);
		$pieces = explode(",", $pieces);

		if (count($pannes) > 0) {
			if (count($réparations) > 0) {
				if (count($mecaniciens) > 0) {
					$diagnostic = new DIAGNOSTIC;
					$diagnostic->hydrater($_POST);
					$data = $diagnostic->enregistre();
					if ($data->status) {
						foreach ($mecaniciens as $key => $value) {
							$ligne = LIGNEMACANICIENDIAGNOSTIC();
							$ligne->mecanicien_id = $value;
							$ligne->diagnostic_id = $diagnostic->id;
							$ligne->enregistre();
						}

						foreach ($mecaniciens as $key => $value) {
							$ligne = LIGNEPANNEDIAGNOSTIC();
							$ligne->diagnostic_id = $diagnostic->id;
							$ligne->panne = $value;
							$ligne->enregistre();
						}

						foreach ($mecaniciens as $key => $value) {
							$ligne = LIGNEPIECEDIAGNOSTIC();
							$ligne->diagnostic_id = $diagnostic->id;
							$ligne->piece = $value;
							$ligne->enregistre();
						}

						foreach ($mecaniciens as $key => $value) {
							$ligne = LIGNEREPARATIONDIAGNOSTIC();
							$ligne->diagnostic_id = $diagnostic->id;
							$ligne->reparation = $value;
							$ligne->enregistre();
						}
					}
				}else{
					$data->status = false;
					$data->message = "Veuillez renseigner le(s) mecanicien(s) qui ont fait le diagnostic !";
				}
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner les réparations à faire !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner les pannes constatées !";
		}



		$employe->actualise();
		if ($employe->checkPassword($password)) {
			$datas = CLIENT::findBy(["id=" => $client_id]);
			if (count($datas) > 0) {
				$client = $datas[0];
				$data = $client->crediter(intval($montant), $_POST);
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !";
			}
		}else{
			$data->status = false;
			$data->message = "Votre mot de passe ne correspond pas !";
		}
	}else{
		$data->status = false;
		$data->message = "Vous ne pouvez pas effectué cette opération !";
	}
	echo json_encode($data);
}



if ($action == "dette") {
	$datas = EMPLOYE::findBy(["id = "=>getSession("employe_connecte_id")]);
	if (count($datas) > 0) {
		$employe = $datas[0];
		$employe->actualise();
		if ($employe->checkPassword($password)) {
			$datas = CLIENT::findBy(["id=" => $client_id]);
			if (count($datas) > 0) {
				$client = $datas[0];
				$data = $client->reglerDette(intval($montant), $_POST);
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !";
			}
		}else{
			$data->status = false;
			$data->message = "Votre mot de passe ne correspond pas !";
		}
	}else{
		$data->status = false;
		$data->message = "Vous ne pouvez pas effectué cette opération !";
	}
	echo json_encode($data);
}


if ($action == "rembourser") {
	$datas = EMPLOYE::findBy(["id = "=>getSession("employe_connecte_id")]);
	if (count($datas) > 0) {
		$employe = $datas[0];
		$employe->actualise();
		if ($employe->checkPassword($password)) {
			$datas = CLIENT::findBy(["id=" => $client_id]);
			if (count($datas) > 0) {
				$client = $datas[0];
				$data = $client->rembourser(intval($montant), $_POST);
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !";
			}
		}else{
			$data->status = false;
			$data->message = "Votre mot de passe ne correspond pas !";
		}
	}else{
		$data->status = false;
		$data->message = "Vous ne pouvez pas effectué cette opération !";
	}
	echo json_encode($data);
}


if ($action == "annuler") {
	$datas = MISSION::findBy(["id ="=> $id]);
	if (count($datas) == 1) {
		$mission = $datas[0];
		$data = $mission->annuler();
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
	}	
	echo json_encode($data);
}