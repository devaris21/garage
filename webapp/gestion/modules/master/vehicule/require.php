<?php 
namespace Home;
VEHICULE::etat();

if ($this->id != null && intval($this->id) > 0) {
	$datas = VEHICULE::findBy(["id="=>$this->id]);
	if (count($datas) == 1) {
		$levehicule = $datas[0];
		$levehicule->actualise();
		$datas = $levehicule->fourni("infovehicule");
		if (count($datas) > 0) {
			$i = $datas[0];
			$i->actualise();
			$levehicule->infovehicule = $i;
		}

		$locations = $levehicule->fourni("location");


		$location = null;
		$encours = $levehicule->fourni("location", ["etat_id ="=>ETAT::ENCOURS]);
		if (count($encours) > 0) {
			$location = $encours[0];
			$location->actualise();
		}
		
		// $historiques = $levehicule->historiques();
		// $historiques = array_merge($datas, $datas5, $datas6, $historiques);
		// usort($historiques, "comparerDateCreated");

		$title = "AMB | ".$levehicule->name();
		session("vehicule_id", $this->id);
	}else{
		header("Location: ../master/parcauto");
	}
}else{
	header("Location: ../master/parcauto");
}

?>