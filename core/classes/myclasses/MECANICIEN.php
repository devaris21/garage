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
class MECANICIEN extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $groupemecanicien_id;	
	public $image = "default.png";	

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			if ($this->contact != "") {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner le nom du type de vehicule !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom du type de vehicule !";
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
						$result = $image->upload("images", "mecaniciens", $a);
						$name = $tab[$i];
						$this->$name = $result->filename;
						$this->save();
					}
				}	
				$i++;			
			}			
		}
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