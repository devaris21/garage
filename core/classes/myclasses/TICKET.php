<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class TICKET extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $agence_id;
	public $reference;
	public $auto_id;
	public $vin;
	public $client_id;
	public $constat;
	public $autreremarque;
	public $kilometrage;
	public $niveaucarburant_id;
	public $etatintervention_id = ETATINTERVENTION::NOUVEAU;
	public $etat_id = ETAT::ENCOURS;
	public $employe_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = AUTO::findBy(["id ="=>$this->auto_id]);
		if (count($datas) == 1) {
			$datas = CLIENT::findBy(["id ="=>$this->client_id]);
			if (count($datas) == 1) {
				$this->reference = strtoupper(substr(uniqid(), 7, 8));
				$this->agence_id = getSession("agence_connecte_id");
				$this->employe_id = getSession("employe_connecte_id");
				$data = $this->save();
			}else{
				$data->status = false;
				$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public static function etat (int $type){
		return static::findBy(["etatintervention_id = "=>$type, "etat_id != "=>ETAT::ANNULEE]);
	}

	public function sentenseCreate(){
		return $this->sentense = "Creation d'un nouveau ticket: $this->reference ";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id : $this->reference ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : $this->reference";
	}
}
?>