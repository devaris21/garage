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
                <h2>Les tarifs de locations</h2>
                
            </div>
            <div class="col-sm-8">
                <div class="title-action">
                    <a href="#" data-toggle="modal" data-target="#modal-tarif" class="btn btn-primary"><i class=" fa fa-plus"></i> Nouveau tarif</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="text-center animated fadeInRightBig">
                <div class="row">

                    <?php foreach ($tarifs as $key => $tarif) { ?>
                        <div class="col-lg-3">
                            <div class="contact-box center-version">
                                <a href="#">
                                    <i class="fa fa-qrcode fa-5x"></i>
                                    <br>
                                    <h3 class="m-b-xs text-uppercase"><strong><?= $tarif->name() ?></strong></h3>
                                    <div style="height: 100px; margin: auto auto;">
                                        <?php foreach ($tarif->fourni("tarif_fonction") as $key => $value) {
                                            $value->actualise(); ?>
                                            <i>- <?= $value->fonctionvehicule->name() ?></i><br>
                                        <?php } ?>
                                    </div>
                                    <br>
                                    <h1 class="d-inline gras"><?= money($tarif->prixJournalier) ?> </h1>
                                    <span><?= $params->devise  ?> / Jour</span>
                                    <address class="m-t-md">
                                        <strong>Forfait de <?= $tarif->kilometreJournalier ?> Kms par Jour</strong><br>
                                        <?= money($tarif->prixKilometreComplementaire) ?> <?= $params->devise  ?> / Km supplémentaire 
                                    </address>
                                </a>
                                <div class="contact-box-footer">
                                    <div class="m-t-xs btn-group">
                                        <a href=""  class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                                        <a href=""  class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                                        <a href=""  class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>
        <?php include($this->rootPath("composants/assets/modals/modal-tarif.php")); ?>  

    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
