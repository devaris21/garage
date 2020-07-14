<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LOCATION extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reference;
	public $typelocation_id;
	public $vehicule_id;
	public $started;
	public $finished;
	public $comment;
	public $dateretour;

	public $client;
	public $contact;
	public $carte_id;
	public $numcarte;
	public $etat_id = ETAT::ENCOURS;

	public $reparation_id;



	public function enregistre(){
		$data = new RESPONSE;
		$datas = VEHICULE::findBy(["id ="=>$this->vehicule_id]);
		if (count($datas) == 1) {
			if ($this->finished >= $this->started && $this->started >= date("Y-m-d")) {
				$this->reference = "LOC/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Les dates pour la location ne sont pas correctes  * !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner tous les champs !";
		}
		return $data;
	}


	public static function delai(){
		$params = PARAMS::findLastId();
		$datas = static::findBy(["etat_id = "=>ETAT::ENCOURS]);
		foreach ($datas as $key => $loc) {
			if (!(dateDiffe(dateAjoute(), $loc->finished) <= $params->delai_alert) ) {
				unset($datas[$key]);
			}
		}
		return $datas;
	}


	public function name(){
		if ($this->typelocation_id == 1) {
			$this->actualise();
			return $this->prestataire->name();
		}else{
			$this->fourni("preteur");
			$preteur = $this->preteurs[0];
			return $preteur->matricule." - ".$preteur->name();
		}
	}



	public function consession(){
		$this->actualise();
		if ($this->typelocation_id == 1) {
			return $this->prestataire->name;
		}else{
			return $this->preteur->name;
		}
	}


	public function email(){
		$this->actualise();
		if ($this->typelocation_id == 1) {
			return $this->prestataire->email;
		}else{
			return $this->preteur->email;
		}
	}


	public function adresse(){
		$this->actualise();
		if ($this->typelocation_id == 1) {
			return $this->prestataire->adresse;
		}else{
			return $this->preteur->adresse;
		}
	}

	public function contact(){
		$this->actualise();
		if ($this->typelocation_id == 1) {
			return $this->prestataire->contact." // ".$this->prestataire->contact2;
		}else{
			return $this->preteur->contact." // ".$this->preteur->contact2;
		}
	}


	public function terminer(){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::VALIDEE;
			$this->date_fin = date("Y-m-d H:i:s");
			$this->historique("Location de véhicule N° $this->ticket vient d'être terminé");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez effectuer cette opération sur cette location !";
		}
		return $data;
	}
	

	public function annuler(){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::ANNULEE;
			$this->date_fin = date("Y-m-d H:i:s");
			$this->historique("Location de véhicule N° $this->ticket vient d'être annulé");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez effectuer cette opération sur cette location !";
		}
		return $data;
	}




	public function sentenseCreate(){
		return $this->sentense = "Nouvelle location de vehicule chez ".$this->prestataire->name;
	}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>