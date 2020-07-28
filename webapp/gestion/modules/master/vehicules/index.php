<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="ibox">
                    <div class="ibox-title">
                        <h4>Lorem ipsum dolor sit amet.</h4>
                        <div class="ibox-tools">
                            
                        </div>
                    </div>
                    <div class="ibox-content">
                      <div class="row">
                        <?php foreach ($autos as $key => $auto) {
                            $auto->actualise(); ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 hoverable" style="margin-bottom: 1%">
                                <div class="contact-box mp3">
                                    <a href="<?= $this->url("gestion", "master", "vehicule", $auto->id)  ?>">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="text-center">
                                                    <img alt="image" class="rounded-circle m-t-xs img-fluid" src="<?= $this->stockage("images", "mecaniciens", $auto->image)  ?>">
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <h3 class="text-capitalize"><strong><?= $auto->name() ?></strong></h3>
                                                <p class="small mp0"><i class="fa fa-map-marker"></i> Lorem ipsum.</p>
                                                <p class="small mp0"><i class="fa fa-phone"></i> Lorem ipsum dolor.</p>
                                                <p class="small mp0"><i class="fa fa-envelope"></i>Lorem ipsum dolor.</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
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
