<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

            <div class="wrapper border-bottom white-bg page-heading animated fadeInRightBig">
                <h1 class="text-uppercase gras">Nouvelle reservation</h1>
                <small>Lorem ipsum dolor sit amet.</small>
                <hr class="mp3">
                <br>
                <div class="row">
                    <div class="col-sm-4 border-right">
                        <div class="row text-center">
                            <div class="form-group col-6 border-right">
                                <label class="col-form-label cursor"><input type="radio" checked class="i-checks" value=1 name="client"> Nouveau client</label>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label cursor"><input type="radio" class="i-checks" value=2 name="client"> Client existant</label>
                            </div>
                        </div><hr class="mp0"><br>

                        <div class="new">
                           <div class="form-group">
                            <label class="col-form-label" for="status">Type de client</label>
                            <?php Native\BINDING::html("select", "typeclient") ?>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">Nom et prénoms / Raison sociale</label>
                            <input type="number" class="form-control" name="place" value="5">
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Type de pièce</label>
                                <?php Native\BINDING::html("select", "typepiece") ?>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Numero de la piece</label>
                                <input type="number" class="form-control" uppercase name="place" value="5">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-5">
                                <label class="col-form-label">Contact</label>
                                <input type="number" class="form-control" name="place" value="5">
                            </div>

                            <div class="form-group col-7">
                                <label class="col-form-label">Adresse email</label>
                                <input type="email" class="form-control" name="place">
                            </div>
                        </div>
                    </div>


                    <div class="old">
                        <div class="form-group">
                            <label class="col-form-label" for="status">Rechercher le client</label>
                            <?php Native\BINDING::html("select-null", "client") ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-8">
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
                                    <option value="<?= Home\TABLE::OUI  ?>">Oui</option>
                                    <option value="<?= Home\TABLE::NON  ?>">Non</option>
                                </select>                           
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label">Nombre de places</label>
                                <div id="ionrange_1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label" for="customer">Transmission du véhicule ?</label>
                                <?php Native\BINDING::html("select", "transmission") ?>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label class="col-form-label" for="amount">Climatisation ?</label>
                                <select class="form-control select2" name="climatisation" style="width: 100%">
                                    <option value="">Peu importe</option>
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
                                    <input type="date" class="form-control" value="<?= dateAjoute()  ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="date_modified">Date d'arrivée</label>
                                <div class="input-group date">
                                    <input type="date" class="form-control" value="03/06/2014">
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

                    <hr>
                    <div>
                        <button class="btn btn-primary dim"><i class="fa fa-plus"></i> Valider le devis</button>

                        <button class="btn btn-primary dim pull-right"><i class="fa fa-plus"></i> Valider la reservation</button>
                    </div><hr>
                    <p>Nombre de véhicules correspondant aux critères spécifiés : <span> 0 véhicules</span></p>

                </div>



            </div>
        </div>


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>



    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
