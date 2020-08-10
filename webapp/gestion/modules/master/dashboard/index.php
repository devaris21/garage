<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


            <div class="wrapper wrapper-content">
                <div class="border-bottom ">
                    <div class="row white-bg">
                        <div class="col-md-3">
                            <h2>Welcome Amelia</h2>
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
                                    Expertise en cours
                                    <span class="float-right">2</span>
                                </li>
                                <li class="list-group-item">
                                    Expertise en cours
                                    <span class="float-right">2</span>
                                </li>
                                <li class="list-group-item">
                                    Expertise en cours
                                    <span class="float-right">2</span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="flot-chart dashboard-chart">
                                <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                            </div><hr>
                            <div class="row text-center">
                                <div class="col">
                                    <div class=" m-l-md text-green">
                                        <span class="h5 font-bold block">100</span>
                                        <small class="text-muted block">Disponible</small>
                                    </div>
                                </div>
                                <div class="col border-right border-left">
                                    <span class="h4 font-bold block">401</span>
                                    <small class="text-muted block">Total Parc Auto</small>
                                </div>
                                <div class="col text-danger">
                                    <span class="h5 font-bold block">22</span>
                                    <small class="text-muted block">En mission</small>
                                </div>
                                <div class="col text-danger">
                                    <span class="h5 font-bold block">22</span>
                                    <small class="text-muted block">En mission</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="ibox">
                               <div class="ibox-content">
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>
        </div>


        <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

        <?php //include($this->rootPath("composants/assets/modals/modal-newlocation.php")); ?>  


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