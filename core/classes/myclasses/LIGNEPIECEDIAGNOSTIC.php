<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LIGNEPIECEDIAGNOSTIC extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $diagnostic_id;
	public $piece;



	public function enregistre(){
		$data = new RESPONSE;
		$datas = DIAGNOSTIC::findBy(["id ="=>$this->diagnostic_id]);
		if (count($datas) == 1) {
			if ($this->piece != "") {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Veuillez renseigner la piece !";
			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'ajout du produit !";
		}
		return $data;
	}




	public function sentenseCreate(){
		
	}


	public function sentenseUpdate(){
	}


	public function sentenseDelete(){
	}

}



?>