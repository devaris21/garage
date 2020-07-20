<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-9">
                <h2>File Manager</h2>
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
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox ">
                        <div class="ibox-content">
                            <div class="file-manager">
                                <h5>Afficher:</h5>
                                <div class="text-center">
                                    <a href="#" class="file-control active">Tous les dossiers</a>
                                <a href="#" class="file-control">Terminées</a>
                                <a href="#" class="file-control">En cours</a>
                                </div>
                                <hr><br>

                                <h5>Au stade de :</h5>
                                <ul class="folder-list" style="padding: 0">
                                    <li><a href=""><i class="fa fa-folder"></i> Tous les dossiers</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Ouvertures</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Essais AV</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Diagnostics</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Devis</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Interventions</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Essais AP</a></li>
                                    <li><a href=""><i class="fa fa-folder"></i> Terminés</a></li>
                                </ul><br><br>

                                <div class="hr-line-dashed"></div>
                                <h3 class="text-uppercase text-center">36 dossiers trouvés</h3>
                                <div class="hr-line-dashed"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 animated fadeInRight">
                    <div class="row">
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner bg-warning"></span>
                                    <div class="icon">
                                        <i class="fa fa-file"></i>
                                    </div>
                                    <div class="file-name" style="padding: 3px !important">
                                        Dossier N° RET478H <br/>
                                        <small>7889 RT 01 // Toyota Yaris 200</small><br>
                                        <small>Aristide Manyessé</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-fluid" src="img/p1.jpg">
                                    </div>
                                    <div class="file-name">
                                        Italy street.jpg
                                        <br/>
                                        <small>Added: Jan 6, 2014</small>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-fluid" src="img/p2.jpg">
                                    </div>
                                    <div class="file-name">
                                        My feel.png
                                        <br/>
                                        <small>Added: Jan 7, 2014</small>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-fluid" src="img/p1.jpg">
                                    </div>
                                    <div class="file-name">
                                        Italy street.jpg
                                        <br/>
                                        <small>Added: Jan 6, 2014</small>
                                    </div>
                                </a>

                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-fluid" src="img/p2.jpg">
                                    </div>
                                    <div class="file-name">
                                        My feel.png
                                        <br/>
                                        <small>Added: Jan 7, 2014</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="icon">
                                        <i class="fa fa-music"></i>
                                    </div>
                                    <div class="file-name">
                                        Michal Jackson.mp3
                                        <br/>
                                        <small>Added: Jan 22, 2014</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="image">
                                        <img alt="image" class="img-fluid" src="img/p3.jpg">
                                    </div>
                                    <div class="file-name">
                                        Document_2014.doc
                                        <br/>
                                        <small>Added: Fab 11, 2014</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <div class="file">
                                <a href="#">
                                    <span class="corner"></span>

                                    <div class="icon">
                                        <i class="img-fluid fa fa-film"></i>
                                    </div>
                                    <div class="file-name">
                                        Monica's birthday.mpg4
                                        <br/>
                                        <small>Added: Fab 18, 2014</small>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 col-xs-6 file-box">
                            <a href="#">
                                <div class="file">
                                    <span class="corner"></span>

                                    <div class="icon">
                                        <i class="fa fa-bar-chart-o"></i>
                                    </div>
                                    <div class="file-name">
                                        Annual report 2014.xls
                                        <br/>
                                        <small>Added: Fab 22, 2014</small>
                                    </div>
                                </div>
                            </a>
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
