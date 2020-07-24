<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-6">
                <h3 class="text-uppercase gras">Planning de travail</h3>
            </div>
        </div>



        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-12">
                <ul class="sortable-list connectList agile-list row" id="attente" data-id="attente">
                    <?php foreach ($tickets as $key => $ticket) {
                        $ticket->actualise();
                        $etatsuivant = $ticket->etatSuivant(); ?>
                        <div class="col-md-3 elements" id="ticket-<?= $ticket->id ?>" data-id="<?= $ticket->id ?>">
                            <li class="<?= $ticket->etatintervention->class ?>-element" >
                                <span class="pull-right" title="<?= depuis($ticket->created) ?>"><i class="fa fa-clock-o"></i></span>
                                <h5 class="mp0 text-uppercase" style="margin-bottom: 3px;"><i class=" fa fa-car"></i> <?= $ticket->auto->immatriculation ?></h5>
                                <span><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?> // <?= $ticket->auto->couleur ?></span><br>
                                <div class="hoverable">
                                    <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $type) {
                                        $type->actualise(); ?>
                                        <label class="label small"><?= $type->typereparation->name()  ?></label>
                                    <?php } ?>
                                </div> <hr class="mp3">
                                <p class="mp0">
                                    <span class="text-<?= $ticket->etatintervention->class ?>">Prêt pour : <b><?= $etatsuivant->name() ?></b></span> 
                                </p>
                            </li>
                        </div>                        
                    <?php } ?>
                </ul>
            </div>
        </div>



        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">
                <div class="row">
                    <div class="col-md-12">
                        <div class="ibox">
                            <div class="tabs-container">
                                <ul class="nav nav-tabs text-uppercase" role="tablist">
                                    <?php foreach ($groupes as $key => $value) { ?>
                                        <li><a class="nav-link" data-toggle="tab" href="#tab-<?= $value->id ?>"><i class="fa fa-users"></i> <?= $value->name() ?></a></li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content" id="produits">
                                    <?php foreach ($groupes as $key => $value) {
                                        $datas = $value->fourni("mecanicien"); ?>
                                        <div role="tabpanel" id="tab-<?= $value->id ?>" class="tab-pane"><br>
                                            <div class="panel-body">
                                                <div class="scroll" style="width: inherit; overflow-x: scroll; padding-bottom: 10px;">
                                                    <div class="" style="width: <?= 370 * count($datas)  ?>px">
                                                        <?php foreach ($datas as $key => $mecanicien) { ?>
                                                            <div class="element" style="width: 350px; border-right: dashed 1px black; display: inline-block; vertical-align: top;">
                                                                <div class="ibox">
                                                                    <div class="ibox-content" style="padding-top: 2px;">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <img style="width: 90%" src="<?= $this->stockage("images", "employes", $employe->image) ?>">
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <h4 class="mp0 text-capitalize"><?= $mecanicien->name() ?></h4>
                                                                                <small><i class="fa fa-hand-o-up"></i> Drag task between list</small>
                                                                            </div>
                                                                        </div><hr class="mp0"><br>

                                                                        <ul class="sortable-list connectList agile-list" id="meca-<?= $mecanicien->id ?>" data-id="<?= $mecanicien->id ?>" style=" min-height: 450px;">
                                                                            <?php foreach ($mecanicien->tickets() as $key => $ticket) {
                                                                                $ticket->actualise();
                                                                                $item = $ticket->etatIntervention();
                                                                                $item->actualise(); ?>
                                                                                <li class="<?= $ticket->etatintervention->class ?>-element" id="ticket-<?= $ticket->id ?>" data-id="<?= $ticket->id ?>">
                                                                                    <span class="pull-right" title="<?= depuis($item->created) ?>"><i class="fa fa-clock-o"></i></span>
                                                                                    <h5 class="mp0 text-uppercase" style="margin-bottom: 3px;"><i class=" fa fa-car"></i> <?= $ticket->auto->immatriculation ?></h5>
                                                                                    <span><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?> // <?= $ticket->auto->couleur ?></span>
                                                                                    <div class="hoverable">
                                                                                        <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $type) {
                                                                                            $type->actualise(); ?>
                                                                                            <label class="label small"><?= $type->typereparation->name()  ?></label>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                    <hr class="mp3">
                                                                                    <p class="mp0">
                                                                                        <span class="gras text-<?= $ticket->etatintervention->class ?>"><?= $ticket->etatintervention->name() ?></span> 
                                                                                        <span class="text-<?= $item->etat->class ?> pull-right"><?= $item->etat->name() ?></span>
                                                                                    </p>
                                                                                </li>
                                                                            <?php } ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
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


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>


    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


<style type="text/css">
    .connectList li{
        font-size: 11px;
        padding: 5px !important;
    }
</style>

</body>

</html>
