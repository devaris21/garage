<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "newTicket") {
	if ($name != "") {
		if ($constat != "") {
			if ($immatriculation != "") {
				if ($typereparations != "") {
					if (intval($kilometrage) > 0) {
						$auto = new AUTO;
						$auto->hydrater($_POST);
						$data = $auto->enregistre();

						if ($data->status) {
							$client = new CLIENT;
							$client->hydrater($_POST);
							$data = $client->enregistre();

							if ($data->status) {
								$ticket = new TICKET;
								$ticket->hydrater($_POST);
								$ticket->auto_id = $auto->id;
								$ticket->client_id = $client->id;
								$data = $ticket->enregistre();

								if ($data->status) {
									$typereparations = explode(",", $typereparations);
									foreach ($typereparations as $key => $value) {
										$item = new TICKET_TYPEREPARATION;
										$item->ticket_id = $ticket->id;
										$item->typereparation_id = $value;
										$item->enregistre();
									}

									$equipementautos = explode(",", $equipementautos);
									foreach ($equipementautos as $key => $value) {
										$item = new LISTEEQUIPEMENTAUTO;
										$item->ticket_id = $ticket->id;
										$item->equipementauto_id = $value;
										$name = "equipementauto-".$value;
										$item->quantite = $_POST[$name];
										$item->enregistre();
									}

									$enjoliveurs = explode(",", $enjoliveurs);
									foreach ($enjoliveurs as $key => $value) {
										$item = new LISTETYPEENJOLIVEUR;
										$item->ticket_id = $ticket->id;
										$item->typeenjoliveur_id = $value;
										$item->enregistre();
									}
								}
							}
						}
					}else{
						$data->status = false;
						$data->message = "Veuillez renseigner le kilometrage du véhicule !";
					}
				}else{
					$data->status = false;
					$data->message = "Veuillez selectionner le/les types de reparation à effectuer !";
				}
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner l'immatriculation du véhicule !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le constat préalable du client !";
		}
	}else{
		$data->status = false;
		$data->message = "Veuillez renseigner le nom complet du client !";
	}

	echo json_encode($data);
}



if ($action == "newEssai") {
	$datas = TICKET::findBy(["id ="=>$ticket_id]);
	if (count($datas) == 1) {
		$ticket = $datas[0];

		$essai = new ESSAI;
		$essai->hydrater($_POST);
		$essai->ticket_id = $ticket->id;
		$data = $essai->enregistre();
		if ($data->status) {
			$data = $ticket->next();
		}
	}else{
		$data->status = false;
		$data->message = "Veuillez renseigner le nom complet du client !";
	}

	echo json_encode($data);
}
