<?php 
namespace Home;
require '../../../../../core/root/includes.php';
use Native\ROOTER;
use Native\RESPONSE;
use Native\FICHIER;


$data = new RESPONSE;
extract($_POST);

if ($action == "image") {
	$datas = VEHICULE::findBy(["id ="=>getSession("vehicule_id")]);
	if (count($datas) == 1) {
		$vehicule = $datas[0];
		if (isset($_FILES["image"]) && $_FILES["image"]["tmp_name"] != "") {
			$image = new FICHIER();
			$image->hydrater($_FILES["image"]);
			if ($image->is_image()) {
				$a = substr(uniqid(), 5);
				$result = $image->upload("images", "vehicules", $a);

				$vehicule->image = $result->filename;
				$data = $vehicule->save();
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
			}
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
	}
	echo json_encode($data);
}


if ($action == "comment") {
	$datas = VEHICULE::findBy(["id="=>getSession("vehicule_id")]);
	if (count($datas) == 1) {
		$vehicule = $datas[0];
		$vehicule->actualise();
		$vehicule->comment = $val;
		$vehicule->historique("Mis à jour du bloc note du véhicule".$vehicule->marque->name." $vehicule->modele immatriculé $vehicule->immatriculation");
		$data = $vehicule->save();
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
	}
	echo json_encode($data);
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// AFFECTATION
/// 
if ($action == "creationCompte") {
	$datas = AFFECTATION::findBy(["id="=> $id]);
	if (count($datas) == 1) {
		$affectation = $datas[0];
		$affectation->actualise();
		if ($affectation->carplan->email == "") {
			$affectation->carplan->email = $email;
			if ($affectation->carplan->emailIsValide($email)) {
				$data = $affectation->carplan->creerCompte();
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner l'email du bénéficiaire ou le corriger !!!";
			}
		}else{
			$data->status = false;
			$data->message = "Ce bénéficiaire a déjà un compte sur la plateforme !!!";
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
	}
	echo json_encode($data);
}


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($action == "disponibilite") {
	$datas = GESTIONNAIRE::findBy(["id="=>getSession("gestionnaire_connecte_id")]);
	if (count($datas) == 1) {
		$gestionnaire = $datas[0];
		if ($gestionnaire->verifierPassword($password)) {
			$datas = VEHICULE::findBy(["id="=>getSession("vehicule_id")]);
			if (count($datas) == 1) {
				$vehicule = $datas[0];
				if($type == 0){
					$data = $vehicule->indisponible();
				}else{
					$data = $vehicule->disponible();
				}
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
			}
		}else{
			$data->status = false;
			$data->message = "Votre mot de passe n'est pas correcte !";
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
	}
	echo json_encode($data);
}


if ($action == "declassement") {
	$datas = GESTIONNAIRE::findBy(["id="=>getSession("gestionnaire_connecte_id")]);
	if (count($datas) == 1) {
		$gestionnaire = $datas[0];
		if ($gestionnaire->verifierPassword($password)) {
			$datas = VEHICULE::findBy(["id="=>getSession("vehicule_id")]);
			if (count($datas) == 1) {
				$vehicule = $datas[0];
				if($type == 0){
					$data = $vehicule->out();
				}else{
					$data = $vehicule->in();
				}
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
			}
		}else{
			$data->status = false;
			$data->message = "Votre mot de passe n'est pas correcte !";
		}
	}else{
		$data->status = false;
		$data->message = "Une erreur s'est produite pendant le processus, veuillez recommencer !";
	}
	echo json_encode($data);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/// PRET

if ($action == "pret") {
	$preteur = new PRETEUR;
	$preteur->hydrater($_POST);
	$data = $preteur->save();
	if ($data->status) {
		$location = new LOCATION;
		$location->hydrater($_POST);
		$location->preteur_id = $data->lastid;
		$data = $location->enregistre();

		if ($data->status) {
			$loc = new LOCATION_VEHICULE;
			$loc->location_id = $data->lastid;
			$loc->vehicule_id = getSession("vehicule_id");
			$loc->enregistre();
		}
	}
	echo json_encode($data);
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



if ($action == "retirer") {
	$maclass = $table;
	$table = TABLE::fullyClassName($table);
	if (class_exists($table)) {
		$datas = $table::findBy(["id="=>$id]);
		if (count($datas) == 1) {
			$element = $datas[0];
			$element->actualise();
			$data = $element->retirer();
		}else{
			$data->status = false;
			$data->message = "Une eurreur s'est produite pendant le processus, veuillez recommencer !";
		}
	}else{
		$data->status = false;
		$data->message = "Une eurreur s'est produite pendant le processus, veuillez recommencer !";
	}
	echo json_encode($data);
}

