<?php 
namespace Home;

$title = "GRG | Rangements de la production";

$datas = MISEENBOUTIQUE::findBy([], [], ["created"=>"DESC"]);


?>