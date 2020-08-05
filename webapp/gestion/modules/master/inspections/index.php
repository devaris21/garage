<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2 class="text-uppercase">Liste des inspections</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">This is</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Breadcrumb</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                <div class="title-action">

                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class=" animated fadeInRightBig">

             <div class="ibox">
                 <div class="ibox-content">

                  <div class="table-responsive">
                    <table class="table table-hover issue-tracker">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Informations</th>
                                <th>Véhicule</th>
                                <th>Kms départ</th>
                                <th>Durée</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($inspections as $key => $inspection) {
                                $inspection->actualise(); 
                                $vehicule = $inspection->vehicule;
                                $tems = $vehicule->fourni("infovehicule");
                                $info = $tems[0];
                                $info->actualise(); ?>
                                <tr>
                                    <td>
                                        <span class="label label-<?= $inspection->etat->class ?>"><?= $inspection->etat->name() ?></span>
                                    </td>
                                    <td >
                                        <span>Inspection N°<?= $inspection->reference ?></span><br>
                                        <small>enregistré <?= depuis($inspection->created)  ?> </small>
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
                                <td><?= $inspection->kilometrage ?> Kms</td>
                                <td class="text-right">
                                    <button class="btn btn-white btn-xs" onclick="modification('inspection', <?= $inspection->id ?>)" data-toggle="modal" data-target="#modal-valider-inspection"><i class="fa fa-check text-green"></i> Terminer</button>
                                    <button class="btn btn-white btn-xs" onclick="annulerInspection(<?= $inspection->id ?>)" data-toggle="modal" data-target="#modal-valider-inspection"><i class="fa fa-close text-danger"></i></button>
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


<?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

<?php include($this->rootPath("composants/assets/modals/modal-valider-inspection.php")); ?>

</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
