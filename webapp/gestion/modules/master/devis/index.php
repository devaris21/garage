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
                <h2 class="text-uppercase">Liste des devis</h2>
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
                    <a href="" class="btn btn-primary">This is action area</a>
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
                                    <th>Client</th>
                                    <th>Véhicule</th>
                                    <th>Technicien</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($devis as $key => $devi) { ?>
                                    <tr>
                                        <td>
                                            <span class="label label-<?= $devi->etat->class ?>"><?= $devi->etat->name() ?></span>
                                        </td>
                                        <td class="issue-info" width="300px">
                                            <a class="text-uppercase" href="#">Devis en attente d'approbation</a>
                                            <small>Ticket N°<?= $devi->reference ?></small>
                                        </td>
                                        <td>
                                            <h4 class="mp0"><?= $devi->ticket->client->name() ?> </h4>
                                            <?= $devi->ticket->client->typeclient->name() ?><br>
                                        </td>
                                        <td>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                 <img src="<?= $this->stockage("images", "vehicules", "default.jpg")  ?>" style="width: 60px">
                                             </div>
                                             <div class="col-sm-9">
                                                <h4 class="mp0"><?= $devi->ticket->auto->immatriculation ?> </h4>
                                                <?= $devi->ticket->auto->marque->name() ?> <?= $devi->ticket->auto->modele ?><br>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $devi->mecanicien->name() ?><br>
                                        <small><?= depuis($devi->created)  ?></small>
                                    </td>
                                    <td class="text-right">
                                        <a href="<?= $this->url($this->section, "master", "ledevis", $devi->id) ?>" class="btn btn-white btn-xs"><i class="fa fa-file-text-o text-blue"></i> Voir</a>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-close text-danger"></i></button>
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

</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
