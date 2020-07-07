<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use \DateTime;
/**
 * La classe PERSONNE herite deja de la classe TABLE 
 */

class VEHICULEDEMANDER extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $demandevehicule_id;
	public $vehicule_id;



	public function enregistre(){
		return $this->save();
	}



	public function sentenseCreate(){}


	public function sentenseUpdate(){
		return $this->sentense = " choix du véhicule ".$this->vehicule->marque->name." ".$this->vehicule->modele." immatriculé ".$this->vehicule->immatriculation." pour la demande de vehicule N°$this->demandevehicule_id ";
	}


	public function sentenseDelete(){}


}


?>