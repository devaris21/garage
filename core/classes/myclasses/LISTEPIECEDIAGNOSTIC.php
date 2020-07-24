<?php
namespace Home;
use Native\RESPONSE;/**
 * 
 */
class LISTEPIECEDIAGNOSTIC extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $diagnostic_id;
	public $piece;
	public $quantite;

	public function enregistre(){
		$data = new RESPONSE;
		$datas = DIAGNOSTIC::findBy(["id ="=>$this->diagnostic_id]);
		if (count($datas) == 1) {
			if ($this->piece != "") {
				if ($this->quantite > 0) {
					$data = $this->save();
				}else{
					$data->status = false;
					$data->status = "La quantité de la pièce doit être supérieur à 0, veuillez recommencer !!!";
				}
			}else{
				$data->status = false;
				$data->status = "Le nom de la piece n'est pas renseigné, veuillez recommencer !!!";
			}
		}else{
			$data->status = false;
			$data->status = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!!";
		}
		return $data;
	}


}
?>