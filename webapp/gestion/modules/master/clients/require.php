<?php 
namespace Home;

$title = "GRG | Tous les clients !";
$clients = CLIENT::findBy(["visibility ="=>1],[],["name"=>"ASC"]);

?>