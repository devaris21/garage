<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="">
                <div class="ibox-content">
                    <div class="row ">
                        <div class="col-md border-right">
                            <h4 class="gras text-uppercase">Effectif du parc auto</h4>
                            <h2 class="gras"><?= start0(count($vehicules)) ?></h2>
                        </div>

                        <div class="col-md border-right">
                            <h6 class="text-uppercase text-center cursor"> TYPES DE VEHICULES</h6>
                            <select class="form-control select2" name="fonctionvehicule_id" style="width: 100%">
                                <option value="0">Tous les véhicules</option>
                                <?php foreach (Home\TYPEVEHICULE::getAll() as $key => $item) { ?>
                                    <option value="<?= $item->id ?>"><?= $item->name() ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md border-right">
                            <h6 class="text-uppercase text-center cursor"> CATEGORIES DE VEHICULES</h6>
                            <select class="form-control select2" name="fonctionvehicule_id" style="width: 100%">
                                <option value="0">Tous les véhicules</option>
                                <?php foreach (Home\FONCTIONVEHICULE::getAll() as $key => $item) { ?>
                                    <option value="<?= $item->id ?>"><?= $item->name() ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md">
                            <h6 class="text-uppercase text-center cursor"> DISPONIBILITE DES VEHICULES</h6>
                            <select class="form-control select2" name="fonctionvehicule_id" style="width: 100%">
                                <option value="0">Tous les véhicules</option>
                                <?php foreach (Home\ETATVEHICULE::getAll() as $key => $item) { ?>
                                    <option value="<?= $item->id ?>"><?= $item->name() ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div><br>

                <div class="ibox" >
                    <div class="ibox-content" style="min-height: 400px;">
                        <div class="row">
                            <?php foreach ($vehicules as $key => $vehicule) {
                                $vehicule->actualise(); ?>
                                <div class="col-sm-4 col-md-3 vehicule">
                                    <div class="contact-box product-box">
                                        <a class="row" href="<?= $this->url("gestion", "master", "vehicule", $vehicule->id) ?>">
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
