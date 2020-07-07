<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class ETATVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	const DECLASSEE    = 1;
	const INDISPONIBLE = 2;
	const RAS          = 3;
	const MISSION      = 4;
	const ENTRETIEN    = 5;
	const SINISTRE     = 6;
	const AFFECTE      = 7;
	const PRETE        = 8;
	const LOUEE        = 9;

	public $name;
	public $class;

	public function enregistre(){}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}
?>