<div class="modal inmodal fade" id="modal-vehicule" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Formulaire du véhicule</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer le véhicule</small>
            </div>
            <form method="POST" class="formShamman" classname="vehicule">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-4 border-right">
                           <div class="form-group">
                            <label class="col-form-label" for="status">Type de véhicule</label>
                            <?php Native\BINDING::html("select", "typeclient") ?>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="status">Game de véhicule</label>
                            <?php Native\BINDING::html("select", "typeclient") ?>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Immatriculation</label>
                            <input type="text" class="form-control" uppercase name="place" value="5">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Code national d’identification du type</label>
                            <input type="text" class="form-control" uppercase name="place" value="5">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Marque</label>
                                <?php Native\BINDING::html("select", "typepiece") ?>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Modèle</label>
                                <input type="number" class="form-control" uppercase name="place" value="5">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4 border-right">
                        <div class="form-group">
                            <label class="col-form-label">N° de chassis</label>
                            <input type="text" class="form-control" uppercase name="place" maxlength="17">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Transmission</label>
                                <?php Native\BINDING::html("select", "transmission") ?>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Energie</label>
                                <?php Native\BINDING::html("select", "energie") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Nombre de portes</label>
                                <input type="number" class="form-control" name="place" value="5">
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Nombre de places</label>
                                <input type="email" class="form-control" name="place">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Capacité sacs</label>
                                <input type="number" class="form-control" name="place" value="5">
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Capacité valises</label>
                                <input type="email" class="form-control" name="place">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Age minimun conducteur</label>
                                <input type="number" class="form-control" name="place" value="5">
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label">Année minimum permis</label>
                                <input type="email" class="form-control" name="place">
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-4">
                        <div class="row text-center">
                            <div class="form-group col-6 border-right">
                                <label class="col-form-label cursor"><input type="checkbox" checked class="i-checks" value=1 name="client"> Airbag conducteur</label>
                            </div>

                            <div class="form-group col-6">
                                <label class="col-form-label cursor"><input type="checkbox" class="i-checks" value=2 name="airBagPassager"> Airbag passager</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label class="col-form-label">Couleur</label>
                                <input type="email" class="form-control" name="place">
                            </div>
                            <div class="form-group col-6">
                                <label class="col-form-label">Climatisation ?</label>
                                <select class="form-control select2" name="climatisation" style="width: 100%">
                                    <option value="<?= Home\TABLE::OUI  ?>">Oui</option>
                                    <option value="<?= Home\TABLE::NON  ?>">Non</option>
                                </select>                           
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="status">Equipements spéciaux</label>
                            <?php Native\BINDING::html("select-multiple", "equipement") ?>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="status">Accessoires du véhicules</label>
                            <?php Native\BINDING::html("select-multiple", "accessoire") ?>
                        </div>
                    </div>
                </div><br>

                <div class="row">
                    <div class="col-md">
                        <label>Image du véhicule</label>
                        <div class="">
                            <img style="width: 80px;" src="" class="img-thumbnail logo ">
                            <input class="hide" type="file" name="image">
                            <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                        </div>
                    </div>

                    <div class="col-md">
                        <label>Image du véhicule</label>
                        <div class="">
                            <img style="width: 80px;" src="" class="img-thumbnail logo ">
                            <input class="hide" type="file" name="image">
                            <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                        </div>
                    </div>

                    <div class="col-md">
                        <label>Image du véhicule</label>
                        <div class="">
                            <img style="width: 80px;" src="" class="img-thumbnail logo ">
                            <input class="hide" type="file" name="image">
                            <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                        </div>
                    </div>
                </div><br>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="id">
                <button type="button" class="btn btn-white" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Enregistrer</button>
            </div>
        </form>
    </div>
</div>
</div>