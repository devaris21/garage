<?php 
namespace Home;
unset_session("produits");
unset_session("commande-encours");

$tickets = TICKET::getAll();


?>