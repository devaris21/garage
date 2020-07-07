<?php
namespace Home;
use Native\RESPONSE;

/**
 * 
 */
class TICKETREPARATION extends TABLE
{
	
	
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reference;
	public $client;
	public $contact;
	public $email;

	public $typevehicule_id;
	public $immatrculation;
	public $modele;
	public $marque_id;
	public $couleur;

	public $panne;
	public $etat_id = ETAT::ENCOURS;
	public $employe_id;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = TYPEVEHICULE::findBy(["id ="=>$this->typevehicule_id]);
		if (count($datas) == 1) {
			$datas = MARQUE::findBy(["id ="=>$this->marque_id]);
			if (count($datas) == 1) {
				if ($this->client != "") {
					if ($this->immatrculation != "") {
						$this->reference = "TKREP/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
						$this->employe_id = getSession("employe_connecte_id");
						$data = $this->save();
					}else{
						$data->status = false;
						$data->message = "Veuillez renseigner l'immatrculation du véhicule!";
					}
				}else{
					$data->status = false;
					$data->message = "Veuillez renseigner le nom complet du client !";
				}			
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors du prix !";
			}				
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors du prix !";
		}
		return $data;
	}



	public function valider(Array $post){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::VALIDEE;
			$this->datereception = date("Y-m-d H:i:s");
			$this->historique("La reparation en reference $this->reference vient d'être diagnostiqué !");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur ce ticket !";
		}
		return $data;
	}


	public function annuler(){
		$data = new RESPONSE;
		if ($this->etat_id != ETAT::ANNULEE) {			
			$this->etat_id = ETAT::ANNULEE;
			$this->historique("Le ticket de reparation en reference $this->reference vient d'être annulée !");
			$data = $this->save();
			$this->vehicule->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur ce ticket !";
		}
		return $data;
	}



	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}
}

?>