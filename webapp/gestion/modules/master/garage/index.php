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
                <h2 class="text-uppercase">Vue generale du garage </h2>
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
        </div>



        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="scrolLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmodtempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate" style="width: inherit; overflow-x: scroll;">
                    <div class="" style="width: 3700px">
                    <?php foreach (Home\ETATINTERVENTION::getAll() as $key => $etat) {
                    $datas = $etat->fourni("ticket"); ?>
                        <div style="min-width: 350px; display: inline-block; vertical-align: top; margin-right: 10px;">
                            <div class="ibox">
                                <div class="ibox-content">
                                    <div class="row">
                                        <div class="col-2">
                                            <div class="bg-<?= $etat->class ?>" style="width: 40px; height: 40px"></div>
                                        </div>
                                        <div class="col-10">
                                            <h3 class="mp0 text-uppercase gras"><?= $etat->name() ?></h3>
                                            <span><i class="fa fa-hand-o-up"></i> Drag task between list</span>
                                            <span class="badge pull-right bagde-<?= $etat->class ?>"><?= start0(count($datas))  ?></span>
                                        </div>
                                    </div><hr class="mp3">

                                    <ul class="sortable-list connectList agile-list" id="todo" style="min-height: 400px;">
                                        <?php foreach ($datas as $key => $ticket) {
                                            $ticket->actualise(); ?>
                                            <li class="<?= $ticket->etatintervention->class ?>-element" id="task1">
                                                <span class="pull-right" title="<?= depuis($ticket->created) ?>"><i class="fa fa-clock-o fa-2x"></i></span>
                                                <h4 class="mp0 text-uppercase" style="margin-bottom: 3px;"><i class=" fa fa-car"></i> <?= $ticket->auto->immatriculation ?></h4>
                                                <span><?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?> // <?= $ticket->auto->couleur ?></span><br>
                                                <div class="agile-detail">
                                                    <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $value) {
                                                        $value->actualise(); ?>
                                                        <label class="label small"><?= $value->typereparation->name()  ?></label>
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