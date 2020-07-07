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
                    <h2>Votre Parc Automobile</h2>
                    <ol class="breadcrumb">
                        <li class="text-center">
                            <span>Afficher par ...</span><br>
                            <div class="btn-group">
                                <a href="<?= $this->url("gestionnaire", "master", "parcauto", "categorie") ?>" class="btn btn-white btn-xs <?= ($this->getId() == "categorie")?"active":""?>"><i class="fa fa-thumbs-up"></i> Groupe</a>
                                <a href="<?= $this->url("gestionnaire", "master", "parcauto", "parcauto") ?>" class="btn btn-white btn-xs <?= ($this->getId() == "parcauto")?"active":""?>"><i class="fa fa-comments"></i>  Type d'auto</a>
                                <a href="<?= $this->url("gestionnaire", "master", "parcauto", "fabriquant") ?>" class="btn btn-white btn-xs <?= ($this->getId() == "fabriquant")?"active":""?>"><i class="fa fa-share"></i> Fabriquant</a>
                            </div>
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
                                    <h2 class="no-margins"><?= start0(count(Home\VEHICULE::parcauto())); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ibox text-green">
                                <div class="ibox-title">
                                    <h5 class="text-uppercase">Libres</h5>
                                </div>
                                <div class="ibox-content">
                                    <h2 class="no-margins"><?= start0(count(Home\VEHICULE::libres())); ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="ibox text-red">
                                <div class="ibox-title">
                                    <h5 class="text-uppercase">En mission</h5>
                                </div>
                                <div class="ibox-content">
                                    <h2 class="no-margins"><?= start0(count(Home\VEHICULE::mission())); ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content" id="autos">
                <div class="ibox" >
                    <div class="ibox-content" style="min-height: 400px;">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs" role="tablist">
                                <?php foreach ($types as $key => $type) { ?>
                                    <li class=""><a class="nav-link" data-toggle="tab" href="#parc<?= $type->getId() ?>"> <?= $type->name ?> &nbsp;&nbsp;&nbsp;<span class="label bg-aqua"><?= count($type->vehicules) ?></span></a></li>
                                <?php } ?>
                            </ul>
                            <div class="tab-content" id="parcs">
                                <br>
                                <?php foreach ($types as $key => $type) { ?>
                                    <div role="tabpanel" id="parc<?= $type->getId() ?>" class="tab-pane">
                                        <div class="row">
                                            <?php foreach ($type->vehicules as $key => $vehicule) {
                                                $vehicule->actualise(); ?>
                                                <div class="col-sm-4 col-md-3 vehicule">
                                                    <div class="contact-box product-box">
                                                        <a class="row" href="<?= $this->url("gestionnaire", "master", "vehicule", $vehicule->getId()) ?>">
                                                            <div class="col-4">
                                                                <div class="text-center">
                                                                    <img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image) ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-8">
                                                                <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                                <span>
                                                                    <strong><?= $vehicule->marque->name ?></strong><br>
                                                                    <?= $vehicule->modele ?> 
                                                                    <?php if ($vehicule->groupevehicule_id == Home\GROUPEVEHICULE::VEHICULEMISSION || $vehicule->etatvehicule_id != Home\ETATVEHICULE::RAS) { ?>
                                                                        <br>
                                                                        <small class="label label-<?= $vehicule->etatvehicule->class; ?> float-right"><?= $vehicule->etatvehicule->name; ?></small>
                                                                    <?php } ?>
                                                                </span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
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
