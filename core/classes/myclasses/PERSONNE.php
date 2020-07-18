<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use \DateTime;
use \DateInterval;
/**
/**
 * 
 */
abstract class PERSONNE extends TABLE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;



	public $name ;
	public $lastname ;
	public $adresse;
	public $contact;
	public $email;
	


	public function enregistre(){
		$data = new RESPONSE;
		$this->login = substr(uniqid(), 6);
		$pass = substr(uniqid(), 5);
		$this->password = hasher($pass);
		if ($this->login != "" && $this->password != "") {
			$datas = static::findBy(["login ="=>$this->login]);
			if (count($datas) == 0) {
				$data = $this->save();
				$this->setId($data->lastid)->actualise();

				ob_start();
				include(__DIR__."/../../webapp/administration/elements/mails/welcome_client.php");
				$contenu = ob_get_contents();
				ob_end_clean();
				EMAIL::send([$this->email], "Bienvenue - ARTCI | Gestion du parc auto", $contenu);
			}else{
				$data->status = false;
				$data->message = "Ce login ne peut plus etre utilisé !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le login et le mot de passe du nouvel employé !";
		}
		return $data;
	}




	public function sentenseCreate(){
		return $this->sentense = "Ajout d'un nouvel employé dans votre gestion : $this->name $this->lastname";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des informations de l'employé $this->name $this->lastname.";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive de l'employé $this->name $this->lastname.";
	}



}

?>