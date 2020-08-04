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
	const REPARATION = 3;
	const INSPECTION = 4;
	const INDISPONIBLE = 5;


	public $name;
	public $class;

	public function enregistre(){}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}
?>