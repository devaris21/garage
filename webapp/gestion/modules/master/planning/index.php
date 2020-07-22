<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-3">
                <h2 class="text-uppercase">Planning de travail</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        App Views
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>File Manager</strong>
                    </li>
                </ol>
            </div>

            <div class="col-lg-9">
                <ul class="sortable-list connectList agile-list row" id="todo">
                    <?php foreach ($tickets as $key => $ticket) {
                        $ticket->actualise(); ?>
                        <div class="col-md-4">
                            <li class="<?= $ticket->etatintervention->class ?>-element" id="task1">
                                <span class="pull-right" title="<?= depuis($ticket->created) ?>"><i class="fa fa-clock-o fa-2x"></i></span>
                                <h4 class="mp0 text-uppercase" style="margin-bottom: 3px;"><i class=" fa fa-car"></i> <?= $ticket->auto->immatriculation ?></h4>
                                <span><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?> // <?= $ticket->auto->couleur ?></span><br>
                                <div class="agile-detail">
                                    <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $value) {
                                        $value->actualise(); ?>
                                        <label class="label"><?= $value->typereparation->name()  ?></label>
                                    <?php } ?>
                                </div>
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
                                    <?php foreach ($groupes as $key => $value) {
                                        $datas = $value->fourni("mecanicien"); ?>
                                        <li><a class="nav-link" data-toggle="tab" href="#tab-<?= $value->id ?>"><i class="fa fa-users"></i> <?= $value->name() ?></a></li>
                                    <?php } ?>
                                </ul>
                                <div class="tab-content">
                                    <?php foreach ($groupes as $key => $value) { ?>
                                        <div role="tabpanel" id="tab-<?= $value->id ?>" class="tab-pane">
                                            <div class="panel-body">
                                                <div class="scroll" style="width: inherit; overflow-x: scroll;">
                                                    <div class="" style="width: 3700px">
                                                        <?php foreach ($datas as $key => $mecanicien) { ?>
                                                            <div style="width: 330px; min-height: 450px; border-right: dashed 1px black;">
                                                                <div class="ibox">
                                                                    <div class="ibox-content">
                                                                        <div class="row">
                                                                            <div class="col-3">
                                                                                <img style="width: 90%" src="<?= $this->stockage("images", "employes", $employe->image) ?>">
                                                                            </div>
                                                                            <div class="col-9">
                                                                                <h4 class="mp0 text-capitalize"><?= $mecanicien->name() ?></h4>
                                                                                <small><i class="fa fa-hand-o-up"></i> Drag task between list</small>
                                                                            </div>
                                                                        </div><hr class="mp0"><br>

                                                                        <ul class="sortable-list connectList agile-list" id="todo">
                                                                            <?php foreach ($mecanicien->fourni("essai", ["etat_id ="=> Home\ETAT::ENCOURS]) as $key => $essai) {
                                                                                $essai->actualise(); ?>
                                                                                <li class="warning-element" id="task1">
                                                                                    <span class="pull-right"> <i class="fa fa-clock-o fa-2x"></i></span>
                                                                                    <h5 class="mp0 text-uppercase" style="margin-bottom: 3px;"><i class=" fa fa-car"></i> 7884 IG 01</h5>
                                                                                    <span>Toyota Yaris 200 // Rouge</span><br>
                                                                                    <div>
                                                                                        <?php foreach ($essai->ticket->fourni("ticket_typereparation") as $key => $ticket) {
                                                                                            $ticket->actualise(); ?>
                                                                                            <label class="label"><?= $ticket->typereparation->name()  ?></label>
                                                                                        <?php } ?>
                                                                                    </div>
                                                                                </li>
                                                                            <?php } ?>

                                                                            <?php foreach ($mecanicien->fourni("intervention", ["etat_id ="=> Home\ETAT::ENCOURS]) as $key => $intervention) {
                                                                                $intervention->actualise(); ?>
                                                                                <li class="warning-element" id="task1">
                                                                                    <span class="pull-right"> <i class="fa fa-clock-o fa-2x"></i></span>
                                                                                    <h5 class="mp0 text-uppercase" style="margin-bottom: 3px;"><i class=" fa fa-car"></i> 7884 IG 01</h5>
                                                                                    <span>Toyota Yaris 200 // Rouge</span><br>
                                                                                    <div>
                                                                                        <?php foreach ($intervention->ticket->fourni("ticket_typereparation") as $key => $ticket) {
                                                                                            $ticket->actualise(); ?>
                                                                                            <label class="label"><?= $ticket->typereparation->name()  ?></label>
                                                                                        <?php } ?>
                                                                                    </div>
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
