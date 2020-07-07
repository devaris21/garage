<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="tabs-container">
                <ul class="nav nav-tabs" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#menu-1">Infos Générale</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-2">Personnel Roulant</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-3">Equiments & Accessoires</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-4">Géolocalisation</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-5">Historique du véhicule</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="menu-1" class="tab-pane active">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6 col-sm-12 border-right" style="padding-right: 3%;">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="text-center" data-toggle="tooltip" title="Double-cliquez sur l'image pour la changer">
                                            <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", $levehicule->image) ?>" class="img-thumbnail cursor" style="height: 110px;">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <small class="label label-<?= $levehicule->etatvehicule->class; ?> float-right mp5"><?= $levehicule->etatvehicule->name; ?></small>
                                        <h1 class="gras text-navy" style="margin: 0"><strong><?= $levehicule->immatriculation ?></strong></h1>
                                        <address>
                                            <h3 style="margin-top: 6px;"><strong><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></strong></h3>
                                            Véhicule de <u><?= $levehicule->groupevehicule->name ?></u> <br>
                                        </address>
                                    </div>
                                    <div class="col-1 text-center">
                                        <span  data-toggle=modal data-target="#modal-vehicule" class="cursor" onclick="modification('vehicule', <?= $levehicule->getId() ?>)"><i data-toggle='tooltip' title="Modiifer les infos du véhicule" class="fa fa-pencil fa-2x cursor"></i></span><br><br>
                                        <span data-toggle='tooltip' title="Supprimer le véhicule" onclick="suppressionWithPassword('vehicule', <?= $levehicule->getId() ?>)" class="cursor" ><i class="fa fa-close text-red fa-2x cursor"></i></span><br>                                                                            
                                    </div>
                                </div>
                                <button data-toggle=modal data-target="#modal-entretienvehicule1" class="btn btn-warning btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Nouvel entretien du véhicule</button>
                            </div>
                            <div class="col-md-4 col-sm-4 border-right">
                                <?php if ($levehicule->is_affecte()) { ?>
                                    <div class="btn-group float-right">
                                        <span data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="mp5 cursor dropdown-toggle"><i class="fa fa-gears fa-2x"></i></span>
                                        <div class="dropdown-menu">
                                            <?php if ($affectation->etat_id != Home\ETAT::ENCOURS) { ?>
                                                <a class="dropdown-item" onclick="renouveler(<?= $affectation->getId() ?>)" data-toggle="tooltip" title="Renouveler l'affectation" href="#"><i class="fa fa-refresh"></i> Renouveler l'affectation</a>
                                            <?php } ?>

                                            <?php if ($affectation->etat_id == Home\ETAT::ENCOURS) { ?>
                                                <?php if ($affectation->carplan->email == ""){ ?>
                                                    <a class="dropdown-item" onclick="creerCompte(<?= $affectation->getId() ?>)" href="#"><i class="fa fa-user"></i> Créer son compte Carplan</a>
                                                <?php } ?>
                                                <a class="dropdown-item" onclick="modification('carplan', <?= $affectation->carplan->getId() ?>)" data-toggle="modal" data-target="#modal-carplan" href="#"><i class="fa fa-pencil"></i> Modifier les infos du bénéficiaire</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" onclick="terminerAffectation(<?= $affectation->getId() ?>)" data-toggle="tooltip" title="Terminer l'affectation" href="#"><i class="fa fa-check text-green"></i> Affectation terminée</a>
                                                <a class="dropdown-item"  onclick="annulerAffectation(<?= $affectation->getId() ?>)" data-toggle="tooltip" title="Annuler l'affectation" href="#"><i class="fa fa-close text-red"></i> Annuler l'affectation</a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <h4 class="text-green gras">Affecté à </h4>
                                    <h2 class="mp0 gras text-navy" style="margin-top: 6px;"><?= coupeMot($affectation->carplan->name(), 2)  ?></h2>
                                    <h5 class="gras"><?= $affectation->carplan->fonction;  ?></h5>
                                    <h4>Du <b><?= datecourt($renouv->started);  ?></b> au <b><?= datecourt($renouv->finished);  ?></b> (<?= count($affectation->renouvelementaffectations) ?>)</h4>
                                    <span class="gras"><u><?= $affectation->typeaffectation->name;  ?></u></span> &nbsp;&nbsp;&nbsp; <small class="label label-<?= $affectation->etat->class ?>"><?= $affectation->etat->name ?></small>
                                    <?php if (!$levehicule->is_affecte() && in_array($levehicule->groupevehicule_id, Home\GROUPEVEHICULEOPEN::get()) ) { ?>
                                        <button data-toggle="modal" data-target="#modal-affectation" class="btn btn-success btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Nouvelle affectation</button>
                                    <?php } ?>

                                <?php }elseif(in_array($levehicule->groupevehicule_id, [Home\GROUPEVEHICULE::VEHICULEMISSION, Home\GROUPEVEHICULE::VEHICULECARPLAN, Home\GROUPEVEHICULE::VEHICULELOUEE])){ ?>
                                    <h4 class="text-green gras">Affecté à </h4>
                                    <h2 class="text-muted text-center">Pas encore affecté</h2>
                                    <br>
                                    <button data-toggle="modal" data-target="#modal-affectation" class="btn btn-success btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Car Plan / Affectation</button>
                                <?php } ?>
                            </div>
                            <div class="col-md-2 optionsbtn">  
                                <?php if(in_array($levehicule->etatvehicule_id, [Home\ETATVEHICULE::RAS, Home\ETATVEHICULE::LOUEE]) && in_array($levehicule->groupevehicule_id, Home\GROUPEVEHICULEOPEN::get())){ ?>
                                    <button data-toggle="modal" data-target="#modal-pret1" class="btn btn-success btn-block  btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-handshake-o"></i> Prêter ce véhicule</button>
                                <?php } ?>  

                                <?php if(in_array($levehicule->etatvehicule_id, [Home\ETATVEHICULE::RAS, Home\ETATVEHICULE::ENTRETIEN, Home\ETATVEHICULE::MISSION, Home\ETATVEHICULE::SINISTRE])){ ?>
                                    <button onclick="disponibilite(0)" class="btn btn-warning btn-block  btn-xs btn-rounded pull-right"><i class="fa fa-ban"></i> Le Rendre indisponible</button>
                                <?php }elseif($levehicule->etatvehicule_id == Home\ETATVEHICULE::INDISPONIBLE){ ?>
                                    <button onclick="disponibilite(1)" class="btn btn-warning btn-block  btn-xs btn-rounded pull-right"><i class="fa fa-ban"></i> Le Rendre à nouveau disponible
                                    </button>
                                <?php } ?>

                                <?php if($levehicule->etatvehicule_id != Home\ETATVEHICULE::DECLASSEE && $levehicule->location == 0){ ?>
                                    <button onclick="declassement(0)" class="btn btn-danger  btn-block btn-xs btn-rounded pull-right"><i class="fa fa-close"></i> Déclasser le véhicule</button>
                                <?php }elseif($levehicule->etatvehicule_id == Home\ETATVEHICULE::DECLASSEE){ ?>
                                    <button onclick="declassement(1)" class="btn btn-success  btn-block btn-xs btn-rounded pull-right"><i class="fa fa-refresh"></i> Reclasser le véhicule</button>
                                <?php } ?>       


                                
                            </div>
                        </div><hr>

                        <div class="row">
                            <div class="col-md-4 border-right">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Marque</td>
                                            <td><?= $levehicule->marque->name ?></td>
                                        </tr>                                            
                                        <tr>
                                            <td>Modèle</td>
                                            <td><?= $levehicule->modele ?></td>
                                        </tr>
                                        <tr>
                                            <td>Couleur</td>
                                            <td><?= $carteGrise->couleur ?></td>
                                        </tr>
                                        <tr>
                                            <td>N°Chasis</td>
                                            <td><?= $levehicule->chasis ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4 border-right">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Energie</td>
                                            <td><?= ($carteGrise->energie_id > 0)?$carteGrise->energie->name:"" ?></td>
                                        </tr>
                                        <tr>
                                            <td>Puissance</td>
                                            <td><?= $levehicule->puissance ?> chevaux</td>
                                        </tr>
                                        <tr>
                                            <td>Transmission</td>
                                            <td><?= $levehicule->typetransmission->name ?></td>
                                        </tr>
                                        <tr>
                                            <td>Portieres / Places</td>
                                            <td><?= $levehicule->nb_porte ?> portières / <?= $levehicule->nb_place ?> places</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-md-4">
                                <table class="table table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Mise en circulation</td>
                                            <td><?= datecourt($levehicule->date_mise_circulation) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kilometrage actuel</td>
                                            <td><?= $levehicule->kilometrage ?> Kms</td>
                                        </tr>
                                        <tr>
                                            <td>Sortie de Circulation</td>
                                            <td><?= datecourt($levehicule->date_sortie) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Propriétaire</td>
                                            <td><?= $levehicule->prestataire->name ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <tr class="gras">
                                        <td>Fin de l'Assurance</td>
                                        <td>Fin de la visite Technique</td>
                                        <td>Nouvelle vidange</td>
                                        <td>Kilometrage actuel</td>
                                    </tr>
                                    <tr>
                                        <td><label class="m-b-5 f-w-400 label label-<?= ($assurance->finished > dateAjoute())?"success":"danger" ?>"><?= datecourt($assurance->finished); ?></label></td>
                                        <td><label class="m-b-5 f-w-400 label label-<?= ($visitetechnique->finished > dateAjoute())?"success":"danger" ?>"><?= datecourt($visitetechnique->finished); ?></label></td>
                                        <td>
                                            <?php if ($vidange != null) { ?>
                                                <label class="m-b-5 f-w-400 label label-<?= ($vidange->date > dateAjoute())?"success":"danger" ?>"><?= datecourt($vidange->date); ?> ou dans <?= $vidange->kilometrage  ?> Kms</label>
                                            <?php } ?>
                                        </td>
                                        <td><?= $levehicule->kilometrage ?> Kms</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div role="tabpanel" id="menu-2" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-9">
                                <div>
                                    <strong>S'il y en a, veuillez spécifier le personnel roulant de ce véhicule !</strong>
                                    <button data-toggle="modal" data-target="#modal-chauffeur-vehicule" class="btn btn-success btn-sm btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Ajouter nouveau</button>
                                </div>
                                <br>
                                <table class="table table-striped table-hover table-sm">
                                    <thead class="bg-blue">
                                        <tr>
                                            <th>Matricule</th>
                                            <th>Nom & prénoms</th>
                                            <th>Type de permis</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($levehicule->chauffeur_vehicules as $key => $ch) {
                                            $ch->actualise(); ?>
                                            <tr>
                                                <td><i class="fa fa-user"></i> <?= $ch->chauffeur->matricule; ?></td>
                                                <td class="gras text-uppercase"><?= $ch->chauffeur->name(); ?></td>
                                                <td><?= $ch->chauffeur->typepermis; ?></td>
                                                <td><?= $ch->chauffeur->contact; ?></td>
                                                <td><?= $ch->chauffeur->email; ?></td>
                                                <th><i data-toggle="tooltip" title="Supprimer le chauffeur" class="fa fa-close text-red cursor" onclick="suppression('chauffeur_vehicule', <?= $ch->getId(); ?>)"></i></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div role="tabpanel" id="menu-3" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div>
                                    <strong>Les équipements ajoutés sur ce véhicule</strong>
                                    <button data-toggle="modal" data-target="#modal-equipement-vehicule" class="btn btn-success btn-sm btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Ajouter nouveau</button>
                                </div><br>
                                <table class="table table-striped table-hover table-sm">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Désignation</th>
                                            <th>Quantité</th>
                                            <th colspan="2">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($levehicule->equipement_vehicules as $key => $ch) {
                                            $ch->actualise(); ?>
                                            <tr>
                                                <td class=""><img style="width: 32px" src="<?= $this->stockage("images", "equipements", $ch->equipement->image) ?>"></td>
                                                <td class="gras text-uppercase"><?= $ch->equipement->name(); ?></td>
                                                <td><?= $ch->quantite; ?> unités</td>
                                                <th><i data-toggle="tooltip" title="Riterer l'equipement" class="fa fa-close cursor" onclick="retirer(<?= $ch->getId(); ?>)"></i></th>
                                                <th><i data-toggle="tooltip" title="Equipement usé ou abimé, changer!" class="fa fa-trash text-red cursor" onclick="suppression('equipement_vehicule', <?= $ch->getId(); ?>)"></i></th>
                                            </tr>
                                        <?php } ?>                                
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <div role="tabpanel" id="menu-4" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8 border-right">
                                <p>
                                    With google maps <a href="https://developers.google.com/maps/documentation/javascript/reference#MapOptions">API</a> You can easy customize your map.
                                </p>
                                <div class="google-map" id="map1"></div>
                            </div>
                            <div class="col-md-4">
                                option
                            </div>
                        </div>
                    </div>
                </div>


                <div role="tabpanel" id="menu-5" class="tab-pane">
                    <div class="panel-body">
                        <div class="row">
                            <div class="offset-1 col-md-10">
                               <div id="vertical-timeline" class="vertical-container dark-timeline">

                                <?php foreach ($historiques as $key => $history) { ?>
                                    <div class="vertical-timeline-block">
                                        <div class="vertical-timeline-icon navy-bg">
                                            <i class="fa fa-briefcase"></i>
                                        </div>
                                        <div class="vertical-timeline-content">
                                            <h2 class="mp0"><?= $history->name ?></h2>
                                            <p ><?= $history->comment ?></p>
                                            <small><?= depuis($history->created)  ?></small>
                                        </div>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<br><br>

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="tabs-container">
        <ul class="nav nav-tabs" role="tablist">
            <li><a class="nav-link active" data-toggle="tab" href="#tab-cartegrise"> Cartes grises</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-assurance">Assurances</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-visitetechnique">Visites Techniques</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-piecevehicule">Autres pièces du véhicules</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-entretienvehicule">Entretiens du véhicule</a></li>
            <li><a class="nav-link" data-toggle="tab" href="#tab-sinistres">Sinistres</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" id="tab-cartegrise" class="tab-pane active">
                <div class="panel-body">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Toutes les cartes grises de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                            <div class="ibox-tools">
                                <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-cartegrise" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Ajouter Nouvelle Carte Grise</button>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <table class="table table-hover">
                                <tbody>
                                 <?php foreach ($levehicule->cartegrises as $key => $carte) {
                                    $carte->actualise(); ?>
                                    <tr>
                                        <td class="project-status">
                                            <span class="label label-primary">Active</span>
                                        </td>
                                        <td class="project-title">
                                            <h3 class="mp0"><?= $carte->name ?></h3>
                                            <small>Etablie le <?= datecourt($carte->date_etablissement) ?></small>
                                        </td>
                                        <td class="project-completion">
                                            <span>Voiture <?= $carte->energie->name ?></span><br>
                                            <span>Couleur <?= $carte->couleur ?></span>
                                        </td>
                                        <td>
                                            <h4><?= money($carte->price) ?> <?= $params->devise ?></h4>
                                        </td>
                                        <td class="project-people">
                                           <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "cartegrises", $carte->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "cartegrises", $carte->image1) ?>">
                                           <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "cartegrises", $carte->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "cartegrises", $carte->image2) ?>">
                                       </td>
                                       <td class="project-actions">
                                        <button data-toggle="modal" data-target="#modal-cartegrise"  onclick="modification('cartegrise', <?= $carte->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                                        <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('cartegrise', <?= $carte->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div role="tabpanel" id="tab-assurance" class="tab-pane">
        <div class="panel-body">
            <div class="ibox">
                <div class="ibox-title">
                    <h5 class="text-uppercase">Toutes les assurances de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                    <div class="ibox-tools">
                        <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-assurance" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Ajouter Nouvelle Assurance</button>
                    </div>
                </div>
                <div class="ibox-content">
                    <table class="table table-hover">
                        <tbody>
                         <?php foreach ($levehicule->assurances as $key => $assurance) {
                            $assurance->actualise(); ?>
                            <tr>
                                <td class="project-status">
                                    <span class="label label-primary">Active</span>
                                </td>
                                <td class="project-title">
                                    <h3 class="mp0"><?= $assurance->name ?></h3>
                                    <small>Etablie le <?= datecourt($assurance->date_etablissement) ?></small>
                                </td>
                                <td class="project-completion">
                                    <span class="italic gras">Du <?= datecourt($assurance->started) ?></span><br>
                                    <span class="italic gras">Au <?= datecourt($assurance->finished) ?></span>
                                </td>
                                <td class="project-completion">
                                    <span><?= $assurance->assurance ?></span><br>
                                    <span>Validité de <?= $assurance->finished ?></span>
                                </td>
                                <td>
                                    <h4><?= money($assurance->price) ?> <?= $params->devise ?></h4>
                                </td>
                                <td class="project-people">
                                   <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "assurances", $assurance->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "assurances", $assurance->image1) ?>">
                                   <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "assurances", $assurance->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "assurances", $assurance->image2) ?>">
                               </td>
                               <td class="project-actions">
                                <button data-toggle="modal" data-target="#modal-assurance"  onclick="modification('assurance', <?= $assurance->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                                <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('assurance', <?= $assurance->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                            </td>
                        </tr>
                    <?php  } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>


<div role="tabpanel" id="tab-visitetechnique" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Toutes les visites techniques de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-visitetechnique" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Enregistrer nouvelle visite</button>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <tbody>
                     <?php foreach ($levehicule->visitetechniques as $key => $vist) {
                        $vist->actualise(); ?>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Active</span>
                            </td>
                            <td class="project-title">
                                <h3 class="mp0"><?= $vist->name ?></h3>
                                <small>Etablie le <?= datecourt($vist->date_etablissement) ?></small>
                            </td>
                            <td class="project-completion">
                                <span class="italic gras">Du <?= datecourt($vist->started) ?></span><br>
                                <span class="italic gras">Au <?= datecourt($vist->finished) ?></span>
                            </td>
                            <td class="project-completion">
                                <span>Validité de <?= $vist->finished ?></span>
                            </td>
                            <td>
                                <h4><?= money($vist->price) ?> <?= $params->devise ?></h4>
                            </td>
                            <td class="project-people">
                               <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "visitetechniques", $vist->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "visitetechniques", $vist->image1) ?>">
                               <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "visitetechniques", $vist->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "visitetechniques", $vist->image2) ?>">
                           </td>
                           <td class="project-actions">
                            <button data-toggle="modal" data-target="#modal-visitetechnique"  onclick="modification('visitetechnique', <?= $vist->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                            <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('visitetechnique', <?= $vist->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>



<div role="tabpanel" id="tab-piecevehicule" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Autres pièces administratives de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-piecevehicule" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Enregistrer nouvelle pièce</button>
                </div>
            </div>
            <div class="ibox-content">
                <table class="table table-hover">
                    <tbody>
                     <?php foreach ($levehicule->piecevehicules as $key => $piece) {
                        $piece->actualise(); ?>
                        <tr>
                            <td class="project-status">
                                <span class="label label-primary">Active</span>
                            </td>
                            <td class="project-title">
                                <h3 class="mp0"><?= $piece->typepiecevehicule->name ?></h3>
                                <h5 class="mp0"><?= $piece->name ?></h5>
                                <small>Etablie le <?= datecourt($piece->date_etablissement) ?></small>
                            </td>
                            <td class="project-completion">
                                <span class="italic gras">Du <?= datecourt($piece->started) ?></span><br>
                                <span class="italic gras">Au <?= datecourt($piece->finished) ?></span>
                            </td>
                            <td class="project-completion">
                                <span>Validité de <?= $piece->finished ?></span>
                            </td>
                            <td>
                                <h4><?= money($piece->price) ?> <?= $params->devise ?></h4>
                            </td>
                            <td class="project-people">
                               <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "piecevehicules", $piece->image1) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "piecevehicules", $piece->image1) ?>">
                               <img class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "piecevehicules", $piece->image2) ?>')" style="height: 50px; width: 50px;" src="<?= $this->stockage("images", "piecevehicules", $piece->image2) ?>">
                           </td>
                           <td class="project-actions">
                            <button data-toggle="modal" data-target="#modal-piecevehicule"  onclick="modification('piecevehicule', <?= $piece->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Modiifer </button>
                            <button class="btn btn-white btn-sm" onclick="suppressionWithPassword('piecevehicule', <?= $piece->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


<div role="tabpanel" id="tab-entretienvehicule" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Les entretiens de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-entretienvehicule1" class="btn btn-primary dim btn-xs"><i class="fa fa-plus"></i> Nouvel entretien du véhicule</button>
                </div>
            </div>
            <div class="ibox-content">
             <?php foreach ($levehicule->entretienvehicules as $key => $entretien) {
                $entretien->actualise(); ?>
                <div class="vote-item <?= ($entretien->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?>">
                    <div class="row">
                        <div class="col-md-7 border-right">
                            <div class="vote-actions" style="margin-right: 7%; height: 100%">
                                <div class="vote-icon">
                                    <span class="label label-<?= $entretien->etat->class ?>"><?= $entretien->etat->name ?></span>
                                </div>
                            </div>
                            <div>
                                <span class="vote-title"><u class="text-info">#<?= $entretien->ticket ?></u> // <?= $entretien->typeentretienvehicule->name ?></span>
                                <span><?= $entretien->comment ?></span>
                                <div class="vote-info">
                                  <i class="fa fa-clock-o"></i> 
                                  <?php if ($entretien->etat_id == Home\ETAT::ENCOURS) { ?>
                                    <a href="#">Annulée <?= depuis($entretien->date_approuve) ?></a>
                                <?php }else if ($entretien->etat_id == Home\ETAT::ENCOURS){ ?>
                                    <a href="#">Emise <?= depuis($entretien->created) ?></a>
                                <?php }else if ($entretien->etat_id == Home\ETAT::VALIDEE){ ?>
                                    <a href="#">Du <?= datecourt($entretien->started) ?> au <?= datecourt($entretien->finished) ?></a>
                                <?php } ?>
                                <i class="fa fa-wrench"></i> <a href="#">Entretien par <?= $entretien->prestataire->name() ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-right">
                        <a class="row" style="color: black; margin-top: 10%" href="<?= $this->url("gestionnaire", "master", "vehicule", $entretien->vehicule_id) ?>">
                            <div class="col-4">
                                <div class="text-center">
                                    <img alt="image" style="height: 40px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $entretien->vehicule->image) ?>">
                                </div>
                            </div>
                            <div class="col-8" style="font-size: 11px;">
                                <h3 style="margin: 0"><strong><?= $entretien->vehicule->immatriculation ?></strong></h3>
                                <address>
                                    <strong><?= $entretien->vehicule->marque->name ?></strong><br>
                                    <?= $entretien->vehicule->modele ?>
                                </address>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-1 text-right border-right">
                        <img style="width: 100%;" onclick="openImage('<?= $this->stockage("images", "entretienvehicules", $entretien->image1) ?>')" class="m-t-xs cursor" src="<?= $this->stockage("images", "entretienvehicules", $entretien->image1) ?>"><br>
                        <img style="width: 100%;" onclick="openImage('<?= $this->stockage("images", "entretienvehicules", $entretien->image2) ?>')" class="m-t-xs cursor" src="<?= $this->stockage("images", "entretienvehicules", $entretien->image2) ?>">
                    </div>
                    <div class="col-md-1 text-right">
                        <?php if ($entretien->etat_id == Home\ETAT::VALIDEE) { ?>
                            <div class="vote-icon">
                                <i class="fa fa-check text-green" data-toggle="tooltip" title="Entretien terminé avec succes"> </i>
                            </div>
                        <?php } else if ($entretien->etat_id == Home\ETAT::ENCOURS) { ?>
                            <div class="vote-icon">
                                <i class="fa fa-close text-red" data-toggle="tooltip" title="Entretien annulé"> </i>
                            </div>

                        <?php }else if ($entretien->etat_id == Home\ETAT::ENCOURS){ ?>
                            <div class="btn-group">
                                <button data-toggle="tooltip" title="Entretien terminé avec succes !" onclick="validerEntretien(<?= $entretien->getId() ?>)" class="btn btn-white btn-sm"><i class="fa fa-check text-green"></i> </button>
                                <button data-toggle="tooltip" title="Entretien échoué" class="btn btn-white btn-sm" onclick="annulerEntretien(<?= $entretien->getId() ?>)"><i class="fa fa-close text-red"></i></button>
                            </div>
                        <?php } ?>                                      
                    </div>
                </div>
            </div>
        <?php  } ?>
    </div>
</div>
</div>
</div>



<div role="tabpanel" id="tab-sinistres" class="tab-pane">
    <div class="panel-body">
        <div class="ibox">
            <div class="ibox-title">
                <h5 class="text-uppercase">Les sinistres de la <u><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></u> </h5>
                <div class="ibox-tools">
                    <button style="margin-top: -5%;" data-toggle="modal" data-target="#modal-sinistre1" class="btn btn-danger dim btn-xs"><i class="fa fa-plus"></i> Déclarer nouveau sinistre</button>
                </div>
            </div>
            <div class="ibox-content">
             <table class="table table-hover table-sinistre">
                <tbody>
                    <?php foreach ($levehicule->sinistres as $key => $sinistre) {
                        $sinistre->actualise(); ?>
                        <tr class=" <?= ($sinistre->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?> border-bottom">
                            <td class="project-status">
                                <span class="label label-<?= $sinistre->etat->class ?>"><?= $sinistre->etat->name ?></span>
                            </td>
                            <td class="project-title border-right" style="width: 50%;">
                                <h3 class="mp0"><u class="text-info">#<?= $sinistre->ticket ?></u> // <?= $sinistre->typesinistre->name ?></h3>
                                <h5 class="mp0">Survenu le <?= datecourt($sinistre->date_etablissement) ?> à <?= $sinistre->lieudrame ?></h5>
                                <span><?= $sinistre->comment ?></span>
                                <p> <small><?= $sinistre->constat() ?></small> // <small><?= $sinistre->pompier() ?></small></p>
                                <div class="vote-info mp0">
                                  <i class="fa fa-clock-o"></i> 
                                  <?php if ($sinistre->etat_id == Home\ETAT::ENCOURS) { ?>
                                    <a href="#">Annulée <?= depuis($sinistre->date_approbation) ?></a>
                                <?php }else if ($sinistre->etat_id == Home\ETAT::ENCOURS){ ?>
                                    <a href="#">Emise <?= depuis($sinistre->created) ?></a>
                                <?php }else if ($sinistre->etat_id == Home\ETAT::VALIDEE){ ?>
                                    <a href="#">Approuvée <?= depuis($sinistre->date_approbation) ?></a>
                                <?php } ?>
                                <i class="fa fa-user"></i> <a href="#">Par <?= $sinistre->auteur() ?> - <?= $sinistre->matricule ?></a>
                            </div>
                        </td>
                        <td class="border-right">
                            <a class="row" style="color: black; margin-top: 10%" href="<?= $this->url("gestionnaire", "master", "vehicule", $sinistre->vehicule_id) ?>">
                                <div class="col-4">
                                    <div class="text-center">
                                        <img alt="image" style="height: 40px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $sinistre->vehicule->image) ?>">
                                    </div>
                                </div>
                                <div class="col-8" style="font-size: 11px;">
                                    <h3 style="margin: 0"><strong><?= $sinistre->vehicule->immatriculation ?></strong></h3>
                                    <address>
                                        <strong><?= $sinistre->vehicule->marque->name ?></strong><br>
                                        <?= $sinistre->vehicule->modele ?>
                                    </address>
                                </div>
                            </a><hr>
                            <div class="text-center">
                              <img alt="" class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "sinistres", $sinistre->image1) ?>')" style="height: 40px; width: 40px;" src="<?= $this->stockage("images", "sinistres", $sinistre->image1) ?>">
                              <img alt="" class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "sinistres", $sinistre->image2) ?>')" style="height: 40px; width: 40px;" src="<?= $this->stockage("images", "sinistres", $sinistre->image2) ?>">
                              <img alt="" class="img-thumbnail cursor" onclick="openImage('<?= $this->stockage("images", "sinistres", $sinistre->image3) ?>')" style="height: 40px; width: 40px;" src="<?= $this->stockage("images", "sinistres", $sinistre->image3) ?>">
                          </div>
                      </td>
                      <td class="project-title">
                        <small>L'autre partie</small>
                        <h5><?= $sinistre->nomautre ?></h5>
                        <h5 class="mp0"><?= $sinistre->vehiculeautre ?></h5>
                        <h5 class="mp0"><?= $sinistre->immatriculationautre ?></h5>
                        <h5 class="mp0"><i class="fa fa-phone"></i> <?= $sinistre->contactautre ?></h5>
                        <h5 class="mp0"><i class="fa fa-bank"></i> <?= $sinistre->assuranceautre ?></h5>

                    </td>
                    <td class="project-actions">
                     <?php if ($sinistre->etat_id == Home\ETAT::ENCOURS) { ?>
                        <div class="btn-group btn-group-vertical">
                            <?php if ($sinistre->carplan_id == null) { ?>
                             <button data-toggle="modal" data-target="#modal-sinistre"  onclick="modification('sinistre', <?= $sinistre->getId() ?>)" class="btn btn-white btn-sm"><i data-toggle="tooltip" title="Modifier les informations du sinistre" class="fa fa-pencil"></i> </button>
                         <?php } ?>                                
                         <button data-toggle="tooltip" title="Valider cette déclaration" class="btn btn-white btn-sm" onclick="validerSinistre(<?= $sinistre->getId(); ?>)"><i class="fa fa-check text-green"></i></button>
                         <button data-toggle="tooltip" title="Annuler cette déclaration" class="btn btn-white btn-sm" onclick="annulerSinistre(<?= $sinistre->getId(); ?>)"><i class="fa fa-close text-red"></i></button>
                     </div>
                 <?php } ?>
             </td>
         </tr>
     <?php  } ?>
 </tbody>
</table>
</div>
</div>
</div>
</div>



<div role="tabpanel" id="tab-2" class="tab-pane">
    <div class="panel-body">
        <strong>Donec quam felis</strong>

        <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
        and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

        <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
        sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
    </div>
</div>
</div>
</div>
</div>

<br><br>


<?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>



<div class="modal fade inmodal" id="modal-image">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Changer l'image</h4>
            </div>
            <form method="POST" id="formImage">
                <div class="modal-body">
                    <div class="">
                        <label>Image de la voiture</label>
                        <div class="">
                            <img style="width: 80px;" src="" class="img-thumbnail cursor logo">
                            <input class="hide" type="file" name="image">
                            <button type="button" class="btn btn-sm bg-red pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                        </div>
                    </div>
                </div><hr class="">
                <div class="container">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i>Changer l'image</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>


<div class="modal fade inmodal" id="modal-chauffeur-vehicule">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Choisir le chauffeur</h4>
            </div>
            <form method="POST" class="formShamman" classname="chauffeur_vehicule">
                <div class="modal-body">
                    <div class="">
                        <label>Personnel roulant</label>
                        <?php Native\BINDING::html("select", "chauffeur")  ?>
                    </div>
                </div><hr class="">
                <div class="container">
                    <input type="hidden" name="vehicule_id" value="<?= $levehicule->getId() ?>">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>


<div class="modal fade inmodal" id="modal-equipement-vehicule">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Choisir l'equipement</h4>
            </div>
            <form method="POST" class="formShamman" classname="equipement_vehicule">
                <div class="modal-body">
                    <div class="">
                        <label>Equipement</label>
                        <?php Native\BINDING::html("select", "equipement")  ?>
                    </div><br>
                    <div class="">
                        <label>quantité</label>
                        <input type="number" class="form-control" name="quantite" required>
                    </div>
                </div><hr class="">
                <div class="container">
                    <input type="hidden" name="vehicule_id" value="<?= $levehicule->getId() ?>">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>


<?php include($this->rootPath("composants/assets/modals/modal-cartegrise.php")); ?> 
<?php include($this->rootPath("composants/assets/modals/modal-assurance.php")); ?> 
<?php include($this->rootPath("composants/assets/modals/modal-visitetechnique.php")); ?> 
<?php include($this->rootPath("composants/assets/modals/modal-piecevehicule.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-carplan.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-affectation.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-pret1.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-sinistre1.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-entretienvehicule1.php")); ?>  



</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript" src="<?= $this->relativePath("../sinistres/script.js"); ?>"></script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>


</body>

</html>