<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper wrapper-content">
            <div class="border-bottom white-bg">
               <div class="row  dashboard-header">
                <div class="col-md-3">
                    <h2>Welcome Amelia</h2>
                    <small>You have 42 messages and 6 notifications.</small>
                    <ul class="list-group clear-list m-t">
                        <li class="list-group-item fist-item">
                            <span class="float-right">
                                09:00 pm
                            </span>
                            <span class="label label-success">1</span> Please contact me
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                10:16 am
                            </span>
                            <span class="label label-info">2</span> Sign a contract
                        </li>
                        <li class="list-group-item">
                            <a href="">
                                Location en cours
                                <span class="float-right">2</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="">
                                Expertise en cours
                                <span class="float-right">2</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <span class="float-right">
                                12:00 am
                            </span>
                            <span class="label label-primary">5</span> Write a letter to Sandra
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="flot-chart dashboard-chart">
                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                    </div>
                    <div class="row text-center">
                        <div class="col">
                            <div class=" m-l-md">
                                <span class="h5 font-bold m-t block">$ 406,100</span>
                                <small class="text-muted m-b block">Sales marketing report</small>
                            </div>
                        </div>
                        <div class="col">
                            <span class="h5 font-bold m-t block">$ 150,401</span>
                            <small class="text-muted m-b block">Annual sales revenue</small>
                        </div>
                        <div class="col">
                            <span class="h5 font-bold m-t block">$ 16,822</span>
                            <small class="text-muted m-b block">Half-year revenue margin</small>
                        </div>

                    </div>
                </div>
                <div class="col-md-3">
                    <div class="statistic-box">
                        <h4>
                            Project Beta progress
                        </h4>
                        <p>
                            You have two project with not compleated task.
                        </p>
                        <div class="row text-center">
                            <div class="col-lg-6">
                                <canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0"></canvas>
                                <h5 >Kolter</h5>
                            </div>
                            <div class="col-lg-6">
                                <canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0"></canvas>
                                <h5 >Maxtor</h5>
                            </div>
                        </div>
                        <div class="m-t">
                            <small>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small>
                        </div>

                    </div>
                </div>
            </div>

            <hr>

            <div class="text-center">
                <div class="row" style="font-size: 11px">
                    <div class="col-sm"><button data-toggle="modal" data-target="#modal-newreparation" class="btn btn-success dim"><i class="fa fa-wrench"></i> Réparation / Entretien</button></div>
                    <div class="col-sm"><button data-toggle="modal" data-target="#modal-newreparation" class="btn btn-info dim"><i class="fa fa-wrench"></i> Rémorque / Fourrière </button></div>
                    <div class="col-sm"><button data-toggle="modal" data-target="#modal-newvente" class="btn btn-primary dim"><i class="fa fa-cubes"></i> Vente de pièces</button></div>
                    <div class="col-sm"><button data-toggle="modal" data-target="#modal-newlocation" class="btn btn-danger dim"><i class="fa fa-cab"></i> Location de véhicule</button></div>
                    <div class="col-sm"><button data-toggle="modal" data-target="#modal-newdevis" class="btn btn-warning dim"><i class="fa fa-file-text-o"></i> Devis / proforma</button></div>
                    <div class="col-sm"><button data-toggle="modal" data-target="#modal-newexpertise" class="btn btn-default dim"><i class="fa fa-wrench"></i> Nouvelle Expertise</button></div>
                </div>
            </div>
        </div><br>

        <h3 class="text-uppercase ">En cours de dianostic</h3>
        <div class="row">

            <?php foreach ($tickets as $key => $ticket) {
                $ticket->actualise(); ?>
                <div class="col-lg-3">
                    <div class="contact-box p-2">
                        <a href="<?= $this->url("gestion", "garage", "diagnostic", $ticket->id)  ?>">
                            <h3><strong><?= $ticket->reference ?></strong> <i class="fa fa-close text-danger cursor float-right"></i></h3>
                            <address>
                                <?= $ticket->immatriculation ?><br>
                                <?= $ticket->marque->name() ?> <?= $ticket->modele ?><br>
                                <abbr title="Phone">Client:</abbr> <?= $ticket->client ?>
                            </address>
                        </a>
                    </div>
                </div>
            <?php } ?>

        </div>



    </div>
</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<?php include($this->rootPath("composants/assets/modals/modal-newreparation.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-newexpertise.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-newvente.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-newlocation.php")); ?>  
<?php include($this->rootPath("composants/assets/modals/modal-newdevis.php")); ?>  


</body>

</html>