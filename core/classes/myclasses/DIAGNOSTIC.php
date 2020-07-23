<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class DIAGNOSTIC extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reference;
	public $ticket_id;
	public $mecanicien_id;
	public $dateFin;
	public $etat_id = ETAT::ENCOURS;
	public $employe_id;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = TICKET::findBy(["id ="=>$this->ticket_id]);
		if (count($datas) == 1) {
			$datas = MECANICIEN::findBy(["id ="=>$this->mecanicien_id]);
			if (count($datas) == 1) {
				$this->reference = strtoupper("DIA-".substr(uniqid(), 7, 8));
				$this->employe_id = getSession("employe_connecte_id");
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


	public function valider(){
		$data = new RESPONSE;
		if ($this->etat_id ==  ETAT::ENCOURS) {
			$this->dateFin = date("Y-m-d H:i:s");
			$this->etat_id = ETAT::VALIDEE;
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus effectuer cette action sur cet essai !";
		}
		return $data;
	}


	public static function etat (int $type){
		return static::findBy(["etatintervention_id = "=>$type, "etat_id != "=>ETAT::ANNULEE]);
	}

	public function sentenseCreate(){
		return $this->sentense = "Creation d'un nouveau ticket: $this->reference ";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id : $this->reference ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : $this->reference";
	}
}
?>