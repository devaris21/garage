<?php 
namespace Home;

$title = "GRG | Tous les clients !";
$clients = CLIENT::findBy([],[],["name"=>"ASC"]);

?>