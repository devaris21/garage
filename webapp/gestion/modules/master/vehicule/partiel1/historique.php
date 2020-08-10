<div role="tabpanel" id="menu-historique" class="tab-pane ">
    <div class="panel-body">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="table-responsive">
                            <table class="table table-location">
                                <thead>
                                    <tr>
                                        <th>Infos</th>
                                        <th>Client</th>
                                        <th>Durée</th>
                                        <th>Kilometrages</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($locations as $key => $location) {
                                        $location->actualise();
                                        $vehicule = $location->vehicule;
                                        $tems = $vehicule->fourni("infovehicule");
                                        $info = $tems[0];
                                        $info->actualise(); ?>
                                        <tr class=" <?= ($location->etat_id != Home\ETAT::ENCOURS)?'fini':'' ?> border-bottom">
                                            <td class="text-left">
                                                <h5><span class=""><u class="text-info">#<?= $location->reference ?></u> // <span class="small text-<?= $location->etat->class ?>"><?= $location->etat->name ?></span></span></h5>
                                                <p class=""><?= $location->lieu  ?></p>
                                            </td>
                                            <td>
                                                <a href="<?= $this->url("gestion", "master", "client", $location->client->id)  ?>">
                                                    <h5 class="m-b-xs"><strong><?= $location->client->name() ?></strong></h5>
                                                    <strong><?= $location->client->contact ?></strong>
                                                </a>
                                            </td>
                                            <td>
                                                <span>Du <?= datecourt($location->started) ?></span><br>
                                                <span>au <?= datecourt($location->finished) ?></span>
                                            </td>
                                            <td>
                                                <span><?= $location->kilometrage ?> kms - <?= $location->kilometragefin ?> kms</span>
                                            </td>
                                            <td class="text-right">
                                                <?php if ($location->etat_id == Home\ETAT::ENCOURS) { ?>
                                                    <button onclick="modification('location', <?= $location->id ?>)" data-toggle="modal" data-target="#modal-<?= ($location->typelocation_id == 1)?'location2':'pret2' ?>" class="btn btn-outline btn-warning  dim" type="button"><i data-toggle="tooltip" title="Modifier les infos de la location" class="fa fa-pencil"></i></button>

                                                    <button data-toggle="modal" data-target="#modal-client" class="btn btn-outline btn-success  dim" type="button"><i data-toggle="tooltip" title="Voir le contrat" class="fa fa-user"></i></button>


                                                    <button onclick="terminerLocation(<?= $location->id ?>)" data-toggle="tooltip" title="Terminer la location" class="btn btn-outline btn-primary dim" type="button"><i class="fa fa-check"></i></button>
                                                    <button onclick="annulerLocation(<?= $location->id ?>)" data-toggle="tooltip" title="Annuler la location" class="btn btn-outline btn-danger  dim" type="button"><i class="fa fa-close"></i> </button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
