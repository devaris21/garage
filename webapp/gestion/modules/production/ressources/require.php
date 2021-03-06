<?php 
namespace Home;
unset_session("ressources");

if ($this->getId() != "") {
	$tab = explode("@", $this->getId());
	$date1 = $tab[0];
	$date2 = $tab[1];
}else{
	$date1 = dateAjoute(-7);
	$date2 = dateAjoute();
}

$produits = PRODUIT::findBy(["isActive ="=>TABLE::OUI]);


$ressources = RESSOURCE::getAll();
$etiquettes = ETIQUETTE::getAll();
$emballages = EMBALLAGE::getAll();

$productionjours = PRODUCTIONJOUR::findBy(["DATE(created) >= "=>$date1, "DATE(created) <= "=>$date2],[],["ladate"=>"DESC"]);
usort($productionjours, 'comparerLadate');

$title = "GRG | Stock des ressources ";
?>