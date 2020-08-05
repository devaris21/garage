<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class LOCATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $agence_id;
	public $reference;
	public $typelocation_id;
	public $started;
	public $finished;
	public $vehicule_id;
	public $etatduvehicule;
	public $kilometrage;
	public $lieu;
	public $location_id;
	public $etat_id = ETAT::PARTIEL;
	public $tarifvehicule_id;
	public $datevalidation;
	public $employe_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = CLIENT::findBy(["id ="=>$this->client_id]);
		if (count($datas) == 1) {
			$datas = VEHICULE::findBy(["id ="=>$this->vehicule_id]);
			if (count($datas) == 1) {
				if ($vehicule->etatvehicule_id == ETATVEHICULE::LIBRE) {
					if ($this->finished > $this->started && $this->finished > dateAjoute()) {
						$this->employe_id = getSession("employe_connecte_id");
						$this->agence_id = getSession("agence_connecte_id");
						$this->reference = "LOC/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
						$data = $this->save();
					}else{
						$data->status = false;
						$data->message = "les dates du contrat sont incorectes, veuillez recommencer !!!";
					}
				}else{
					$data->status = false;
					$data->message = "Le véhicule selectionné n'est plus disponible !";
				}
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public function annuler(){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::ANNULEE;
			$this->datevalidation = date("Y-m-d H:i:s");
			$this->historique("La location en reference $this->reference vient d'être annulée !");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur cette location !";
		}
		return $data;
	}



	public function terminer(){
		$data = new RESPONSE;
		if ($this->etat_id == ETAT::ENCOURS) {
			$this->etat_id = ETAT::VALIDEE;
			$this->datevalidation = date("Y-m-d H:i:s");
			$this->historique("La location en reference $this->reference vient d'être validée !");
			$data = $this->save();
			if ($data->status) {
				$inspection = new INSPECTION;
				$inspection->cloner($this);
				$inspection->location_id = $this->id;
				$inspection->id = null;
				$data = $inspection->enregistre();
			}
		}else{
			$data->status = false;
			$data->message = "Vous ne pouvez plus faire cette opération sur cette location !";
		}
		return $data;
	}






	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouvel accessoire:dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id :";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : ";
	}
}
?>