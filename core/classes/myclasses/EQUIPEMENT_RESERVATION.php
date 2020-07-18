<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class EQUIPEMENT_RESERVATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $equipement_id;
	public $reservation_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = EQUIPEMENT::findBy(["id ="=>$equipement_id]);
		if (count($datas) == 1) {
			$datas = RESERVATION::findBy(["id ="=>$reservation_id]);
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
		return $this->sentense = "Ajout d'une nouvel equipement: $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'equipement $this->id : $this->name ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'equipement $this->id : $this->name";
	}
}
?>