<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="row wrappe">
                <div class="tabs-container white-bg">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li><a class="nav-link active" data-toggle="tab" href="#menu-1"><i class="fa fa-information"></i> Infos générales</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-technique"><i class="fa fa-file-text-o"></i> Données techniques</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-historique"><i class="fa fa-history"></i> Historique</a></li>
                    </ul>
                    <div class="tab-content"><br>

                        <div role="tabpanel" id="menu-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-9">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="text-center" data-toggle="tooltip">
                                                    <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 90px;">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h1 class="gras text-navy" style="margin: 0"><strong><?= $auto->immatriculation ?></strong> 
                                                    <span  data-toggle=modal data-target="#modal-vehicule" class="cursor pull-right" onclick="modification('auto', <?= $auto->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du vehiucle" class="fa fa-pencil cursor"></i></span>
                                                </h1>
                                                <address>
                                                    <h3 style="margin-top: 6px;"><strong><?= $auto->marque->name() ?> <?= $auto->modele ?></strong></h3>
                                                    <h4 style="margin-top: 6px;">VIN: <strong><?= $auto->vin ?></strong></h4>
                                                    <h5>Couleur <?= $auto->couleur ?></h5> <br>
                                                </address>
                                            </div>
                                        </div><hr class="mp0">


                                        <div>
                                            <label class="gras">Autres remarques importantes</label><br>
                                            <p><?= $auto->autreremarque  ?></p>
                                        </div><br>
                                    </div>
                                    <div class="col-md-3 border-right">
                                        <div class="row">
                                            <div class="col-9">
                                                <h2 class="gras text-navy" style="margin: 0"><strong><?= $client->name() ?></strong> 
                                                    <span  data-toggle=modal data-target="#modal-client" class="cursor pull-right" onclick="modification('auto', <?= $auto->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du client" class="fa fa-pencil cursor"></i></span>
                                                </h2>
                                                <address>
                                                    <h3 style="margin-top: 6px;"><strong><?= $client->typeclient->name() ?></strong></h3>
                                                    <span><i class="fa fa-envelope"></i> <?= $client->email ?></span> <br>
                                                    <span><i class="fa fa-map-marker"></i> <?= $client->adresse ?></span> <br>
                                                    <span><i class="fa fa-phone"></i> <?= $client->contact ?></span> <br>
                                                    <span><i class="fa fa-telephone"></i> <?= $client->contact ?></span> <br>
                                                </address>
                                            </div>
                                        </div><br>
                                        <div>
                                            <label class="gras">Description de la panne (Client)</label><br>
                                            <p><?= $auto->constat  ?></p>
                                        </div><br>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>


                        <div role="tabpanel" id="menu-2" class="tab-technique">
                            <div class="panel-body">

                            </div>
                        </div>


                        <div role="tabpanel" id="menu-2" class="tab-historique">
                            <div class="panel-body">
                                <div class="row">
                                    <?php foreach ($tickets as $key => $ticket) { ?>
                                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                                            <div class="file">
                                                <a href="<?= $this->url("gestion", "master", "ticket", $ticket->id)  ?>">
                                                    <span title="<?= $ticket->etat->name() ?>" class="corner bg-<?= $ticket->etat->class ?>"></span>
                                                    <div class="icon">
                                                        <i class="fa fa-folder"></i>
                                                    </div>
                                                    <div class="file-name" style="padding: 3px !important">
                                                        Dossier N°<?= $ticket->reference ?> <br/>
                                                        <small><?= $ticket->auto->immatriculation ?> // <?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></small><br>
                                                        <small><?= $ticket->client->name() ?></small>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



            <br><br>
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


            <div class="modal fade inmodal" id="modal-vehicule">
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
                                    <?php Native\BINDING::html("select", "client")  ?>
                                </div>
                            </div><hr class="">
                            <div class="container">
                                <input type="hidden" name="vehicule_id" value="<?= $auto->getId() ?>">
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
                                    <?php Native\BINDING::html("select", "client")  ?>
                                </div><br>
                                <div class="">
                                    <label>quantité</label>
                                    <input type="number" class="form-control" name="quantite" required>
                                </div>
                            </div><hr class="">
                            <div class="container">
                                <input type="hidden" name="vehicule_id" value="<?= $auto->getId() ?>">
                                <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                                <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>


            <?php //include($this->rootPath("composants/assets/modals/modal-cartegrise.php")); ?> 


        </div>
    </div>


    <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>


</body>

</html>