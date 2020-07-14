<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class OPTIONENTRETIEN extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $name;
	public $price;


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			if ($this->price > 0) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner l'immatrculation du véhicule!";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom complet du client !";
		}		
		return $data;
	}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>