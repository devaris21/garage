<?php 
namespace Home;

if ($this->getId() != null && intval($this->getId()) > 0) {
	$datas = AUTO::findBy(["id="=>$this->getId()]);
	if (count($datas) == 1) {
		session("auto_id", $this->getId());
		$auto = $datas[0];
		$auto->actualise();

		$client = new CLIENT;
		$tickets = $auto->fourni("ticket");
		if (count($tickets) > 0) {
			$ticket = end($tickets);
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