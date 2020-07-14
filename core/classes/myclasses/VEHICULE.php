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

	public $typevehicule_id;
	public $immatriculation;
	public $chasis;
	public $nb_place;
	public $nb_porte;
	public $marque_id;
	public $price = 0;
	public $comment;
	public $modele;
	public $energie_id;
	public $typetransmission_id;
	public $puissance;
	public $kilometrage;
	public $date_mise_circulation;
	public $date_sortie;
	public $etatvehicule_id = ETATVEHICULE::RAS;
	public $image = "default.jpg";


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->prestataire_id == null) {
			$this->prestataire_id = 1;
		}
		if ($this->immatriculation != "" && $this->modele != "") {
			$datas = TYPEVEHICULE::findBy(["id ="=>$this->typevehicule_id]);
			if (count($datas) == 1) {
				$data = $this->save();
				if ($data->status) {
					$this->uploading($this->files);
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
		$tab = ["image"];
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


//////////////////////////////////////////////////////////////////////////////////////////
/// 
/// 

	//Obtenir l'assurance encours
	public function assurance(){
		$datas = ASSURANCE::findBy(["vehicule_id ="=> $this->getId()], [], ["finished"=>"DESC"]);
		if (count($datas) >= 1) {
			return $datas[0];
		}else{
			return new ASSURANCE();
		}
	}

	//Obtenir la visite technique encours
	public function visiteTechnique(){
		$datas = VISITETECHNIQUE::findBy(["vehicule_id ="=> $this->getId()], [], ["finished"=>"DESC"]);
		if (count($datas) >= 1) {
			return $datas[0];
		}else{
			return new VISITETECHNIQUE();
		}
	}

	//Obtenir la carte grise encours
	public function carteGrise(){
		$datas = CARTEGRISE::findBy(["vehicule_id ="=> $this->getId()], [], ["date_etablissement"=>"DESC"]);
		if (count($datas) >= 1) {
			$item = $datas[0];
			$item->actualise();
			return $item;
		}else{
			return new CARTEGRISE();
		}
	}


	//Obtenir la date de la vidange
	public function vidange(){
		$datas = $this->fourni("entretienvehicule", ["typeentretienvehicule_id = "=>TYPEENTRETIENVEHICULE::VIDANGE, "typeentretienvehicule_id = "=>TYPEENTRETIENVEHICULE::VIDANGECOMPLETE,], [], [], 1, "OR");
		if (count($datas) == 1) {
			$item = $datas[0];
			$item->date = dateAjoute1($item->finished, 360);
			$item->kilometrage = 10000 - ($this->kilometrage - $item->kilometrage);
			return $item;
		}
	}

	public function pieces(){
		$tableau = [];
		foreach (TYPEPIECEVEHICULE::getAll() as $key => $value) {
			$datas = PIECEVEHICULE::findBy(["vehicule_id ="=> $this->getId(), "typepiecevehicule_id ="=>$value->getId()], [], ["finished"=>"DESC"]);
			if (count($datas) >= 1) {
				$tableau[] = $datas[0];
			}
		}
		return $tableau;
	}

	/////////////////////////

	public static function etat(){
		foreach (static::getAll() as $key => $vehicule) {
			if ($vehicule->etatvehicule_id != ETATVEHICULE::INDISPONIBLE) {
				if ($vehicule->date_sortie != null || $vehicule->etatvehicule_id == ETATVEHICULE::DECLASSEE) {
					//véhicule déclassé
					$vehicule->etatvehicule_id = ETATVEHICULE::DECLASSEE;
				}else{
					if($vehicule->is_affecte()) {
						//véhicule affecté
						$vehicule->etatvehicule_id = ETATVEHICULE::AFFECTE;
					}else{
						$datas = ENTRETIENVEHICULE::findBy(["etat_id = "=>ETAT::ENCOURS, "started >="=>dateAjoute(), "vehicule_id ="=>$vehicule->getId()]);
						if (count($datas) > 0) {
								//en entretien
							$vehicule->etatvehicule_id = ETATVEHICULE::ENTRETIEN;
						}else{
							$datas = SINISTRE::findBy(["etat_id = "=>ETAT::ENCOURS, "vehicule_id ="=>$vehicule->getId()]);
							if (count($datas) > 0) {
									//sinistré
								$vehicule->etatvehicule_id = ETATVEHICULE::SINISTRE;
							}else{
								$datas = MISSION::findBy(["etat_id = "=>ETAT::ENCOURS, "vehicule_id ="=>$vehicule->getId()]);
								if (count($datas) > 0) {
										//en mission
									$vehicule->etatvehicule_id = ETATVEHICULE::MISSION;
								}else{
									$vehicule->etatvehicule_id = ETATVEHICULE::RAS;
									if ($vehicule->location == 1) {
										$vehicule->etatvehicule_id = ETATVEHICULE::LOUEE;
									}
									$datas = LOCATION_VEHICULE::findBy(["etat_id = "=>ETAT::ENCOURS, "vehicule_id ="=>$vehicule->getId()]);
									foreach ($datas as $key => $value) {
										$value->actualise();
										if ($value->location->started <= dateAjoute() && dateAjoute() <= $value->location->finished) {
											//preté
											if ($value->location->typelocation_id == TYPELOCATION::LOCATION) {
												$vehicule->etatvehicule_id = ETATVEHICULE::LOUEE;
											}else{
												$vehicule->etatvehicule_id = ETATVEHICULE::PRETE;										
											}
										}
									}
								}
							}
						}
					}
				}
				$vehicule->save();
			}
		}
	}


	public function historiques(){
		//les autres sont deja dans le 'require' de la page
		$datas = $this->fourni("location_vehicule");
		$datas1 = $this->fourni("affectation");
		foreach ($datas1 as $key => $value) {
			$value->actualise();
			$value->name = $value->typeaffectation->name()." à ".$value->carplan->name();
		}
		$datas2 = $this->fourni("mission");
		foreach ($datas2 as $key => $value) {
			$value->name = "Mission : ".$value->objet;
		}
		return array_merge($datas, $datas1, $datas2);
	}



	public function name(){
		$this->actualise();
		return $this->marque->name." ".$this->modele." immatriculé ".$this->immatriculation;
	}


	public function affectation(){
		$this->actualise();
		if ($this->is_affecte()) {
			$datas = $this->fourni("affectation", ["etat_id = "=>ETAT::ENCOURS]);
			if (count($datas) > 0) {
				$affectation = $datas[0];
				$affectation->actualise();
				return $affectation;
			}
		}
	}


	public function is_affecte(){
		$datas = $this->fourni("affectation", ["etat_id = "=>ETAT::ENCOURS]);
		if (count($datas) > 0) {
			return true;
		}else{
			return false;
		}
	}


	public function en_pret(){
		$this->etat();
		if ($this->etatvehicule_id == 4) {
			return true;
		}else{
			return false;
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


	public function indisponible(){
		$this->historique("Le vehicule ".$this->name()." est maintenant indisponible !");
		$this->etatvehicule_id = -1;
		return $this->save();
	}
	public function disponible(){
		$this->historique("Le vehicule ".$this->name()." est de nouveau disponible !");
		$this->etatvehicule_id = 0;
		return $this->save();
	}


	public function in(){
		$this->historique("Le vehicule ".$this->name()." fait de nouveau partir du parc !");
		$this->etatvehicule_id = 0;
		$this->date_sortie = null;
		return $this->save();
	}
	public function out(){
		$data = new RESPONSE;
		if ($this->location == 0) {
			$this->historique("Le vehicule ".$this->name()." ne fait plus partir du parc !");
			$this->etatvehicule_id = -2;
			$this->date_sortie = dateAjoute();
			$data =  $this->save();
		}else{
			$data->status = false;
			$data->message = "Ce véhicule est en location chez ARTCI, il ne peut donc être déclasser !";
		}
		return $data;
	}




////////////////////////////////////////////////////////////////////////////

	public static function parcauto(){
		static::etat();
		return static::findBy(["etatvehicule_id !="=> ETATVEHICULE::DECLASSEE]);
	}

	public static function libres(){
		static::etat();
		return static::findBy(["groupevehicule_id ="=>GROUPEVEHICULE::VEHICULEMISSION, "etatvehicule_id ="=>ETATVEHICULE::RAS]);
	}

	public static function mission(){
		static::etat();
		return static::findBy(["groupevehicule_id ="=>GROUPEVEHICULE::VEHICULEMISSION, "etatvehicule_id ="=>ETATVEHICULE::MISSION]);
	}

	public static function open(){
		static::etat();
		$datas = static::findBy(["etatvehicule_id ="=>ETATVEHICULE::RAS]);
		foreach ($datas as $key => $vehicule) {
			if (!in_array($vehicule->groupevehicule_id, GROUPEVEHICULEOPEN::get())) {
				unset($datas[$key]);
			}
		}
		return $datas;
	}



	public static function pret_location(){
		$datas = static::loues();
		$datas1 = static::pretes();
		foreach ($datas1 as $key => $vehicule1) {
			foreach ($datas as $key => $vehicule) {
				if ($vehicule1->getId() == $vehicule->getId()) {
					unset($datas1[$key]);
				}
			}
		}
		return array_merge($datas, $datas1);
	}

////////////////////////////////////////////////////////////////////////////

	public static function co2(){
		$datas = static::findBy(["etatvehicule_id !="=> -2]);
		foreach ($datas as $key => $vehicule) {
			$carte = $vehicule->carteGrise();
			$total += dateDiffe($vehicule->date_mise_circulation, date("Y-m-d"));
		}
	}

	public static function carburant(){
		$datas = static::findBy(["etatvehicule_id !="=> -2]);
	}

	public static function avgKM(){
		$datas = static::findBy(["etatvehicule_id !="=> -2]);
		return comptage($datas, "kilometrage", "avg");
	}

	public static function avgAge(){
		$total = 0;
		$datas = static::findBy(["etatvehicule_id !="=> -2]);
		foreach ($datas as $key => $vehicule) {
			$total += dateDiffe($vehicule->date_mise_circulation, date("Y-m-d"));
		}
		return ceil($total / 30);
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