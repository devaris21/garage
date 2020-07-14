<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class MAINTENANCE_OPTIONREPARATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $maintenance_id;
	public $optionreparation;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = MAINTENANCE::findBy(["id ="=>$maintenance_id]);
		if (count($datas) == 1) {
			$datas = OPTIONREPARATION::findBy(["id ="=>$optionreparation]);
			if (count($datas) == 1) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouvel accessoire: $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id : $this->name ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : $this->name";
	}
}
?>