<?php
namespace Home;
use Native\RESPONSE;
use Native\FICHIER;



/**
 * 
 */
class PIECEVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;


	public $name;
	public $numero_piece;
	public $vehicule_id;
	public $typepiecevehicule_id;
	public $date_etablissement; 
	public $started;
	public $finished;
	public $price;
	public $etatpiece_id = ETATPIECE::VALIDE;
	public $gestionnaire_id;
	public $image1;
	public $image2;

	

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->date_etablissement <= dateAjoute()) {
			if ($this->price >= 0) {
				if ($this->numero_piece != "") {
					$datas = TYPEPIECEVEHICULE::findBy(["id ="=>$this->typepiecevehicule_id]);
					if (count($datas) == 1) {
						$item = $datas[0];
						$this->name = $item->name." ".date("Y", strtotime($this->date_etablissement));
						$this->vehicule_id = getSession("vehicule_id");
						$datas = VEHICULE::findBy(["id ="=>$this->vehicule_id]);
						if (count($datas) == 1) {
							$this->gestionnaire_id = getSession("gestionnaire_connecte_id");
							$data = $this->save();
							if ($data->status) {
								$this->uploading($this->files);
							}
						}else{
							$data->status = false;
							$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !";
						}
					}else{
						$data->status = false;
						$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !";
					}
				}else{
					$data->status = false;
					$data->message = "Veuillez renseigner les champs marqués d'un * !";
				}		
			}else{
				$data->status = false;
				$data->message = "Veuillez entrer un prix correct pour cette piece !";
			}	
		}else{
			$data->status = false;
			$data->message = "La date d'établissement de la pièce n'est pas correcte !";
		}
		return $data;
	}


	public function etat(){
		if ($this->finished >= dateAjoute()) {
			$this->etatpiece_id = 1;
		}else{
			$this->etatpiece_id = -1;
		}
		$this->save();
	}



	public function uploading(Array $files){
		//les proprites d'images;
		$tab = ["image1", "image2"];
		if (is_array($files) && count($files) > 0) {
			$i = 0;
			foreach ($files as $key => $file) {
				if ($file["tmp_name"] != "") {
					$image = new FICHIER();
					$image->hydrater($file);
					if ($image->is_image()) {
						$a = substr(uniqid(), 5);
						$result = $image->upload("images", "piecevehicules", $a);
						$name = $tab[$i];
						$this->$name = $result->filename;
						$this->save();
					}
				}	
				$i++;			
			}			
		}
	}


	public static function coutAnnuel(){
		return comptage(static::findBy(["DATE(date_etablissement) >= "=> date("Y")."-01-01"]), "price", "somme");
	}

	
	public function sentenseCreate(){
		return $this->sentense = "Nouvelle piece administrative pour la ".$this->vehicule->name();
	}

	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>