<?php 

namespace Home;

if ($this->id != null) {
	$datas = RESERVATION::findBy(["id ="=> $this->id, 'etat_id !='=>ETAT::ANNULEE]);
	if (count($datas) > 0) {
		$reservation = $datas[0];
		$reservation->actualise();

		$tems = $reservation->fourni("critere");
		$critere = $tems[0];
		$critere->actualise();
		$marques = $critere->fourni("marque_critere");

		$vehicule = $reservation->vehicule;
		$tems = $vehicule->fourni("infovehicule");
		$info = $tems[0];
		$info->actualise();

		$reglements = $reservation->fourni("reglementclient");
		$tarif = $reservation->tarifvehicule;
		$title = "GRG | Contrat de reservation ";
		
	}else{
		header("location: ../production/prospections");
	}
}else{
	header("location: ../production/prospections");
}

?>