<html>
<!DOCTYPE html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

            <div class="animated fadeInRightBig">
                <form method="POST" id="formLocation">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="ibox">
                                <div class="ibox-title bg-green">
                                    <h5 class="text-uppercase gras d-inline">Nouvelle location</h5>
                                </div>
                                <div class="ibox-content form">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="order_id">Type de véhicule</label>
                                                <?php Native\BINDING::html("select", "typevehicule") ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="status">Game de véhicule</label>
                                                <?php Native\BINDING::html("select", "fonctionvehicule") ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label">Voulez-vous un Chauffeur ?</label>
                                                <select class="form-control select2" name="climatisation" style="width: 100%">
                                                    <option value="<?= Home\TABLE::NON  ?>">Non</option>
                                                    <option value="<?= Home\TABLE::OUI  ?>">Oui</option>
                                                </select>                           
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label class="col-form-label">Min place</label>
                                                    <input type="number" class="form-control" value="5" name="min">
                                                </div>

                                                <div class="form-group col-6">
                                                    <label class="col-form-label">Max place</label>
                                                    <input type="number" class="form-control" value="5" name="max">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label" for="amount">Marques souhaitées</label>
                                                <?php Native\BINDING::html("select-multiple", "marque") ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="customer">Type d'energie du véhicule ?</label>
                                                <?php Native\BINDING::html("select", "energie") ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="customer">Transmission du véhicule ?</label>
                                                <?php Native\BINDING::html("select", "transmission") ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label class="col-form-label" for="amount">Climatisation ?</label>
                                                <select class="form-control select2" name="climatisation" style="width: 100%">
                                                    <option value="a">Peu importe</option>
                                                    <option value="<?= Home\TABLE::OUI  ?>">Oui</option>
                                                    <option value="<?= Home\TABLE::NON  ?>">Non</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label" for="amount">Liste Equipements Spéciaux</label>
                                                <?php Native\BINDING::html("select-multiple", "equipement") ?>
                                            </div>
                                        </div>
                                    </div><hr>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="date_added">Date de départ</label>
                                                <div class="input-group date">
                                                    <input type="date" class="form-control" name="started" value="<?= $date1 ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="date_modified">Date d'arrivée</label>
                                                <div class="input-group date">
                                                    <input type="date" class="form-control" name="finished" value="<?= $date2 ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label class="col-form-label" for="date_modified">Tarif Applicable</label>
                                                <?php Native\BINDING::html("select", "tarifvehicule") ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="ibox">
                                <div class="ibox-title bg-green">
                                    <h5 class="text-uppercase gras d-inline">Informations sur le client</h5>
                                </div>
                                <div class="ibox-content">
                                    <div class="row text-center">
                                        <div class="col-6 border-right">
                                            <label class="col-form-label cursor"><input type="radio" checked class="i-checks" value="<?= Home\TABLE::NON  ?>" name="isclient"> Nouveau client</label>
                                        </div>

                                        <div class="col-6">
                                            <label class="col-form-label cursor"><input type="radio" class="i-checks" value="<?= Home\TABLE::OUI  ?>" name="isclient"> Client existant</label>
                                        </div>
                                    </div><hr class="mp0">

                                    <div class="new">
                                       <div class="form-group">
                                        <label class="col-form-label" for="status">Type de client</label>
                                        <?php Native\BINDING::html("select", "typeclient") ?>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label">Nom et prénoms / Raison sociale</label>
                                        <input type="text" class="form-control" name="name">
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="col-form-label">Type de pièce</label>
                                            <?php Native\BINDING::html("select", "typepiece") ?>
                                        </div>

                                        <div class="form-group col-6">
                                            <label class="col-form-label">Numero de la piece</label>
                                            <input type="text" class="form-control" uppercase name="numero">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label">Domicile / Lieu habitation</label>
                                        <input type="text" class="form-control" name="adresse">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-5">
                                            <label class="col-form-label">Contact</label>
                                            <input type="text" class="form-control" name="contact">
                                        </div>

                                        <div class="form-group col-7">
                                            <label class="col-form-label">Adresse email</label>
                                            <input type="email" class="form-control" name="email">
                                        </div>
                                    </div>
                                </div>


                                <div class="old">
                                    <div class="form-group">
                                        <label class="col-form-label" for="status">Rechercher le client</label>
                                        <?php Native\BINDING::html("select-startnull", "client") ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="ibox">
                    <div class="ibox-title bg-green">
                        <h5 class="text-uppercase gras d-inline">Caractériques du véhicule pour la location</h5>
                        <div class="ibox-tools">
                            <button class="btn btn-xs btn-white text-dark" onclick="voirlistevehicules()"><span class="nb"></span></button>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row listevehicules"  style="background-color: #eee; padding-top: 1%;">
                            <!-- rempli en ajax -->
                        </div><br>

                        <div class="row formvehicule">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Etat intérieur du véhicule</label>
                                        <input type="text" class="form-control" name="etatinterieur" value="correct !">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Etat extérieur du véhicule</label>
                                        <input type="text" class="form-control" name="etatexterieur" value="correct !">
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Kilométrage actuel</label>
                                        <input type="text" class="form-control" name="kilometrage">
                                    </div>
                                    <div class="col-sm-9">
                                        <label class="gras">Niveau de carburant</label><br>
                                        <?php Native\BINDING::html("radio", "niveaucarburant") ?><br>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Décrivez très précisement les défauts du véhicule </label>
                                        <textarea class="form-control" rows="5" name="details"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 text-center">
                                <label>Veuillez Marquer les défauts sur le véhicule</label>
                                <div class="literally backgrounds" id="lc"></div>
                                <input type="hidden" name="img">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="ibox">
                    <div class="ibox-title">
                        <h5 class="text-uppercase gras d-inline">Validation du faormulaire de location</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row fiche">
                            <!-- rempli en ajax -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <br><br>

        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

    </div>

</div>

<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript">
  $(document).ready(function() {
     var image = '';
     var backgroundImage = new Image()
     backgroundImage.src = '<?= $this->stockage("images", "societe", "test.png") ?>';
     var lc = LC.init(
        document.getElementsByClassName('literally backgrounds')[0],
        {
            imageURLPrefix: '../../../stockage/images/lc-images',
            primaryColor : "#c00",
            secondaryColor : "#cc0",
            backgroundColor : "transparent",
            defaultStrokeWidth :2,
            strokeWidths : [1, 2, 4],
            tools: [
                LC.tools.Pencil,
                LC.tools.Eraser,
                LC.tools.Line,
                LC.tools.Rectangle,
                LC.tools.Text,
                LC.tools.Ellipse,
                //LC.tools.Polygon,
                //LC.tools.Pan,
                //LC.tools.Eyedropper
            ],
            backgroundShapes: [
            LC.createShape(
                'Image', {image: backgroundImage, scale: 0.51})
            ]
        });
    // the background image is not included in the shape list that is
    // saved/loaded here

  //   if (localStorage.getItem(localStorageKey)) {
  //     lc.loadSnapshot(JSON.parse(localStorage.getItem(localStorageKey)));
  // }
  lc.on('drawingChange', function() {
      //localStorage.setItem(image, lc.canvasForExport().toDataURL());
      $("input[name=img]").val(lc.canvasForExport().toDataURL());
  });

});
</script>

<style type="text/css">
  .literally {
    width: 100%;
    position: relative;
}
</style>
</body>

</html>
