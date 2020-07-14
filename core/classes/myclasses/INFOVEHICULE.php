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
	public $marque_id;
	public $modele;
	public $chasis;
	public $transmission_id;
	public $energie_id;
	public $puissance;
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
	}
	public function sentenseUpdate(){
	}
	public function sentenseDelete(){
	}
}
?>