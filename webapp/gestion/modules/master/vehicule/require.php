<?php 
namespace Home;
VEHICULE::etat();

if ($this->getId() != null && intval($this->getId()) > 0) {
	$datas = VEHICULE::findBy(["id="=>$this->getId()]);
	if (count($datas) == 1) {
		$levehicule = $datas[0];
		$levehicule->actualise();
		$datas = $levehicule->fourni("infovehicule");
		if (count($datas) > 0) {
			$i = $datas[0];
			$i->actualise();
			$levehicule->infovehicule = $i;

			$equipements = $i->fourni("equipement_infovehicule");
			$accessoires = $i->fourni("accessoire_infovehicule");
		}


		
		// $historiques = $levehicule->historiques();
		// $historiques = array_merge($datas, $datas5, $datas6, $historiques);
		// usort($historiques, "comparerDateCreated");

		$title = "AMB | ".$levehicule->name();
		session("vehicule_id", $this->getId());
	}else{
		header("Location: ../master/parcauto");
	}
}else{
	header("Location: ../master/parcauto");
}

?>