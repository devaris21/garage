<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class INFOVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $vehicule_id;
	public $typevehicule_id;
	public $cnit;
	public $fonctionvehicule_id;
	public $chassis;
	public $transmission_id;
	public $energie_id;
	public $puissance;
	public $dateMiseCirculation;
	public $climatisation = TABLE::NON;
	public $nbPortes;
	public $nbPlaces;
	public $nbValises;
	public $nbSacs;
	public $ageMinimumConducteur;
	public $anneeMinimumPermis;
	public $airbagConducteur = TABLE::NON;
	public $airbagPassager = TABLE::NON;


	public function enregistre(){
		if ($this->airbagConducteur == "on") {
			$this->airbagConducteur = TABLE::OUI;
		}
		if ($this->airbagPassager == "on") {
			$this->airbagPassager = TABLE::OUI;
		}
		$data = $this->save();
		return $data;
	}


	public function sentenseCreate(){
	}
	public function sentenseUpdate(){
	}
	public function sentenseDelete(){
	}
}
?>