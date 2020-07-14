<?php
namespace Home;
use Native\RESPONSE;
use Native\EMAIL;
use Native\SHAMMAN;
/**
 * 
 */
abstract class AUTH extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	public $started;
	public $isAllowed = TABLE::OUI;
	public $isNew = TABLE::OUI;
	public $isAdmin = TABLE::NON;
	public $login;
	public $password;


	public static function connect(Array $params){
		$data = new RESPONSE;
		if (count($params) > 0) {
			$datas = static::findBy($params);
			if (count($datas) == 1) {
				$element = $datas[0];
				$element->actualise();
				if ($element->is_allowed()) {
					$data->status = true;
					//on met a jour le lasttime
					session("last_access", time());
					$data->element = $element;
					$data->new = false;
					if ($element->is_new == 1) {
						$data->new = true;
					}
				}else{
					$data->status = false;
					$data->message = "L'accès à cette application vous a été restrient ! <br> Veuillez contacter votre Administrateur.";
					$data->setUrl("access", "restriction");
				}
			}else{
				$data->status = false;
				$data->message = "Votre login et/ou le mot de passe est incorrect !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner integralement vos parametres de connexion !";
		}
		return $data;
	}


	public function is_allowed(){
		if ($this->is_allowed == 0) {
			return false;
		}else{
			return true;
		}
	}

	public function is_new(){
		if ($this->is_new == 1) {
			return false;
		}else{
			return true;
		}
	}



	public function lock(){
		$this->is_allowed = 0;
		$this->historique("Restriction des accès pour ".$this->name());
		return $this->save();
	}


	public function unlock(){
		$this->is_allowed = 1;
		$this->historique("Deblocage des accès pour ".$this->name());
		return $this->save();
	}




	public function resetPassword(){
		$this->is_new = 1;
		$this->login = substr(uniqid(), 6);
		$pass = substr(uniqid(), 5);
		$this->password = hasher($pass);
		$this->historique("Reinitialisation des parametres de connexion de ".$this->name());
		$data = $this->save();
		if ($data->status) {
			ob_start();
			include(__DIR__."/../../../composants/assets/emails/reset.php");
			$contenu = ob_get_contents();
			ob_end_clean();
			EMAIL::send([$this->email], "Reinitialisation de vos parametres de connexion", $contenu);
			$data->setUrl("amb", "home", "select");
		}
		return $data;
	}



	public function loginIsValide(String $login){
		if ($login != "") {
			$login = verification($login);
			$datas = static::findBy(["login = "=>$login]);
			if (count($datas) == 0) {
				return true;
			}else{
				$item = $datas[0];
				if ($item->id === $this->id) {
					return true;
				}else{
					return false;
				}
			}
		}else{
			return false;
		}
	}


	public function emailIsValide(String $email){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$datas = static::findBy(["email = "=>$email]);
			if (count($datas) == 0) {
				return true;
			}else{
				$item = $datas[0];
				if ($item->id === $this->id) {
					return true;
				}else{
					$this->email = null;
					return false;
				}
			}
		}else{
			return false;
		}
	}



	public function passwordIsValide($password){
		return (strlen($password) > 6);
	}



	public function checkPassword($password){
		return ($this->password === hasher($password));
	}


	public function setLogin($login){
		if ($login != "") {
			$login = verification($login);
			$datas = static::findBy(["login = "=>$login]);
			if (count($datas) == 0) {
				$this->login = $login;
				return true;
			}else{
				$gestionnaireTemp = $datas[0];
				if ($gestionnaireTemp->id === $this->id) {
					$this->login = $login;
					return true;
				}else{
					$this->login = null;
					return false;
				}
			}
		}else{
			return false;
		}
	}


	public function setPassword($password){
		$this->password = hasher($password);
		return $this;
	}


	public function sentenseCreate(){}
	public function sentenseUpdate(){}
	public function sentenseDelete(){}

}



?>