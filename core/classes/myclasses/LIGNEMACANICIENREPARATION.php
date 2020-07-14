<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LIGNEMACANICIENREPARATION extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reparation_id;
	public $mecanicien_id;



	public function enregistre(){
		$data = new RESPONSE;
		$datas = REPARATION::findBy(["id ="=>$this->reparation_id]);
		if (count($datas) == 1) {
			$datas = MECANICIEN::findBy(["id ="=>$this->mecanicien_id]);
			if (count($datas) == 1) {
				$data = $this->save();
			}else{
				$data->status = false;
				$data->message = "Une erreur s'est produite lors de l'ajout du produit !";
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