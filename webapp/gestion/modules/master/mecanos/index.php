<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                <h2>This is main title</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">This is</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Breadcrumb</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-8">
                <div class="title-action">
                    <a href="" class="btn btn-primary">This is action area</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="ibox">
                    <div class="ibox-content">
                        <div class="tabs-container">
                            <ul class="nav nav-tabs text-uppercase" role="tablist">
                                <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> <i class="fa fa-male"></i>  Tous les mecanos</a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#tab-2"> <i class="fa fa-briefcase"></i> Groupe de travail</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" id="tab-1" class="tab-pane active">
                                    <div class="bg-light">
                                     <div>

                                     </div><br>

                                     <div class="row">
                                        <?php foreach ($mecanos as $key => $mecano) {
                                            $mecano->actualise(); ?>
                                            <div class="col-lg-3 col-md-4 col-sm-6 hoverable" style="margin-bottom: 1%">
                                                <div class="contact-box mp3">
                                                    <a href="#">
                                                     <div class="row">
                                                        <div class="col-3">
                                                            <div class="text-center">
                                                                <img alt="image" class="rounded-circle m-t-xs img-fluid" src="<?= $this->stockage("images", "mecaniciens", $mecano->image)  ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-9">
                                                            <h3 class="text-capitalize"><strong><?= $mecano->name() ?></strong></h3>
                                                            <p class="small mp0"><i class="fa fa-map-marker"></i> <?= $mecano->adresse ?></p>
                                                            <p class="small mp0"><i class="fa fa-phone"></i> <?= $mecano->contact ?></p>
                                                            <p class="small mp0"><i class="fa fa-envelope"></i> <?= $mecano->email ?></p>
                                                        </div>
                                                    </div><hr class="mp3">
                                                    <div class="text-center text-uppercase">---> <strong><?= $mecano->groupemecanicien->name() ?></strong> <---</div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <div role="tabpanel" id="tab-2" class="tab-pane">
                            <div class="panel-body bg-light">
                                <div>

                                </div><br>

                                <div class="row">
                                 <?php foreach ($groupes as $key => $groupe) {
                                    $groupe->actualise();
                                    $datas = $groupe->fourni("mecanicien"); ?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="ibox">
                                            <div class="ibox-title">
                                                <h5 class="text-uppercase"><?=$groupe->name() ?></h5>
                                                <div class="ibox-tools">
                                                    <a class="collapse-link">
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                    <a class="close-link">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="ibox-content">
                                                <div class="team-members">
                                                    <?php foreach ($datas as $key => $mecano) { ?>
                                                        <button href="#" class="btn text-uppercase btn-white"><?=$mecano->name() ?></button>
                                                    <?php } ?>
                                                </div><br>
                                                <h4>Description du groupe</h4>
                                                <p>
                                                    It is a long established fact that a reader will be distracted by the readable content
                                                    of a page when looking at its layout. The point of using Lorem Ipsum is that it has.
                                                </p>
                                                <div>
                                                    <span>Etats moyen des taches</span>
                                                    <div class="stat-percent">48%</div>
                                                    <div class="progress progress-mini">
                                                        <div style="width: 48%;" class="progress-bar"></div>
                                                    </div>
                                                </div>
                                                <div class="row text-center text-uppercase m-t-sm">
                                                    <div class="col-sm-4">
                                                        <div class="font-bold">Mecanos</div>
                                                        <?= start0(count($datas)) ?>
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <div class="font-bold">Taches</div>
                                                        4th
                                                    </div>
                                                    <div class="col-sm-4 text-right">
                                                        <div class="font-bold">BUDGET</div>
                                                        $200,913 <i class="fa fa-level-up text-navy"></i>
                                                    </div>
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
</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>


</div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


</body>

</html>
