<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class ETATVEHICULE extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	const LIBRE = 1;
	const LOCATION = 2;
	const RESERVATION = 3;
	const REPARATION = 4;
	const INSPECTION = 5;
	const INDISPONIBLE = 6;


	public $name;
	public $class;

	public function enregistre(){}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}
?>