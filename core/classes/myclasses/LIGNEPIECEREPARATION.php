<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class LIGNEPIECEREPARATION extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $reparation_id;
	public $lignepiecediagnostic_id;
	public $produit_id;
	public $quantite;



	public function enregistre(){
		$data = new RESPONSE;
		$datas = REPARATION::findBy(["id ="=>$this->reparation_id]);
		if (count($datas) == 1) {
			$datas = LIGNEPIECEDIAGNOSTIC::findBy(["id ="=>$this->lignepiecediagnostic_id]);
			if (count($datas) == 1) {
				$datas = PRODUIT::findBy(["id ="=>$this->produit_id]);
				if (count($datas) == 1) {
					if ($this->quantite > 0) {
						$data = $this->save();
					}else{
						$data->status = false;
						$data->message = "Veuillez renseigner la piece !";
					}
				}else{
					$data->status = false;
					$data->message = "Une erreur s'est produite lors de l'ajout du produit !";
				}
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