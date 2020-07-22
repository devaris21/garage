
<div class="modal inmodal fade" id="modal-newintervention">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvelle client / Nouvelle intervention</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer la vente</small>
            </div>

            <form id="formTicket">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="new">
                                <div class="form-group">
                                    <label class="col-form-label" for="status">Type de client</label>
                                    <?php Native\BINDING::html("select", "typeclient") ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label">Nom et prénoms / Raison sociale</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <div class="row">
                                    <div class="form-group col-5">
                                        <label class="col-form-label">Contact</label>
                                        <input type="text" class="form-control" name="contact" required>
                                    </div>

                                    <div class="form-group col-7">
                                        <label class="col-form-label">Adresse email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <label>Type de réparation</label>
                                <div class="row">
                                    <?php foreach (Home\TYPEREPARATION::getall() as $key => $value) { ?>
                                        <div class="col-sm-6">
                                            <label><input type="checkbox" class="i-checks" name="typereparation" id="<?= $value->getId() ?>"> <?= $value->name  ?></label>
                                        </div>
                                    <?php }  ?>
                                </div><br>

                                <div class="">
                                    <div class="form-group">
                                        <label class="col-form-label" for="order_id">Constat fait par le client</label>
                                        <textarea class="form-control" name="constat" rows="5" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-form-label" for="status">Marque du véhicule</label>
                                    <?php Native\BINDING::html("select", "marque") ?>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-form-label">Modèle du véhicule</label>
                                    <input type="text" class="form-control" name="modele" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-form-label">Immatriculation du véhicule</label>
                                <input type="text" class="form-control" name="immatriculation" uppercase required>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Vehicule Identification Number (VIN)</label>
                                <input type="text" class="form-control" name="vin" uppercase >
                            </div>

                            <div class="row">
                                <div class="form-group col-7">
                                    <label class="col-form-label">Couleur</label>
                                    <input type="email" class="form-control" name="couleur">
                                </div>

                                <div class="form-group col-5">
                                    <label class="col-form-label">Kilometrage</label>
                                    <input type="number" class="form-control" name="kilometrage" required>
                                </div>
                            </div>

                            <label class="gras">Niveau de carburant</label><br>
                            <?php Native\BINDING::html("radio", "niveaucarburant") ?><br>


                            <div class="">
                                <div class="form-group">
                                    <label class="col-form-label" for="order_id">Autres remarques éventuelles </label>
                                    <textarea class="form-control" name="autreremarque" rows="4" required></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-4">
                            <label class="gras">Equipements du véhicule</label>
                            <?php foreach (Home\EQUIPEMENTAUTO::getall() as $key => $value) { ?>
                                <div class="row">
                                    <div class="col-sm-9">
                                        <label><input type="checkbox" class="i-checks" name="equipementauto" id="<?= $value->getId() ?>" > <?= $value->name()  ?></label>
                                    </div>
                                    <div class="col-sm-3 text-center">
                                        <input type="number" min="1" value="1" class="form-control" name="equipementauto-<?= $value->getId() ?>" disabled >
                                    </div>
                                </div>
                                <?php }  ?><br>

                                <label class="gras">Enjoliveurs sur le véhicule</label>
                                <div class="row">
                                    <?php foreach (Home\TYPEENJOLIVEUR::getall() as $key => $value) { ?>
                                        <div class="col-sm-6">
                                            <label><input type="checkbox" class="i-checks" name="enjoliveurs" id="<?= $value->getId() ?>" > <?= $value->name()  ?></label>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                        </div><hr>
                        <div class="container">
                            <input type="hidden" name="id">
                            <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                            <button type="button" onclick="newTicket()" class="btn dim btn-primary pull-right"><i class="fa fa-refresh"></i> Valider le formulaire</button>
                        </div>
                    </form>


                </div>
            </div>
        </div>


