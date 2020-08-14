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
                <h2 class="text-uppercase  text-red gras">Liste des reservations</h2>
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
                    <a href="<?= $this->url("gestion", "master", "newdevis")  ?>" class="btn btn-success dim"><i class="fa fa-plus"></i> Nouveau devis</a>
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
                                    <th>Durée</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($devis as $key => $reservation) {
                                    $reservation->actualise();
                                    ?>
                                    <tr>
                                        <td>
                                            <span class="label label-<?= $reservation->etat->class ?>"><?= $reservation->etat->name() ?></span>
                                        </td>
                                        <td >
                                            <span>Reservation N°<?= $reservation->reference ?></span><br>
                                            <small>enregistré <?= depuis($reservation->created)  ?> </small>
                                        </td>
                                        <td>
                                            <h4 class="mp0"><?= $reservation->client->name() ?> </h4>
                                            <?= $reservation->client->typeclient->name() ?><br>
                                        </td>
                                        <td>
                                            <span><?= datecourt($reservation->started)  ?> <br> <?= datecourt($reservation->finished)  ?></span><br>
                                            <small><?= dateDiffe($reservation->started, $reservation->finished)  ?> jours</small>
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-white btn-xs" data-toggle="modal" data-target="#modal-critere-<?= $reservation->id  ?>"><i class="fa fa-check text-green"></i> Commencer</button>
                                            <a href="<?= $this->url("gestion", "fiches", "devis", $reservation->id)  ?>" class="btn btn-white btn-xs"><i class="fa fa-book text-blue"></i></a>
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

    <?php foreach ($reservations as $key => $reservation) { 
        $cris = $reservation->fourni("critere");
        if (count($cris) > 0) {
            $critere = $cris[0];
            include($this->rootPath("composants/assets/modals/modal-critere.php"));
        }
    } ?>

</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
