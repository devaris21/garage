<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class EQUIPEMENT_INFOVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $equipement_id;
	public $infovehicule_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = EQUIPEMENT::findBy(["id ="=>$this->equipement_id]);
		if (count($datas) == 1) {
			$datas = INFOVEHICULE::findBy(["id ="=>$this->infovehicule_id]);
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



}
?>