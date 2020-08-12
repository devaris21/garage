<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use \DateTime;
use \DateInterval;
/**
/**
 * 
 */
class CLIENT extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;


	public $typeclient_id;
	public $typepiece_id;
	public $numero;
	public $nomResponsable;
	


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			if ($this->contact != "") {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner le contact du client !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom du client !";
		}
		return $data;
	}



	public static function dettes(){
		$datas = RESERVATION::encours();
		$datas1 = LOCATION::encours();
		return comptage($datas, "montant", "somme") + comptage($datas1, "montant", "somme");
	}


	public function dette(){
		$datas = $this->fourni("reservation", ["etat_id ="=>ETAT::ENCOURS]);  
		$datas1 = $this->fourni("location", ["etat_id ="=>ETAT::ENCOURS]);
		return comptage($datas, "montant", "somme") + comptage($datas1, "montant", "somme");
	}


	public function acompte(){
		return 0;
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'un nouvel employé dans votre gestion : $this->name $this->lastname";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'employé $this->name $this->lastname.";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive de l'employé $this->name $this->lastname.";
	}



}

?>