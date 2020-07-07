<?php
namespace Home;
use Native\RESPONSE;
/**
 * 
 */
class IMAGEPIECEVEHICULE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $piecevehicule_id;
	public $name;
	public $photo;


	public function enregistre(){
		return  $this->save();
	}



	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>