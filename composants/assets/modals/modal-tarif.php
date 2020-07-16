<div class="modal inmodal fade" id="modal-tarif">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Formulaire des tarifs</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer les informations</small>
            </div>
            <form method="POST" id="formTarif">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <label>Nom du tarifs <span1>*</span1></label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" required >
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-4">
                                    <label>Prix journalier <span1>*</span1></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prixJournalier" required >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Forfait km / jour <span1>*</span1></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="kilometreJournalier" required >
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label>Extra prix / Km <span1>*</span1></label>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="prixKilometreComplementaire" required >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <div class="unmodified">
                        <label>Game de véhicules pris en compte <span1>*</span1></label>
                        <div class="form-group">
                            <?php Native\BINDING::html("select-multiple", "fonctionvehicule"); ?>
                        </div>
                    </div>

                </div><hr class="">
                <div class="container">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-primary dim pull-right"><i class="fa fa-check"></i> Enregistrer le tarif</button>
                </div>
                <br>
            </form>

        </div>
    </div>
</div>

