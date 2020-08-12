<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="wrapper wrapper-content">
             <div class="row">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="text-uppercase">Chiffre d'affaire</h5>
                                    <h2 class="no-margins"><?= money(Home\TRESORERIE::chiffreAffaire($date1, $date2))  ?> </h2>
                                </div>
                                <div class="col-5 text-right">
                                    <i class="fa fa-dollar fa-5x" style="color: #ddd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="text-uppercase">Résultat brut</h5>
                                    <h2 class="no-margins"><?= money($comptebanque->getIn($date1, $date2) - $comptebanque->getOut($date1, $date2)) ?></h2>
                                </div>
                                <div class="col-5 text-right">
                                    <i class="fa fa-money fa-5x" style="color: #ddd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content bg-navy">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="text-uppercase">Dette clientèle</h5>
                                    <h2 class="no-margins"><?= money(Home\CLIENT::dettes()) ?></h2>
                                </div>
                                <div class="col-5 text-right">
                                    <i class="fa fa-users fa-5x" style="color: #ddd"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-content">
                            <div class="row">
                                <div class="col-7">
                                    <h5 class="text-uppercase">Dette Fournisseur</h5>
                                    <h2 class="no-margins"><?= money(Home\FOURNISSEUR::dettes()) ?></h2>
                                </div>
                                <div class="col-5 text-right">
                                    <i class="fa fa-truck fa-5x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                           <h5 class="float-left">Du <?= datecourt($date1) ?> au <?= datecourt($date2) ?></h5>
                           <div class="float-right">
                            <form id="formFiltrer" method="POST">
                                <div class="row" style="margin-top: -1%">
                                    <div class="col-5">
                                        <input type="date" value="<?= $date1 ?>" class="form-control input-sm" name="date1">
                                    </div>
                                    <div class="col-5">
                                        <input type="date" value="<?= $date2 ?>" class="form-control input-sm" name="date2">
                                    </div>
                                    <div class="col-2">
                                        <button type="button" onclick="filtrer()" class="btn btn-sm btn-white"><i class="fa fa-search"></i> Filtrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="flot-chart">
                                    <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                </div><br>
                                <div class="row stat-list text-center">
                                    <div class="col-4 ">
                                        <h3 class="no-margins text-green"><?= money($comptebanque->getIn(dateAjoute(), dateAjoute(1))) ?> <small><?= $params->devise ?></small></h3>
                                        <small>Entrées du jour</small>
                                    </div>
                                    <div class="col-4 border-left border-right">
                                        <h2 class="no-margins gras"><?= money(Home\OPERATION::resultat(Home\PARAMS::DATE_DEFAULT , dateAjoute())) ?> <small><?= $params->devise ?></small></h2>
                                        <small>En caisse actuellement</small>
                                    </div>
                                    <div class="col-4">
                                        <h3 class="no-margins text-red"><?= money($comptebanque->getOut(dateAjoute(), dateAjoute(1))) ?> <small><?= $params->devise ?></small></h3>
                                        <small>Dépenses du jour</small>
                                    </div>
                                </div><hr>
                                <div class="row" style="font-size: 10px">
                                    <div class="col-sm">
                                        <button data-toggle="modal" data-target="#modal-entree" class="btn btn-xs btn-primary dim"><i class="fa fa-check"></i> Nouvelle entrée</button>
                                    </div>
                                    <div class="col-sm text-center">
                                        <button data-toggle="modal" data-target="#modal-depense" class="btn btn-xs btn-danger dim"><i class="fa fa-check"></i> Nouvelle dépense</button>
                                    </div>
                                    <div class="col-sm text-center">
                                        <button data-toggle="modal" data-target="#modal-attente" class="btn btn-xs btn-success dim" ><i class="fa fa-eye"></i> Voir les versemments en attente</button>
                                    </div>
                                    <div class="col-sm">
                                        <button data-toggle="modal" data-target="#modal-entree" class="btn btn-xs btn-primary dim pull-right"><i class="fa fa-check"></i> Transferts de caisse</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <ul class="stat-list">
                                    <li>
                                        <h2 class="no-margins"><?= money(Home\REGLEMENTCLIENT::total($date1 , $date2, $agence->id)) ?> <small><?= $params->devise ?></small></h2>
                                        <small>Total reglements clients</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 48%;" class="progress-bar"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <h2 class="no-margins "><?= money(Home\OPERATION::entree($date1 , $date2, $agence->id)) ?> <small><?= $params->devise ?></small></h2>
                                        <small>Autres entrées en caisse</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 60%;" class="progress-bar"></div>
                                        </div>
                                    </li><br>
                                    <li>
                                        <h2 class="no-margins text-danger "><?= money($comptebanque->getOut(dateAjoute(), dateAjoute(1))) ?> <small><?= $params->devise ?></small></h2>
                                        <small>Total Charges de fonctionnement</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar progress-bar-animated progress-bar-danger"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h3 class="no-margins text-danger "><?= money(0) ?> <small><?= $params->devise ?></small></h3>
                                                <small>Paye </small>
                                                <div class="progress progress-mini">
                                                    <div style="width: 22%;" class="progress-bar progress-bar-animated progress-bar-danger"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h3 class="no-margins text-danger "><?= money(Home\REGLEMENTFOURNISSEUR::total($date1 , $date2, $agence->id)) ?> <small><?= $params->devise ?></small></h3>
                                                <small>Fourniture</small>
                                                <div class="progress progress-mini">
                                                    <div style="width: 22%;" class="progress-bar progress-bar-animated progress-bar-danger"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </li><br>
                                    <li>
                                        <h2 class="no-margins text-warning">9,180</h2>
                                        <small>Transferts vers autre compte</small>
                                        <div class="progress progress-mini">
                                            <div style="width: 22%;" class="progress-bar progress-bar-animated progress-bar-warning"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>



        <div class="row">

            <div class="col-lg-12">
                <div class="ibox ">
                    <div class="ibox-title">
                        <h5 class="text-uppercase">Tableau des compte</h5>
                        <div class="ibox-tools">
                            <div data-toggle="buttons" class="btn-group btn-group-toggle">
                                <label jour="-7" class="btn btn-sm btn-white active"><i class="fa fa-calendar"></i> Semaine </label>
                                <label jour="-30" class="btn btn-sm btn-white"><i class="fa fa-calendar"></i> Mois </label>
                                <label jour="-90" class="btn btn-sm btn-white"><i class="fa fa-calendar"></i> Trimestre </label>
                                <label jour="-360" class="btn btn-sm btn-white"><i class="fa fa-calendar"></i> Année </label>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-operation">
                                        <thead>
                                            <tr class="text-center text-uppercase">
                                                <th colspan="2" style="visibility: hidden; width: 65%"></th>
                                                <th>Entrée</th>
                                                <th>Sortie</th>
                                                <th>Résultats</th>
                                            </tr>
                                        </thead>
                                        <tbody class="tableau">
                                            <tr>
                                                <td colspan="2">Repport du solde de la veille (<?= datecourt(dateAjoute(-8)) ?>) </td>
                                                <td class="text-center">-</td>
                                                <td class="text-center">-</td>
                                                <td style="background-color: #fafafa" class="text-center"><?= money($repport = $last = Home\OPERATION::resultat(Home\PARAMS::DATE_DEFAULT , dateAjoute(-8))) ?> <?= $params->devise ?></td>
                                            </tr>
                                            <?php foreach ($operations as $key => $operation) {  ?>
                                                <tr>
                                                    <td class="text-center" style="background-color: rgba(<?= hex2rgb($operation->categorieoperation->color) ?>, 0.6);" width="15"><a target="_blank" href="<?= $this->url("gestion", "fiches", "boncaisse", $operation->getId())  ?>"><i class="fa fa-file-text-o fa-2x"></i></a> 
                                                    </td>
                                                    <td>
                                                        <h6 style="margin-bottom: 3px" class="mp0 text-uppercase gras <?= ($operation->categorieoperation->typeoperationcaisse_id == Home\TYPEOPERATIONCAISSE::ENTREE)?"text-green":"text-red" ?>"><?= $operation->categorieoperation->name() ?>  

                                                        <?php if ($employe->isAutoriser("modifier-supprimer")) { ?>
                                                            |
                                                            &nbsp;&nbsp;<i onclick="modifierOperation(<?= $operation->getId() ?>)" class="cursor fa fa-pencil text-dark"></i> 
                                                            &nbsp;&nbsp;<i class="cursor fa fa-close text-red" onclick="suppressionWithPassword('operation', <?= $operation->getId() ?>)"></i>
                                                        <?php } ?>

                                                        <span class="pull-right"><i class="fa fa-clock-o"></i> <?= datelong($operation->created) ?></span>
                                                    </h6>
                                                    <i><?= $operation->comment ?> ## <u style="font-size: 9px; font-style: italic;"><?= $operation->structure ?> - <?= $operation->numero ?></u></i>
                                                </td>
                                           <!--  <td width="110" class="text-center" style="padding: 0; border-right: 2px dashed grey">
                                             <?php if ($operation->etat_id == Home\ETAT::ENCOURS) { ?>
                                                 <button style="padding: 2px 6px;" onclick="valider(<?= $operation->getId() ?>)" class="cursor simple_tag"><i class="fa fa-file-text-o"></i> Valider</button><span style="display: none">en attente</span>
                                             <?php } ?>
                                             <br><small style="display: inline-block; font-style: 8px; line-height: 12px;"><?= $operation->structure ?> - <?= $operation->numero ?></small>
                                         </td> -->
                                         <?php if ($operation->categorieoperation->typeoperationcaisse_id == Home\TYPEOPERATIONCAISSE::ENTREE) { ?>
                                            <td class="text-center text-green gras" style="padding-top: 12px;">
                                                <?= money($operation->montant) ?> <?= $params->devise ?>
                                            </td>
                                            <td class="text-center"> - </td>
                                        <?php }elseif ($operation->categorieoperation->typeoperationcaisse_id == Home\TYPEOPERATIONCAISSE::SORTIE) { ?>
                                            <td class="text-center"> - </td>
                                            <td class="text-center text-red gras" style="padding-top: 12px;">
                                                <?= money($operation->montant) ?> <?= $params->devise ?>
                                            </td>
                                        <?php } ?>
                                        <?php $last += ($operation->categorieoperation->typeoperationcaisse_id == Home\TYPEOPERATIONCAISSE::ENTREE)? $operation->montant : -$operation->montant ; ?>
                                        <td class="text-center gras" style="padding-top: 12px; background-color: #fafafa"><?= money($last) ?> <?= $params->devise ?></td>
                                    </tr>
                                <?php } ?>
                                <tr style="height: 15px;"></tr>
                                <tr>
                                    <td style="border-right: 2px dashed grey" colspan="2"><h4 class="text-uppercase mp0 text-right">Total des comptes au <?= datecourt(dateAjoute()) ?></h4></td>
                                    <td><h3 class="text-center text-green"><?= money(comptage($entrees, "montant", "somme") + $repport) ?> <?= $params->devise ?></h3></td>
                                    <td><h3 class="text-center text-red"><?= money(comptage($depenses, "montant", "somme")) ?> <?= $params->devise ?></h3></td>
                                    <td style="background-color: #fafafa"><h3 class="text-center text-blue gras"><?= money($last) ?> <?= $params->devise ?></h3></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>

</div>


</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

<?php include($this->rootPath("composants/assets/modals/modal-entree.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-depense.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-operation.php")); ?>  

</div>
</div>


<div class="modal inmodal fade" id="modal-attente">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Liste des versements en attentes</h4>
                <div class="offset-md-4 col-md-4">
                   <input type="text" id="search" class="form-control text-center" placeholder="Rechercher un versements"> 
               </div>
           </div>
           <div class="modal-body">
            <table class="table table-bordered table-hover table-operation">
                <tbody class="tableau-attente">
                    <?php foreach (Home\OPERATION::enAttente() as $key => $operation) {
                        $operation->actualise(); ?>
                        <tr>
                            <td style="background-color: rgba(<?= hex2rgb($operation->categorieoperation->color) ?>, 0.6);" width="15"><a target="_blank" href="<?= $this->url("gestion", "fiches", "boncaisse", $operation->getId())  ?>"><i class="fa fa-file-text-o fa-2x"></i></a></td>
                            <td>
                                <h6 style="margin-bottom: 3px" class="mp0 text-uppercase gras <?= ($operation->categorieoperation->typeoperationcaisse_id == Home\TYPEOPERATIONCAISSE::ENTREE)?"text-green":"text-red" ?>"><?= $operation->categorieoperation->name() ?> <span><?= ($operation->etat_id == Home\ETAT::ENCOURS)?"*":"" ?></span> <span class="pull-right"><i class="fa fa-clock-o"></i> <?= datelong($operation->created) ?></span></h6>
                                <i><?= $operation->comment ?></i>
                            </td>
                            <td class="text-center gras" style="padding-top: 12px;">
                                <?= money($operation->montant) ?> <?= $params->devise ?>
                            </td>
                            <td width="110" class="text-center" >
                                <small><?= $operation->structure ?></small><br>
                                <small><?= $operation->numero ?></small>
                            </td>
                            <td class="text-center">
                                <button onclick="valider(<?= $operation->getId() ?>)" class="cursor simple_tag"><i class="fa fa-file-text-o"></i> Valider</button><span style="display: none">en attente</span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div><hr><br>
    </div>
</div>
</div>



<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript">
    $(document).ready(function() {
        var lineData = {
            labels: [<?php foreach ($statistiques as $key => $data) { ?>"<?= $data->name ?>", <?php } ?>],
            datasets: [
            {
                label: "Entrées",
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [<?php foreach ($statistiques as $key => $data) { ?>"<?= $data->entree ?>", <?php } ?>]
            },
            {
                label: "Dépenses",
                borderColor: "rgba(220,0,0,1)",
                pointBackgroundColor: "rgba(220,0,0,1)",
                pointBorderColor: "#fff",
                data: [<?php foreach ($statistiques as $key => $data) { ?>"<?= $data->sortie ?>", <?php } ?>]
            }
            ]
        };

        var lineOptions = {
            responsive: true
        };

        var ctx = document.getElementById("lineChart").getContext("2d");
        new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});



        var data2 = [
        [gd(2012, 1, 1), 7], [gd(2012, 1, 2), 6], [gd(2012, 1, 3), 4], [gd(2012, 1, 4), 8],
        [gd(2012, 1, 5), 9], [gd(2012, 1, 6), 7], [gd(2012, 1, 7), 5], [gd(2012, 1, 8), 4],
        [gd(2012, 1, 9), 7], [gd(2012, 1, 10), 8], [gd(2012, 1, 11), 9], [gd(2012, 1, 12), 6],
        [gd(2012, 1, 13), 4], [gd(2012, 1, 14), 5], [gd(2012, 1, 15), 11], [gd(2012, 1, 16), 8],
        [gd(2012, 1, 17), 8], [gd(2012, 1, 18), 11], [gd(2012, 1, 19), 11], [gd(2012, 1, 20), 6],
        [gd(2012, 1, 21), 6], [gd(2012, 1, 22), 8], [gd(2012, 1, 23), 11], [gd(2012, 1, 24), 13],
        [gd(2012, 1, 25), 7], [gd(2012, 1, 26), 9], [gd(2012, 1, 27), 9], [gd(2012, 1, 28), 8],
        [gd(2012, 1, 29), 5], [gd(2012, 1, 30), 8], [gd(2012, 1, 31), 25]
        ];

        var data3 = [
        [gd(2012, 1, 1), 800], [gd(2012, 1, 2), 500], [gd(2012, 1, 3), 600], [gd(2012, 1, 4), 700],
        [gd(2012, 1, 5), 500], [gd(2012, 1, 6), 456], [gd(2012, 1, 7), 800], [gd(2012, 1, 8), 589],
        [gd(2012, 1, 9), 467], [gd(2012, 1, 10), 876], [gd(2012, 1, 11), 689], [gd(2012, 1, 12), 700],
        [gd(2012, 1, 13), 500], [gd(2012, 1, 14), 600], [gd(2012, 1, 15), 700], [gd(2012, 1, 16), 786],
        [gd(2012, 1, 17), 345], [gd(2012, 1, 18), 888], [gd(2012, 1, 19), 888], [gd(2012, 1, 20), 888],
        [gd(2012, 1, 21), 987], [gd(2012, 1, 22), 444], [gd(2012, 1, 23), 999], [gd(2012, 1, 24), 567],
        [gd(2012, 1, 25), 786], [gd(2012, 1, 26), 666], [gd(2012, 1, 27), 888], [gd(2012, 1, 28), 900],
        [gd(2012, 1, 29), 178], [gd(2012, 1, 30), 555], [gd(2012, 1, 31), 993]
        ];


        var dataset = [
        {
            label: "Number of orders",
            data: data3,
            color: "#1ab394",
            bars: {
                show: true,
                align: "center",
                barWidth: 24 * 60 * 60 * 600,
                lineWidth:0
            }

        }, {
            label: "Payments",
            data: data2,
            yaxis: 2,
            color: "#1C84C6",
            lines: {
                lineWidth:1,
                show: true,
                fill: true,
                fillColor: {
                    colors: [{
                        opacity: 0.2
                    }, {
                        opacity: 0.4
                    }]
                }
            },
            splines: {
                show: false,
                tension: 0.6,
                lineWidth: 1,
                fill: 0.1
            },
        }
        ];


        var options = {
            xaxis: {
                mode: "time",
                tickSize: [3, "day"],
                tickLength: 0,
                axisLabel: "Date",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Arial',
                axisLabelPadding: 10,
                color: "#d5d5d5"
            },
            yaxes: [{
                position: "left",
                max: 1070,
                color: "#d5d5d5",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: 'Arial',
                axisLabelPadding: 3
            }, {
                position: "right",
                clolor: "#d5d5d5",
                axisLabelUseCanvas: true,
                axisLabelFontSizePixels: 12,
                axisLabelFontFamily: ' Arial',
                axisLabelPadding: 67
            }
            ],
            legend: {
                noColumns: 1,
                labelBoxBorderColor: "#000000",
                position: "nw"
            },
            grid: {
                hoverable: false,
                borderWidth: 0
            }
        };

        function gd(year, month, day) {
            return new Date(year, month - 1, day).getTime();
        }

        var previousPoint = null, previousLabel = null;

        $.plot($("#flot-dashboard-chart"), dataset, options);

    });
</script>


</body>

</html>
