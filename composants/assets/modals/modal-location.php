<?php 
$vehicule = $location->vehicule;
$datas = $vehicule->fourni("infovehicule");
if (count($datas) > 0) {
    $info = $datas[0];
    $info->actualise();
}



?>


<div class="modal inmodal fade" id="modal-location-<?= $location->id ?>" style="z-index: 99999999">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title text-green">Informations sur la location</h4>
            <small class="font-bold">Ainsi que le véhicule loué</small>
        </div>
        
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-md-6">
                        <dl>
                            <dt class="text-capitalize text-green">Critère du véhicule <i class="fa fa-pencil pull-right cursor" data-toggle="modal" data-target="#modal-modifier-vehicule" onclick="modification('vehicule', <?= $vehicule->id ?>)"></i></dt><br>
                            <table class="table table-striped">
                                <tbody>
                                    <td>
                                        <td colspan="2"><img src="<?= $this->stockage("images", "vehicules", $location->vehicule->image) ?>" style="width: 100%;"></td>
                                    </td>
                                    <tr>
                                        <td><i>Type de véhicule :</i></td>
                                        <td><?= $info->typevehicule->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td style="width: 180px;"><i>Catégorie de véhicule :</i></td>
                                        <td><?= $info->fonctionvehicule->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td><i>Marque(s) </i></td>
                                        <td><?= $vehicule->marque->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td><i>Nombre de places :</i></td>
                                        <td><?= $info->nbPlaces ?> places</td>
                                    </tr>
                                    <tr>
                                        <td><i>Tr / Er:</i></td>
                                        <td><?= $info->transmission->name() ?> -- <?= $info->energie->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td><i>Climatisation</i></td>
                                        <td>
                                            <?php switch ($info->climatisation) {
                                                case 0:
                                                echo "Non";
                                                break;
                                                case 1:
                                                echo "Oui";
                                                break;
                                                default:
                                                echo "Peu Importe";
                                                break;
                                            } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </dl>
                    </div>

                    <div class="col-md-6">
                        <dl>
                            <dt class="text-capitalize text-green">Info de location <i class="fa fa-pencil pull-right cursor" data-toggle="modal" data-target="#modal-modifier-vehicule" onclick="modification('vehicule', <?= $vehicule->id ?>)"></i></dt><br>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td><i>Durée de location :</i></td>
                                        <td><?= datecourt($location->started) ?> <br> <?= datecourt($location->finished) ?></td>
                                    </tr>
                                    <tr>
                                        <td><i>Chauffeur :</i></td>
                                        <td>
                                            <?php if ($location->chauffeur_id == null) {
                                                echo "Sans chauffeur";
                                            }else{
                                                echo $location->chauffeur->name();
                                            } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </dl><hr>

                        <dl>
                            <dt class="text-capitalize text-green">Tarif Appliqué <i class="fa fa-pencil pull-right cursor" data-toggle="modal" data-target="#modal-modifier-vehicule" onclick="modification('vehicule', <?= $vehicule->id ?>)"></i></dt><br>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td><i>Type de tarif :</i></td>
                                        <td><?= $location->tarifvehicule->name() ?></td>
                                    </tr>
                                    <tr>
                                        <td><i>Forfait journalier :</i></td>
                                        <td><b><?= money($location->tarifvehicule->prixJournalier) ?> <?= $params->devise  ?> / <?= money($location->tarifvehicule->kilometreJournalier) ?> Kms</b></td>
                                    </tr>
                                    <tr>
                                        <td><i>Prix Km Supplém.</i></td>
                                        <td><?= money($location->tarifvehicule->prixKilometreComplementaire) ?> <?= $params->devise  ?> / km</td>
                                    </tr>
                                </tbody>
                            </table>
                        </dl>
                    </div>

                </div>
            </div>
        </div>

        <hr class="mp3">
        <div class="container">
            <input type="hidden" name="location_id" value="<?= $location->id ?>">
            <button class="btn btn-danger dim btn-xs " onclick="annulerLocation(<?= $location->id ?>)"><i class="fa fa-close"></i> Interompre</button>
            <button class="btn btn-primary dim pull-right" onclick="terminerLocation(<?= $location->id ?>)"><i class="fa fa-check"></i> Terminer la location</button>
        </div>

    </div>
</div>
</div>


