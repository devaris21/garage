<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class OPTIONREPARATION extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $categoriereparation_id;
	public $name;
	public $price;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = CATEGORIEREPARATION::findBy(["id ="=>$this->categoriereparation_id]);
		if (count($datas) == 1) {
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
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors du prix !";
		}
		return $data;
	}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>