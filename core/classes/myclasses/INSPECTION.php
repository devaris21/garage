<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class INSPECTION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $location_id;
	public $vehicule_id;
	public $kilometrage;
	public $kilometragefin;
	public $carburant;
	public $remarques;
	public $nomInspecteur;
	public $datevalidation;
	public $etat_id = ETAT::ENCOURS;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = LOCATION::findBy(["id ="=>$this->location_id]);
		if (count($datas) == 1) {
			$datas = VEHICULE::findBy(["id ="=>$this->vehicule_id]);
			if (count($datas) == 1) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouveau inspection dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations du tarif $this->id : ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive du tarif $this->id :";
	}
}
?>