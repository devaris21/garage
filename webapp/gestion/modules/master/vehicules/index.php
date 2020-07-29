<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="ibox">
                    <div class="ibox-title">
                        <div class="float-left">
                            <form id="formFiltrer" method="POST">
                                <div class="row" style="margin-top: -1%">
                                    <div class="col-5">
                                        <input type="date" value="<?= getSession("date1") ?>" class="form-control input-sm" name="date1">
                                    </div>
                                    <div class="col-5">
                                        <input type="date" value="<?= getSession("date2") ?>" class="form-control input-sm" name="date2">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" onclick="filtrer()" class="btn btn-sm bg-blue"><i class="fa fa-search"></i> Filtrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="ibox-tools" style="margin-right: 7%;">
                            <button type="button" title="Affichage par bloc" onclick="filtrer()" class="btn btn-xs btn-white"><i class="fa fa-th-large"></i></button>
                            <button type="button" title="Affichage en tableau" onclick="filtrer()" class="btn btn-xs btn-white"><i class="fa fa-th-list"></i></button>
                        </div>

                        <div class="ibox-tools">
                            <button type="button" title="imprimer" onclick="filtrer()" class="btn btn-xs btn-white"><i class="fa fa-print"></i></button>
                            <button type="button" title="importer en excel" onclick="filtrer()" class="btn btn-xs btn-white"><i class="fa fa-file-excel-o"></i></button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <?php foreach ($autos as $key => $auto) {
                                $auto->actualise(); ?>
                                <div class="col-lg-3 col-md-4 col-sm-6 hoverable" style="margin-bottom: 1%">
                                    <div class="contact-box mp3">
                                        <a href="<?= $this->url("gestion", "master", "vehicule", $auto->id)  ?>">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="text-center">
                                                        <img alt="image" class="rounded-circle m-t-xs img-fluid" src="<?= $this->stockage("images", "mecaniciens", $auto->image)  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <h3 class="text-capitalize"><strong><?= $auto->name() ?></strong></h3>
                                                    <p class="small mp0"><i class="fa fa-map-marker"></i> Lorem ipsum.</p>
                                                    <p class="small mp0"><i class="fa fa-phone"></i> Lorem ipsum dolor.</p>
                                                    <p class="small mp0"><i class="fa fa-envelope"></i>Lorem ipsum dolor.</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            <?php } ?>
                        </div><br>

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead class="bg-blue">
                                <tr>
                                    <th colspan="3">Informations du Véhicule</th>
                                    <th data-hide="phone">Client</th>
                                    <th data-hide="phone">Kilometrage</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tickets as $key => $ticket) {
                                    $ticket->actualise(); ?>
                                    <tr>
                                        <td>
                                            <img src="<?= $this->stockage("images", "vehicules", "default.jpg")  ?>" style="width: 60px">
                                        </td>
                                        <td>
                                            <b class="text-uppercase">Moèle et type Lorem ipsum dolor sit amet, consectetur adipisicing.</b><br>
                                            <span>Moèle et type Lorem ipsum dolor sit amet, consectetur adipisicing.</span>
                                        </td>
                                        <td><h4 class="mp0"><?= $ticket->auto->immatriculation ?> </h4></td>
                                        <td><?= $ticket->client->name() ?><br><small><?= $ticket->client->typeclient->name()  ?></small></td>
                                        <td>256 0253 Km</td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button class="btn-white btn btn-xs"><i class="fa fa-eye"></i> Voir</button>
                                                <button class="btn-white btn btn-xs"><i class="fa fa-pencil text-blue"></i> Modifier</button>
                                                <button class="btn-white btn btn-xs"><i class="fa fa-trash text-danger"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

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
