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
                    <h2 class="text-uppercase gras">Votre Parc Automobile</h2>
                    <ol class="breadcrumb">
                        <li class="text-center">
                            <button data-toggle="modal" data-target="#modal-vehicule" class="btn btn-primary btn-xs dim"><i class="fa fa-plus"></i> Nouveau véhicule</button>
                        </li>
                    </ol>
                </div>
                <div class="col-sm-8 cards">
                    <!-- TODO decompte des véhicules -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="ibox text-blue">
                                <div class="ibox-title">
                                    <h5 class="text-uppercase">Effectif du auto</h5>
                                </div>
                                <div class="ibox-content">
                                    <h2 class="no-margins"><?= start0(count(Home\VEHICULE::getAll())); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ibox text-green">
                                <div class="ibox-title">
                                    <h5 class="text-uppercase">Libres</h5>
                                </div>
                                <div class="ibox-content">
                                    <h2 class="no-margins"><?= start0(count(Home\VEHICULE::getAll())); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ibox text-red">
                                <div class="ibox-title">
                                    <h5 class="text-uppercase">En mission</h5>
                                </div>
                                <div class="ibox-content">
                                    <h2 class="no-margins"><?= start0(count(Home\VEHICULE::getAll())); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content" >
                <div class="ibox" >
                    <div class="ibox-content" style="min-height: 400px;">
                        <div class="row">
                            <?php foreach ($vehicules as $key => $vehicule) {
                                $vehicule->actualise(); ?>
                                <div class="col-sm-4 col-md-3 vehicule">
                                    <div class="contact-box product-box">
                                        <a class="row" href="<?= $this->url("gestion", "master", "vehicule", $vehicule->getId()) ?>">
                                            <div class="col-4">
                                                <div class="text-center">
                                                    <img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image1) ?>">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                <span>
                                                    <strong><?= $vehicule->marque->name ?></strong><br>
                                                    <?= $vehicule->modele ?> 
                                                </span>
                                                <span><?= $vehicule->infovehicule->fonctionvehicule->name() ?></span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

            <?php include($this->rootPath("composants/assets/modals/modal-vehicule.php")); ?>  


        </div>
    </div>


    <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
