<?php
namespace Home;
use Native\RESPONSE;
use Native\SHAMMAN;/**
 * 
 */
class MYCOMPTE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $identifiant;
	public $typecompte_id;
	public $expired;
	

	public function enregistre(){
		return $this->save();
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouvelle pièce d'identité :  dans les paramétrages";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des propriétés de la pièce d'identité : .";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive de la pièce d'identité : .";
	}

}
?>