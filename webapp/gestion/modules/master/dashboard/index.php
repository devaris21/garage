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
                                <li class="list-group-item">
                                    <i class="fa fa-wrench"></i> Véhicules en Essai AV-AP. <span class="label label-success float-right"><?= start0(count(Home\TICKET::etat(Home\ETATINTERVENTION::ESSAI_AVANT) + Home\TICKET::etat(Home\ETATINTERVENTION::ESSAI_AVANT_CHEF)))  ?></span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-wrench"></i> Véhicules sous diagnostic <span class="label label-success float-right"><?= start0(count(Home\TICKET::etat(Home\ETATINTERVENTION::INTERVENTION)))  ?></span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-wrench"></i> Véhicules sous intervention <span class="label label-success float-right"><?= start0(count(Home\TICKET::etat(Home\ETATINTERVENTION::INTERVENTION)))  ?></span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-wrench"></i> Véhicules au Lavage <span class="label label-success float-right"><?= start0(count(Home\TICKET::etat(Home\ETATINTERVENTION::LAVAGE)))  ?></span>
                                </li>
                                <li class="list-group-item">
                                    <i class="fa fa-wrench"></i> Véhicules Prêt à être livrer <span class="label label-success float-right"><?= start0(count(Home\TICKET::etat(Home\ETATINTERVENTION::LIVRAISON)))  ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <div class="flot-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart" style="height: 230px"></div>
                            </div><br><br>
                            <hr class="mp3">
                            <div class="row text-center">
                                <div class="col">
                                    <div class=" m-l-md">
                                        <span class="h5 font-bold block">05</span>
                                        <small class="text-muted block">tickets du jour</small>
                                    </div>
                                </div>
                                <div class="col border-right border-left">
                                    <span class="h5 font-bold block">24</span>
                                    <small class="text-muted block">Véhicules au garage</small>
                                </div>
                                <div class="col">
                                    <span class="h5 font-bold block">14</span>
                                    <small class="text-muted block">Tâches en cours</small>
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
                    </div><hr>

                    <div class="text-center"><br>
                        <div class="row" style="font-size: 11px">
                            <div class="col-sm"><button data-toggle="modal" data-target="#modal-newintervention" class="btn btn-success dim"><i class="fa fa-wrench"></i> Nouvelle intervention</button></div>
                            <div class="col-sm"><button data-toggle="modal" data-target="#modal-newreparation" class="btn btn-info dim"><i class="fa fa-support"></i> Rémorque / Fourrière </button></div>
                            <div class="col-sm"><button data-toggle="modal" data-target="#modal-newvente" class="btn btn-primary dim"><i class="fa fa-handshake-o"></i> Vente de pièces/pneus</button></div>
                            <div class="col-sm"><button data-toggle="modal" data-target="#modal-newlocation" class="btn btn-danger dim"><i class="fa fa-cab"></i> Location de véhicule</button></div>
                            <div class="col-sm"><button data-toggle="modal" data-target="#modal-newdevis" class="btn btn-warning dim"><i class="fa fa-file-text-o"></i> Devis / proforma</button></div>
                        </div><br>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


    <?php foreach ($nouveaux as $key => $ticket) {
        //include($this->rootPath("composants/assets/modals/modal-essai_av.php"));
    }
    ?>  
    <?php include($this->rootPath("composants/assets/modals/modal-newintervention.php")); ?>
    <?php //include($this->rootPath("composants/assets/modals/modal-newvente.php")); ?>  
    <?php //include($this->rootPath("composants/assets/modals/modal-newdevis.php")); ?>  




    <script>
        $(document).ready(function() {

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
                label: "Nouveaux tickets",
                data: data3,
                color: "#1ab394",
                bars: {
                    show: true,
                    align: "center",
                    barWidth: 24 * 60 * 60 * 600,
                    lineWidth:0
                }

            }, {
                label: "Livraisons",
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
                    tickSize: [5, "day"],
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

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [300,50,100],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var doughnutData = {
                labels: ["App","Software","Laptop" ],
                datasets: [{
                    data: [70,27,85],
                    backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>

</body>

</html>