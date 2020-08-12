<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class CRITERE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reservation_id;
	public $devis_id;
	public $typevehicule_id;
	public $fonctionvehicule_id;
	public $energie_id;
	public $transmission_id;
	public $minplace;
	public $maxplace;
	public $climatisation = TABLE::NON;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = RESERVATION::findBy(["id ="=>$this->reservation_id]);
		if (count($datas) == 1) {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouvel accessoire: dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id : ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : ";
	}
}
?>