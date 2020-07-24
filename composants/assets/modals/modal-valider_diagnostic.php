<div class="modal inmodal fade" id="modal-valider_diagnostic-<?= $diagnostic->id  ?>">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button><br>
                <hr class="mp3">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="row">
                            <div class="col-3">
                                <img style="width: 100%" src="<?= $this->stockage("images", "societe", $params->image) ?>">
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
                        <h2 class="title text-uppercase gras text-blue">Validation du <?= $diagnostic->ticket->etatintervention->name() ?></h2>
                        <h5><?= datelong($diagnostic->created)  ?></h5>  
                        <h4><small>Effectué par :</small> <span class="text-uppercase"><?= $diagnostic->mecanicien->name() ?></span></h4>                               
                    </div>
                </div>
            </div>
            <form method="POST" id="formValiderDiagnostic">
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-4 border-right">
                            <div class="row">
                                <div class="col-3">
                                    <div class="text-center" data-toggle="tooltip">
                                        <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "clients", "default.png") ?>" class="img-thumbnail cursor" style="height: 60px;">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h3 class="gras text-navy" style="margin: 0"><strong><?= $ticket->client->name() ?></strong> 
                                    </h3>
                                    <address>
                                        <h4 style="margin-top: 6px;"><strong><?= $ticket->client->typeclient->name() ?></strong></h4>
                                        <span><i class="fa fa-envelope"></i> <?= $ticket->client->email ?></span> <br>
                                        <span><i class="fa fa-map-marker"></i> <?= $ticket->client->adresse ?></span> <br>
                                        <span><i class="fa fa-phone"></i> <?= $ticket->client->contact ?></span> <br>
                                    </address>
                                </div>
                            </div><br>
                            <div>
                                <label class="gras">Description de la panne (Client)</label><br>
                                <p><?= $ticket->constat  ?></p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-3">
                                    <div class="text-center" data-toggle="tooltip">
                                        <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 60px;">
                                    </div>
                                </div>
                                <div class="col-9">
                                    <h3 class="gras text-navy" style="margin: 0"><strong><?= $ticket->auto->immatriculation ?></strong> 
                                    </h3>
                                    <address>
                                        <h4 style="margin-top: 6px;"><strong><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></strong></h4>
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
                        </div>

                        <div class="col-md-4 border-left">
                            <div>
                                <label class="gras">Diagnostic Essayeur</label><br>
                                <ul>
                                    <?php foreach ($essai->fourni("listeconstatessai") as $key => $value) { ?>
                                        <li><?= $value->constat ?></li>
                                    <?php  }  ?>
                                </ul>
                            </div>
                            <div>
                                <label class="gras">Diagnostic Essayeur (Chef)</label><br>
                                <ul>
                                    <?php foreach ($essaichef->fourni("listeconstatessai") as $key => $value) { ?>
                                        <li><?= $value->constat ?></li>
                                    <?php  }  ?>
                                </ul>
                            </div>
                        </div><br>
                    </div><hr>


                    <div class="row">
                        <div class="col-sm-5">
                            <h3>Liste des travaux à effectuer</h3>
                            <div>
                                <label class="">Libéllé de la tache</label>
                                <input type="text" class="form-control tache">
                            </div>
                            <table class="table table-hover">
                                <tbody class="listetache">
                                </tbody>
                            </table>
                        </div>

                        <div class="offset-sm-1 col-sm-6 border-left">
                            <div>
                                <h3>Liste des pièces à utiliser</h3>
                                <div class="row">
                                    <div class="col-9">
                                        <label class="">Libéllé de la pièce</label>
                                        <input type="text" class="form-control piece">
                                    </div>
                                    <div class="col-3">
                                        <label class="">Qté</label>
                                        <input type="number" value="1" min="1" class="form-control qte">
                                    </div>
                                </div>

                            </div>
                            <table class="table table-hover">
                                <tbody class="listepiece">
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div><hr>

                <div class="container">
                    <input type="hidden" name="diagnostic_id" value="<?= $diagnostic->getId() ?>">
                    <button type="button" class="btn btn-sm  btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Annuler</button>
                    <button type="button" class="btn btn-sm dim btn-primary pull-right" onclick="validerDiagnostic('<?= $diagnostic->getId() ?>')"><i class="fa fa-check"></i> Valider le diagnostic</button>
                </div>
            </form>
        </div>
    </div>
</div>
