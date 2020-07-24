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
                <h2 class="text-uppercase">Liste des essais</h2>
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
                                <th>Essayeur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($essais as $key => $essai) { ?>
                                <tr>
                                    <td>
                                        <span class="label label-<?= $essai->etat->class ?>"><?= $essai->etat->name() ?></span>
                                    </td>
                                    <td width="300px">
                                        <h4 class=""><span class="text-uppercase"><?= $essai->typeessai->name() ?></span></h4>
                                        <span>Ticket N°<?= $essai->reference ?></span><br>
                                    </td>
                                    <td>
                                        <h4 class="mp0"><?= $essai->ticket->client->name() ?> </h4>
                                        <?= $essai->ticket->client->typeclient->name() ?><br>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-sm-2">
                                               <img src="<?= $this->stockage("images", "vehicules", "default.jpg")  ?>" style="width: 50px">
                                           </div>
                                           <div class="col-sm-10">
                                            <h4 class="mp0"><?= $essai->ticket->auto->immatriculation ?> </h4>
                                            <?= $essai->ticket->auto->marque->name() ?> <?= $essai->ticket->auto->modele ?><br>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <?= $essai->mecanicien->name() ?><br>
                                    <small><?= depuis($essai->created)  ?></small>
                                </td>
                                <td class="text-right">
                                    <button data-toggle="modal" data-target="#modal-valider_essai-<?= $essai->id ?>" class="btn btn-white btn-xs"><i class="fa fa-check text-green"></i> Valider</button>
                                    <button class="btn btn-white btn-xs"><i class="fa fa-file-text-o text-blue"></i></button>
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


<?php foreach ($essais as $key => $essai) {
    $ticket = $essai->ticket;
    include($this->rootPath("composants/assets/modals/modal-valider_essai.php"));
}
?> 

</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
