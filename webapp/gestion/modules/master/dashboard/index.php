<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="wrapper-content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox" style="border-bottom: 3px grey solid">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-uppercase">Parc Auto</h5>
                                        <h1 class="no-margins"><?= start0(count(Home\VEHICULE::parcauto())) ?></h1>
                                    </div>
                                    <div class="col-5 text-right">
                                        <i class="fa fa-car fa-5x" style="color: #ddd"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox" style="border-bottom: 3px green solid">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-uppercase">Locations en cours</h5>
                                        <h1 class="no-margins"><?= start0(count(Home\LOCATION::encours()))  ?></h1>
                                    </div>
                                    <div class="col-5 text-right">
                                        <i class="fa fa-eercast fa-5x text-green"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox" style="border-bottom: 3px red solid">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-uppercase">Reservations</h5>
                                        <h1 class="no-margins"><?= start0(count(Home\RESERVATION::encours()))  ?></h1>
                                    </div>
                                    <div class="col-5 text-right">
                                        <i class="fa fa-calendar fa-5x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox" style="border-bottom: 3px grey solid">
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-uppercase">Clients</h5>
                                        <h1 class="no-margins"><?= start0(count(Home\CLIENT::getAll()))  ?></h1>
                                    </div>
                                    <div class="col-5 text-right">
                                        <i class="fa fa-users fa-5x" style="color: #ddd"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>

                <div class="ibox-content">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-4">
                                    <h2><?= $params->societe  ?></h2>
                                    <small>You have 42 messages and 6 notifications.</small>
                                    <ul class="list-group clear-list m-t">
                                        <li class="list-group-item fist-item">
                                            Location en cours
                                            <span class="float-right">2</span>
                                        </li>
                                        <li class="list-group-item">
                                            Reservation pour aujoourd'hui
                                            <span class="float-right">2</span>
                                        </li>
                                        <li class="list-group-item">
                                            Alertes pieces véhicules
                                            <span class="float-right">2</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-8">
                                    <div class="flot-chart dashboard-chart" style="margin-top: 0%">
                                        <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                                    </div><hr>
                                    <div class="row text-center">
                                        <div class="col">
                                            <div class=" m-l-md text-blue">
                                                <span class="h5 font-bold block"><?= start0(count(Home\VEHICULE::enEtatDe(Home\ETATVEHICULE::INSPECTION))) ?></span>
                                                <small class="text-muted block">Sous inspection</small>
                                            </div>
                                        </div>
                                        <div class="col text-dark border-right border-left">
                                            <span class="h4 font-bold block"><?= start0(count(Home\VEHICULE::enEtatDe(Home\ETATVEHICULE::LOCATION))) ?></span>
                                            <small class="text-muted block">En location</small>
                                        </div>
                                        <div class="col text-green border-left">
                                            <span class="h4 font-bold block"><?= start0(count(Home\VEHICULE::enEtatDe(Home\ETATVEHICULE::LIBRE))) ?></span>
                                            <small class="text-muted block">Disponible</small>
                                        </div>
                                        <div class="col text-warning border-left">
                                            <span class="h5 font-bold block"><?= start0(count(Home\VEHICULE::enEtatDe(Home\ETATVEHICULE::REPARATION))) ?></span>
                                            <small class="text-muted block">En reparation</small>
                                        </div>
                                    </div>
                                </div>
                            </div><hr>
                            <div class="">
                                <a href="<?= $this->url("gestion", "master", "newlocation") ?>" class="btn btn-xs btn-primary dim"><i class="fa fa-eercast"></i> faire une Nouvelle location</a>

                                <a href="<?= $this->url("gestion", "master", "newlocation") ?>" class="btn btn-xs btn-danger dim pull-right"><i class="fa fa-calendar"></i> faire une  Nouvelle reservation</a>
                            </div>
                        </div>
                        <div class="col-md-3 border-left">
                            <h5 class="text-uppercase gras text-danger">Reservations prochainse (8 jours)<span class="badge bg-danger pull-right"><?= start0(count($reservations)); ?></span></h5><hr>
                            <div class="ibox">
                                <?php if (count($reservations) > 0 ) {
                                    foreach ($reservations as $key => $item) { ?>
                                        <div class="feed-activity-list cursor" data-toggle="modal" data-target="#modal-critere-<?= $item->id  ?>">
                                            <div class="feed-element ">
                                                <div class="media-body ">
                                                    <small class="float-right">5m ago</small>
                                                    <strong><?= $item->reference ?></strong><br>
                                                    <small class="text-muted">Du <?= datecourt($item->started) ?> au <?= datecourt($item->finished) ?></small>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                }else{ ?>
                                    <h3 style="margin-top: 40%" class="text-center text-muted">Aucune reservation de prévue</h3>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

            <script type="text/javascript" src="<?= $this->relativePath("../reservations/script.js") ?>"></script>

            <?php //include($this->rootPath("composants/assets/modals/modal-newlocation.php")); ?>  


            <?php foreach ($reservations as $key => $reservation) { 
                $cris = $reservation->fourni("critere");
                if (count($cris) > 0) {
                    $critere = $cris[0];
                    include($this->rootPath("composants/assets/modals/modal-critere.php"));
                }
            } ?>


        </body>

        </html>



        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    toastr.options = {
                        closeButton: true,
                        progressBar: true,
                        showMethod: 'slideDown',
                        timeOut: 4000
                    };
                    toastr.success('Responsive Admin Theme', 'Welcome to INSPINIA');

                }, 1300);


                var data1 = [
                [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
                ];
                var data2 = [
                [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
                ];
                $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                    data1, data2
                    ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis:{
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    }
                    );


            });
        </script>



        <script type="text/javascript">
            var events =  [
            <?php foreach ($locations__ as $key => $item) {
                $item->actualise(); ?>
                {
                    title: 'Location de <?= $item->client->name(); ?> // <?= $item->vehicule->immatriculation; ?>',
                    start: "<?= $item->started; ?>",
                    end: "<?= dateAjoute1($item->finished, +1) ?>",
                    className: "bg-green",
                    borderColor: "white",
                    extendedProps: {
                        type: 'location',
                        id: "<?= $item->id; ?>"
                    }
                },
            <?php } ?>

            <?php foreach ($reservations__ as $key => $item) {
                $item->actualise(); ?>
                {
                    title: 'Reservation de <?= $item->client->name(); ?> ',
                    start: "<?= $item->started ?>",
                    end: "<?= dateAjoute1($item->finished, +1) ?>",
                    className: "bg-danger",
                    borderColor: "white",
                    extendedProps: {
                        type: 'reservation',
                        id: "<?= $item->id; ?>"
                    }
                },
            <?php } ?>

            ]
        </script>