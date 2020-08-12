<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class ETAT extends TABLE
{

		public static $tableName = __CLASS__;
		public static $namespace = __NAMESPACE__;

		const ANNULEE = 1;
		const EXPIREE = 2;
		const ENCOURS = 3;
		const PARTIEL = 4;
		const VALIDEE = 5;

		public $name;
		public $class;

		public function enregistre(){}


		public function sentenseCreate(){}
		public function sentenseUpdate(){}
		public function sentenseDelete(){}

	}
	?>