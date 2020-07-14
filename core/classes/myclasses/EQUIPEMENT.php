<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class EQUIPEMENT extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $modelevehicule_id;

	public $name;
	public $price;

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom de l'equipement !";
		}
		return $data;
	}


		public function sentenseCreate(){
			return $this->sentense = "Ajout d'une nouvel equipement: $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
			return $this->sentense = "Modification des informations de l'equipement $this->id : $this->name ";
	}
	public function sentenseDelete(){
			return $this->sentense = "Suppression definitive de l'equipement $this->id : $this->name";
	}
}
?>