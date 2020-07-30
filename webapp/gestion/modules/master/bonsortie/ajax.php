<?php 
namespace Home;
use Native\ROOTER;
require '../../../../../core/root/includes.php';

use Native\RESPONSE;

$data = new RESPONSE;
extract($_POST);


if ($action == "remarque") {
	$tableau = [];
	if (getSession("tableau") != null) {
		$tableau = getSession("tableau");
	}
	if ($remarque != "") {
		$test = false;
		foreach ($tableau as $key => $value) {
			if ($value == $remarque) {
				$test = true;
				break;
			}
		}
		if (!$test) {
			$a = uniqid();
			$tableau[$a] = $remarque;
		}
		foreach ($tableau as $key => $value) { ?>
			<tr id="<?= $key  ?>">
				<td><?= $value  ?></td>
				<td><i class="fa fa-close text-danger cursor" title="Supprimer les remarques" onclick="supprimerRemarque('<?= $key ?>')"></i></td>
			</tr>
		<?php }	
		session("tableau", $tableau);
	}
}



if ($action == "supprimerRemarque") {
	$tableau = [];
	if (getSession("tableau") != null) {
		$tableau = getSession("tableau");
		if (isset($tableau[$key])) {
			unset($tableau[$key]);
		}
	}

	foreach ($tableau as $key => $value) {?>
		<tr id="<?= $key  ?>">
			<td><?= $value  ?></td>
			<td><i class="fa fa-close text-danger cursor" title="Supprimer les remarques" onclick="supprimerRemarque('<?= $key ?>')"></i></td>
		</tr>
	<?php }	
	session("tableau", $tableau);
}





if ($action == "validerEssai") {
	$tableau = [];
	if (getSession("tableau") != null) {
		$tableau = getSession("tableau");
	}

	if (count($tableau) > 0) {
		$datas = ESSAI::findBy(["id ="=>$essai_id]);
		if (count($datas) == 1) {
			$essai = $datas[0];
			$essai->actualise();
			$data = $essai->valider();
			if ($data->status) {
				foreach ($tableau as $key => $value) {
					$item = new LISTECONSTATESSAI;
					$item->essai_id = $essai->id;
					$item->constat = $value;
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
