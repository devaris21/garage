<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class TARIF_FONCTION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $tarifvehicule_id;
	public $fonctionvehicule_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = TARIFVEHICULE::findBy(["id ="=>$this->tarifvehicule_id]);
		if (count($datas) == 1) {
			$datas = FONCTIONVEHICULE::findBy(["id ="=>$this->fonctionvehicule_id]);
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