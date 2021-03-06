<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-7">
                <h1 class="text-uppercase gras">Les comptes de la caisse courante</h1>
                <span>Du <?= datecourt($date1) ?> au <?= datecourt($date2) ?></span>
            </div>
            <div class="col-sm-5">
                <form id="formFiltrer" method="POST" style="margin-top: 7%">
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


        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-md-3">
                   <!--  <div class="ibox ">
                        <div class="ibox-title border">
                            <span class="label label-success float-right">An</span>
                            <h5 class="d-inline text-uppercase">Chif. affaire</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?= money(Home\COMMANDE::CA(date("Y")."-01-01" , dateAjoute())) ?></h1>
                            <div class="stat-percent font-bold text-warning"><?= money(Home\CLIENT::dettes()) ?></div>
                            <small>Dette des clients</small>
                        </div>
                    </div> -->
                </div>
                <div class="col-md-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 class="text-uppercase text-green">Recettes</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins text-green"><?= money($comptecourant->depots($date1 , $date2)) ?></h1>
                            <div class="stat-percent font-bold text-green"><?= money(Home\REGLEMENTCLIENT::total($date1 , $date2)) ?></div>
                            <small>Reglements de clients</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 class="text-uppercase text-red">Dépenses</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins text-red"><?= money($comptecourant->retraits($date1 , $date2)) ?></h1>
                            <div class="stat-percent font-bold text-red"><?= money(Home\REGLEMENTFOURNISSEUR::total($date1 , $date2) + Home\LIGNEPAYEMENT::total($date1 , $date2)) ?></div>
                            <small>Approvisionnement + Paye</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5 class="text-uppercase">Résultats</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins"><?= money($comptecourant->solde($date1 , $date2)) ?></h1>
                            <div class="stat-percent font-bold text-info"></div>
                            <small>...</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="m-t-sm">
                                <div class="border-right">
                                    <div>
                                        <canvas id="lineChart" height="110"></canvas>
                                    </div>
                                </div><hr>
                                <div class="row stat-list text-center">
                                    <div class="col-4">
                                       <h3 class="no-margins text-green"><?= money($comptecourant->depots(dateAjoute() , dateAjoute(+1))) ?> <?= $params->devise ?> </h3>
                                       <small>Recette totale du jour</small>

                                       <div class="progress progress-mini" style="margin-top: 5%;">
                                        <div class="progress-bar" style="width: 100%; background-color: #dedede"></div>
                                    </div><br>

                                    <div class="cursor" data-toggle="modal" data-target="#modal-attente">
                                        <h3 class="no-margins text-blue"><?= money(comptage(Home\OPERATION::enAttente(), "montant", "somme")) ?> <?= $params->devise ?> *</h3>
                                        <small>Versement en attente</small>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <br>
                                    <h2 class="no-margins gras"><?= money($comptecourant->solde(null , dateAjoute())) ?> <small><?= $params->devise ?></small></h2>
                                    <small>En caisse actuellement</small>
                                    <div class="progress progress-mini">
                                        <div class="progress-bar" style="width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h3 class="no-margins text-red"><?= money($comptecourant->retraits(dateAjoute() , dateAjoute(+1))) ?> <?= $params->devise ?> </h3>
                                    <small>Dépenses totales du jour</small>

                                    <div class="progress progress-mini" style="margin-top: 5%;">
                                        <div class="progress-bar" style="width: 100%; background-color: #dedede"></div>
                                    </div><br>

                                    
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5 class="text-uppercase">Solde des 3 derniers jours</h5>
                    </div>
                    <?php $i = -2;  while ($i <= 0) {
                        $datea = dateAjoute($i-1);
                        $dateb = dateAjoute($i);
                        $ouv = $comptecourant->solde(null , $datea);
                        $ferm = $comptecourant->solde(null , $dateb);

                        $taux = 0;
                        if ($ouv > 0) {
                         $taux = (($ferm - $ouv) / $ouv);
                     }
                     ?>
                     <div class="ibox-content text-center">
                        <div class="row">
                            <div class="col-4">
                                <small class="stats-label">Ouverture <?= datecourt2($dateb)  ?></small>
                                <h4><?= money($ouv) ?> <small><?= $params->devise ?></small></h4>
                            </div>
                            <div class="col-4">
                                <small class="stats-label ">Progession</small>
                                <h4 class="text-<?= ($taux > 0)?"green":"red"  ?>"><?= round(($taux * 100), 2) ?>%</h4>
                            </div>
                            <div class="col-4">
                                <small class="stats-label">Cloture <?= datecourt2($dateb)  ?></small>
                                <h4><?= money($ferm) ?> <small><?= $params->devise ?></small></h4>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                } ?>

                <div class="ibox-content" style="padding-bottom: 0;">
                    <button data-toggle="modal" data-target="#modal-entree" class="btn btn-sm btn-primary dim" style="font-size: 10px"><i class="fa fa-check"></i> Nouvelle entrée</button>
                    <button data-toggle="modal" data-target="#modal-depense" class="btn btn-sm btn-danger dim pull-right" style="font-size: 10px"><i class="fa fa-check"></i> Nouvelle dépense</button><hr class="mp3">

                    <button data-toggle="modal" data-target="#modal-attente" class="btn btn-sm btn-success dim btn-block" ><i class="fa fa-eye"></i> Voir les versemments en attente</button>
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
                                            <td colspan="2">Repport du solde (<?= datecourt($date1) ?>) </td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td style="background-color: #fafafa" class="text-center"><?= money($repport = $last = $comptecourant->solde(null , dateAjoute1($date1, -1))) ?> <?= $params->devise ?></td>
                                        </tr>
                                        <?php foreach ($tableau as $key => $operation) {  ?>
                                            <tr>
                                                <td class="text-center" style="background-color: rgba(<?= hex2rgb($operation->categorieoperation->color) ?>, 0.6);" width="15"><a target="_blank" href="<?= $this->url("gestion", $operation->fiche, "boncaisse", $operation->getId())  ?>"><i class="fa fa-file-text-o fa-2x"></i></a> 
                                                </td>
                                                <td>
                                                    <h6 style="margin-bottom: 3px" class="mp0 text-uppercase gras <?= ($operation->mouvement->typemouvement_id == Home\TYPEMOUVEMENT::DEPOT)?"text-green":"text-red" ?>"><?= $operation->type ?>  

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
                                         <?php if ($operation->mouvement->typemouvement_id == Home\TYPEMOUVEMENT::DEPOT) { ?>
                                            <td class="text-center text-green gras" style="padding-top: 12px;">
                                                <?= money($operation->mouvement->montant) ?> <?= $params->devise ?>
                                            </td>
                                            <td class="text-center"> - </td>
                                        <?php }elseif ($operation->mouvement->typemouvement_id == Home\TYPEMOUVEMENT::RETRAIT) { ?>
                                            <td class="text-center"> - </td>
                                            <td class="text-center text-red gras" style="padding-top: 12px;">
                                                <?= money($operation->mouvement->montant) ?> <?= $params->devise ?>
                                            </td>
                                        <?php } ?>
                                        <?php $last += ($operation->mouvement->typemouvement_id == Home\TYPEMOUVEMENT::DEPOT)? $operation->mouvement->montant : -$operation->mouvement->montant ; ?>
                                        <td class="text-center gras" style="padding-top: 12px; background-color: #fafafa"><?= money($last) ?> <?= $params->devise ?></td>
                                    </tr>
                                <?php } ?>
                                <tr style="height: 15px;"></tr>
                                <tr>
                                    <td style="border-right: 2px dashed grey" colspan="2"><h4 class="text-uppercase mp0 text-right">Total des comptes au <?= datecourt(dateAjoute()) ?></h4></td>
                                    <td><h3 class="text-center text-green"><?= money($entrees + $repport) ?> <?= $params->devise ?></h3></td>
                                    <td><h3 class="text-center text-red"><?= money($depenses) ?> <?= $params->devise ?></h3></td>
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
    });
</script>


</body>

</html>
