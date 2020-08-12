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
                        <div class="col-md">
                            <h4 class="gras text-uppercase">Effectif du parc auto</h4>
                            <h2 class="gras"><?= start0(count($vehicules)) ?></h2>
                        </div>

                        <div class="col-md">
                            <div class="title-action">
                                <button class="btn btn-primary dim" data-toggle="modal" data-target="#modal-vehicule"><i class="fa fa-plus"></i> Ajouter nouveau véhicule</button>
                            </div>
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
                                                    <img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image) ?>">
                                                </div>
                                            </div>
                                            <div class="col-8">
                                                <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                <span>
                                                    <strong><?= $vehicule->marque->name ?></strong><br>
                                                    <?= $vehicule->modele ?> 
                                                </span>
                                                <span><?= $vehicule->infovehicule->fonctionvehicule->name() ?></span>
                                                <small class="label small label-<?= $vehicule->etatvehicule->class; ?> float-right mp5"><?= $vehicule->etatvehicule->name() ?></small>
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
