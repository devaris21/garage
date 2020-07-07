<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use \DateTime;
/**
 * La classe PERSONNE herite deja de la classe TABLE 
 */

class VEHICULE_A_ENTRETENIR extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $demandeentretien_id;
	public $vehicule_id;
	public $etat_id = ETAT::ENCOURS;



	public function enregistre(){
		return $this->save();
	}



	public function sentenseCreate(){}


	public function sentenseUpdate(){
		return $this->sentense = "Modification de la demande de révélé de compte du client ".$this->client->name." ".$this->client->lastname;
	}


	public function sentenseDelete(){}


}


?>