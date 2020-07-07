<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "vehicule-preter") {
	$data = new RESPONSE;
	$datas = [];
	if (getSession("vehicules-preter") != null) {
		$datas = getSession("vehicules-preter");
	}

	if (!in_array($id, $datas)) {
		$datas[] = $id;
		$data->status = true;
	}else{
		foreach ($datas as $key => $value) {
			if ($value == $id) {
				unset($datas[$key]);
			}
		}
		$data->status = false;
	}
	session("vehicules-preter", $datas);
	$data->nb = count($datas);
	echo json_encode($data);
}



if ($action == "vehicule-louer") {
	$datas = [];
	if (getSession("vehicules-louer") != null) {
		$datas = getSession("vehicules-louer");
	}
	$vehicule = new VEHICULE;
	$vehicule->time = uniqid();
	$vehicule->hydrater($_POST);
	$vehicule->comment .= " Ce véhicule est en location chez nous !";
	$datas[] = $vehicule;
	session("vehicules-louer", $datas);
	affichage();
}


if ($action == "supVehicule") {
	$datas = [];
	if (getSession("vehicules-louer") != null) {
		$datas = getSession("vehicules-louer");
	}
	foreach ($datas as $key => $value) {
		if ($value->time == $id) {
			unset($datas[$key]);
		}
	}
	session("vehicules-louer", $datas);
	affichage();
}


function affichage(){
	if (getSession("vehicules-louer") != null) {
		$rooter = new ROOTER;
		foreach (getSession("vehicules-louer") as $key => $vehicule) { ?>
			<div class="chat-user">
				<img class="chat-avatar" src="<?= $rooter->stockage("images", "vehicules", "default.jpg")  ?>" alt="" >
				<div class="chat-user-name">
					<h4 class="mp0"><?= $vehicule->immatriculation ?></h4>
					<h6 class="mp0"><?= $vehicule->modele ?> <i onclick="supVehicule('<?= $vehicule->time ?>')" class="fa fa-close text-red pull-right cursor"></i></h6>
				</div>
			</div>
		<?php }
	}
}



if ($action == "location") {
	$data = new RESPONSE;
	$location = new LOCATION;
	$location->hydrater($_POST);

	if($location->typelocation_id == 2){
		if (getSession("vehicules-preter") != null && count(getSession("vehicules-preter")) > 0) {
			$data = $location->enregistre();
			if ($data->status) {
				foreach (getSession("vehicules-preter") as $key => $id) {
					$loca = new LOCATION_VEHICULE;
					$loca->location_id = $data->lastid;
					$loca->vehicule_id = $id;
					$loca->enregistre();
				}
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez selectionner les véhicules à louer !";
		}

	}else if($location->typelocation_id == 1){
		if (getSession("vehicules-louer") != null && count(getSession("vehicules-louer")) > 0) {
			$data = $location->enregistre();
			if ($data->status) {
				$preteur = new PRETEUR;
				$preteur->hydrater($_POST);
				$preteur->location_id = $data->lastid;
				$preteur->enregistre();
				foreach (getSession("vehicules-louer") as $key => $vehicule) {					
					$vehicule->prestataire_id = $location->prestataire_id;
					$vehicule->date_mise_circulation = $location->started;
					$vehicule->groupevehicule_id = GROUPEVEHICULE::VEHICULELOUEE;
					$vehicule->location = 1;
					$vehicule->files = [];
					$res = $vehicule->enregistre();

					if ($res->status) {
						$loca = new LOCATION_VEHICULE;
						$loca->location_id = $data->lastid;
						$loca->vehicule_id = $res->lastid;
						$loca->enregistre();
					}
					
				}
			}	
		}else{
			$data->status = false;
			$data->message = "Veuillez selectionner les véhicules à louer !";
		}
	}
	echo json_encode($data);
}



if ($action == "listevehicules") {
	$rooter = new ROOTER;
	$datas = LOCATION_VEHICULE::findBy(["location_id ="=>$id]);
	foreach ($datas as $key => $loca) {
		$loca->actualise(); ?>
		<div class="">
			<div class="contact-box product-box">
				<a class="row" href="<?= $rooter->url("gestionnaire", "master", "vehicule", $loca->vehicule->getId()) ?>">
					<div class="col-4">
						<div class="text-center">
							<img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $rooter->stockage("images", "vehicules", $loca->vehicule->image) ?>">
						</div>
					</div>
					<div class="col-8">
						<h3 style="margin: 0"><strong><?= $loca->vehicule->immatriculation ?></strong></h3>
						<address>
							<strong><?= $loca->vehicule->marque->name ?></strong><br>
							<?= $loca->vehicule->modele ?> <br>
						</address>
					</div>
				</a>
			</div>
		</div>
	<?php }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($action == "approuver") {
	$datas = GESTIONNAIRE::findBy(["id = "=>getSession("gestionnaire_connecte_id")]);
	if (count($datas) > 0) {
		$gestionnaire = $datas[0];
		$gestionnaire->actualise();
		if ($gestionnaire->checkPassword($password)) {
			$datas = LOCATION::findBy(["id ="=>$id]);
			if (count($datas) == 1) {
				$location = $datas[0];
				$data = $location->terminer();
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération! Veuillez recommencer";
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
	$datas = GESTIONNAIRE::findBy(["id = "=>getSession("gestionnaire_connecte_id")]);
	if (count($datas) > 0) {
		$gestionnaire = $datas[0];
		$gestionnaire->actualise();
		if ($gestionnaire->checkPassword($password)) {
			$datas = LOCATION::findBy(["id ="=>$id]);
			if (count($datas) == 1) {
				$location = $datas[0];
				$data = $location->annuler();
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération! Veuillez recommencer";
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
