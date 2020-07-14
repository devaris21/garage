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
                      <div class="ibox-content">

                        <form id="formDiagnostic">

                            <div class="row">

                                <div class="col-md-4 border-right">
                                    <h2 class="text-uppercase gras text-danger">Nouveau diagnostic</h2>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <span>Pour le tixket N°<b><?= $ticket->reference ?></b></span>
                                        </li>
                                    </ol><br><br>


                                    <h3><?= $ticket->immatriculation ?></h3>
                                    <h3><?= $ticket->marque->name() ?> <?= $ticket->modele ?></h3>
                                    <h4><?= $ticket->client ?></h4>

                                    <br>
                                    <div class="form-group">
                                        <label>Selectionnez le(s) mécanicien(s) du diagnostic</label>
                                        <?php Native\BINDING::html("select-multiple", "mecanicien") ?>
                                    </div>

                                    <br>

                                <!-- <div class="form-group row">
                                    <div class="cursor col-6">
                                        <div class="i-checks"><label> <input type="checkbox" checked><i></i> Prix par temps barèmé </label></div>
                                    </div>
                                    <div class="cursor col-6">
                                        <div class="i-checks"><label> <input type="checkbox"><i></i> Utiliser prix forfaitaire </label></div>
                                    </div>
                                </div>  -->
                            </div>


                            <div class="col-md-4 border-right">
                                <h3 class="gras text-uppercase text-blue"><i class="fa fa-file-text-o"></i> Liste des pannes détectées</h3>
                                <p>Appuyez sur la touche entrée pour passer à la reparation suivante</p>
                                <div class="form-group">
                                    <input name="pannes" data-role="tagsinput" class="form-control" type="text" placeholder="Liste des pannes detectées" >
                                </div>
                                <hr>

                                <h3 class="gras text-uppercase text-blue"><i class="fa fa-gears"></i> Reparations à faire</h3>
                                <p>Appuyez sur la touche entrée pour passer à la reparation suivante</p>
                                <div class="form-group">
                                    <input data-role="tagsinput" name="reparations" class="form-control" type="text" placeholder="Liste des reparations à  effectuer" />
                                </div>
                                <hr>

                                <h3 class="gras text-uppercase text-blue"><i class="fa fa-wrench"></i> Liste des pièces à utiliser</h3>
                                <p>Appuyez sur la touche entrée pour passer à la reparation suivante</p>
                                <div class="form-group">
                                    <input data-role="tagsinput" name="pieces" class="form-control" type="text" placeholder="Liste des pièces à utiliser" />
                                </div>
                            </div>


                            <div class="col-md-4 border-right">
                                <br>
                                <div class="row">
                                    <div class="form-group col-7">
                                        <label>Date de fin de réparation</label>
                                        <input type="date" name="date" class="form-control date">
                                    </div>
                                    <div class="form-group col-5">
                                        <label>Heure de fin</label>
                                        <input type="text" name="heure" value="12:30" data-autoclose="true" class="form-control clockpicker">
                                    </div>
                                </div><br>

                                <br>
                                <div>
                                    <label>Ajouter une autre information</label>
                                    <textarea class="form-control" rows="5" name="comment"></textarea>
                                </div>

                                <hr>
                                <div>
                                    <button type="button" onclick="enregistrerDiagnostic()" class="dim btn btn-primary pull-right"><i class="fa fa-check"></i> Valider le diagnostic</button>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="ticket_id" value="<?= $ticket->id ?>">
                    </form>
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
