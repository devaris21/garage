<?php 
namespace Home;
unset_session("produits");
unset_session("commande-encours");

$nouveaux = TICKET::etat(ETATINTERVENTION::NOUVEAU);
$devis = TICKET::etat(ETATINTERVENTION::DEVIS);
$livraisons = TICKET::etat(ETATINTERVENTION::LIVRAISON);


$title = "Tableau de Bord";

?>