<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class REPARATION extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reference;
	public $diagnostic_id;
	public $started;
	public $finished;
	public $garantie;
	public $etat_id = ETAT::ENCOURS;
	public $abouti = TABLE::NON;
	public $motif;

	public $employe_id;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = DIAGNOSTIC::findBy(["id ="=>$this->diagnostic_id]);
		if (count($datas) == 1) {
			if (($this->started >= dateAjoute()) && ($this->started >= $this->finished)) {
				if (($this->garantie >= dateAjoute())) {
					$this->reference = "REPART/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
					$this->employe_id = getSession("employe_connecte_id");
					$data = $this->save();
				}else{
					$data->status = false;
					$data->message = "Veuillez revoir la date de garantie de la reparation !";
				}
			}else{
				$data->status = false;
				$data->message = "Veuillez revoir les dates de debut et de fin de la reparation !";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors du prix !";
		}
		return $data;
	}



	public function valider(Array $post){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::VALIDEE;
			$this->datereception = date("Y-m-d H:i:s");
			$this->historique("La reparation en reference $this->reference vient d'être diagnostiqué !");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur ce ticket !";
		}
		return $data;
	}


	public function annuler(){
		$data = new RESPONSE;
		if ($this->etat_id != ETAT::ANNULEE) {			
			$this->etat_id = ETAT::ANNULEE;
			$this->historique("Le ticket de reparation en reference $this->reference vient d'être annulée !");
			$data = $this->save();
			$this->vehicule->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur ce ticket !";
		}
		return $data;
	}



	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>