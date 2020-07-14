<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class TYPEABONNEMENT extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $name;

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom du type d'abonnement !";
		}
		return $data;
	}


		public function sentenseCreate(){
			return $this->sentense = "Ajout d'un nouveau type d'abonnement : $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
			return $this->sentense = "Modification des informations du type d'abonnement $this->id : $this->name ";
	}
	public function sentenseDelete(){
			return $this->sentense = "Suppression definitive du type d'abonnement $this->id : $this->name";
	}
}
?>