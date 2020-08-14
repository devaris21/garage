<?php 
namespace Home;
unset_session("infovehicules");
unset_session("vehicules-preter");

$date1 = dateAjoute();
$date2 = dateAjoute(2);

if (getSession("date1") != null) {
	$date1 = getSession("date1");
	$date2 = dateAjoute1(getSession("date2"), -1);
}


$title = "AMB | Locations & prets de véhicules ";
?>