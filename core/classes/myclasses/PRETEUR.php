<?php
namespace Home;
use Native\RESPONSE;
use \DateTime;
use \DateInterval;
/**
/**
 * 
 */
class PRETEUR extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $matricule;
	public $name;
	public $adresse;
	public $email;
	public $contact;
	public $fonction;
	public $location_id;



	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name ) {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Veuillez le login et le mot de passe du nouvel employé !";
		}
		return $data;
	}



	public function etat(){
		if ($this->etatchauffeur_id != ETATCHAUFFEUR::INDISPONIBLE) {
			$datas = CHAUFFEUR_MISSION::findBy(["etat_id = "=>ETAT::ENCOURS, "chauffeur_id ="=>$this->getId()]);
			if (count($datas) > 0) {
				$this->etatchauffeur_id = ETATCHAUFFEUR::MISSION;
			}else{
				$this->etatchauffeur_id = ETATCHAUFFEUR::RAS;
			}			
			$this->save();
		}
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'un nouveau chauffeur dans votre gestion : $this->name $this->lastname";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations du chauffeur N°$this->id : $this->name $this->lastname.";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive du chauffeur N°$this->id : $this->name $this->lastname.";
	}



}

?>