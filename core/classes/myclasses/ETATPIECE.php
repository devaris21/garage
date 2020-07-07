<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class ETATPIECE extends TABLE
{


	const ANNULEE = 1;
	const PERIMEE = 2;
	const VALIDE = 3;


	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $name;
	public $class;

	public function enregistre(){}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}
?>