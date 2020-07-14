<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class TARIFVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $name;
	public $prixJournalier;
	public $kilometreJournalier;
	public $prixKilometreComplementaire;

	public function enregistre(){
		$data = new RESPONSE;
		if ($this->prixJournalier > 0 && $this->prixKilometreComplementaire >= 0) {
			if ($this->kilometreJournalier > 0) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->status = "Veuillez renseigner le kilometrage journalier";
			}
		}else{
			$data->status = false;
			$data->status = "Les prix de ce tarif sont incorrects, veuillez recommencer !!!";
		}
		return $data;
	}


	public function sentenseCreate(){
		return $this->sentense = "Ajout d'une nouveau tarif: $this->name dans les paramétrages";
	}
	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations du tarif $this->id : $this->name ";
	}
	public function sentenseDelete(){
		return $this->sentense = "Suppression definitive du tarif $this->id : $this->name";
	}
}
?>