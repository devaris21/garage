<?php 
namespace Home;
//VEHICULE::etat();

// if ($this->getId() != null && intval($this->getId()) > 0) {
// 	$datas = VEHICULE::findBy(["id="=>$this->getId()]);
// 	if (count($datas) == 1) {
// 		session("vehicule_id", $this->getId());
// 		$levehicule = $datas[0];
// 		$levehicule->actualise();
// 		$levehicule->etat();

// 		$datas1 = $levehicule->fourni("piecevehicule");
// 		$datas2 = $levehicule->fourni("assurance");
// 		$datas3 = $levehicule->fourni("visitetechnique");
// 		$datas4 = $levehicule->fourni("cartegrise");

// 		$datas = array_merge($datas1, $datas2, $datas3, $datas4);
// 		foreach ($datas as $key => $value) {
// 			$value->comment = $value->name()." établi(e) le ".datecourt($value->date_etablissement)." pour une validité allant du ".datecourt($value->started)." au ".datecourt($value->finished);
// 		}

// 		$datas5 = $levehicule->fourni("entretienvehicule");
// 		$datas6 = $levehicule->fourni("sinistre");

// 		$levehicule->fourni("equipement_vehicule");

// 		$levehicule->fourni("chauffeur_vehicule");
// 		$levehicule->fourni("cartegrise");
// 		usort($levehicule->cartegrises, function ($a, $b) {
// 			return -strcmp($a->date_etablissement, $b->date_etablissement);
// 		});

// 		///////////////////////////////////////////////////////
// 		$carteGrise = $levehicule->carteGrise();
// 		$assurance = $levehicule->assurance();
// 		$vidange = $levehicule->vidange();
// 		$visitetechnique = $levehicule->visitetechnique();

// 		AFFECTATION::etat();
// 		$affectation = null;
// 		if ($levehicule->is_affecte()) {
// 			$affectation = $levehicule->affectation();
// 			$affectation->fourni("renouvelementaffectation");
// 			$renouv = new RENOUVELEMENTAFFECTATION;
// 			if (count($affectation->renouvelementaffectations) > 0) {
// 				$renouv = end($affectation->renouvelementaffectations);
// 			}
// 		}

// 		$historiques = $levehicule->historiques();
// 		$historiques = array_merge($datas, $datas5, $datas6, $historiques);
// 		usort($historiques, "comparerDateCreated");

// 		$title = "AMB | ".$levehicule->name();

// 	}else{
// 		header("Location: ../master/parcauto");
// 	}
// }else{
// 	header("Location: ../master/parcauto");
// }

?>