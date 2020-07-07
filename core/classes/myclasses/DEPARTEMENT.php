<?php
namespace Home;
use Native\RESPONSE;
/**
 * 
 */
class DEPARTEMENT extends TABLE
{

	public static $tableName = __CLASS__;
	public static $namespace = __NAMESPACE__;

	const DPA = 1;

	public $name;
	public $sigle;
	public $circuit_programmee = -1;
	public $circuit_inopinee = -1;


	public function enregistre(){
		$data = new RESPONSE;
		if ($this->name != "") {
			$data = $this->save();
		}else{
			$data->status = false;
			$data->message = "Veuillez renseigner le nom de la nouvelle direction";
		}
		return $data;
	}


	public function sigle(){
		if ($this->sigle != "") {
			return $this->sigle ;
		}
		return $this->name();
	}




	public static function finCircuitProgrammee(){
		$datas = static::findBy(["circuit_programmee > "=> 0], [], ["circuit_programmee"=>"DESC"], 1);
		if (count($datas) == 1) {
			$item = $datas[0];
			return $item->circuit_programmee;
		}else{
			return 0;
		}
	}


	public static function finCircuitInopinee(){
		$datas = static::findBy(["circuit_inopinee > "=> 0], [], ["circuit_inopinee"=>"DESC"], 1);
		if (count($datas) == 1) {
			$item = $datas[0];
			return $item->circuit_inopinee;
		}else{
			return 0;
		}
	}


	public function listeEmails(){
		$tab = [];
		foreach ($this->fourni('utilisateur') as $key => $user) {
			if (filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
				$tab[] = $user->email;
			}
		}
		return $tab;
	}



	public function sentenseCreate(){
		return $this->sentense = "Ajout d'un nouvelle direction : $this->name dans les paramétrages";
	}


	public function sentenseUpdate(){
		return $this->sentense = "Modification des propriétés de la direction : $this->name";
	}


	public function sentenseDelete(){
		return $this->sentense = "Suppression définitive de la direction $this->name.";
	}





}
?>