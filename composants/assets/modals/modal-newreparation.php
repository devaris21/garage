<div class="modal inmodal fade" id="modal-newreparation">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvelle reparation / entretien</h4>
                <small>Veuillez renseigner les informations sur le formulaire pour commencer le diagnostic</small>
            </div>
            <form method="POST" class="formShamman" classname="ticketreparation">
                <div class="modal-body">
                    <div class="row">

                        <div class="col-md-6 border-right">
                            <h3 class="text-uppercase gras">Informations du client</h3>
                            <div class="">
                                <label>Nom & prénoms <span1>*</span1></label>
                                <div class="form-group">
                                    <input type="text" number class="form-control" name="client" required>
                                </div>
                            </div>
                            <div class="">
                                <label>Contact / téléphone</label>
                                <div class="form-group">
                                    <input type="text" number class="form-control" name="contact">
                                </div>
                            </div>
                            <div class="">
                                <label>Email</label>
                                <div class="form-group">
                                    <input type="email" number class="form-control" name="email">
                                </div>
                            </div> <hr>

                            <div class="">
                                <label>Détails du problème (client) <span1>*</span1></label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="4" name="panne" required></textarea>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <h3 class="text-uppercase gras">Informations du véhicule</h3>

                            <div>
                                <label>Type de véhicule <span style="color: red">*</span> </label>                                
                                <div class="input-group">
                                    <?php Native\BINDING::html("select", "typevehicule"); ?>
                                </div>
                            </div> <br>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Marque du véhicule <span style="color: red">*</span> </label>                                
                                    <div class="input-group">
                                        <?php Native\BINDING::html("select", "marque"); ?>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label>Modele du véhicule <span style="color: red">*</span> </label>                                
                                    <div class="form-group">
                                        <input type="text" number class="form-control" name="modele" required>
                                    </div>
                                </div>
                            </div><br> 
                            <div class="row">
                                <div class="col-sm-7">
                                    <label>Immatriculation du véhicule <span1>*</span1></label>
                                    <div class="form-group">
                                        <input type="text" number class="form-control" uppercase name="immatriculation" required>
                                    </div>
                                </div> <br>
                                <div class="col-sm-5">
                                    <label>Couleur du véhicule<span1>*</span1></label>
                                    <div class="form-group">
                                        <input type="text" number class="form-control" name="couleur">
                                    </div>
                                </div> 
                            </div>
                        </div>

                    </div>                
                </div><hr>
                <div class="container">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button class="btn btn-sm dim btn-primary pull-right"><i class="fa fa-check"></i> Commencer le diagnostic </button>
                </div>
            </form>
        </div>
    </div>
</div>
