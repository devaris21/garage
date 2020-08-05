<?php 

$typefonction = " AND typevehicule_id = ? AND fonctionvehicule_id = ?";
$place = " AND nbPlaces >= ? AND nbPlaces <= ?";

$clim = "";
if ($critere->climatisation != null) {
    $clim = " AND climatisation = $critere->climatisation";
}
$energie = "";
if ($critere->energie_id != 1) {
    $energie = " AND energie_id = $critere->energie_id";
}
$transmission = "";
if ($critere->transmission_id != 1) {
    $transmission = " AND transmission_id = $critere->transmission_id";
}
$requette = "SELECT * FROM infovehicule WHERE 1 $typefonction $place $energie $transmission $clim ";

$marques = [];
$items = $critere->fourni("marque_critere");
foreach ($items as $key => $value) {
    $marques[] = $value->marque_id;
}

$datas = Home\INFOVEHICULE::execute($requette, [$critere->typevehicule_id, $critere->fonctionvehicule_id, $critere->minplace, $critere->maxplace]);
foreach ($datas as $key => $info) {
    $info->actualise();
    if (count($marques) > 0 && !in_array($info->vehicule->marque_id, $marques)) {
        unset($datas[$key]);
        continue;
    }
    $lots = $info->vehicule->fourni("location", ["etat_id ="=>Home\ETAT::ENCOURS, "finished >="=>$reservation->started]);
    if (count($lots) > 0) {
        unset($datas[$key]);
        continue;
    }
}

$liste = [];
foreach ($datas as $key => $value) {
    $liste[]= $value->vehicule_id;
}
$liste = join(",", $liste);

$requette = "SELECT * FROM vehicule WHERE etatvehicule_id = ? AND id NOT IN (?)";
$autres = Home\VEHICULE::execute($requette, [Home\ETATVEHICULE::LIBRE, $liste]);

$chauffeurs = Home\CHAUFFEUR::getAll();

?>


<div class="modal inmodal fade" id="modal-critere-<?= $reservation->id ?>" style="z-index: 99999999">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title text-danger">Critères pour la reservation</h4>
            <small class="font-bold">Renseigner ces champs pour terminer l'critere</small>
        </div>
        
        <form class="formReservation">
            <div class="row">
                <div class="col-md-8">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Les critères mentionnés</h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-md-6">
                                    <dl>
                                        <dt class="text-capitalize text-danger">Critère du véhicule <i class="fa fa-pencil pull-right cursor" data-toggle="modal" data-target="#modal-modifier-vehicule" onclick="modification('critere', <?= $critere->id ?>)"></i></dt><br>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><i>Type de véhicule :</i></td>
                                                    <td><?= $critere->typevehicule->name() ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Catégorie de véhicule :</i></td>
                                                    <td><?= $critere->fonctionvehicule->name() ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Marque(s) souhaitée(s) :</i></td>
                                                    <td><?php foreach ($items as $key => $value) {
                                                        echo $value->marque->name().", ";
                                                    } ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Nombre de places :</i></td>
                                                    <td><?= $critere->minplace ?> à <?= $critere->maxplace ?> places</td>
                                                </tr>
                                                <tr>
                                                    <td><i>Tr / Er:</i></td>
                                                    <td><?= $critere->transmission->name() ?> -- <?= $critere->energie->name() ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Climatisation</i></td>
                                                    <td>
                                                        <?php switch ($critere->climatisation) {
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
                                        <dt class="text-capitalize text-danger">Info de reservation <i class="fa fa-pencil pull-right cursor" data-toggle="modal" data-target="#modal-modifier-vehicule" onclick="modification('critere', <?= $critere->id ?>)"></i></dt><br>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><i>Durée de location :</i></td>
                                                    <td><?= datecourt($reservation->started) ?> <br> <?= datecourt($reservation->finished) ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Avec Chauffeur :</i></td>
                                                    <td>
                                                        <?php switch ($reservation->conducteur) {
                                                            case 0:
                                                            echo "Non";
                                                            break;
                                                            case 1:
                                                            echo "Oui";
                                                            break;
                                                        } ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </dl><hr>

                                    <dl>
                                        <dt class="text-capitalize text-danger">Tarif Appliqué <i class="fa fa-pencil pull-right cursor" data-toggle="modal" data-target="#modal-modifier-vehicule" onclick="modification('critere', <?= $critere->id ?>)"></i></dt><br>
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><i>Type de tarif :</i></td>
                                                    <td><?= $reservation->tarifvehicule->name() ?></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Forfait journalier :</i></td>
                                                    <td><b><?= money($reservation->tarifvehicule->prixJournalier) ?> <?= $params->devise  ?> / <?= money($reservation->tarifvehicule->kilometreJournalier) ?> Kms</b></td>
                                                </tr>
                                                <tr>
                                                    <td><i>Prix Km Supplém.</i></td>
                                                    <td><?= money($reservation->tarifvehicule->prixKilometreComplementaire) ?> <?= $params->devise  ?> / km</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </dl>
                                </div>

                            </div>

                            <table class="table table-hover table-mail">
                                <tbody>
                                    <?php foreach ($chauffeurs as $key => $chauffeur) { ?>
                                        <tr class="unread">
                                            <td class="check-mail">
                                                <input type="radio" class="i-checks" name="chauffeur_id" value="<?= $chauffeur->id ?>">
                                            </td>
                                            <td class="mail-ontact"><a href="mail_detail.html">Anna Smith</a></td>
                                            <td class="mail-subject"><a href="mail_detail.html">Lorem ipsum dolor noretek imit set.</a></td>
                                            <td class=""><i class="fa fa-paperclip"></i></td>
                                            <td class="text-right mail-date">6.10 AM</td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table><hr>

                            <div class="row">
                                <div class="col-md-4">
                                    <label>Zone de déplacement (si possible)</label>
                                    <input type="text" class="form-control" name="lieu">
                                </div>
                                <div class="col-md-5">
                                    <label>Etat global du véhicule</label>
                                    <textarea class="form-control" name="etatduvehicule" rows="4">Rien à signeler</textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>Kilométrage actuel</label>
                                    <input type="text" class="form-control" name="kilometrage">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="ibox"  style="background-color: #eee">
                        <div class="ibox-title" style="padding-right: 2%; padding-left: 3%; ">
                            <h5 class="text-uppercase">Véhicules possibles <small class="badge pull-right bg-red"><?= start0(count($datas)) ?></small></h5>
                        </div>
                        <div class="ibox-content scroll"  style="background-color: #eee; overflow-y: scroll; height: 550px">
                            <?php foreach ($datas as $key => $info) {
                                $vehicule = $info->vehicule;  ?>
                                <div class="vehicule">
                                    <div class="contact-box product-box">
                                        <label>
                                            <a class="row">
                                                <div class="col-4">
                                                    <div class="text-center">
                                                        <img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image1) ?>"><br>
                                                        <input type="radio" name="vehicule_id" class="i-checks cursor" value="<?= $vehicule->id  ?>" kilometrage="<?= $vehicule->kilometrage();  ?>">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                    <span>
                                                        <?= $vehicule->marque->name ?> <?= $vehicule->modele ?> 
                                                    </span><br>
                                                    <small><?= $info->transmission->name() ?> -- <?= $info->energie->name() ?></small><br>
                                                    <small><?= $info->nbPlaces ?> places</small>// <span><?= $info->fonctionvehicule->name() ?></span>
                                                </div>
                                            </a>
                                        </label>
                                    </div>
                                </div>
                                <?php } ?><br>

                                <h5 class="text-center gras text-uppercase text-muted">-- D'autres véhicules disponibles -- </h5>

                                <?php foreach ($autres as $key => $vehicule) {
                                    $vehicule->actualise();
                                    $tems = $vehicule->fourni("infovehicule");
                                    $info = $tems[0]; 
                                    if ($info->typevehicule_id == $critere->typevehicule_id) {
                                        $info->actualise(); ?>
                                        <div class="vehicule">
                                            <div class="contact-box product-box">
                                                <label>
                                                    <a class="row">
                                                        <div class="col-4">
                                                            <div class="text-center">
                                                                <img alt="image" style="height: 50px;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image1) ?>"><br>
                                                                <input type="radio" name="vehicule_id" class="i-checks cursor" value="<?= $vehicule->id  ?>" kilometrage="<?= $vehicule->kilometrage();  ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                            <span>
                                                                <?= $vehicule->marque->name ?> <?= $vehicule->modele ?> 
                                                            </span><br>
                                                            <small><?= $info->transmission->name() ?> -- <?= $info->energie->name() ?></small><br>
                                                            <small><?= $info->nbPlaces ?> places</small> // <span><?= $info->fonctionvehicule->name() ?></span>
                                                        </div>
                                                    </a>
                                                </label>
                                            </div>
                                        </div>
                                    <?php }
                                }  ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <input type="hidden" name="reservation_id" value="<?= $reservation->id ?>">
                    <button class="btn btn-danger dim"><i class="fa fa-check"></i> Commencer la location</button>
                </div>
            </form>

        </div>
    </div>
</div>


