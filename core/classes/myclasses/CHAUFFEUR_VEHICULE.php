<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class CHAUFFEUR_VEHICULE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $chauffeur_id;
	public $vehicule_id;


	public function enregistre(){
		$data = new RESPONSE;
		$datas = CHAUFFEUR::findBy(["id ="=>$this->chauffeur_id]);
		if (count($datas) == 1) {
			$datas = VEHICULE::findBy(["id ="=>$this->vehicule_id]);
			if (count($datas) == 1) {
				$datas = self::findBy(["vehicule_id ="=>$this->vehicule_id, "chauffeur_id="=>$this->chauffeur_id]);
				if (count($datas) == 0) {
					$data = $this->save();
				}else{
					$data->status = false;
					$data->message = "Cet chauffeur est déjà sur ce véhicule !";
				}
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'ajout du véhicule !";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'ajout du véhicule !";
		}
		return $data;
	}






	public function sentenseCreate(){
		return $this->sentense = "Nouveau chauffeur ".$this->chauffeur->name()." sur vehicule ".$this->vehicule->marque->name." ".$this->vehicule->modele." immatriculé ".$this->vehicule->immatriculation;
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des infos de l'accessoire N°$this->id  $this->name .";
	}


	public function sentenseDelete(){
		return $this->sentense = "on a retiré le chauffeur ".$this->chauffeur->name()." sur vehicule ".$this->vehicule->marque->name." ".$this->vehicule->modele." immatriculé ".$this->vehicule->immatriculation;
	}

}



?>