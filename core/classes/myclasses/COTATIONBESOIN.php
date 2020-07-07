<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class COTATIONBESOIN extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $cotation_id;
	public $vehicule_id = null;
	public $equipement_id = null;
	public $accessoire_id = null;


	public $zones;



	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			if ($this->adresse != "" && $this->contact != "") {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner tous les champs marqués d'un * !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom de votre entreprise (votre flotte) !";
		}
		return $data;
	}




	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>