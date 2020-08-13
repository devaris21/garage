<?php 

namespace Home;

if ($this->id != null) {
	$datas = LOCATION::findBy(["id ="=> $this->id, 'etat_id !='=>ETAT::ANNULEE]);
	if (count($datas) > 0) {
		$location = $datas[0];
		$location->actualise();
		$vehicule = $location->vehicule;
		$tems = $vehicule->fourni("infovehicule");
		$info = $tems[0];
		$info->actualise();

		$reglements = $location->fourni("reglementclient");
		$tarif = $location->tarifvehicule;
		$title = "GRG | Contrat de location ";
		
	}else{
		header("Location: ../production/prospections");
	}
}else{
	header("Location: ../production/prospections");
}

?>