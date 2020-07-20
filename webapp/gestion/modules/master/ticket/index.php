<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-6">
                    <h2 class="text-uppercase gras">Ticket N°<?= $ticket->reference ?></h2>
                    <ol class="breadcrumb">
                        Ouvert <?= depuis($ticket->created) ?>
                    </ol>
                </div>
            </div><br>

            <div class="row wrappe">
                <div class="tabs-container white-bg">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li><a class="nav-link active" data-toggle="tab" href="#menu-1"><i class="fa fa-information"></i> Infos Générale</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#menu-2"><i class="fa fa-file-text-o"></i> Essais avant-apres travaux</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#menu-3"><i class="fa fa-wrench"></i> Diagnostics</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#menu-4"><i class="fa fa-file-text-o"></i> Devis</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#menu-4"><i class="fa fa-history"></i> Historique</a></li>
                    </ul>
                    <div class="tab-content"><br>

                        <div role="tabpanel" id="menu-1" class="tab-pane active">
                            <div class="panel-body">
                                <div class="row">

                                    <div class="col-md-6 border-right">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="text-center" data-toggle="tooltip">
                                                    <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "clients", "default.png") ?>" class="img-thumbnail cursor" style="height: 110px;">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h2 class="gras text-navy" style="margin: 0"><strong><?= $ticket->client->name() ?></strong> 
                                                    <span  data-toggle=modal data-target="#modal-client" class="cursor" onclick="modification('ticket', <?= $ticket->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du client" class="fa fa-pencil cursor"></i></span>
                                                </h2>
                                                <address>
                                                    <h3 style="margin-top: 6px;"><strong><?= $ticket->client->typeclient->name() ?></strong></h3>
                                                    <span><i class="fa fa-envelope"></i> <?= $ticket->client->email ?></span> <br>
                                                    <span><i class="fa fa-map-marker"></i> <?= $ticket->client->adresse ?></span> <br>
                                                    <span><i class="fa fa-phone"></i> <?= $ticket->client->contact ?></span> <br>
                                                    <span><i class="fa fa-telephone"></i> <?= $ticket->client->contact ?></span> <br>
                                                </address>
                                            </div>
                                        </div><br>
                                        <div>
                                            <label class="gras">Description de la panne (Client)</label><br>
                                            <p><?= $ticket->constat  ?></p>
                                        </div><br>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="text-center" data-toggle="tooltip">
                                                    <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 110px;">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h1 class="gras text-navy" style="margin: 0"><strong><?= $ticket->auto->immatriculation ?></strong> 
                                                    <span  data-toggle=modal data-target="#modal-vehicule" class="cursor" onclick="modification('ticket', <?= $ticket->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du vehiucle" class="fa fa-pencil cursor"></i></span>
                                                </h1>
                                                <address>
                                                    <h3 style="margin-top: 6px;"><strong><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></strong></h3>
                                                    <h5>Couleur <?= $ticket->auto->couleur ?></h5> <br>
                                                </address>
                                            </div>
                                        </div><hr class="mp0">
                                        <div>
                                            <label class="gras">Type de réparation à faire</label><br>
                                            <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $value) {
                                                $value->actualise(); ?>
                                                <label class="label"><?= $value->typereparation->name()  ?></label>
                                            <?php } ?>
                                        </div><br>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <label class="gras">Equipements presents sur le véhicule</label><br>
                                                <div class="row">
                                                    <?php foreach ($ticket->fourni("listeequipementauto") as $key => $value) {
                                                        $value->actualise(); ?>
                                                        <div class="col-6">
                                                            <label >- <?= $value->equipementauto->name()  ?></label>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <label class="gras">Autres infos</label><br>
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Kilometrage</td>
                                                            <td><?= $ticket->kilometrage ?> Kms</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Niveau de carburant</td>
                                                            <td><?= $ticket->niveaucarburant->name() ?> </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><br>
                                        <div>
                                            <label class="gras">Autres remarques importantes</label><br>
                                            <p><?= $ticket->autreremarque  ?></p>
                                        </div><br>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div role="tabpanel" id="menu-2" class="tab-pane">
                            <div class="panel-body">
                                <div class="row">
                                  <div class="col-md-4 border-right">
                                    <div class="ibox">
                                        <div class="ibox-content">
                                          <h3 class="mp0 text-uppercase gras">ESSAI AVANT TRAVAUX</h3>
                                          <span><i class="fa fa-user"></i> Drag task between list</span><hr class="mp3">

                                          <ol style="min-height: 400px;">
                                            <li>Lorem ipsum dolor sit amet.</li>
                                            <li>Lorem ipsum dolor sit amet.</li>
                                            <li>Lorem ipsum dolor sit amet.</li>
                                            <li>Lorem ipsum dolor sit amet.</li>
                                            <li>Lorem ipsum dolor sit amet.</li>
                                            <li>Lorem ipsum dolor sit amet.</li>
                                            <li>Lorem ipsum dolor sit amet.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 border-right">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <h3 class="mp0 text-uppercase gras">ESSAI AVANT TRAVAUX (chef)</h3>
                                        <span><i class="fa fa-user"></i> Drag task between list</span><hr class="mp3">

                                        <ul class="sortable-list connectList agile-list" id="todo" style="min-height: 400px;">

                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="ibox">
                                    <div class="ibox-content">
                                        <h3 class="mp0 text-uppercase gras">ESSAI APRES TRAVAUX (chef)</h3>
                                        <span><i class="fa fa-user"></i> Drag task between list</span><hr class="mp3">

                                        <div class="ibox-content">
                                            <div class="feed-activity-list">

                                                <div class="feed-element">
                                                    <div>
                                                        <small class="float-right text-navy">1m ago</small>
                                                        <strong>Monica Smith</strong><br>
                                                        <span>- Lorem Ipsum is simply dummytting industry. Lorem Ipsum</span><br>
                                                        <span>- Lorem Ipsum is simply dummytting industry. Lorem Ipsum</span><br>
                                                        <span>- Lorem Ipsum is simply dummytting industry. Lorem Ipsum</span><br>
                                                        <span>- Lorem Ipsum is simply dummytting industry. Lorem Ipsum</span>
                                                        <small class="text-muted">Today 5:60 pm - 12.06.2014</small>
                                                    </div>
                                                </div>

                                                <div class="feed-element">
                                                    <div>
                                                        <small class="float-right">2m ago</small>
                                                        <strong>Jogn Angel</strong>
                                                        <div>There are many variations of passages of Lorem Ipsum available</div>
                                                        <small class="text-muted">Today 2:23 pm - 11.06.2014</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
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
                        <input type="hidden" name="vehicule_id" value="<?= $ticket->auto->getId() ?>">
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
                        <input type="hidden" name="vehicule_id" value="<?= $ticket->auto->getId() ?>">
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