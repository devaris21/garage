<?php 
namespace Home;
$title = "GRG | Espace d'Administration ";

if ($this->getId() != null) {
	$datas = TICKETREPARATION::findBy(["id ="=> $this->getId(), 'etat_id !='=>ETAT::ANNULEE]);
	if (count($datas) > 0) {
		$ticket = $datas[0];
		$ticket->actualise();
		$title = "GRG | Bon de caisse ";
		
	}else{
		header("Location: ../master/dashboard");
	}
}else{
	header("Location: ../master/dashboard");
}
?>