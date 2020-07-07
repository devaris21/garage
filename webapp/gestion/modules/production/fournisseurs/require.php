<?php 
namespace Home;

$title = "GRG | Tous les fournisseurs";

$fournisseurs = FOURNISSEUR::findBy(["visibility ="=>1]);


?>