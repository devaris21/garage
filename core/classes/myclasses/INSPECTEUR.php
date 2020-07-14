<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use \DateTime;
use \DateInterval;
/**
/**
 * 
 */
class INSPECTEUR extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;


	public $agence_id;	


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom du type de vehicule !";
		}
		return $data;
	}




	public function sentenseCreate(){
		return $this->sentense = "Ajout d'un nouvel employé dans votre gestion : $this->name $this->lastname";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'employé $this->name $this->lastname.";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive de l'employé $this->name $this->lastname.";
	}



}

?>