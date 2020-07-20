<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class LISTETYPEENJOLIVEUR extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $ticket_id;
	public $typeenjoliveur_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = TICKET::findBy(["id ="=>$this->ticket_id]);
		if (count($datas) == 1) {
			$datas = TYPEENJOLIVEUR::findBy(["id ="=>$this->typeenjoliveur_id]);
			if (count($datas) == 1) {
				if ($this->quantite > 0) {
					$data = $this->save();
				}else{
				$data->status = false;
				$data->status = "La quantité de l'équipement n'est pas correcte !!!";
			}
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