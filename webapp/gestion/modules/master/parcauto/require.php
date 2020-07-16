<?php 
namespace Home;

VEHICULE::etat();

$vehicules = VEHICULE::findBy([]);
foreach ($vehicules as $key => $value) {
	$value->infovehicule = new INFOVEHICULE();
	$datas = $value->fourni("infovehicule");
	if (count($datas) > 0) {
		$i = $datas[0];
		$i->actualise();
		$value->infovehicule = $i;
	}
}


$title = "AMB | Tous votre Parc Auto ";
?>