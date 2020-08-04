<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class MARQUE_CRITERE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $marque_id;
	public $critere_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = MARQUE::findBy(["id ="=>$this->marque_id]);
		if (count($datas) == 1) {
			$datas = CRITERE::findBy(["id ="=>$this->critere_id]);
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