
<div class="modal inmodal fade" id="modal-valider-inspection">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Formulaire d'inspection de véhicule</h4>
                <small class="font-bold">Renseigner ces champs pour faire votre demande d'inspection</small>
            </div>
            <form method="POST" class="formShamman" classname="inspection">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Nom de l'inspecteur  </label>
                            <div class="form-group">
                                <input type="text" name="nomInspection" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Kilometrage du retour (actuel) </label>
                            <div class="form-group">
                                <input type="number" name="kilometragefin" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label>Niveau carburant  </label>
                            <div class="form-group">
                                <?php Native\BINDING::html("select", "niveaucarburant"); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Remarques sur l'état général du véhicule</label>
                            <div class="form-group">
                                <textarea class="form-control" name="comment" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div><br>
            </div><hr class="">
            <div class="container">
                <input type="hidden" name="id">
                <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <button class="btn btn-sm btn-primary dim pull-right"><i class="fa fa-check"></i> Faire la demande</button>
            </div>
            <br>
        </form>
    </div>
</div>
</div>

