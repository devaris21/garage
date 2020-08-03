<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="row ">
                <div class="col-md border-right">
                    <h6 class="text-uppercase text-center"> TYPE DE VEHICULE</h6>
                    <ul class="list-group clear-list m-t">
                        <?php foreach (Home\TYPEVEHICULE::getAll() as $key => $item) { ?>
                            <li class="list-group-item">
                                <i class="fa fa-cubes"></i> <small><?= $item->name() ?></small>          
                                <span class="float-right">
                                    <span title="en boutique" class="gras text-<?= (6 > 0)?"green":"danger" ?>"><?= money(20) ?></span>
                                    <span title="en boutique" class="gras text-<?= (6 > 0)?"green":"danger" ?>"><?= money(4) ?></span>
                                </span>
                            </li>
                        <?php } ?>
                        <li class="list-group-item"></li>
                    </ul>
                </div>

                <?php foreach (Home\FONCTIONVEHICULE::getAll() as $key => $item) { ?>
                    <div class="col-md border-right">
                        <h6 class="text-uppercase text-center">Stock de <u class="gras"><?= $item->name() ?></u></h6>
                        <ul class="list-group clear-list m-t">
                            <li class="list-group-item">
                                <i class="fa fa-cubes"></i> <small>disponible</small>          
                                <span class="float-right">
                                    <span title="en boutique" class="gras text-<?= (6 > 0)?"green":"danger" ?>"><?= money(4) ?></span>
                                </span>
                            </li>
                            <li class="list-group-item">
                                <i class="fa fa-cubes"></i> <small>Au total</small>          
                                <span class="float-right">
                                    <small title="en boutique"><?= money(8) ?></small>
                                </span>
                            </li>
                            <li class="list-group-item"></li>
                        </ul>
                    </div>
                <?php } ?>
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
