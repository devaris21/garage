<?php 
namespace Home;

$datas = AGENCE::findBy(["id ="=>getSession("agence_connecte_id")]);
if (count($datas) == 1) {
	$agence = $datas[0];
	$agence->actualise();
	$comptebanque = $agence->comptebanque;

	$operations = OPERATION::findBy(["DATE(created) >= "=> dateAjoute(-7)]);
	$entrees = $depenses = [];
	foreach ($operations as $key => $value) {
		$value->actualise();
		if ($value->categorieoperation->typeoperationcaisse_id == TYPEOPERATIONCAISSE::ENTREE) {
			$entrees[] = $value;
		}else{
			$depenses[] = $value;
		}
	}
	$statistiques = OPERATION::statistiques();

	$title = "BRIXS | Compte de caisse";
}else{
	header("Location: ../master/dashboard");
}




?>