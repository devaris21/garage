<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="">
                <div class="row">
                    <div class="col-md-8">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5 class="text-uppercase"><i class="fa fa-file-text"></i> Informations sur le ticket </h5>
                                <div class="ibox-tools">
                                    <button type="button" title="Affichage par bloc" onclick="filtrer()" class="btn btn-xs btn-white"><i class="fa fa-th-large"></i></button>
                                    <button type="button" title="Affichage en tableau" onclick="filtrer()" class="btn btn-xs btn-white"><i class="fa fa-th-list"></i></button>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <h2 class="text-uppercase gras mp0 text-blue">Ticket N°<?= $ticket->reference ?> <label class="small label label-<?= $ticket->etat->class ?>"><?= $ticket->etat->name() ?></label></h2>
                                        <span>par <i><?= $ticket->employe->name() ?></i></span><br>
                                        <small>Ouvert <?= depuis($ticket->created) ?></small><br><br>

                                        <label class="gras">Type de reparation </label><br>
                                        <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $value) {
                                            $value->actualise(); ?>
                                            <label class="label"><?= $value->typereparation->name()  ?></label>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="text-center" data-toggle="tooltip">
                                                    <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "clients", "default.png") ?>" class="img-thumbnail cursor" style="height: 70px;">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h4 class="gras text-navy" style="margin: 0"><strong><?= $ticket->client->name() ?></strong> 
                                                    <span  data-toggle=modal data-target="#modal-client" class="cursor pull-right" onclick="modification('ticket', <?= $ticket->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du client" class="fa fa-pencil fa-2x cursor"></i></span>
                                                </h4>
                                                <address>
                                                    <h5 style="margin-top: 6px;"><strong><?= $ticket->client->typeclient->name() ?></strong></h5>
                                                    <span><i class="fa fa-envelope"></i> <?= $ticket->client->email ?></span> <br>
                                                    <span><i class="fa fa-map-marker"></i> <?= $ticket->client->adresse ?></span> <br>
                                                    <span><i class="fa fa-phone"></i> <?= $ticket->client->contact ?></span>
                                                </address>
                                            </div>
                                        </div>

                                        <div>
                                            <label class="gras text-danger">Description de la panne (Client)</label><br>
                                            <p><?= $ticket->constat  ?></p>
                                        </div><br>
                                    </div>
                                </div>
                            </div>   
                        </div>


                        <div class="ibox">
                            <div class="ibox-title">
                                <h5 class="text-uppercase"><i class="fa fa-car"></i> Informations sur le véhicule</h5>
                                <div class="ibox-tools">
                                    <label class="label label-<?= $ticket->etatintervention->class ?>">Véhicule sous <?= $ticket->etatintervention->name() ?></label>
                                </div>
                            </div>
                            <div class="ibox-content">
                             <div class="row">
                                <div class="col-2">
                                    <div class="text-center" data-toggle="tooltip">
                                        <img class="cursor" data-toggle="modal" data-target="#modal-image" src="<?= $this->stockage("images", "vehicules", "default.jpg") ?>" class="img-thumbnail cursor" style="height: 70px;">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <h4 class="gras text-navy" style="margin: 0"><strong><?= $ticket->auto->immatriculation ?></strong> 
                                        <span  data-toggle=modal data-target="#modal-vehicule" class="cursor pull-right" onclick="modification('ticket', <?= $ticket->id ?>)"><i data-toggle='tooltip' title="Modiifer les infos du vehiucle" class="fa fa-2x fa-pencil cursor"></i></span>
                                    </h4>
                                    <address>
                                        <h5 style="margin-top: 6px;"><strong><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?></strong></h5>
                                        <h4 style="margin-top: 6px;">VIN: <strong><?= $ticket->auto->vin ?></strong></h4>
                                        <h5>Couleur <?= $ticket->auto->couleur ?></h5> <br>
                                    </address>
                                </div>
                                <div class="offset-sm-1 col-sm-5">
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
                            </div>
                            <div class="row">
                                <div class="col-sm-7">
                                    <label class="gras text-warning">Equipements presents sur le véhicule</label><br>
                                    <div class="row">
                                        <?php foreach ($ticket->fourni("listeequipementauto") as $key => $value) {
                                            $value->actualise(); ?>
                                            <div class="col-6">
                                                <label >- <?= $value->equipementauto->name()  ?> (<?= $value->quantite ?>)</label>
                                            </div>
                                        <?php } ?>
                                        <?php foreach ($ticket->fourni("listetypeenjoliveur") as $key => $value) {
                                            $value->actualise(); ?>
                                            <div class="col-6">
                                                <label >- Enjoliveur <i><?= $value->typeenjoliveur->name()  ?></i></label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <label class="gras text-warning">Autres remarques importantes</label><br>
                                    <p><?= $ticket->autreremarque  ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="ibox">
                      <div class="ibox-title">
                        <h5 class="text-uppercase"><i class="fa fa-history"></i> Historiques des évènements</h5>
                    </div>
                    <div class="ibox-content">
                        <div>
                            <div class="feed-activity-list bg-white">

                                <div class="feed-element">
                                    <a class="float-left" href="profile.html">
                                        <img alt="image" class="rounded-circle" src="<?= $this->stockage("images", "employes", $ticket->employe->image)  ?>">
                                    </a>
                                    <div class="media-body ">
                                        <strong>Ce ticket </strong> a été ouvert par <span class="text-muted"><i><?= $ticket->employe->name() ?></i></span>. <br>
                                        <small class="text-muted"><?= depuis($ticket->created) ?></small>
                                    </div>
                                </div>

                                <?php foreach ($ticket->fourni("essai", ["typeessai_id !="=>Home\TYPEESSAI::APRES]) as $key => $essai) {
                                    $essai->actualise(); ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img class="rounded-circle" src="<?= $this->stockage("images", "mecaniciens", $essai->mecanicien->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong><?= $essai->typeessai->name() ?></strong> effectué par <span class="text-muted"><i><?= $essai->mecanicien->name() ?></i></span>. <br>
                                            <small class="text-muted"><?= depuis($essai->created) ?></small>
                                            <div class="well mp0">
                                                <?php foreach ($essai->fourni("listeconstatessai") as $key => $value) { ?>
                                                    <i>- <?= $value->constat ?></i><br>
                                                <?php } ?>
                                            </div>
                                            <div class="float-right">
                                                <a href=""  class="btn btn-xs btn-white"><i class="fa fa-file-text-o"></i> Voir la fiche </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php foreach ($ticket->fourni("diagnostic") as $key => $diagnostic) {
                                    $diagnostic->actualise(); ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img class="rounded-circle" src="<?= $this->stockage("images", "mecaniciens", $diagnostic->mecanicien->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong>Diagnostic Technicien</strong> effectué par <span class="text-muted"><i><?= $diagnostic->mecanicien->name() ?></i></span>. <br>
                                            <small class="text-muted"><?= depuis($diagnostic->created) ?></small>
                                            <div class="well mp0">
                                                <b>Travail à effectuer</b><br>
                                                <?php foreach ($diagnostic->fourni("listeconstatdiagnostic") as $key => $value) { ?>
                                                    <i>- <?= $value->constat ?></i><br>
                                                    <?php } ?><br>

                                                    <b>Liste des pièces à utiliser</b><br>
                                                    <table class="table table-stripped">
                                                        <tbody>
                                                         <?php foreach ($diagnostic->fourni("listepiecediagnostic") as $key => $value) { ?>
                                                            <tr class="mp3">
                                                                <td><?= $value->piece ?></td>
                                                                <td>x <?= $value->quantite ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="float-right">
                                                <a href=""  class="btn btn-xs btn-white"><i class="fa fa-file-text-o"></i> Voir la fiche </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php $i=0; foreach ($ticket->fourni("devis") as $key => $devis) {
                                    $i++;
                                    $devis->actualise(); ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= $this->stockage("images", "mecaniciens", $devis->mecanicien->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong>Devis N°<?= $i ?></strong> édité par <span class="text-muted"><i><?= $devis->mecanicien->name() ?></i></span>. <br>
                                            <small class="text-muted"><?= depuis($devis->created) ?></small>
                                        </div>
                                        <div class="float-right">
                                            <a href=""  class="btn btn-xs btn-white"><i class="fa fa-file-text-o"></i> Voir le devis </a>
                                        </div>
                                    </div>
                                <?php } ?>


                                <?php foreach ($ticket->fourni("intervention") as $key => $intervention) {
                                    $intervention->actualise(); ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= $this->stockage("images", "mecaniciens", $intervention->mecanicien->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong>Intervention </strong> a effectuée par <span class="text-muted"><i><?= $intervention->mecanicien->name() ?></i></span>. <br>
                                            <small class="text-muted"><?= depuis($intervention->created) ?></small>
                                        </div>
                                    </div>
                                <?php } ?>


                                <?php foreach ($ticket->fourni("essai", ["typeessai_id ="=>Home\TYPEESSAI::APRES]) as $key => $essai) {
                                    $essai->actualise(); ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img class="rounded-circle" src="<?= $this->stockage("images", "mecaniciens", $essai->mecanicien->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong><?= $essai->typeessai->name() ?></strong> effectué par <span class="text-muted"><i><?= $essai->mecanicien->name() ?></i></span>. <br>
                                            <small class="text-muted"><?= depuis($essai->created) ?></small>
                                            <div class="well mp0">
                                                <?php foreach ($essai->fourni("listeconstatessai") as $key => $value) { ?>
                                                    <i>- <?= $value->constat ?></i><br>
                                                <?php } ?>
                                            </div>
                                            <div class="float-right">
                                                <a href=""  class="btn btn-xs btn-white"><i class="fa fa-file-text-o"></i> Voir la fiche </a>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>

                                <?php foreach ($ticket->fourni("lavage") as $key => $lavage) {
                                    $lavage->actualise(); ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= $this->stockage("images", "mecaniciens", $lavage->mecanicien->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong>lavage </strong> a effectuée par <span class="text-muted"><i><?= $lavage->mecanicien->name() ?></i></span>. <br>
                                            <small class="text-muted"><?= depuis($lavage->created) ?></small>
                                        </div>
                                    </div>
                                <?php } ?>


                                <?php if ($ticket->etat_id != Home\ETAT::ENCOURS) { ?>
                                    <div class="feed-element">
                                        <a class="float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?= $this->stockage("images", "employes", $ticket->employe->image)  ?>">
                                        </a>
                                        <div class="media-body ">
                                            <strong>Ce ticket </strong> a été <label class="label label-<?= $ticket->etat->class ?>"><?= $ticket->etat->name() ?></label> <br>
                                            <small class="text-muted"><?= depuis($ticket->modified) ?></small>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>

        </div>
    </div>

    <br><br>


    <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>



    <?php //include($this->rootPath("composants/assets/modals/modal-cartegrise.php")); ?> 


</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQTpXj82d8UpCi97wzo_nKXL7nYrd4G70"></script>


</body>

</html>