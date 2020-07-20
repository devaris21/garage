<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class ETATINTERVENTION extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	const NOUVEAU          = 1;
	const ESSAI_AVANT      = 2;
	const ESSAI_AVANT_CHEF = 3;
	const DIAGNOSTIC       = 4;
	const DEVIS            = 5;
	const INTERVENTION     = 6;
	const ESSAI_APRES_CHEF = 7;
	const LAVAGE           = 8;
	const LIVRAISON        = 9;
	const VALIDEE          = 10;


	public $name;
	public $class;

	// danger, warning, info, blue, navy, default, "", primary, "success", "dark"

	public function enregistre(){}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}
?>