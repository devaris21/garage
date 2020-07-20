
<div class="modal inmodal fade" id="modal-newintervention">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvelle client / Nouvelle intervention</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer la vente</small>
            </div>

            <form action="#" method="post">
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
                                    <input type="text" class="form-control" name="name">
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

                                <label>Type de réparation</label>
                                <div class="row">
                                    <?php foreach (Home\TYPEREPARATION::getall() as $key => $value) { ?>
                                        <div class="col-sm-6">
                                            <label><input type="checkbox" class="i-checks" name=""> <?= $value->name  ?></label>
                                        </div>
                                    <?php }  ?>
                                </div>

                                <div class="">
                                    <div class="form-group">
                                        <label class="col-form-label" for="order_id">Constat du client</label>
                                        <textarea class="form-control" name="comment" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-sm-4 border-right">
                            <div class="form-group">
                                <label class="col-form-label" for="status">Marque du véhicule</label>
                                <?php Native\BINDING::html("select", "marque") ?>
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Modèle du véhicule</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                                <label class="col-form-label">Immatriculation du véhicule</label>
                                <input type="text" class="form-control" name="name">
                            </div>

                            <div class="row">
                                <div class="form-group col-7">
                                    <label class="col-form-label">Couleur</label>
                                    <input type="email" class="form-control" name="email">
                                </div>

                                <div class="form-group col-5">
                                    <label class="col-form-label">Kilometrage</label>
                                    <input type="text" class="form-control" name="contact">
                                </div>
                            </div><br>

                            <label>Pièces du véhicule</label>
                            <div class="row">
                                <?php foreach (Home\OPTIONREPARATION::getall() as $key => $value) { ?>
                                    <div class="col-sm-6">
                                        <label><input type="checkbox" class="i-checks" name=""> <?= $value->name  ?></label>
                                    </div>
                                <?php }  ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="row">
                                <?php foreach (Home\OPTIONREPARATION::getall() as $key => $value) { ?>
                                    <div class="col-sm-6">
                                        <label><input type="checkbox" class="i-checks" name=""> <?= $value->name  ?></label>
                                    </div>
                                <?php }  ?>
                            </div>
                        </div>
                    </div><hr>
                    <div class="container">
                        <input type="hidden" name="id">
                        <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                        <button type="button" onclick="validerTicket()" class="btn dim btn-primary pull-right"><i class="fa fa-refresh"></i> Valider le formulaire</button>
                    </div>
                </form>


            </div>
        </div>
    </div>


