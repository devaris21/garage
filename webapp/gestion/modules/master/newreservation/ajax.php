<?php 
namespace Home;
require '../../../../../core/root/includes.php';

use Native\ROOTER;
use Native\RESPONSE;

$params = PARAMS::findLastId();

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

	$data->nb = count($datas);
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
	if ($client == TABLE::OUI) {
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

	<div class="col-sm-4">
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
		<?php if ($client == TABLE::OUI) { ?>
			<span><?= $abonnement->typeabonnement->name()  ?></span><br>
			<h2 class="d-inline gras"><?= money($abonnement->name()) ?> <?= $params->devise  ?></h2>
		<?php }else{ ?>
			<span>Pas de remise</span><br>
			<h2 class="d-inline gras">0 <?= $params->devise  ?></h2>
		<?php } ?>
	</div>


	<div class="col-sm-5 text-right" style="padding-right: 3%">
		<small>Tarif brut de la location</small>
		<h3 class="gras text-muted mp0"><?= money($tarif->prixJournalier * $jours) ?> <?= $params->devise  ?></h3><br>

		<small>Total Options équipements</small>
		<h3 class="gras text-muted mp0"><?= money($option) ?> <?= $params->devise  ?></h3><br>

		<small>Remise Client</small>
		<h3 class="gras text-muted mp0"><?= money($abn) ?> <?= $params->devise  ?></h3><br><br>

		<span>Montant Total de la location</span>
		<h1 class="gras mp0 text-green"><?= money($montant) ?> <?= $params->devise  ?></h1><br>
		<hr>
		<div>
			<button onclick="newReservation()" class="btn btn-default dim"><i class="fa fa-file-text-o"></i> Valider le devis</button>

			<button onclick="newReservation()" class="btn btn-primary dim"><i class="fa fa-check"></i> Valider la reservation</button>
		</div>
	</div>


	<?php

}