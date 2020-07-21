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
                                <th>Véhicule</th>
                                <th>Essayeur</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($essais as $key => $essai) { ?>
                                <tr>
                                    <td>
                                        <span class="label label-<?= $essai->etat->class ?>"><?= $essai->etat->name() ?></span>
                                    </td>
                                    <td class="issue-info">
                                        <h3 class="mp0"><span class="text-uppercase"><?= $essai->typeessai->name() ?></span> du ticket N°<?= $essai->reference ?></h3>
                                        <span>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</span>
                                        <small>There are many variations of passages of Lorem Ipsum available, but the majority have suffered</small>
                                    </td>
                                    <td>
                                        <h4 class="mp0"><?= $essai->ticket->auto->immatriculation ?> </h4>
                                        <?= $essai->ticket->auto->marque->name() ?> <?= $essai->ticket->auto->modele ?>
                                    </td>
                                    <td><?= $essai->mecanicien->name() ?></td>
                                    <td>
                                        <span class="pie">4,2</span>
                                        3d
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-white btn-xs"><i class="fa fa-check text-green"></i> Valider</button>
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
