<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="tabs-container bg-white">
                <ul class="nav nav-tabs text-uppercase" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#menu-1"><i class="fa fa-information"></i> Infos générales</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-technique"><i class="fa fa-file-text-o"></i> Données techniques</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#tab-historique"><i class="fa fa-history"></i> Historique</a></li>
                </ul>
                <div class="tab-content"><br>

                   <div role="tabpanel" id="menu-1" class="tab-pane active">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center" data-toggle="tooltip">
                                            <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 90px;">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h2 class="gras text-navy" style="margin: 0"><strong><?= $auto->immatriculation ?></strong> 
                                            <span  data-toggle=modal data-target="#modal-vehicule" class="cursor pull-right" onclick="modification('auto', <?= $auto->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du vehiucle" class="fa fa-pencil cursor"></i></span>
                                        </h2>
                                    </div>
                                </div><hr class="mp0">
                                <div class="row">
                                    <div class="col-md-4 border-right ">
                                        <table class="table table-sm ">
                                            <tbody>
                                                <tr>
                                                    <td>Marque</td>
                                                    <td><?= $auto->marque->name ?></td>
                                                </tr>                                            
                                                <tr>
                                                    <td>Modèle</td>
                                                    <td><?= $auto->modele ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Couleur</td>
                                                    <td><?= $auto->couleur ?></td>
                                                </tr>
                                                <tr>
                                                    <td>N°Chasis</td>
                                                    <td><?= $auto->modele ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4 border-right">
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td>Energie</td>
                                                    <td>afhazff</td>
                                                </tr>
                                                <tr>
                                                    <td>Puissance</td>
                                                    <td><?= $auto->modele ?> chevaux</td>
                                                </tr>
                                                <tr>
                                                    <td>Transmission</td>
                                                    <td><?= $auto->modele ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Portieres / Places</td>
                                                    <td><?= $auto->modele ?> portières </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4">
                                        <table class="table table-sm">
                                            <tbody>
                                                <tr>
                                                    <td>Mise en circulation</td>
                                                    <td><?= datecourt($auto->modele) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Kilometrage actuel</td>
                                                    <td><?= $auto->modele ?> Kms</td>
                                                </tr>
                                                <tr>
                                                    <td>Sortie de Circulation</td>
                                                    <td><?= datecourt($auto->created) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Propriétaire</td>
                                                    <td><?= $auto->marque->name ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <div class="offset-md-1 col-md-3 border-right">
                                <h4 class="gras text-navy" style="margin: 0"><strong><?= $client->name() ?></strong> 
                                    <span  data-toggle=modal data-target="#modal-client" class="cursor pull-right" onclick="modification('auto', <?= $auto->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du client" class="fa fa-pencil cursor"></i></span>
                                </h4>
                                <address>
                                    <h5 style="margin-top: 6px;"><strong><?= $client->typeclient->name() ?></strong></h5>
                                    <span><i class="fa fa-envelope"></i> <?= $client->email ?></span> <br>
                                    <span><i class="fa fa-map-marker"></i> <?= $client->adresse ?></span> <br>
                                    <span><i class="fa fa-phone"></i> <?= $client->contact ?></span> <br>
                                    <span><i class="fa fa-telephone"></i> <?= $client->contact ?></span> <br>
                                </address>
                            </div><br>
                        </div>


                    </div>
                </div>

                <div role="tabpanel" id="tab-technique" class="tab-pane">
                    <div class="panel-body">

                    </div>
                </div>


                <div role="tabpanel" id="tab-historique" class="tab-pane">
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