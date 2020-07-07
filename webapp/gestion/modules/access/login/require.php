<?php 
namespace Home;

@session_destroy();
unset($_GET);
unset($_POST);
$params = PARAMS::findLastId();

$title = "GRG | Espace de connexion";


?>