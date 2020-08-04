<?php 

namespace Home;

if ($this->id != null) {
	$datas = VENTE::findBy(["id ="=> $this->id, 'etat_id !='=>ETAT::ANNULEE]);
	if (count($datas) > 0) {
		$vente = $datas[0];
		$vente->actualise();

		$vente->fourni("lignedevente");

		$title = "GRG | Reçu de vente ";
		
	}else{
		header("Location: ../ventes/ventedirecte");
	}
}else{
	header("Location: ../ventes/ventedirecte");
}

?>