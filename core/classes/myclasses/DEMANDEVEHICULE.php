<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIl;

/**
 * 
 */
class DEMANDEVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;


	public $ticket;
	public $typemission_id = 1;
	public $utilisateur_id;
	public $departement_id;
	public $objet;
	public $comment;
	public $started;
	public $finished;
	public $with_chauffeur; 
	public $caracteristique; 
	public $lieu; 
	public $vehicule_id;
	public $chauffeur_id;

	public $date_validation_amb = null;
	public $date_validation_dg = null; 
	public $date_validation_rh = null;
	public $date_approuve = null;
	public $refus_comment;

	public $etape = 0;
	public $etat_id = ETAT::ENCOURS;
	public $gestionnaire_id;

	public $carburant_aller;
	public $carburant_retour;


	public function enregistre(){
		$data = new RESPONSE;
		$this->utilisateur_id = getSession("utilisateur_connecte_id");
		$this->departement_id = getSession("departement_id");
		if (dateAjoute() <= $this->started && $this->started <= $this->finished) {
			$datas = TYPEMISSION::findBy(["id ="=>$this->typemission_id]);
			if (count($datas) == 1) {
				$datas = UTILISATEUR::findBy(["id ="=>$this->utilisateur_id]);
				if (count($datas) == 1) {
					$this->ticket = strtoupper(substr(uniqid(), 5, 6));					
					$data = $this->save();
					if ($data->status) {
						$this->setId($data->lastid)->actualise();
						$params = PARAMS::findLastId();

						$demande = "Vous avez reçu une nouvelle demande de véhicule N°$this->ticket de la part de ".$this->auteur()." pour ".$this->typemission->name;
						ob_start();
						include(__DIR__."/../../../composants/assets/emails/demande.php");
						$contenu = ob_get_contents();
						ob_end_clean();
						EMAIL::send(GESTIONNAIRE::getEmailGestionnaires(), "Nouvelle demande de véhicule", $contenu);
						
					}
					$data->message = "Votre demande de véhicule a bien été pris en compte !";
				}else{
					$data->status = false;
					$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !";
				}
			}else{
				$data->status = false;
				$data->message = "1 Une erreur s'est produite lors de l'opération, veuillez recommencer !";
			}
		}else{
			$data->status = false;
			$data->message = "Les dates pour la période de demande ne sont correctes !";
		}
		return $data;
	}



	public static function valideesCeMois(){
		return static::findBy(["etat_id ="=>1, "date_approuve >="=>date("Y-m")."-01"]);
	}

	public static function annuleesCeMois(){
		return static::findBy(["etat_id ="=>-1, "date_approuve >="=>date("Y-m")."-01"]);
	}




	public static function missions(){
		return static::findBy(["typemission_id ="=>1]);
	}

	public function with_chauffeur(){
		return ($this->with_chauffeur == 0) ? "Sans chauffeur" : "Avec chauffeur";
	}

	public function caracteristique(){
		return ($this->caracteristique == "") ? "N'importe quel véhicule" : "Vehicule de type $this->caracteristique";
	}


	public function auteur(){
		$this->actualise();
		return $this->utilisateur->name." ".$this->utilisateur->lastname." - ". $this->utilisateur->departement->name;
	}


	public function email(){
		$this->actualise();
		return $this->utilisateur->email;
	}


	public function annuler(){
		$this->etat_id = ETAT::ANNULEE;;
		$this->historique("Annulation de la demande de véhicule N° $this->id par le demandeur");
		return $this->save();
	}


	public function refuser(String $commentaire){
		$data = new RESPONSE;
		$this->etat_id = ETAT::ANNULEE;;
		$this->refus_comment = $commentaire;
		$this->date_approuve = date("Y-m-d H:i:s");
		$this->historique("Refus de la demande de véhicule N° $this->id");
		$data = $this->save();
		if ($data->status) {
			$this->actualise();
			$demande = "Votre demande de véhicule N°".$this->ticket." pour ".$this->typemission->name;

			ob_start();
			include(__DIR__."/../../../composants/assets/emails/refus.php");
			$contenu = ob_get_contents();
			ob_end_clean();
			EMAIL::send([$this->email()], $objet, $contenu);
		}
		return $data;
	}


	public function approuver(){
		$data = new RESPONSE;
		$this->etape++;
		$this->historique("Nouvelle étape pour la demande de véhicule N° $this->ticket");
		$data = $this->save();
		if ($data->status) {
			if (($this->typemission_id == TYPEMISSION::PROGRAMMEE && $this->etape >= DEPARTEMENT::finCircuitProgrammee()) || ($this->typemission_id == TYPEMISSION::INOPINEE && $this->etape >= DEPARTEMENT::finCircuitInopinee())) {

				$mission = new MISSION();
				$mission->cloner($this);
				$mission->setId(null);
				$mission->demandevehicule_id = $this->getId();
				$data = $mission->enregistre();
				if ($data->status) {
					$this->etat_id = ETAT::VALIDEE;
					$this->date_approuve = date("Y-m-d H:i:s");
					$this->historique("Approbation de la demande de véhicule N° $this->ticket");
					$data = $this->save();
					if ($data->status) {
						$this->actualise();
						$demande = "Votre demande de véhicule N°".$this->ticket." pour ".$this->typemission->name;

						ob_start();
						include(__DIR__."/../../../composants/assets/emails/success.php");
						$contenu = ob_get_contents();
						ob_end_clean();
						EMAIL::send([$this->email()], $objet, $contenu);
					}
				}
			}else{
				$this->actualise();
				$demande = "La demande de véhicule N°".$this->ticket." pour ".$this->typemission->name;
				$responsable = " responsable de ".$this->departement->sigle." / ".$this->departement->name();
				ob_start();
				include(__DIR__."/../../../composants/assets/emails/demandeapprobation.php");
				$contenu = ob_get_contents();
				ob_end_clean();
				EMAIL::send([$this->departement->emails()], $objet, $contenu);

			}
		}
		return $data;
	}



	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>