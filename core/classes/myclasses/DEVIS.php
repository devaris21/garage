<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class DEVIS extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $agence_id;
	public $reference;
	public $client_id;
	public $started;
	public $finished;
	public $montant;
	public $lieu;
	public $etat_id = ETAT::ENCOURS;
	public $conducteur = TABLE::NON;
	public $tarifvehicule_id;
	public $employe_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = CLIENT::findBy(["id ="=>$this->client_id]);
		if (count($datas) == 1) {
			if ($this->finished > $this->started && $this->finished > dateAjoute()) {
				$this->employe_id = getSession("employe_connecte_id");
				$this->agence_id = getSession("agence_connecte_id");
				$this->reference = "DEVIS/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
				$data = $this->save();
			}else{
				$data->status = false;
				$data->status = "les dates du contrat sont incorectes, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}



	public function annuler(){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::ANNULEE;
			$this->datevalidation = date("Y-m-d H:i:s");
			$this->historique("La reservation en reference $this->reference vient d'être annulée !");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur cette reservation !";
		}
		return $data;
	}



	public function valider(){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::VALIDEE;
			$this->datevalidation = date("Y-m-d H:i:s");
			$this->historique("La reservation en reference $this->reference vient d'être validée !");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur cette reservation !";
		}
		return $data;
	}




	public function sentenseCreate(){
		return $this->sentense = "Nouvelle reservation enregistrée dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id  ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id ";
	}
}
?>