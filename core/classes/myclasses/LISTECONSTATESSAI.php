<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class LISTECONSTATESSAI extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $essai_id;
	public $constat;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = ESSAI::findBy(["id ="=>$this->essai_id]);
		if (count($datas) == 1) {
			if ($this->constat != "") {
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