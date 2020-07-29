<div class="modal inmodal fade" id="modal-choisir_meca">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title text-blue">Choisir le mecano pour cette tâche</h4>
                <small class="font-bold text-blue">Renseigner ces champs pour enregistrer les informations</small>
            </div>
            <div class="modal-body">
                <div class="tabs-container">
                    <ul class="nav nav-tabs">
                        <?php foreach ($groupes as $key => $value) { ?>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-<?= $value->id ?>"><i class="fa fa-database"></i> <?= $value->name() ?></a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">
                        <?php foreach ($groupes as $key => $value) {
                            $datas = $value->fourni("mecanicien"); ?>
                            <div id="tab-<?= $value->id ?>" class="tab-pane active">
                                <div class="panel-body">
                                    <table class="table table-hover margin bottom">
                                        <thead>
                                            <tr>
                                                <th>Nom & prenoms</th>
                                                <th class="text-center">Spécialité</th>
                                                <th class="text-center">En cours</th>
                                                <th class="text-center">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($datas as $key => $mecanicien) { ?>
                                                <tr>
                                                    <td> <?= $mecanicien->name() ?></td>
                                                    <td class="text-center">
                                                        <?php foreach ($mecanicien->fourni("specialite_mecanicien") as $key => $type) {
                                                            $type->actualise(); ?>
                                                            <label class="label small"><?= $type->typereparation->name()  ?></label>
                                                        <?php } ?>
                                                    </td>
                                                    <td class="text-center"><?= start0($mecanicien->taches())  ?></td>
                                                    <td class="text-center"><button class="btn btn-xs btn-outline-info" onclick="validerTache(<?= $mecanicien->id ?>)"><i class="fa fa-check"></i> Choisir</button></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>