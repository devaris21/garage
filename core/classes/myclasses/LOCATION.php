<?php
namespace Home;
use Native\RESPONSE;
use Native\FICHIER;
/**
 * 
 */
class LOCATION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $agence_id;
	public $reference;
	public $reservation_id;
	public $devis_id;
	public $started;
	public $finished;
	public $montant;
	public $avance;
	public $reste;
	public $vehicule_id;
	public $etatinterieur;
	public $etatexterieur;
	public $kilometrage;
	public $kilometragefin;
	public $details;
	public $lieu;
	public $chauffeur_id;
	public $niveaucarburant_id;
	public $niveaucarburant_id_fin;
	public $etat_id = ETAT::ENCOURS;
	public $tarifvehicule_id;
	public $datevalidation;
	public $image;
	public $employe_id;

	public $img;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = CLIENT::findBy(["id ="=>$this->client_id]);
		if (count($datas) == 1) {
			VEHICULE::etat();
			$datas = VEHICULE::findBy(["id ="=>$this->vehicule_id]);
			if (count($datas) == 1) {
				$vehicule = $datas[0];
				if ($vehicule->etatvehicule_id == ETATVEHICULE::LIBRE) {
					if ($this->finished > $this->started && $this->finished > dateAjoute()) {
						$this->employe_id = getSession("employe_connecte_id");
						$this->agence_id = getSession("agence_connecte_id");
						$this->reference = "LOC/".date('dmY')."-".strtoupper(substr(uniqid(), 5, 6));
						$data = $this->save();
						if ($data->status) {
							$final_path = __DIR__."/../../../stockage/images/locations";
							if (!file_exists($final_path)) {
								mkdir($final_path, 0777, true);
							}
							$name = substr(uniqid(), 5).".png";
							$b = imagepng($this->img, $final_path."/".$name);
							if ($b) {
								$this->image = $name;
								$this->save();
							}
						}
					}else{
						$data->status = false;
						$data->message = "les dates du contrat sont incorectes, veuillez recommencer 3!!!";
					}
				}else{
					$data->status = false;
					$data->message = "Le véhicule selectionné n'est plus disponible !";
				}
			}else{
				$data->status = false;
				$data->message = "Aucun véhicule n'a été selectionné pour cette location !!!";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}



	public function uploading(Array $files){
		//les proprites d'images;
		$tab = ["image"];
		if (is_array($files) && count($files) > 0) {
			$i = 0;
			foreach ($files as $key => $file) {
				if ($file["tmp_name"] != "") {
					$image = new FICHIER();
					$image->hydrater($file);
					if ($image->is_image()) {
						$a = substr(uniqid(), 5);
						$result = $image->upload("images", "locations", $a);
						$name = $tab[$i];
						$this->$name = $result->filename;
						$this->save();
					}
				}	
				$i++;			
			}			
		}
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