<div class="modal inmodal fade" id="modal-essai_av-<?= $ticket->id  ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Nouvel essai</h4>
                <small>Selectionner l'essayeur pour commencer l'essai</small>
            </div>
            <form method="POST" id="formEssai_av">
                <div class="modal-body">
                    <div>
                     <div class="row">
                        <div class="col-4">
                            <img src="<?= $this->stockage("images", "vehicules", "default.jpg")  ?>" class="img-thumbnail" style="width: 90%" >
                        </div>
                        <div class="col-8">
                            <h2 class="text-uppercase gras mp0">Ticket N°<?= $ticket->reference  ?></h2>
                            <h4 class="text-uppercase" ><?= $ticket->auto->immatriculation ?></h4>
                            <span><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?> // <?= $ticket->auto->couleur ?></span>
                        </div>
                    </div>
                    <br><br>

                    <dl>
                        <dt>Constat (Client)</dt>
                        <dd><?= $ticket->constat  ?></dd>
                    </dl>
                </div><br> 
                <div>
                    <label>Selectionner l'essayeur <span style="color: red">*</span> </label>                                
                    <div class="input-group">
                        <?php Native\BINDING::html("select", "mecanicien"); ?>
                    </div>
                </div><br>    
            </div><hr>
            <div class="container">
                <input type="hidden" name="ticket_id" value="<?= $ticket->getId() ?>">
                <input type="hidden" name="typeessai_id" value="<?= Home\TYPEESSAI::AVANT ?>">
                <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                <button class="btn btn-sm dim btn-success pull-right"><i class="fa fa-check"></i> Commercer l'essai</button>
            </div>
        </form>
    </div>
</div>
</div>
