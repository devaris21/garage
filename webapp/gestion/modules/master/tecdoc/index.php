<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="top-navigation">

    <div id="wrapper">
        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom white-bg">
                <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">
                    <!--<div class="navbar-header">-->
                        <!--<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">-->
                            <!--<i class="fa fa-reorder"></i>-->
                            <!--</button>-->

                            <a href="#" class="navbar-brand">Inspinia telle hhjfh</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-reorder"></i>
                            </button>

                            <!--</div>-->
                            <div class="navbar-collapse collapse" id="navbar">
                               <ul class="nav nav-tabs" role="tablist">
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> Universel</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-2"> VU & PL</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> Motos</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> Essieux</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> Moteurs</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> Batteries</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> RMI</a></li>
                                <li><a style="padding: 9px 20px" class="nav-link" data-toggle="tab" href="#tab-1"> Consumables</a></li>
                            </ul>
                            <ul class="nav navbar-nav mr-auto">
                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Menu item</a>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="#tab-1">Menu item</a></li>
                                        <li><a href="">Menu item</a></li>
                                        <li><a href="">Menu item</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-top-links navbar-right">
                                <li class="dropdown">
                                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                        <i class="fa fa-shopping-cart fa-2x"></i><span class="label label-warning">16</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-messages dropdown-menu-right">
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item float-left" href="profile.html">
                                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                                </a>
                                                <div class="media-body">
                                                    <small class="float-right">46h ago</small>
                                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item float-left" href="profile.html">
                                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right text-navy">5h ago</small>
                                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="dropdown-messages-box">
                                                <a class="dropdown-item float-left" href="profile.html">
                                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                                </a>
                                                <div class="media-body ">
                                                    <small class="float-right">23h ago</small>
                                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="dropdown-divider"></li>
                                        <li>
                                            <div class="text-center link-block">
                                                <a href="mailbox.html" class="dropdown-item">
                                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                        </div>
                    </nav>
                </div>

                <br>
                <div class="">
                    <div class="tab-content bg-white" >

                        <?php include($this->relativePath("partiels/universal.php")) ?>

                        <?php include($this->relativePath("partiels/autre.php")) ?>

                    </div>


                    <div class="row">
                        <div class="col-md-3">
                           

                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Support</h5>
                                </div>
                                <div class="ibox-content text-center">



                                    <h3><i class="fa fa-phone"></i> +43 100 783 001</h3>
                                    <span class="small">
                                        Please contact with us if you have any questions. We are avalible 24h.
                                    </span>


                                </div>
                            </div>

                        </div>

                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-sm">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">

                                            <div class="product-imitation">
                                                [ INFO ]
                                            </div>
                                            <div class="product-desc">
                                                <span class="product-price">
                                                    $10
                                                </span>
                                                <small class="text-muted">Category</small>
                                                <a href="#" class="product-name"> Product</a>



                                                <div class="small m-t-xs">
                                                    Many desktop publishing packages and web page editors now.
                                                </div>
                                                <div class="m-t">
                                                    <a href="#" class="btn btn-xs btn-outline btn-primary"><i class="fa fa-eye"></i> Info</a>
                                                    <a href="#" class="btn btn-xs btn-outline pull-right btn-primary"><i class="fa fa-shopping-cart"></i> Panier Client</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">

                                            <div class="product-imitation">
                                                [ INFO ]
                                            </div>
                                            <div class="product-desc">
                                                <span class="product-price">
                                                    $10
                                                </span>
                                                <small class="text-muted">Category</small>
                                                <a href="#" class="product-name"> Product</a>



                                                <div class="small m-t-xs">
                                                    Many desktop publishing packages and web page editors now.
                                                </div>
                                                <div class="m-t text-righ">

                                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="ibox">
                                        <div class="ibox-content product-box">

                                            <div class="product-imitation">
                                                [ INFO ]
                                            </div>
                                            <div class="product-desc">
                                                <span class="product-price">
                                                    $10
                                                </span>
                                                <small class="text-muted">Category</small>
                                                <a href="#" class="product-name"> Product</a>



                                                <div class="small m-t-xs">
                                                    Many desktop publishing packages and web page editors now.
                                                </div>
                                                <div class="m-t text-righ">

                                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="ibox">
                                        <div class="ibox-content product-box active">

                                            <div class="product-imitation">
                                                [ INFO ]
                                            </div>
                                            <div class="product-desc">
                                                <span class="product-price">
                                                    $10
                                                </span>
                                                <small class="text-muted">Category</small>
                                                <a href="#" class="product-name"> Product</a>



                                                <div class="small m-t-xs">
                                                    Many desktop publishing packages and web page editors now.
                                                </div>
                                                <div class="m-t text-righ">

                                                    <a href="#" class="btn btn-xs btn-outline btn-primary">Info <i class="fa fa-long-arrow-right"></i> </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="float-right">
                        10GB of <strong>250GB</strong> Free.
                    </div>
                    <div>
                        <strong>Copyright</strong> Example Company &copy; 2014-2018
                    </div>
                </div>

            </div>
        </div>



        <!-- Mainly scripts -->
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
        <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- Custom and plugin javascript -->
        <script src="js/inspinia.js"></script>
        <script src="js/plugins/pace/pace.min.js"></script>

        <!-- Flot -->
        <script src="js/plugins/flot/jquery.flot.js"></script>
        <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="js/plugins/flot/jquery.flot.resize.js"></script>

        <!-- ChartJS-->
        <script src="js/plugins/chartJs/Chart.min.js"></script>

        <!-- Peity -->
        <script src="js/plugins/peity/jquery.peity.min.js"></script>
        <!-- Peity demo -->
        <script src="js/demo/peity-demo.js"></script>


        <script>
            $(document).ready(function() {


                var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
                var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

                var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
                ];
                $.plot($("#flot-chart1"), data1, {
                    xaxis: {
                        tickDecimals: 0
                    },
                    series: {
                        lines: {
                            show: true,
                            fill: true,
                            fillColor: {
                                colors: [{
                                    opacity: 1
                                }, {
                                    opacity: 1
                                }]
                            },
                        },
                        points: {
                            width: 0.1,
                            show: false
                        },
                    },
                    grid: {
                        show: false,
                        borderWidth: 0
                    },
                    legend: {
                        show: false,
                    }
                });

                var lineData = {
                    labels: ["January", "February", "March", "April", "May", "June", "July"],
                    datasets: [
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [48, 48, 60, 39, 56, 37, 30]
                    },
                    {
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [65, 59, 40, 51, 36, 25, 40]
                    }
                    ]
                };

                var lineOptions = {
                    responsive: true
                };


                var ctx = document.getElementById("lineChart").getContext("2d");
                new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});

            });
        </script>

    </body>


    <?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

    </html>