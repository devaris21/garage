<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class APPROVISIONNEMENT extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $equipement_id;
	public $accessoire_id;
	public $quantite;
	public $price;


	public function enregistre(){
		$this->gestionnaire_id = getSession("gestionnaire_connecte_id");
		$data = $this->save();
		return $data;
	}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>