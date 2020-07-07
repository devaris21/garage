<?php
namespace Home;
use Native\RESPONSE;
use Native\FICHIER;
use \DateTime;
use \DateInterval;
/**
/**
 * 
 */
class CHAUFFEUR extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $matricule;
	public $name;
	public $lastname;
	public $nationalite;
	public $adresse;
	public $sexe_id;
	public $typepermis;	
	public $email;
	public $contact;
	public $image = "default.png";
	public $etatchauffeur_id = ETATCHAUFFEUR::RAS;



	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
			if ($data->status) {
				$this->uploading($this->files);
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez le login et le mot de passe du nouvel employé !";
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
						$result = $image->upload("images", "chauffeurs", $a);
						$name = $tab[$i];
						$this->$name = $result->filename;
						$this->save();
					}
				}	
				$i++;			
			}			
		}
	}



	public static function etat(){
		foreach (static::getAll() as $key => $chauffeur) {
			if ($chauffeur->etatchauffeur_id != ETATCHAUFFEUR::INDISPONIBLE) {
				$datas = $chauffeur->fourni("mission", ["etat_id ="=>ETAT::ENCOURS]);
				if (count($datas) > 0) {
					$chauffeur->etatchauffeur_id = ETATCHAUFFEUR::MISSION;
				}else{
					$chauffeur->etatchauffeur_id = ETATCHAUFFEUR::RAS;
				}
				$chauffeur->save();
			}
		}
	}


	public static function open(){
		$datas = static::etat();
		return static::getAll(["etatchauffeur_id =" => 0]);
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