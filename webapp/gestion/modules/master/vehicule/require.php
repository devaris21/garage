<?php 
namespace Home;

if ($this->getId() != null && intval($this->getId()) > 0) {
	$datas = AUTO::findBy(["id="=>$this->getId()]);
	if (count($datas) == 1) {
		session("auto_id", $this->getId());
		$auto = $datas[0];
		$auto->actualise();

		$client = new CLIENT;
		$datas = $auto->fourni("ticket");
		if (count($datas) > 0) {
			$ticket = end($datas);
			$ticket->actualise();
			$client = $ticket->client;
		}

		$title = "AMB | ".$auto->name();

	}else{
		header("Location: ../master/vehicules");
	}
}else{
	header("Location: ../master/vehicules");
}

?>