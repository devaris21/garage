<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-9">
                <h2>File Manager</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        App Views
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>File Manager</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="file-manager">
                                <h5>Afficher:</h5>
                                <div class="text-center">
                                    <a href="#" class="file-control active">Tous les dossiers</a>
                                    <a href="#" class="file-control">Terminées</a>
                                    <a href="#" class="file-control">En cours</a>
                                </div>
                                <hr><br>

                                <h5>Dossiers de :</h5>
                                <ul class="folder-list" style="padding: 0">
                                    <li><a href=""><i class="fa fa-folder"></i> Tous les dossiers</a></li><br>
                                    <?php foreach (Home\TYPEREPARATION::getAll() as $key => $value) { ?>
                                        <li><a href=""><i class="fa fa-folder"></i> <?= $value->name() ?></a></li>
                                    <?php } ?>
                                </ul><br><br>

                                <div class="hr-line-dashed"></div>
                                <h3 class="text-uppercase text-center">36 dossiers trouvés</h3>
                                <div class="hr-line-dashed"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <?php foreach ($tickets as $key => $ticket) { ?>
                            <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                                <div class="file">
                                    <a href="<?= $this->url("gestion", "master", "ticket", $ticket->id)  ?>">
                                        <span title="<?= $ticket->etat->name() ?>" class="corner bg-<?= $ticket->etat->class ?>"></span>
                                        <div class="icon">
                                            <i class="fa fa-folder"></i>
                                        </div>
                                        <div class="file-name" style="padding: 3px !important">
                                            Dossier N°<?= $ticket->reference ?> <br/>
                                            <small><?= $ticket->auto->immatriculation ?> // <?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></small><br>
                                            <small><?= $ticket->client->name() ?></small>
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


    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
