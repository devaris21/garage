<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-6">
                <h2 class="text-uppercase text-green gras">Locations de véhicules</h2>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-7 gras text-capitalize">Afficher seulement les locations en cours</div>
                        <div class="offset-1"></div>
                        <div class="col-xs-4">
                         <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" id="example1">
                                <label class="onoffswitch-label" for="example1">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="title-action">
                <a href="<?= $this->url("gestion", "master", "newlocation")  ?>" class="btn btn-primary dim"><i class="fa fa-plus"></i> Nouvelle location</a>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">

          <div class="row">
            <div class="col-md-12">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Liste des locations de véhicules</h5>
                        <div class="ibox-tools">

                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-location">
                                <tbody>
                                    <?php foreach ($locations as $key => $location) {
                                        $location->actualise();
                                        $vehicule = $location->vehicule;
                                        $tems = $vehicule->fourni("infovehicule");
                                        $info = $tems[0];
                                        $info->actualise(); ?>
                                        <tr class=" <?= ($location->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?> border-bottom">
                                            <td class="text-left">
                                                <h3><span class=""><u class="text-info">#<?= $location->reference ?></u> // <span class="small text-<?= $location->etat->class ?>"><?= $location->etat->name ?></span></span></h3>
                                                <p class=""><?= $location->lieu  ?></p>
                                                <span><b>Etat du véhicule :</b> <?= $location->etatduvehicule ?></span><br>
                                                <span><b>Kilometrage actuel :</b> <?= $location->kilometrage ?> kms</span>
                                                <div class="m-t-sm">
                                                    <a href="#" class="text-muted"><i class="fa fa-calendar"></i> Du <?= datecourt($location->started) ?> au <?= datecourt($location->finished) ?></a>
                                                </div>
                                            </td>
                                            <td>
                                                <a href="<?= $this->url("gestion", "master", "client", $location->client->id)  ?>">
                                                    <h3 class="m-b-xs"><strong><?= $location->client->name() ?></strong></h3>
                                                    <div class="font-bold"><?= $location->client->typeclient->name() ?></div>
                                                    <address class="">
                                                        <strong><?= $location->client->contact ?></strong><br>
                                                        <?= $location->client->email ?>
                                                    </address>
                                                </a>
                                            </td>

                                            <td>
                                              <div class="contact-box product-box">
                                                <a class="row" href="<?= $this->url("gestion", "master", "vehicule", $vehicule->id)  ?>">
                                                    <div class="col-4">
                                                        <div class="text-center">
                                                            <img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image1) ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-8">
                                                        <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                        <span>
                                                            <?= $vehicule->marque->name ?> <?= $vehicule->modele ?> 
                                                        </span><br>
                                                        <small><?= $info->transmission->name() ?> -- <?= $info->energie->name() ?></small><br>
                                                        <small><?= $info->nbPlaces ?> places</small> // <span><?= $info->fonctionvehicule->name() ?></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <?php if ($location->etat_id == Home\ETAT::ENCOURS) { ?>
                                                <button onclick="modification('location', <?= $location->id ?>)" data-toggle="modal" data-target="#modal-<?= ($location->typelocation_id == 1)?'location2':'pret2' ?>" class="btn btn-outline btn-warning  dim" type="button"><i data-toggle="tooltip" title="Modifier les infos de la location" class="fa fa-pencil"></i></button>

                                                <button onclick="modification('preteur', <?= $location->client->id ?>)" data-toggle="modal" data-target="#modal-client" class="btn btn-outline btn-primary  dim" type="button"><i data-toggle="tooltip" title="Modifier les infos du bénéficiaire" class="fa fa-user"></i></button>
                                                <br>  

                                                <button onclick="terminerLocation(<?= $location->id ?>)" data-toggle="tooltip" title="Terminer la location" class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-check"></i></button>
                                                <button onclick="annulerLocation(<?= $location->id ?>)" data-toggle="tooltip" title="Annuler la location" class="btn btn-outline btn-danger  dim" type="button"><i class="fa fa-close"></i> </button>
                                            <?php } ?>

                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>


</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>


</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
