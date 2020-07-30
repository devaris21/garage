<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-6">
                <h2 class="text-uppercase">Tous les tickets</h2>
                 <div class="container">
                    <div class="row">
                        <div class="col-xs-7 gras text-capitalize">Afficher seulement les locations en cours</div>
                        <div class="offset-1"></div>
                        <div class="col-xs-4">
                           <div class="switch">
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" id="example1">
                                <label class="onoffswitch-label" for="example1">
                                    <span class="onoffswitch-inner"></span>
                                    <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="col-sm-6">
                <div class="title-action">
                    <a href="<?= $this->url("gestion", "master", "newintervention")  ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Nouveau ticket</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">

                                <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                    <thead class="bg-warning">
                                        <tr>
                                            <th ></th>
                                            <th>Ticket ID</th>
                                            <th data-hide="phone">Client</th>
                                            <th data-hide="phone,tablet" >Véhicule</th>
                                            <th data-hide="phone">Prestations</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tickets as $key => $ticket) {
                                            $ticket->actualise(); ?>
                                            <tr>
                                                <td>
                                                    <span class="label label-<?= $ticket->etatintervention->class ?>"><?= $ticket->etatintervention->name() ?></span>
                                                </td>
                                                <td><span class="text-warning gras"><?= $ticket->reference  ?></span><br><small>depuis <?= depuis($ticket->created)  ?></small></td>
                                                <td><?= $ticket->client->name() ?><br><small><?= $ticket->client->typeclient->name()  ?></small></td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col-sm-3">
                                                            <img src="<?= $this->stockage("images", "vehicules", "default.jpg")  ?>" style="width: 50px">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <h4 class="mp0"><?= $ticket->auto->immatriculation ?> </h4>
                                                            <?= $ticket->auto->marque->name() ?> <?= $ticket->auto->modele ?><br>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="project-completion">
                                                                <small>Completion with: 28%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 28%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                <td>
                                                    <?php foreach ($ticket->fourni("ticket_typereparation") as $key => $value) {
                                                        $value->actualise(); ?>
                                                        <label class="label d-block"><?= $value->typereparation->name()  ?></label>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <a class="btn-white btn btn-xs" href="<?= $this->url("gestion", "master", "ticket", $ticket->id)  ?>"><i class="fa fa-eye"></i> Voir</a>
                                                        <button class="btn-white btn btn-xs"><i class="fa fa-pencil text-blue"></i> Modifier</button>
                                                        <button class="btn-white btn btn-xs"><i class="fa fa-trash text-danger"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="7">
                                                <ul class="pagination float-right"></ul>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

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
