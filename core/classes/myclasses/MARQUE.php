<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class MARQUE extends TABLE
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
			$data->message = "Veuillez renseigner le nom de la marque !";
		}
		return $data;
	}


		public function sentenseCreate(){
			return $this->sentense = "Ajout d'une nouvelle marque: $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
			return $this->sentense = "Modification des informations de la marque $this->id : $this->name ";
	}
	public function sentenseDelete(){
			return $this->sentense = "Suppression definitive de la marque $this->id : $this->name";
	}
}
?>