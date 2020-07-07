<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
/**
 * 
 */
class COTATION extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $objet;
	public $prestataire_id;
	public $comment;
	public $started;
	public $finished;
	public $gestionnaire_id;
	public $etat_id = ETAT::ENCOURS;


	public function enregistre(){
		$data = new RESPONSE;
		$this->prestataire_id = getSession("presta_id");
		$datas = PRESTATAIRE::findBy(["id ="=>$this->prestataire_id]);
		if (count($datas) == 1) {
			$data = $this->save();
			if ($data->status) {
				$this->setId($data->lastid)->actualise();
				$params = PARAMS::findLastId();

				$objet = "Nouvelle demande de cotation";
				$message = "Vous avez reçu une nouvelle demande de cotation de la part de l'ARTCI par rapport à l'un de vos produit/service. Nous vous invitons donc à vous connecter à votre espace dédié sur la plateforme de gestion de l'ARTCI pour de mieux prendre connaissance de cette nouvelle requette et de ses besoins .";

				// ob_start();
				// include(__DIR__."/../../webapp/home/elements/mails/standard.php");
				// $contenu = ob_get_contents();
				// ob_end_clean();
				// EMAIL::send([$this->prestataire->email], $objet, $contenu);

			}
		}else{
			$data->status = false;
			$data->message = "Une erreur s'est produite lors de l'opération, veuillez recommencer !!";
		}
		return $data;
	}




	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>