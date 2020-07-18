<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class LOCATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reservation_id;
	public $agence_id;
	public $started;
	public $finished;
	public $vehicule_id;
	public $conducteur_id;
	public $employe_id;
	public $etat_id = ETAT::PARTIEL;
	public $tarifvehicule_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = CLIENT::findBy(["id ="=>$client_id]);
		if (count($datas) == 1) {
			if ($this->finished > $this->started && $this->finished > dateAjoute()) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->status = "les dates du contrat sont incorectes, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouvel accessoire: $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id : $this->name ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : $this->name";
	}
}
?>