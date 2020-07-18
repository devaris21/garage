<?php
namespace Home;
use Native\RESPONSE;
use Native\FICHIER;
/**
 * 
 */
class VEHICULE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $immatriculation;
	public $marque_id;
	public $modele;
	public $couleur;
	public $etatvehicule_id = ETATVEHICULE::RAS;

	public $image1;
	public $image2;
	public $image3;


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->immatriculation != "") {
			$datas = MARQUE::findBy(["id ="=>$this->marque_id]);
			if (count($datas) == 1) {
				if ($this->immatriculation != "") {
					$data = $this->save();
					if ($data->status) {
						$this->uploading($this->files);
					}
				}else{
					$data->status = false;
					$data->message = "Veuillez renseigner l'immatriculation du véhicule !";
				}
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'ajout du véhicule !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner tous les champs !";
		}
		return $data;
	}
	


	public function uploading(Array $files){
		//les proprites d'images;
		$tab = ["image1", "image2", "image3"];
		if (is_array($files) && count($files) > 0) {
			$i = 0;
			foreach ($files as $key => $file) {
				if ($file["tmp_name"] != "") {
					$image = new FICHIER();
					$image->hydrater($file);
					if ($image->is_image()) {
						$a = substr(uniqid(), 5);
						$result = $image->upload("images", "vehicules", $a);
						$name = $tab[$i];
						$this->$name = $result->filename;
						$this->save();
					}
				}	
				$i++;			
			}			
		}
	}

	public function name(){
		return $this->marque->name()." ".$this->modele." - ".$this->immatriculation;
	}


	public function kilometrage(){
		return 10;
	}


	public static function etat(){

	}


////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function sentenseCreate(){
		return $this->sentense = "Enregistrement d'un nouveau véhicule N°$this->id immatriculé $this->immatriculation.";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des infos du véhicule N°$this->id immatriculé $this->immatriculation.";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive du véhicule N°$this->id immatriculé $this->immatriculation dans la base de données.";
	}

}
?>