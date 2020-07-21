<?php 
namespace Home;

//n'oublie pas de configurer la date par defaut PARAMS
//n'oublie pas d'importer la base de données des marques de vehicules

$item = new AGENCE();
$item->name = "Agence principale";
$item->setProtected(1);
$item->save();


$datas = ["Mecanique", "Tollerie", "peinture", "Carrosserie", "Vente de pièces détachées", "Devis", "Expertise"];
foreach ($datas as $key => $value) {
	$item = new TYPEREPARATION();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Allume cigare", "Lecteur Cassete", "Lecteur CD/Radio", "Essui glace AV", "Essui glace AR", "Cric/Manivelle", "Pneus secours", "Triangle de signalisation"];
foreach ($datas as $key => $value) {
	$item = new EQUIPEMENTAUTO();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["AVG", "AVD", "ARG", "ARD"];
foreach ($datas as $key => $value) {
	$item = new TYPEENJOLIVEUR();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Entreprise", "Particulier", "Partenaire"];
foreach ($datas as $key => $value) {
	$item = new TYPECLIENT();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Essai avant travaux", "Essai avant travaux (chef)", "Essai apres travaux"];
foreach ($datas as $key => $value) {
	$item = new TYPEESSAI();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["master", "caisse", "parametres", "modifier-supprimer", "archives"];
foreach ($datas as $key => $value) {
	$item = new ROLE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$item = new PARAMS();
$item->societe = "Devaris 21";
$item->email = "info@devaris21.com";
$item->devise = "Fcfa";
$item->tva = 0;
$item->seuilCredit = 0;
$item->minImmobilisation = 350000;
$item->setProtected(1);
$item->enregistre();


$item = new MYCOMPTE();
$item->identifiant = strtoupper(substr(uniqid(), 5, 7));
$item->tentative = 0;
$item->expired = dateAjoute(7);
$item->setProtected(1);
$item->enregistre();


$item = new CLIENT();
$item->name = "Monsieur Tout le Monde";
$item->adresse = "...";
$item->contact = "...";
$item->typeclient_id = TYPECLIENT::PARTICULIER;
$item->setProtected(1);
$item->save();


$item = new MODEPAYEMENT();
$item->name = "Espèces";
$item->initial = "ES";
$item->etat_id = ETAT::VALIDEE;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Prelevement sur acompte";
$item->initial = "PA";
$item->etat_id = ETAT::VALIDEE;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Chèque";
$item->initial = "CH";
$item->etat_id = ETAT::ENCOURS;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Virement banquaire";
$item->initial = "VB";
$item->etat_id = ETAT::ENCOURS;
$item->setProtected(1);
$item->save();

$item = new MODEPAYEMENT();
$item->name = "Mobile money";
$item->initial = "MM";
$item->etat_id = ETAT::ENCOURS;
$item->setProtected(1);
$item->save();




$item = new ETAT();
$item->name = "Annulé";
$item->class = "danger";
$item->setProtected(1);
$item->save();

$item = new ETAT();
$item->name = "En cours";
$item->class = "warning";
$item->setProtected(1);
$item->save();

$item = new ETAT();
$item->name = "Partiellement";
$item->class = "info";
$item->setProtected(1);
$item->save();

$item = new ETAT();
$item->name = "Validé";
$item->class = "success";
$item->setProtected(1);
$item->save();


$item = new ETATINTERVENTION();
$item->name = "Nouveau ticket";
$item->class = "";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Essai avant Travaux";
$item->class = "default";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Essai avant Travaux (chef)";
$item->class = "dark";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Diagnostic technicien";
$item->class = "warning";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Devis de reparation";
$item->class = "danger";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "En intervention technicien";
$item->class = "primary";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Essai apres Travaux (chef)";
$item->class = "info";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Au lavage";
$item->class = "blue";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Prêt à être livrer";
$item->class = "success";
$item->setProtected(1);
$item->save();

$item = new ETATINTERVENTION();
$item->name = "Terminé";
$item->class = "success";
$item->setProtected(1);
$item->save();





$item = new EMPLOYE();
$item->name = "Super Administrateur";
$item->email = "info@devaris21.com";
$item->adresse = "...";
$item->contact = "...";
$item->login = "root";
$item->password = "5e9795e3f3ab55e7790a6283507c085db0d764fc";
$item->setProtected(1);
$data = $item->save();
foreach (ROLE::getAll() as $key => $value) {
	$tr = new ROLE_EMPLOYE();
	$tr->employe_id = $data->lastid;
	$tr->role_id = $value->getId();
	$tr->setProtected(1);
	$tr->enregistre();
}


$datas = ["Vide", "1/4", "1/3", "1/2", "3/4", "Plein"];
foreach ($datas as $key => $value) {
	$item = new NIVEAUCARBURANT();
	$item->price = $value;
	$item->setProtected(1);
	$item->enregistre();
}


// $item = new PRODUIT();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Jus de passion";
// $item->description = "Hourdis";
// $item->enregistre();

// $item = new PRODUIT();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Jus d'orange";
// $item->description = "AC 15";
// $item->enregistre();

// $item = new PRODUIT();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Jus de bissap";
// $item->description = "AP 15";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "EAU";
// $item->class = "Sac";
// $item->abbr = "Sacs";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Orange";
// $item->class = "unités";
// $item->abbr = "Chgs";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Sucre";
// $item->class = "Tonne";
// $item->abbr = "T";
// $item->enregistre();

// $item = new RESSOURCE();
// $item->files = [];
// $item->stock = 100;
// $item->name = "Bidons";
// $item->class = "Tonne";
// $item->abbr = "T";
// $item->enregistre();


$datas = ["standart"];
foreach ($datas as $key => $value) {

	$item = new GROUPEMECANICIEN();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();

	// $item = new TYPESUGGESTION();
	// $item->name = $value;
	// $item->setProtected(1);
	// $item->save();
}

?>