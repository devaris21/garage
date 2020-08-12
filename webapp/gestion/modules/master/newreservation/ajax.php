<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\BINDING;
use Native\RESPONSE;

$params = PARAMS::findLastId();
$rooter =  new ROOTER();

$data = new RESPONSE;
extract($_POST);


if ($action == "calculLocation") {
	$data = new RESPONSE;

	if ($finished >= $started && $started >= dateAjoute()) {
		$typefonction = " AND typevehicule_id = $typevehicule_id AND fonctionvehicule_id = $fonctionvehicule_id";
		$place = " AND nbPlaces >= $min AND nbPlaces <= $max";

		$clim = "";
		if ($climatisation != "a") {
			$clim = " AND climatisation = $climatisation";
		}
		$energie = "";
		if ($energie_id != 1) {
			$energie = " AND energie_id = $energie_id";
		}
		$transmission = "";
		if ($transmission_id != 1) {
			$transmission = " AND transmission_id = $transmission_id";
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
		
		$requette = "SELECT * FROM infovehicule WHERE id NOT IN (SELECT infovehicule.id AS id FROM vehicule, infovehicule, location WHERE infovehicule.vehicule_id = vehicule.id AND vehicule.id = location.vehicule_id AND location.etat_id =? AND ((? BETWEEN location.started AND location.started) OR (? BETWEEN location.started AND location.started))) ";
		$locations = INFOVEHICULE::execute($requette, [ETAT::ENCOURS, $started, $finished]);


		$requette = "SELECT * FROM infovehicule WHERE id NOT IN (SELECT infovehicule.id AS id FROM vehicule, infovehicule, reservation WHERE infovehicule.vehicule_id = vehicule.id AND vehicule.id = reservation.vehicule_id AND reservation.etat_id = ? AND ((? BETWEEN reservation.started AND reservation.started) OR (? BETWEEN reservation.started AND reservation.started))) ";
		$reservations = INFOVEHICULE::execute($requette, [ETAT::ENCOURS, $started, $finished]);

		$lot = [];
		foreach ($datas as $key => $info) {
			$test = false;
			foreach ($locations as $key => $item) {
				if ($info->id == $item->id) {
					foreach ($reservations as $key => $val) {
						if ($info->id == $val->id) {
							$lot[] = $info;
							$test = true;
							continue 3;
						}
					}
				}
			}
		}


		$data->status = true;
		$data->nb = count($lot);
		session("infovehicules", $lot);
	}else{
		$data->status = false;
		$data->message = "Veuillez verifier les dates pour la reservation !";
	}

	echo json_encode($data);
}




if ($action == "fiche") {
	$montant = 0;
	$option = 0;

	$jours = dateDiffe($started, $finished) + 1;
	$datas = TARIFVEHICULE::findBy(["id ="=>$tarifvehicule_id]);
	if (count($datas) == 1) { 
		$tarif = $datas[0];
		$montant += $tarif->prixJournalier * $jours;
	}

	if ($equipements != "") {
		$equipements = explode(",", $equipements);
	}else{
		$equipements = [];
	}
	$equips = [];
	foreach ($equipements as $key => $value) {
		$datas = EQUIPEMENT::findBy(["id ="=>$value]);
		if (count($datas) == 1) { 
			$equip = $datas[0];
			$equips[] = $equip;
			$option += $equip->price;
		}
	}

	$montant += $option;

	$abonnement = new ABONNEMENT;
	$abn = 0;
	if ($isclient == TABLE::OUI) {
		$datas = CLIENT::findBy(["id ="=>$client_id]);
		if (count($datas) == 1) { 
			$client = $datas[0];
			$lots = $client->fourni("abonnement");
			if (count($lots) > 0) {
				$abonnement = $lots[0];
				$abn = $abonnement->montant($montant);
			}
		}
	}

	$montant -= $abn;
	session("montant", $montant);
	?>
	<div class="col-sm-3">
		<div class="contact-box center-version">
			<a href="#">
				<i class="fa fa-qrcode fa-5x text-warning"></i>
				<br>
				<h3 class="m-b-xs text-uppercase text-warning"><strong><?= $tarif->name() ?></strong></h3>
				<div>
					<?php foreach ($tarif->fourni("tarif_fonction") as $key => $value) {
						$value->actualise(); ?>
						<i>- <?= $value->fonctionvehicule->name() ?></i><br>
					<?php } ?>
				</div>
				<br>
				<h1 class="d-inline gras text-warning"><?= money($tarif->prixJournalier) ?> </h1>
				<span><?= $params->devise  ?> / Jour</span>
				<address class="m-t-md">
					<strong class="text-warning">Forfait de <?= $tarif->kilometreJournalier ?> Kms par Jour</strong><br>
					<?= money($tarif->prixKilometreComplementaire) ?> <?= $params->devise  ?> / Km supplémentaire 
				</address>
			</a>
		</div>
	</div>

	<div class="col-sm-3">
		<h4 class="text-uppercase gras text-blue">Option équipements spéciaux</h4>
		<table class="table table-sm table-hover">
			<tbody>
				<?php foreach ($equips as $key => $value) { ?>
					<tr>
						<td><small><i><?= $value->name() ?></i></small></td>
						<td><small><?= money($value->price) ?> <?= $params->devise ?></small></td>
					</tr>
				<?php } ?>
			</tbody>
		</table>

		<h4 class="text-uppercase gras text-blue">Remise abonnement Client</h4>
		<?php if ($isclient == TABLE::OUI && $abonnement->id != null) { ?>
			<span><?= $abonnement->typeabonnement->name()  ?></span><br>
			<h2 class="d-inline gras"><?= money($abonnement->name()) ?> <?= $params->devise  ?></h2>
		<?php }else{ ?>
			<span>Pas de remise</span><br>
			<h2 class="d-inline gras">0 <?= $params->devise  ?></h2>
		<?php } ?>
	</div>

	<div class="col-sm-6">
		<div class="row">
			<div class="col-sm-7 text-right" style="padding-right: 3%">
				<small>Tarif brut de la location</small>
				<h3 class="gras text-muted mp0"><?= money($tarif->prixJournalier * $jours) ?> <?= $params->devise  ?></h3><br>

				<small>Total Options équipements</small>
				<h3 class="gras text-muted mp0"><?= money($option) ?> <?= $params->devise  ?></h3><br>

				<small>Remise Client</small>
				<h3 class="gras text-muted mp0"><?= money($abn) ?> <?= $params->devise  ?></h3><br><br>

				<span>Montant Total de la location</span>
				<h1 class="gras mp0 text-green"><?= money($montant) ?> <?= $params->devise  ?></h1><br>
			</div>
			<div class="col-sm-5 border-left">
				<div>
					<label>Mode de payement <span style="color: red">*</span> </label>                                
					<div class="input-group">
						<?php BINDING::html("select", "modepayement"); ?>
					</div>
				</div><br>
				<div class="no_modepayement_facultatif">
					<div>
						<label>Montant avancé sur location<span style="color: red">*</span> </label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-money"></i></span><input type="text" value="0" min="0" name="avance" class="form-control">
						</div>
					</div>
				</div><br>
				<div class="modepayement_facultatif">
					<div>
						<label>Structure d'encaissement<span style="color: red">*</span> </label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-bank"></i></span><input type="text" name="structure" class="form-control">
						</div>
					</div><br>
					<div>
						<label>N° numero dédié<span style="color: red">*</span> </label>
						<div class="input-group">
							<span class="input-group-addon"><i class="fa fa-pencil"></i></span><input type="text" name="numero" class="form-control">
						</div>
					</div>
				</div>
			</div>
		</div><hr>
		<div class="text-right">
			<button onclick="validerDevis(<?= TYPELOCATION::DEVIS ?>)" class="btn  btn-xs btn-default dim"><i class="fa fa-file-text-o"></i> Valider le devis</button>
			<button onclick="validerReservation(<?= TYPELOCATION::RESERVATION ?>)" class="btn btn-danger dim"><i class="fa fa-calendar"></i> Faire une reservation</button>
		</div>
	</div>
	<?php
}



if ($action == "listevehicules") {
	$datas = getSession("infovehicules");
	foreach ($datas as $key => $info) {
		$vehicule = $info->vehicule;  ?>
		<div class="col-sm-6 col-md-4">
			<div class="contact-box product-box">
				<label>
					<a class="row">
						<div class="col-4">
							<div class="text-center">
								<img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $rooter->stockage("images", "vehicules", $vehicule->image) ?>"><br>
								<input type="radio" name="vehicule_id" class="i-checks cursor" value="<?= $vehicule->id  ?>" kilometrage="<?= $vehicule->kilometrage();  ?>">
							</div>
						</div>
						<div class="col-8">
							<h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
							<span>
								<?= $vehicule->marque->name ?> <?= $vehicule->modele ?> 
							</span><br>
							<small><?= $info->transmission->name() ?> -- <?= $info->energie->name() ?></small><br>
							<small><?= $info->nbPlaces ?> places</small>// <span><?= $info->fonctionvehicule->name() ?></span>
						</div>
					</a>
				</label>
			</div>
		</div>
	<?php } 
}



if ($action == "validerReservation") {
	if (getSession("montant") >= $avance) {
		if ((getSession("montant") - $avance) <= $params->seuilCredit) {
			if ($finished >= $started && $started >= dateAjoute()) {
				$data->status = true;
				if ($isclient == TABLE::NON) {
					$client = new CLIENT;
					$client->hydrater($_POST);
					$data = $client->enregistre();
				}else{
					$datas = CLIENT::findBy(["id ="=>$client_id]);
					if (count($datas) == 1) { 
						$client = $datas[0];
					}
				}
				if ($data->status) {
					$reservation = new RESERVATION;
					$reservation->hydrater($_POST);
					$reservation->client_id = $client->id;
					$data = $reservation->enregistre();
					if ($data->status) {

						$critere = new CRITERE;
						$critere->hydrater($_POST);
						if ($critere->climatisation == "a") {
							$critere->climatisation = null;
						}
						$critere->minplace = $min;
						$critere->maxplace = $max;
						$critere->reservation_id = $reservation->id;
						$data = $critere->enregistre();
						if ($data->status) {
							$reglement = new REGLEMENTCLIENT;
							$reglement->hydrater($_POST);
							$reglement->client_id = $client->id;
							$reglement->montant = getSession("montant");
							$reglement->reservation_id = $reservation->id;
							$data = $reglement->enregistre();
							if ($data->status) {
								$reservation->montant = getSession("montant");
								$reservation->reste = $reservation->montant - $reservation->avance;
								$reservation->save();

								$reglement->detteClient = $client->dette();
								$reglement->acompte = $client->acompte();
								$reglement->save();
							}

							if ($marques != "") {
								$marques = explode(",", $marques);
							}else{
								$marques = [];
							}
							foreach ($marques as $key => $info) {
								$item = new MARQUE_CRITERE;
								$item->marque_id = $info;
								$item->critere_id = $critere->id;
								$item->enregistre();
							}
						}
						$data->setUrl("gestion", "master", "reservations");
					}else{
						$data->status = false;
						$data->message = "Veuillez verifier les dates pour cette opération !";
					}
				}
			}else{
				$data->status = false;
				$data->message = "Veuillez verifier les dates pour cette opération !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez verifier l'avance, elle est petite !";
		}
	}else{
		$data->status = false;
		$data->message = "Veuillez verifier l'avance, elle est trop elevée !";
	}
	echo json_encode($data);
}






if ($action == "validerDevis") {
	if ($finished >= $started && $started >= dateAjoute()) {
		$data->status = true;
		if ($isclient == TABLE::NON) {
			$client = new CLIENT;
			$client->hydrater($_POST);
			$data = $client->enregistre();
		}else{
			$datas = CLIENT::findBy(["id ="=>$client_id]);
			if (count($datas) == 1) { 
				$client = $datas[0];
			}
		}
		if ($data->status) {
			$devis = new DEVIS;
			$devis->hydrater($_POST);
			$devis->client_id = $client->id;
			$devis->montant = getSession("montant");
			$data = $devis->enregistre();
			if ($data->status) {

				$critere = new CRITERE;
				$critere->hydrater($_POST);
				if ($critere->climatisation == "a") {
					$critere->climatisation = null;
				}
				$critere->minplace = $min;
				$critere->maxplace = $max;
				$critere->devis_id = $devis->id;
				$data = $critere->enregistre();
				if ($data->status) {

					if ($marques != "") {
						$marques = explode(",", $marques);
					}else{
						$marques = [];
					}
					foreach ($marques as $key => $info) {
						$item = new MARQUE_CRITERE;
						$item->marque_id = $info;
						$item->critere_id = $critere->id;
						$item->enregistre();
					}
				}
				$data->setUrl("gestion", "master", "devis");
			}else{
				$data->status = false;
				$data->message = "Veuillez verifier les dates pour cette opération !";
			}
		}
	}else{
		$data->status = false;
		$data->message = "Veuillez verifier les dates pour cette opération !";
	}
	echo json_encode($data);
}
