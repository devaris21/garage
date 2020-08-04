<?php 
namespace Home;
$title = "GRG | Espace d'Administration ";

if ($this->id != null) {
	$datas = TICKETREPARATION::findBy(["id ="=> $this->id, 'etat_id !='=>ETAT::ANNULEE]);
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