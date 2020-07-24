<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class TICKET extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $agence_id;
	public $reference;
	public $auto_id;
	public $vin;
	public $client_id;
	public $constat;
	public $autreremarque;
	public $kilometrage;
	public $niveaucarburant_id;
	public $etatintervention_id = ETATINTERVENTION::NOUVEAU;
	public $etat_id = ETAT::ENCOURS;
	public $employe_id;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = AUTO::findBy(["id ="=>$this->auto_id]);
		if (count($datas) == 1) {
			$datas = CLIENT::findBy(["id ="=>$this->client_id]);
			if (count($datas) == 1) {
				$this->reference = strtoupper(substr(uniqid(), 7, 8));
				$this->agence_id = getSession("agence_connecte_id");
				$this->employe_id = getSession("employe_connecte_id");
				$data = $this->save();
			}else{
				$data->status = false;
				$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


	public static function etat (int $type){
		return static::findBy(["etatintervention_id = "=>$type, "etat_id != "=>ETAT::ANNULEE]);
	}


	public static function enAttente (){
		$datas = static::encours();
		foreach ($datas as $key => $ticket) {
			if (in_array($ticket->etatintervention_id, [ETATINTERVENTION::ESSAI_AVANT, ETATINTERVENTION::ESSAI_AVANT_CHEF, ETATINTERVENTION::ESSAI_APRES_CHEF])) {
				$lots = $ticket->fourni("essai", ["etat_id ="=>ETAT::ENCOURS]);
				if (count($lots) > 0) {
					unset($datas[$key]);
					continue;
				}
			}

			if (in_array($ticket->etatintervention_id, [ETATINTERVENTION::DEVIS])) {
				$lots = $ticket->fourni("devis", ["etat_id ="=>ETAT::ENCOURS]);
				if (count($lots) > 0) {
					unset($datas[$key]);
					continue;
				}
			}

			if (in_array($ticket->etatintervention_id, [ETATINTERVENTION::DIAGNOSTIC])) {
				$lots = $ticket->fourni("diagnostic", ["etat_id ="=>ETAT::ENCOURS]);
				if (count($lots) > 0) {
					unset($datas[$key]);
					continue;
				}
			}

			if (in_array($ticket->etatintervention_id, [ETATINTERVENTION::INTERVENTION])) {
				$lots = $ticket->fourni("intervention", ["etat_id ="=>ETAT::ENCOURS]);
				if (count($lots) > 0) {
					unset($datas[$key]);
					continue;
				}
			}

			if ($ticket->etatintervention_id == ETATINTERVENTION::LIVRAISON) {
				unset($datas[$key]);
			}
		}
		return $datas;
	}



	public static function isEnAttente (){
		$test = true;
		if (in_array($this->etatintervention_id, [ETATINTERVENTION::ESSAI_AVANT, ETATINTERVENTION::ESSAI_AVANT_CHEF, ETATINTERVENTION::ESSAI_APRES_CHEF])) {
			$lots = $this->fourni("essai", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return false;
			}
		}


		if (in_array($this->etatintervention_id, [ETATINTERVENTION::DEVIS])) {
			$lots = $this->fourni("devis", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return false;
			}
		}


		if (in_array($this->etatintervention_id, [ETATINTERVENTION::DIAGNOSTIC])) {
			$lots = $this->fourni("diagnostic", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return false;
			}
		}


		if (in_array($this->etatintervention_id, [ETATINTERVENTION::INTERVENTION])) {
			$lots = $this->fourni("intervention", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return false;
			}
		}

		if ($this->etatintervention_id == ETATINTERVENTION::LIVRAISON) {
			return false;
		}
		return $test;
	}



	public function etatSuivant (){
		$id = $this->etatintervention_id;
		if ($this->etatintervention_id < ETATINTERVENTION::TERMINE) {
			$id = $this->etatintervention_id +1;
		}
		$datas = ETATINTERVENTION::findBy(["id ="=> $id]);
		return $datas[0];
	}


	public function etatIntervention (){
		$this->actualise();

		if (in_array($this->etatintervention_id, [ETATINTERVENTION::NOUVEAU])) {
			return $this;
		}

		if (in_array($this->etatintervention_id, [ETATINTERVENTION::ESSAI_AVANT, ETATINTERVENTION::ESSAI_AVANT_CHEF, ETATINTERVENTION::ESSAI_APRES_CHEF])) {
			$lots = $this->fourni("essai", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return end($lots);
			}
		}

		if (in_array($this->etatintervention_id, [ETATINTERVENTION::DEVIS])) {
			$lots = $this->fourni("devis", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return end($lots);
			}
		}

		if (in_array($this->etatintervention_id, [ETATINTERVENTION::DIAGNOSTIC])) {
			$lots = $this->fourni("diagnostic", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return end($lots);
			}
		}

		if (in_array($this->etatintervention_id, [ETATINTERVENTION::INTERVENTION])) {
			$lots = $this->fourni("intervention", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return end($lots);
			}
		}

		if (in_array($this->etatintervention_id, [ETATINTERVENTION::LAVAGE])) {
			$lots = $this->fourni("lavage", ["etat_id ="=>ETAT::ENCOURS]);
			if (count($lots) > 0) {
				return end($lots);
			}
		}
	}



	public function next(int $etat = null, int $mecanicien_id = null){
		if ($etat != null) {
			$this->etatintervention_id = $etat;
		}else{
			$this->etatintervention_id++; 
		}
		if ($this->etatintervention_id < ETATINTERVENTION::TERMINE) {
			if (in_array($this->etatintervention_id, [ETATINTERVENTION::ESSAI_AVANT, ETATINTERVENTION::ESSAI_AVANT_CHEF])) {
				$essai = new ESSAI;
				$essai->ticket_id = $this->id;
				$essai->mecanicien_id = $mecanicien_id;
				$essai->typeessai_id = $this->etatintervention_id - 1;
				$data = $essai->enregistre();

			}elseif ($this->etatintervention_id == ETATINTERVENTION::DIAGNOSTIC) {
				$diagnostic = new DIAGNOSTIC;
				$diagnostic->ticket_id = $this->id;
				$diagnostic->mecanicien_id = $mecanicien_id;
				$data = $diagnostic->enregistre();

			}elseif ($this->etatintervention_id == ETATINTERVENTION::DEVIS) {
				$devis = new DEVIS;
				$devis->ticket_id = $this->id;
				$devis->mecanicien_id = $mecanicien_id;
				$data = $devis->enregistre();

			}elseif ($this->etatintervention_id == ETATINTERVENTION::INTERVENTION) {
				$devis = new INTERVENTION;
				$devis->ticket_id = $this->id;
				$devis->mecanicien_id = $mecanicien_id;
				$data = $devis->enregistre();

			}elseif ($this->etatintervention_id == ETATINTERVENTION::ESSAI_APRES_CHEF) {
				$essai = new ESSAI;
				$essai->ticket_id = $this->id;
				$essai->mecanicien_id = $mecanicien_id;
				$essai->typeessai_id = TYPEESSAI::APRES;
				$data = $essai->enregistre();

			}elseif ($this->etatintervention_id == ETATINTERVENTION::LAVAGE) {
				$essai = new LAVAGE;
				$essai->ticket_id = $this->id;
				$essai->mecanicien_id = $mecanicien_id;
				$data = $essai->enregistre();

			}elseif ($this->etatintervention_id == ETATINTERVENTION::LIVRAISON) {
				$data->status = true;
			}
		}else{
			$this->etatintervention_id = ETATINTERVENTION::TERMINE;
			$this->etat_id = ETAT::VALIDEE;
		}

		if ($data->status) {
			return $this->save();
		}
		return $data;
	}



	public function getEssai(){
		$datas = $this->fourni("essai", ["typeessai_id ="=>TYPEESSAI::AVANT, "etat_id !="=>ETAT::ANNULEE]);
		if (count($datas) > 0) {
			return $datas[0];
		}
		return new ESSAI;
	}

	public function getEssaiChef(){
		$datas = $this->fourni("essai", ["typeessai_id ="=>TYPEESSAI::AVANT_CHEF, "etat_id !="=>ETAT::ANNULEE]);
		if (count($datas) > 0) {
			return $datas[0];
		}
		return new ESSAI;
	}

	public function getEssaiApres(){
		$datas = $this->fourni("essai", ["typeessai_id ="=>TYPEESSAI::APRES, "etat_id !="=>ETAT::ANNULEE]);
		if (count($datas) > 0) {
			return $datas[0];
		}
		return new ESSAI;
	}


	public function sentenseCreate(){
		return $this->sentense = "Creation d'un nouveau ticket: $this->reference ";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'accessoire $this->id : $this->reference ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive de l'accessoire $this->id : $this->reference";
	}
}
?>