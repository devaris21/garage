<div class="modal inmodal fade" id="modal-valider_essai-<?= $essai->id  ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><br>
                <hr class="mp3">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 120%" src="<?= $this->stockage("images", "societe", $params->image) ?>">
                            </div>
                            <div class="col-9 text-left">
                                <h5 class="gras text-uppercase text-orange"><?= $params->societe ?></h5>
                                <h5 class="mp0"><?= $params->adresse ?></h5>
                                <h5 class="mp0"><?= $params->postale ?></h5>
                                <h5 class="mp0">Tél: <?= $params->contact ?></h5>
                                <h5 class="mp0">Email: <?= $params->email ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 text-right">
                        <h2 class="title text-uppercase gras text-blue">Validation de l'<?= $essai->typeessai->name() ?></h2>
                        <h3 class="text-uppercase">N°<?= $essai->reference  ?></h3>
                        <h5><?= datelong($essai->created)  ?></h5>  
                        <h4><small>Effectué par :</small> <span class="text-uppercase"><?= $essai->mecanicien->name() ?></span></h4>                                
                    </div>
                </div>
            </div>
            <form method="POST" id="formValiderEssai">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-6 border-right">
                            <div class="row">
                                <div class="col-3">
                                    <div class="text-center" data-toggle="tooltip">
                                        <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "clients", "default.png") ?>" class="img-thumbnail cursor" style="height: 110px;">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h2 class="gras text-navy" style="margin: 0"><strong><?= $ticket->client->name() ?></strong> 
                                    </h2>
                                    <address>
                                        <h3 style="margin-top: 6px;"><strong><?= $ticket->client->typeclient->name() ?></strong></h3>
                                        <span><i class="fa fa-envelope"></i> <?= $ticket->client->email ?></span> <br>
                                        <span><i class="fa fa-map-marker"></i> <?= $ticket->client->adresse ?></span> <br>
                                        <span><i class="fa fa-phone"></i> <?= $ticket->client->contact ?></span> <br>
                                    </address>
                                </div>
                            </div><br>
                            <div>
                                <label class="gras">Description de la panne (Client)</label><br>
                                <p><?= $ticket->constat  ?></p>
                            </div><br>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-4">
                                    <div class="text-center" data-toggle="tooltip">
                                        <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 110px;">
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h2 class="gras text-navy" style="margin: 0"><strong><?= $ticket->auto->immatriculation ?></strong> 
                                    </h2>
                                    <address>
                                        <h3 style="margin-top: 6px;"><strong><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></strong></h3>
                                        <h4 style="margin-top: 6px;">VIN: <strong><?= $ticket->auto->vin ?></strong></h4>
                                        <h5>Couleur <?= $ticket->auto->couleur ?></h5> <br>
                                    </address>
                                </div>
                            </div>
                            <label class="gras">Autres infos</label><br>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Kilometrage</td>
                                        <td><?= $ticket->kilometrage ?> Kms</td>
                                    </tr>
                                    <tr>
                                        <td>Niveau de carburant</td>
                                        <td><?= $ticket->niveaucarburant->name() ?> </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div><br>
                    </div><hr>


                    <div class="row">
                        <div class="col-sm-6">
                            <label class="gras">Liste des remarques</label>
                            <input type="text" class="form-control liste">
                        </div>

                        <div class="col-sm-6">
                            <table class="table table-hover">
                                <tbody class="liste">
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><hr>

                <div class="container">
                    <input type="hidden" name="essai_id" value="<?= $essai->id ?>">
                    <input type="hidden" name="typeessai_id" value="<?= $essai->typeessai->id ?>">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button type="button" class="btn btn-sm dim btn-primary pull-right" onclick="validerEssai('<?= $essai->getId() ?>')"><i class="fa fa-check"></i> Valider l'essai</button>
                </div>
            </form>
        </div>
    </div>
</div>
