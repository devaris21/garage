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
                    <li><a class="nav-link active" data-toggle="tab" href="#menu-1"><i class="fa fa-info"></i> Infos Générale</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-3"><i class="fa fa-gears"></i> Equipements & Accessoires</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-4"><i class="fa fa-map-marker"></i> Géolocalisation</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-5"><i class="fa fa-history"></i> Historique du véhicule</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-4"><i class="fa fa-map-marker"></i> Inspections</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-4"><i class="fa fa-map-marker"></i> Maintenance</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" id="menu-1" class="tab-pane active">
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-6 col-sm-12 border-right" style="padding-right: 3%;">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="text-center" data-toggle="tooltip" title="Double-cliquez sur l'image pour la changer">
                                            <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", $levehicule->image1) ?>" class="img-thumbnail cursor" style="height: 110px;">
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <small class="label label-<?= $levehicule->etatvehicule->class; ?> float-right mp5"><?= $levehicule->etatvehicule->name; ?></small>
                                        <h1 class="gras text-navy" style="margin: 0"><strong><?= $levehicule->immatriculation ?></strong></h1>
                                        <address>
                                            <h3 style="margin-top: 6px;"><strong><?= $levehicule->marque->name ?> <?= $levehicule->modele ?></strong></h3>
                                            Véhicule <u><?= $levehicule->infovehicule->fonctionvehicule->name() ?></u> <br>
                                        </address>
                                    </div>
                                    <div class="col-1 text-center">
                                        <span  data-toggle=modal data-target="#modal-vehicule" class="cursor" onclick="modification('vehicule', <?= $levehicule->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du véhicule" class="fa fa-pencil fa-2x cursor"></i></span><br><br>
                                        <span data-toggle='tooltip' title="Supprimer le véhicule" onclick="suppressionWithPassword('vehicule', <?= $levehicule->id ?>)" class="cursor" ><i class="fa fa-close text-red fa-2x cursor"></i></span><br>                                                                            
                                    </div>
                                </div>
                                <button data-toggle=modal data-target="#modal-entretienvehicule1" class="btn btn-warning btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Nouvel entretien du véhicule</button>
                            </div>
                            <div class="col-md-4 col-sm-4 border-right">
                             <!--  -->
                         </div>
                         <div class="col-md-2 optionsbtn">  
                            <button data-toggle="modal" data-target="#modal-pret1" class="btn btn-success btn-block  btn-xs btn-rounded btn-outline pull-right"><i class="fa fa-handshake-o"></i> Prêter ce véhicule</button>

                            <button onclick="disponibilite(0)" class="btn btn-warning btn-block  btn-xs btn-rounded pull-right"><i class="fa fa-ban"></i> Le Rendre indisponible</button>
                            <button onclick="disponibilite(1)" class="btn btn-warning btn-block  btn-xs btn-rounded pull-right"><i class="fa fa-ban"></i> Le Rendre à nouveau disponible
                            </button>
                            <button onclick="declassement(0)" class="btn btn-danger  btn-block btn-xs btn-rounded pull-right"><i class="fa fa-close"></i> Déclasser le véhicule</button>

                            <button onclick="declassement(1)" class="btn btn-success  btn-block btn-xs btn-rounded pull-right"><i class="fa fa-refresh"></i> Reclasser le véhicule</button>


                        </div>
                    </div><hr>

                    <div class="row">
                        <div class="col-md-3 border-right">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>Immatriculation</td>
                                        <td><?= $levehicule->immatriculation ?></td>
                                    </tr>
                                    <tr>
                                        <td>Marque</td>
                                        <td><?= $levehicule->marque->name() ?></td>
                                    </tr>                                            
                                    <tr>
                                        <td>Modèle</td>
                                        <td><?= $levehicule->modele ?></td>
                                    </tr>
                                    <tr>
                                        <td>Couleur</td>
                                        <td><?= $levehicule->couleur ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3 border-right">
                            <table class="table table-sm">
                                <tbody>                                    
                                    <tr>
                                        <td>N°Chasis</td>
                                        <td><?= $levehicule->infovehicule->chasis ?></td>
                                    </tr>
                                    <tr>
                                        <td>CNIT</td>
                                        <td><?= $levehicule->infovehicule->cnit ?></td>
                                    </tr>
                                    <tr>
                                        <td>Energie</td>
                                        <td><?= $levehicule->infovehicule->energie->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Puissance</td>
                                        <td><?= $levehicule->infovehicule->puissance ?> chevaux</td>
                                    </tr>
                                    <tr>
                                        <td>Transmission</td>
                                        <td><?= $levehicule->infovehicule->transmission->name() ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3 border-right">
                            <table class="table table-sm">
                                <tbody>                                    
                                    <tr>
                                        <td>Portieres / Places</td>
                                        <td><?= $levehicule->infovehicule->nbPortes ?> portières / <?= $levehicule->infovehicule->nbPlaces ?> places</td>
                                    </tr>
                                    <tr>
                                        <td>Climatisation</td>
                                        <td><?= $levehicule->infovehicule->puissance ?> chevaux</td>
                                    </tr>
                                    <tr>
                                        <td>Airbag Conduction</td>
                                        <td><?= $levehicule->infovehicule->nbPortes ?> portières / <?= $levehicule->infovehicule->nbPlaces ?> places</td>
                                    </tr>
                                    <tr>
                                        <td>AirBag Passager</td>
                                        <td><?= $levehicule->infovehicule->transmission->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sacs / Valises</td>
                                        <td><?= $levehicule->infovehicule->nbSacs ?> sacs / <?= $levehicule->infovehicule->nbValises ?> valises</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-3">
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>Mise en circulation</td>
                                        <td><?= datecourt($levehicule->infovehicule->dateMiseCirculation) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Kilometrage actuel</td>
                                        <td><?= $levehicule->kilometrage() ?> Kms</td>
                                    </tr>
                                    <tr>
                                        <td>Equipements</td>
                                        <td>MOI</td>
                                    </tr>
                                    <tr>
                                        <td>Accessoires</td>
                                        <td>MOI</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>



            <div role="tabpanel" id="menu-3" class="tab-pane">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-5">
                            <div>
                                <strong class="text-uppercase">Les équipements spéciaux sur ce véhicule</strong>
                                <button data-toggle="modal" data-target="#modal-equipement-vehicule" class="btn btn-success btn-sm btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Ajouter nouveau</button>
                            </div><br>
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Désignation</th>
                                        <th colspan="2">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($equipements as $key => $equip) {
                                        $equip->actualise(); ?>
                                        <tr>
                                            <td class=""><img style="width: 32px" src="<?= $this->stockage("images", "equipements", $equip->equipement->image) ?>"></td>
                                            <td class="gras text-uppercase"><?= $equip->equipement->name(); ?></td>
                                            <th><i data-toggle="tooltip" title="Riterer l'equipement" class="fa fa-close cursor" onclick="retirer(<?= $equip->id; ?>)"></i></th>
                                            <th><i data-toggle="tooltip" title="Equipement usé ou abimé, equipanger!" class="fa fa-trash text-red cursor" onclick="suppression('equipement_vehicule', <?= $equip->id; ?>)"></i></th>
                                        </tr>
                                    <?php } ?>                                
                                </tbody>
                            </table>
                        </div>


                        <div class="offset-md-2 col-md-5">
                            <div>
                                <strong class="text-uppercase">Les accessoires sur ce véhicule</strong>
                                <button data-toggle="modal" data-target="#modal-accessoire-vehicule" class="btn btn-success btn-sm btn-rounded btn-outline pull-right"><i class="fa fa-plus"></i> Ajouter nouveau</button>
                            </div><br>
                            <table class="table table-striped table-hover table-sm">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Désignation</th>
                                        <th colspan="2">Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($accessoires as $key => $equip) {
                                        $equip->actualise(); ?>
                                        <tr>
                                            <td class=""><img style="width: 32px" src="<?= $this->stockage("images", "accessoires", $equip->accessoire->image) ?>"></td>
                                            <td class="gras text-uppercase"><?= $equip->accessoire->name(); ?></td>
                                            <th><i data-toggle="tooltip" title="Riterer l'accessoire" class="fa fa-close cursor" onclick="retirer(<?= $equip->id; ?>)"></i></th>
                                            <th><i data-toggle="tooltip" title="Equipement usé ou abimé, equipanger!" class="fa fa-trash text-red cursor" onclick="suppression('equipement_vehicule', <?= $equip->id; ?>)"></i></th>
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
                    <input type="hidden" name="vehicule_id" value="<?= $levehicule->id ?>">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>



</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript" src="<?= $this->relativePath("../sinistres/script.js"); ?>"></script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>


</body>

</html>