<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class RESERVATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $agence_id;
	public $client_id;
	public $started;
	public $finished;
	public $etat_id = ETAT::ENCOURS;
	public $conducteur = TABLE::NON;
	public $tarifvehicule_id;
	public $employe_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = CLIENT::findBy(["id ="=>$this->client_id]);
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
		return $this->sentense = "Nouvelle reservation enregistrée dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id  ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id ";
	}
}
?>