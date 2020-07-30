<?php
namespace Home;
use Native\RESPONSE;
use Native\FICHIER;
/**
 * 
 */
class AUTO extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $immatriculation;
	public $marque_id;
	public $modele;
	public $vin;
	public $couleur;


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->immatriculation != "") {
			$datas = MARQUE::findBy(["id ="=>$this->marque_id]);
			if (count($datas) == 1) {
				if ($this->immatriculation != "") {
					$data = $this->save();
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
	



	public function name(){
		$this->actualise();
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