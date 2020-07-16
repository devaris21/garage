<?php 
namespace Home;


$item = new AGENCE();
$item->name = "Agence principal";
$item->setProtected(1);
$item->save();

$item = new GARAGE();
$item->name = "Garage principal";
$item->setProtected(1);
$item->save();


$datas = ["Voiture", "Camion", "Tricycle", "Moto", "Camping-car"];
foreach ($datas as $key => $value) {
	$item = new TYPEVEHICULE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Tourisme", "Utilitaire", "Prestige", "Camping-car"];
foreach ($datas as $key => $value) {
	$item = new FONCTIONVEHICULE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Peu importe", "Manuelle", "Automatique"];
foreach ($datas as $key => $value) {
	$item = new TRANSMISSION();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Peu importe", "Diesel", "Essence/Super", "Gasoil", "Electricité", "Gaz", "GPL/GNV"];
foreach ($datas as $key => $value) {
	$item = new ENERGIE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}



$datas = ["Lecteur CD", "Lecteur Cassette", "Radio"];
foreach ($datas as $key => $value) {
	$item = new ACCESSOIRE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$datas = ["Option GPS", "Siège Bébé", "Siège Enfant", "Rehaussement Enfant", "Equipement neige", "chaines", "Portes Skis"];
foreach ($datas as $key => $value) {
	$item = new EQUIPEMENT();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}



$datas = ["Particulier", "Entreprise", "Partenaire"];
foreach ($datas as $key => $value) {
	$item = new TYPECLIENT();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["CNI", "Passeport", "Permis de conduire", "Carte professionnelle", "Carte d'étudiant", "Autre"];
foreach ($datas as $key => $value) {
	$item = new TYPEPIECE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}

$datas = ["Brut", "Pourcentage"];
foreach ($datas as $key => $value) {
	$item = new TYPEREMISE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Azur", "Affaire", "Senior", "Prestige"];
foreach ($datas as $key => $value) {
	$item = new TYPEABONNEMENT();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Directeur commercial", "Responsable Agence", "Agent commercial", "Responsable parc auto"];
foreach ($datas as $key => $value) {
	$item = new FONCTIONEMPLOYE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}




$datas = ["Sous garantie constructeur", "Hors garantie constructeur"];
foreach ($datas as $key => $value) {
	$item = new CADREMAINTENANCE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Maintenance préventive", "Maintenance corrective", "Maintenance légale"];
foreach ($datas as $key => $value) {
	$item = new TYPEMAINTENANCE();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}


$datas = ["Carrosserie", "Chassis", "Moteur", "Train avant", "Train arrière", "Boite à vitesse", "Accessoire moteur", "Tableau de Bord", "Accessoire interne", "Habitacle", "Mise à niveau fluide", "Vidange", "Tollerie", "Pienture", "Electricité"];
foreach ($datas as $key => $value) {
	$item = new OPTIONREPARATION();
	$item->name = $value;
	$item->setProtected(1);
	$item->save();
}





$datas = ["master", "administrateur"];
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



// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
// $item->name = "Réglement de commande";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
// $item->name = "Remboursement par le fournisseur";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
// $item->name = "Location d'engins pour livraison";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::ENTREE;
// $item->name = "Autre entrée en caisse";
// $item->setProtected(1);
// $item->save();


// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
// $item->name = "Réglement de facture d'approvisionnemnt";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
// $item->name = "Payement de salaire du personnel";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
// $item->name = "Réglement de facture de reparation / d'entretien";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
// $item->name = "Remboursement du client";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
// $item->name = "Location de tricycle pour livraison";
// $item->setProtected(1);
// $item->save();

// $item = new CATEGORIEOPERATION();
// $item->typeoperationcaisse_id = TYPEOPERATIONCAISSE::SORTIE;
// $item->name = "Autre dépense";
// $item->setProtected(1);
// $item->save();



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


$datas = ["standart"];
foreach ($datas as $key => $value) {

	// $item = new TYPESUGGESTION();
	// $item->name = $value;
	// $item->setProtected(1);
	// $item->save();
}

?>