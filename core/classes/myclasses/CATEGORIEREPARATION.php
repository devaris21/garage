<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class CATEGORIEOPERATION extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	const VENTE = 1;
	const REMBOURSEMENT_FOURNISSEUR = 2;
	const LOCATION_VENTE = 3;

	public $name;



	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();	
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner la categorie !";
		}
		return $data;
	}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>