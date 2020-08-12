<div class="modal inmodal fade" id="modal-vehicule2" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Formulaire du véhicule</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer le véhicule</small>
            </div>
            <form method="POST" class="formShamman" classname="vehicule">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6 border-right">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label class="col-form-label" for="status">Type de véhicule</label>
                                    <?php Native\BINDING::html("select", "typevehicule") ?>
                                </div>
                                <div class="form-group col-12">
                                    <label class="col-form-label" for="status">Game de véhicule</label>
                                    <?php Native\BINDING::html("select", "fonctionvehicule") ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Immatriculation</label>
                                <input type="text" class="form-control" uppercase name="immatriculation">
                            </div>

                            
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="col-form-label">Marque</label>
                                    <?php Native\BINDING::html("select", "marque") ?>
                                </div>

                                <div class="form-group col-6">
                                    <label class="col-form-label">Modèle</label>
                                    <input type="text" class="form-control" required name="modele">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-5">
                                    <label class="col-form-label">Couleur</label>
                                    <input type="text" class="form-control" name="couleur">
                                </div>
                                <div class="form-group col-7">
                                    <label class="col-form-label">Mise en circulation</label>
                                    <input type="date" class="form-control" name="dateMiseCirculation">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-9">
                                    <label>Image du véhicule</label>
                                    <div class="">
                                        <img style="width: 80px;" src="" class="img-thumbnail logo ">
                                        <input class="hide" type="file" name="image1">
                                        <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div><br>

                  <!--   <div class="row">
                        

                        <div class="col-md">
                            <label>Image du véhicule</label>
                            <div class="">
                                <img style="width: 80px;" src="" class="img-thumbnail logo ">
                                <input class="hide" type="file" name="image2">
                                <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                            </div>
                        </div>

                        <div class="col-md">
                            <label>Image du véhicule</label>
                            <div class="">
                                <img style="width: 80px;" src="" class="img-thumbnail logo ">
                                <input class="hide" type="file" name="image3">
                                <button type="button" class="btn btn-sm bg-orange pull-right btn_image"><i class="fa fa-image"></i> Ajouter une image</button>
                            </div>
                        </div>
                    </div><br> -->

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