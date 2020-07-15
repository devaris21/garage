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
                <h2 class="text-uppercase text-red gras">Locations de véhicules</h2>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa fa-cloud fa-3x"></i>
                            </div>
                            <div class="col-8 text-right">
                                <span>Locations ce mois </span>
                                <h2 class="font-bold"><?= start0(count(Home\LOCATION::encours()))  ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-4">
                                <i class="fa fa-envelope-o fa-3x"></i>
                            </div>
                            <div class="col-8 text-right">
                                <span> Prêts ce mois </span>
                                <h2 class="font-bold"><?= start0(count(Home\LOCATION::encours()))  ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <button style="margin-top: -4%" data-toggle="modal" data-target="#modal-location" class="btn btn-primary btn-xs dim"><i class="fa fa-plus"></i> Nouvelle location / pret</button>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-location">
                                <tbody>
                                    <?php foreach ($locations as $key => $location) {
                                        $location->actualise() ?>
                                        <tr class=" <?= ($location->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?> border-bottom">

                                            <td class="border-right">                                                
                                                <br>
                                                <span class="label label-<?= $location->etat->class ?>"><?= $location->etat->name ?></span>
                                            </td>
                                            <td class="text-left">
                                                <h3><span class=""><u class="text-info">#<?= $location->ticket ?></u> // <?= $location->typelocation->name ?></span></h3>
                                                <p class=""><?= $location->comment; ?></p>
                                                <div class="m-t-sm">
                                                    <a href="#" class="text-muted"><i class="fa fa-trash"></i> Du <?= datecourt($location->started) ?> au <?= datecourt($location->finished) ?></a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php if ($location->typelocation_id == Home\TYPELOCATION::LOCATION){ ?>
                                                    <i class="fa fa-long-arrow-left fa-4x text-warning"></i>
                                                <?php }elseif ($location->typelocation_id == Home\TYPELOCATION::PRET) { ?>
                                                    <i class="fa fa-long-arrow-right fa-4x text-info"></i>
                                                <?php } ?>
                                            </td>
                                            <?php if ($location->typelocation_id == Home\TYPELOCATION::LOCATION){ ?>
                                             <td>
                                                <a href="profile.html">
                                                    <h3 class="m-b-xs"><strong><?= $location->prestataire->name() ?></strong></h3>
                                                    <div class="font-bold"><?= $location->prestataire->typeprestataire->name() ?></div>
                                                    <address class="">
                                                        <strong><?= $location->prestataire->contact ?></strong><br>
                                                        <?= $location->prestataire->email ?>
                                                    </address>
                                                </a>
                                            </td>

                                        <?php }elseif ($location->typelocation_id == Home\TYPELOCATION::PRET) {
                                            $location->fourni("preteur");
                                            $preteur = $location->preteurs[0]; ?>
                                            <td>
                                                <h3 class="m-b-xs"><strong><?= $preteur->name() ?></strong></h3>
                                                <div class="font-bold">Graphics designer</div>
                                                <address class="">
                                                    <strong><?= $preteur->contact ?></strong><br>
                                                    <?= $preteur->email ?>
                                                </address>
                                            </td>
                                        <?php } ?>
                                        <td>
                                            <br>
                                            <button onclick="voirVehicule('<?= $location->getId() ?>')" class="btn btn-rounded btn-outline btn-xs btn-info"><i class="fa fa-eye"></i> Voir les véhicules</button>
                                        </td>
                                        <td class="text-right">
                                            <?php if ($location->etat_id == Home\ETAT::ENCOURS) { ?>
                                                <button onclick="modification('location', <?= $location->getId() ?>)" data-toggle="modal" data-target="#modal-<?= ($location->typelocation_id == 1)?'location2':'pret2' ?>" class="btn btn-outline btn-warning  dim" type="button"><i data-toggle="tooltip" title="Modifier les infos de la location" class="fa fa-pencil"></i></button>

                                                <?php if ($location->typelocation_id == Home\TYPELOCATION::PRET){ ?>
                                                    <button onclick="modification('preteur', <?= $preteur->getId() ?>)" data-toggle="modal" data-target="#modal-preteur" class="btn btn-outline btn-primary  dim" type="button"><i data-toggle="tooltip" title="Modifier les infos du bénéficiaire" class="fa fa-user"></i></button>
                                                <?php } ?>

                                                <br>  

                                                <button onclick="terminerLocation(<?= $location->getId() ?>)" data-toggle="tooltip" title="Terminer la location" class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-check"></i></button>
                                                <button onclick="annulerLocation(<?= $location->getId() ?>)" data-toggle="tooltip" title="Annuler l'location" class="btn btn-outline btn-danger  dim" type="button"><i class="fa fa-close"></i> </button>
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

<?php //include($this->rootPath("composants/assets/modals/modal-location.php")); ?> 


<div class="modal inmodal fade" id="modal-listevehicule">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Les véhicules</h4>
            </div>
            <div class="modal-body listevehicules">

            </div>
        </div>
    </div>
</div>



</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
