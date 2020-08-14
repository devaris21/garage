<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper wrapper-content animated fadeInRight article">

           <div class="row justify-content-md-center">
            <div class="col-lg-10">
                <div class="ibox"  >
                    <div class="ibox-content" >
                     <div>
                      <div class="row">
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="col-3">
                                    <img style="width: 120%" src="<?= $this->stockage("images", "societe", $params->image) ?>">
                                </div>
                                <div class="col-9">
                                    <h5 class="gras text-uppercase text-orange"><?= $params->societe ?></h5>
                                    <h5 class="mp0"><?= $params->adresse ?></h5>
                                    <h5 class="mp0"><?= $params->postale ?></h5>
                                    <h5 class="mp0">Tél: <?= $params->contact ?></h5>
                                    <h5 class="mp0">Email: <?= $params->email ?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 text-right">
                            <h2 class="text-uppercase text-blue gras" style="font-size: 250%">Devis / Proforma</h2>
                            <h3 class="text-uppercase">N°<?= $reservation->reference  ?></h3>
                            <h5><?= datelong($reservation->created)  ?></h5>  
                            <h4><small>Bon édité par :</small> <span class="text-uppercase"><?= $reservation->employe->name() ?></span></h4>                               
                        </div>
                    </div><hr><br><br>

                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <h3 class="m-b-xs text-uppercase"><strong>Informations sur le client</strong></h3>
                            <h4 class="m-b-xs"><?= $reservation->client->name() ?></h4>
                            <div class="font-bold"><?= $reservation->client->typeclient->name() ?></div>
                            <address class="">
                                <strong><?= $reservation->client->adresse ?></strong><br>
                                <strong><?= $reservation->client->typepiece->name() ?> <?= $reservation->client->numero ?></strong><br>
                                <strong><?= $reservation->client->contact ?></strong><br>
                                <?= $reservation->client->email ?>
                            </address>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="mp3 border text-center" style="padding-top: 3%">
                                <h3 class="m-b-xs text-uppercase text-blue"><strong><?= $tarif->name() ?></strong></h3>
                                <h2 class="d-inline gras text-blue"><?= money($tarif->prixJournalier) ?> </h2>
                                <span><?= $params->devise  ?> / Jour</span>
                                <address class="m-t-md">
                                    <strong class="text-blue">Forfait de <?= $tarif->kilometreJournalier ?> Kms par Jour</strong><br>
                                    <?= money($tarif->prixKilometreComplementaire) ?> <?= $params->devise  ?> / Km supplémentaire 
                                </address>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <h3 class="m-b-xs text-uppercase"><strong>Informations de location</strong></h3><br>
                            <span>Du <?= datecourt($reservation->started) ?></span><br>
                            <span>au <?= datecourt($reservation->finished) ?> inclus (<?= dateDiffe($reservation->started, $reservation->finished) ?> jours)</span><br>
                            <div>Lieu : <?= $reservation->lieu ?></div>
                        </div>
                    </div><hr><br><br>



                    <h3 class="gras text-uppercase italic text-blue">Critères de véhicule pour la location</h3>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <td class="gras"><i>Type de véhicule :</i></td>
                                <td><?= $critere->typevehicule->name() ?></td>
                                <td class="gras"><i>Catégorie de véhicule :</i></td>
                                <td><?= $critere->fonctionvehicule->name() ?></td>
                            </tr>
                            <tr>
                                <td class="gras"><i>Marque(s) souhaitée(s) :</i></td>
                                <td colspan="3"><?php foreach ($marques as $key => $value) {
                                    echo $value->marque->name().", ";
                                } ?></td>
                            </tr>
                            <tr>
                                <td class="gras"><i>Transmission / Energie:</i></td>
                                <td><?= $critere->transmission->name() ?> -- <?= $critere->energie->name() ?></td>
                            </tr>
                            <tr>
                                <td class="gras"><i>Nombre de places :</i></td>
                                <td><?= $critere->minplace ?> à <?= $critere->maxplace ?> places</td>
                                <td class="gras"><i>Climatisation</i></td>
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
                    </table><br>

                    <br>



                    <div class="social-feed-box">
                        <div class="social-body border-bottom" style="border-color: blue !important;">
                            <p class="text-justify" style="font-size: 14px; line-height: 24px">Je soussigné(e), moi, <b><?= $reservation->client->name() ?></b> être d'accord avec les conditions de location du véhicule aux caractéristiques mentionnéees ci-dessus. Je m'engage à restituer le vehicule dans l'état initial et ce, le jour indiqué sur le contrat et à l'adresse qui m'a été indiqué après la location. Dans le cas contraire, je devrais payer dans l'immédiat les frais engendrés et de ceux prévus dans les clauses du contrat de reservation qui m'a été remis. Je m'engage également à payer entièrement la totalité du montant dû à cette reservation dans les délais m'ont également été indiqué !</p>
                        </div>
                    </div>

                    <br><br>
                    <br><br>
                    <div class="row">
                        <div class="col-8">
                            <div class="row text-center">
                                <div class="col-sm-5">
                                    <div class=" m-l-md text-dark">
                                        <span>Montant total location</span>
                                        <span class="h3 font-bold block"><?= money($reservation->montant) ?> <small><?= $params->devise ?></small></span>
                                    </div>
                                </div>
                                <div class="col-sm-7 border-left">
                                    <p style="font-size: 14px; line-height: 24px; font-style: italic;">Une avance de <b>80% du montant</b> de la location doit être versé avant que le vehicule ne vous soit remis !</p>
                                </div>
                            </div><hr>
                        </div>
                        <div class="col-4">
                            <div class="text-right">
                                <span><u>Signature du client</u></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</div>


</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>


</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
