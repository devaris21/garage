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
class CLIENT extends PERSONNE
{
	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;



	public $is_new = 1;
	public $is_allowed = 1;
	public $is_connecte = false;
	


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




	public function se_connecter(){
		$connexion = new CONNEXION;
		$connexion->client_id = $this->getId();
		$connexion->connexion_client();
	}



	public function se_deconnecter(){
		$connexion = new CONNEXION;
		$connexion->client_id = $this->getId();
		$connexion->deconnexion_client();
	}


	public function last_connexion(){
		$datas = CONNEXION::findBy(["client_id = "=> $this->getId()], [], ["id"=>"DESC"], 1);
		if (count($datas) == 1) {
			$connexion = $datas[0];
			if ($connexion->date_deconnexion == null) {
				return $connexion->date_connexion;
			}else{
				return $connexion->date_deconnexion;
			}
		}
	}


	public static function getAllConnected(){
		$datas = self::findBy(["allowed = "=> 1]);
		foreach ($datas as $key => $gestionnaire) {
			if (!$gestionnaire->is_connected()) {
				unset($datas[$key]);
			}
		}
		return $datas;
	}





	public function is_connected(){
		$datas = CONNEXION::findBy(["client_id = "=> $this->getId()], [], ["id"=>"DESC"], 1);
		if (count($datas) == 1) {
			$connexion = $datas[0];
			if ($connexion->date_deconnexion == null) {
				return true;
			}else{
				return false;
			}
		}
	}



	public function relog_gestionnaire(string $login, string $password){
		$data = new RESPONSE;
		if ($password != "" && $login != "") {
			$datas = self::findBy(["login = "=>$login, "id !="=> $this->getId()]);
			if (count($datas) == 0) {
				if($this->password != hasher($password)){
					if ($this->setLogin($login)) {
						$this->set_password($password);
						$this->is_new = 1;
						$data = $this->save();
						$data->setUrl("master", "dashboard");
					}else{
						$data->status = false;
						$data->message = "Cet identifiant est déjà utilisé. Changez-le !!!";
					}
				}else{
					$data->status = false;
					$data->message = "Veuillez ne pas utiliser l'ancien mot de passe. Changez-le !!!";
				}
			}else{
				$data->status = false;
				$data->message = "Vous ne pouvez pas utiliser ce login !";
			}
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner integralement vos parametres de connexion !";
		}
		return $data;
	}



	public function reinitialiserCompte(){
		$data = new RESPONSE;
		if ($this->setLogin(substr(md5(uniqid()), 0, 9))) {
			$this->set_password("6ed78djf21ga");
			$this->is_new = 0;
			$this->historique("Reinitialisation des parametres de compte de $this->name $this->lastname");
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Cet identifiant est déjà utilisé. Veuillez reessayer !!!";
		}	
		return $data;
	}


	public function interdireCompte(){
		$this->allowed = 0;
		$this->historique("Restriction d'accès pour le compte de $this->name $this->lastname");
		$data = $this->save();	
		return $data;
	}


	public function accesCompte(){
		$this->allowed = 1;
		$this->historique("Reouverture d'accès pour le compte de $this->name $this->lastname");
		$data = $this->save();	
		return $data;
	}


	public function supprimerCompte(){
		$this->valide = 0;
		$this->allowed = 0;
		$this->set_password(substr(md5(uniqid()), 7, 12));
		$this->historique("Suppression du compte compte de $this->name $this->lastname");
		$data = $this->save();	
		return $data;
	}




	public function validate(){
		$data = new RESPONSE;
		$query = new QUERY;
		$datas = self::findBy(["login = "=>$this->login]);
		if (count($datas) == 0) {
			$data->status = true;
			$data->message = "aucun login semblabe, valide!";
		}else{
			$gestionnaireTemp = $datas[0];
			if ($gestionnaireTemp->id === $this->id) {
				$data->status = true;
				$data->message = "C'est son login'";
			}else{
				$data->status = false;
				$data->message = "Ce identifiant n'est pas disponible. veuillez le changer !";
			}
		}
		return $data;
	}



	public function is_schedules(){
		$data = new RESPONSE;
		$emploi = EMPLOIDUTEMPS::getSchedules($this, date("Y-m-d"), date("Y-m-d"))[0];
		if (($emploi->resultat[0] != -1) && ($emploi->resultat[1] != -1)){
			$debut = new DateTime();
			$debut->setDate(date("Y"), date("m"), date("d"));
			$debut->setTime($emploi->resultat[0], 0);
			$fin = new DateTime();
			$fin->setDate(date("Y"), date("m"), date("d"));
			$fin->setTime($emploi->resultat[1], 0);
			$now = new DateTime();
			if ($debut <= $now && $now <= $fin) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}


	public function is_schedules2(){
		$data = new RESPONSE;
		$emploi = EMPLOIDUTEMPS::getSchedules($this, date("Y-m-d"), date("Y-m-d"))[0];
		if (($emploi->resultat[0] != -1) && ($emploi->resultat[1] != -1)){
			$debut = new DateTime();
			$debut->setDate(date("Y"), date("m"), date("d"));
			$debut->setTime($emploi->resultat[0], 0);
			$fin = new DateTime();
			$fin->setDate(date("Y"), date("m"), date("d"));
			$fin->setTime($emploi->resultat[1], 0);
			$now = new DateTime();
			$interval = "PT".$emploi->seuil."M";
			$now->add(new DateInterval($interval));
			if ($debut <= $now && $now <= $fin) {
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}




	public function getRapportJournalier(){
		$data = new RESPONSE;
		$tab = BREAKDAY::getDateByBreakday();
		$datas = HISTORY::findBy(["gestionnaire_id ="=>$this->getId(), "created >="=>$tab["date1"], "created <="=>$tab["date2"]], [], ["created"=>"DESC"]);
		foreach ($datas as $key => $ligne) {
			$ligne->actualise();
			$tab = [];
			$lots = MODULE::getModulesStandart();
			foreach ($lots as $key => $module) {
				$tab[] = $module->getId();
			}
			$tab[] = MODULE::getModuleIdFor("caisse");

			if (!in_array($ligne->module->getId(), $tab)) {
				unset($datas[$key]);
			}
		}
		return $datas;
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