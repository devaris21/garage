<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class TICKET_TYPEREPARATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $ticket_id;
	public $typereparation_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = TICKET::findBy(["id ="=>$this->ticket_id]);
		if (count($datas) == 1) {
			$datas = TYPEREPARATION::findBy(["id ="=>$this->typereparation_id]);
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