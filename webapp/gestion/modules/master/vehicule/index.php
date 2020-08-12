<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper border-bottom white-bg page-heading">
            <div class="tabs-container">
                <ul class="nav nav-tabs text-uppercase" role="tablist">
                    <li><a class="nav-link active" data-toggle="tab" href="#menu-1"><i class="fa fa-info"></i> Infos Générale</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-historique"><i class="fa fa-history"></i> Historique du véhicule</a></li>
                    <li><a class="nav-link" data-toggle="tab" href="#menu-planning"><i class="fa fa-calendar"></i> Planning du véhicule</a></li>
                </ul>
                <div class="tab-content loading-data">
                    <?php include($this->relativePath("partiel1/infovehicule.php")) ?>
                    <?php include($this->relativePath("partiel1/historique.php")) ?>
                    <?php include($this->relativePath("partiel1/planning.php")) ?>
                </div>
            </div>
            <br>
            <div>
                <button data-target="#modal-infovehicule" data-toggle="modal" onclick="modification('infovehicule', <?= $levehicule->infovehicule->id ?>)" class="btn btn-xs btn-default dim"><i class="fa fa-pencil"></i> Modifier les infos</button>

                <button data-toggle="modal" data-target="#modal-newintervention" class="btn btn-xs btn-warning dim pull-right"><i class="fa fa-strikethrough"></i> Déclassé le véhicule</button>
                <button data-toggle="modal" data-target="#modal-newintervention" class="btn btn-xs btn-warning dim pull-right"><i class="fa fa-ban"></i> Rendre indisponible</button>
                <button data-toggle="modal" data-target="#modal-newintervention" class="btn btn-xs btn-danger dim pull-right"><i class="fa fa-calendar"></i> Nouvelle reservation</button>
                <button data-toggle="modal" data-target="#modal-newintervention" class="btn btn-xs btn-primary dim pull-right"><i class="fa fa-eercast"></i> Nouvelle location</button>
            </div>
        </div>


        <br><br>


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>



        <div class="modal fade inmodal" id="modal-image">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Changer l'image</h4>
                    </div>
                    <form method="POST" id="formImage">
                        <div class="modal-body">
                            <div class="">
                                <label>Image de la voiture</label>
                                <div class="">
                                    <img style="width: 80px;" src="" class="img-thumbnail cursor logo">
                                    <input class="hide" type="file" name="image">
                                    <button type="button" class="btn btn-sm bg-red pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                                </div>
                            </div>
                        </div><hr class="">
                        <div class="container">
                            <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                            <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i>Changer l'image</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>



        <div class="modal fade inmodal" id="modal-equipement-vehicule">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title">Choisir l'equipement</h4>
                    </div>
                    <form method="POST" class="formShamman" classname="equipement_vehicule">
                        <div class="modal-body">
                            <div class="">
                                <label>Equipement</label>
                                <?php Native\BINDING::html("select", "equipement")  ?>
                            </div><br>
                            <div class="">
                                <label>quantité</label>
                                <input type="number" class="form-control" name="quantite" required>
                            </div>
                        </div><hr class="">
                        <div class="container">
                            <input type="hidden" name="vehicule_id" value="<?= $levehicule->id ?>">
                            <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                            <button class="btn btn-sm btn-success pull-right"><i class="fa fa-check"></i> Valider</button>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<?php include($this->rootPath("composants/assets/modals/modal-vehicule.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-vehicule2.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-infovehicule.php")); ?>  


<script type="text/javascript" src="<?= $this->relativePath("../planning/script.js")  ?>"></script>


<script type="text/javascript">
    var events =  [
    <?php foreach ($locations as $key => $item) {
        $item->actualise(); ?>
        {
            title: 'Location de <?= $item->client->name(); ?> // <?= $item->vehicule->immatriculation; ?>',
            start: "<?= $item->started; ?>",
            end: "<?= dateAjoute1($item->finished, +1) ?>",
            className: "bg-green",
            borderColor: "white",
            extendedProps: {
                type: 'location',
                id: "<?= $item->id; ?>"
            }
        },
    <?php } ?>

    ];

</script>


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>


</body>

</html>