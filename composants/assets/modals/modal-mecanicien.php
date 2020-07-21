<div class="modal inmodal fade" id="modal-mecanicien">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Formulaire Mécano</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer les informations</small>
            </div>
            <form method="POST" class="formShamman" classname="mecanicien">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Nom & prénoms<span1>*</span1></label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label>Groupe de travail <span1>*</span1></label>
                            <div class="form-group">
                                <?php Native\BINDING::html("select", "groupemecanicien") ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4 col-sm-6">
                            <label>Situation géographique</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="adresse">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>Contact</label>
                            <div class="form-group">
                                <input type="text" class="form-control" name="contact">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <label>email</label>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email">
                            </div>
                        </div>
                    </div>
                </div><hr>
                <div class="container">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-success dim pull-right"><i class="fa fa-refresh"></i> Valider le formulaire</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>



<div class="modal inmodal fade" id="modal-salaire">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Modifier le salaire</h4>
                <small class="font-bold">Renseigner ces champs pour enregistrer les informations</small>
            </div>
            <form method="POST" class="formShamman" classname="chauffeur">
                <div class="modal-body">
                    <div class="">
                        <label>Salaire mensuel <span1>*</span1></label>
                        <div class="form-group">
                            <input type="number" number class="form-control" name="salaire">
                        </div>
                    </div>
                </div><hr>
                <div class="container">
                    <input type="hidden" name="id">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm btn-success pull-right"><i class="fa fa-refresh"></i> Valider le formulaire</button>
                </div>
                <br>
            </form>
        </div>
    </div>
</div>