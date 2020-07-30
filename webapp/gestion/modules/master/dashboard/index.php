<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

            <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

            <div class="wrapper wrapper-content">
                <div class="row">
                    <div class="col-md-8">
                     <div class="ibox">
                        <div class="ibox-content">
                           <h2 class="mp0">Welcome Amelia</h2>
                           <small>You have 42 messages and 6 notifications.</small>
                           <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart" style="height: 230px"></div>
                        </div><br>
                        <hr>
                        <div class="row text-center">
                            <div class="col">
                                <div class=" m-l-md">
                                    <span class="h5 font-bold block">$ 406,100</span>
                                    <small class="text-muted block">Pièces & autres</small>
                                </div>
                            </div>
                            <div class="col border-right border-left">
                                <span class="h5 font-bold block">$ 150,401</span>
                                <small class="text-muted block">Annual sales revenue</small>
                            </div>
                            <div class="col">
                                <span class="h5 font-bold block">$ 16,822</span>
                                <small class="text-muted block">Half-year revenue margin</small>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="tabs-container">
                    <ul class="nav nav-tabs text-uppercase">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-3"> <i class="fa fa-car"></i> Véhicule</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-3"> <i class="fa fa-bicycle"></i> Moto</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-4"><i class="fa fa-wrench"></i> Piece auto</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-3" class="tab-pane active">
                            <div class="panel-body">
                                <dl>
                                    <dt>Definition list</dt>
                                    <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
                                </dl>

                                <div>
                                    <?php Native\BINDING::html("select", "auto") ?>
                                </div><br>
                                <div>
                                    <?php Native\BINDING::html("select", "auto") ?>
                                </div><br>
                                <div>
                                    <?php Native\BINDING::html("select", "auto") ?>
                                </div><br>
                                <button class="btn btn-sm btn-success dim pull-right"><i class="fa fa-search"></i> Rechercher</button>
                            </div>
                        </div>
                        <div id="tab-4" class="tab-pane">
                            <div class="panel-body">
                                <dl>
                                    <dt>Definition list</dt>
                                    <dd>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</dd>
                                </dl>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="row">
            <?php foreach (Home\TYPEREPARATION::getAll() as $key => $produit) { ?>
                <div class="col-md border-right">
                    <h6 class="text-uppercase text-center gras" style="color: <?= $produit->couleur; ?>">Stock de jezhluk</h6>
                    <ul class="list-group clear-list m-t">
                       <li class="list-group-item">
                        <i class="fa fa-flask" style="color: <?= $produit->couleur; ?>"></i> <small>4s</small>          
                        <span class="float-right">
                            <span title="en boutique" class="gras text-danger">012</span>&nbsp;|&nbsp;
                            <span title="en entrepôt" class="">45</span>
                        </span>
                    </li>
                    <li class="list-group-item"></li>
                </ul>
            </div>
        <?php } ?>
    </div>
</div>
</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


<?php foreach ($nouveaux as $key => $ticket) {
    include($this->rootPath("composants/assets/modals/modal-essai_av.php"));
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
            label: "Number of orders",
            data: data3,
            color: "#1ab394",
            bars: {
                show: true,
                align: "center",
                barWidth: 24 * 60 * 60 * 600,
                lineWidth:0
            }

        }, {
            label: "Payments",
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
                tickSize: [3, "day"],
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

    });
</script>

</body>

</html>