<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "tache") {
	$tableau = [];
	if (getSession("taches") != null) {
		$tableau = getSession("taches");
	}
	if ($tache != "") {
		$test = false;
		foreach ($tableau as $key => $value) {
			if ($value == $tache) {
				$test = true;
				break;
			}
		}
		if (!$test) {
			$a = uniqid();
			$tableau[$a] = $tache;
		}
		foreach ($tableau as $key => $value) { ?>
			<tr id="<?= $key  ?>">
				<td><?= $value  ?></td>
				<td><i class="fa fa-close text-danger cursor" title="Supprimer les remarques" onclick="supprimerTache('<?= $key ?>')"></i></td>
			</tr>
		<?php }	
		session("taches", $tableau);
	}
}



if ($action == "supprimerTache") {
	$tableau = [];
	if (getSession("taches") != null) {
		$tableau = getSession("taches");
		if (isset($tableau[$key])) {
			unset($tableau[$key]);
		}
	}

	foreach ($tableau as $key => $value) {?>
		<tr id="<?= $key  ?>">
			<td><?= $value  ?></td>
			<td><i class="fa fa-close text-danger cursor" title="Supprimer les remarques" onclick="supprimerTache('<?= $key ?>')"></i></td>
		</tr>
	<?php }	
	session("taches", $tableau);
}



//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


if ($action == "piece") {
	$tableau = [];
	if (getSession("pieces") != null) {
		$tableau = getSession("pieces");
	}
	if ($piece != "") {
		$test = false;
		if ($qte < 1) {
			$test = true;
		}
		if (!$test) {
			$a = uniqid();
			$tableau[$piece] = $qte;
		}
		foreach ($tableau as $key => $value) { ?>
			<tr id="<?= $key  ?>">
				<td><?= $key  ?></td>
				<td>x <?= $value  ?></td>
				<td><i class="fa fa-close text-danger cursor" title="Supprimer la piece" onclick="supprimerPiece('<?= $key ?>')"></i></td>
			</tr>
		<?php }	
		session("pieces", $tableau);
	}
}



if ($action == "supprimerPiece") {
	$tableau = [];
	if (getSession("pieces") != null) {
		$tableau = getSession("pieces");
		if (isset($tableau[$key])) {
			unset($tableau[$key]);
		}
	}

	foreach ($tableau as $key => $value) {?>
		<tr id="<?= $key  ?>">
			<td><?= $key  ?></td>
			<td>x <?= $value  ?></td>
			<td><i class="fa fa-close text-danger cursor" title="Supprimer la piece" onclick="supprimerPiece('<?= $key ?>')"></i></td>
		</tr>
	<?php }	
	session("pieces", $tableau);
}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





if ($action == "validerDiagnostic") {
	$taches = [];
	if (getSession("taches") != null) {
		$taches = getSession("taches");
	}

	$pieces = [];
	if (getSession("pieces") != null) {
		$pieces = getSession("pieces");
	}

	if (count($taches) > 0) {
		$datas = DIAGNOSTIC::findBy(["id ="=>$diagnostic_id]);
		if (count($datas) == 1) {
			$diagnostic = $datas[0];
			$diagnostic->actualise();
			$data = $diagnostic->valider();
			if ($data->status) {
				foreach ($taches as $key => $value) {
					$item = new LISTECONSTATDIAGNOSTIC;
					$item->diagnostic_id = $diagnostic->id;
					$item->constat = $value;
					$item->enregistre();
				}

				foreach ($pieces as $key => $value) {
					$item = new LISTEPIECEDIAGNOSTIC;
					$item->diagnostic_id = $diagnostic->id;
					$item->piece = $key;
					$item->quantite = $value;
					$item->enregistre();
				}
			}
		}
	}else{
		$data->status = false;
		$data->message = "Veuillez renseigner les remarques faites lors de l'essai !";
	}

	echo json_encode($data);
}
