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
                <h2 class="gras text-uppercase">Planning de locations et reservations</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">This is</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Breadcrumb</strong>
                    </li>
                </ol>
            </div>
            <div class="col-sm-6">
                <div class="title-action">
                    <a href="" class="btn btn-primary">This is action area</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="row animated fadeInDown">
                <div class="col-lg-12">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Toues les locations & reservations </h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content scroll" style="overflow-x: scroll; min-height: 500px;">
                            <table class="table table-bordered table-hover">
                                <?php 
                                $ladate = dateAjoute(-10);
                                $last = date("W", strtotime($ladate));
                                $lt = date("W", strtotime($ladate));
                                ?>
                                <thead>
                                    <tr>
                                        <th rowspan="3"><h3 class="text-uppercase gras text-center" style="margin-top: 10%">Tous les véhicules<br> du parc auto</h3></th>
                                        <?php $ladate = dateAjoute(-10); 
                                        for ($i=0; $i < 100 ; $i++) { 
                                            if ((date("m", strtotime($ladate)) != date("m", strtotime(dateAjoute1($ladate, -1))) || $i == 0)) {
                                                $nb = ($i == 0)? (date("t", strtotime($ladate)) - date("d", strtotime($ladate))) : date("t", strtotime($ladate)); ?>
                                                <th class="small text-center gras text-uppercase" colspan="<?= $nb  ?>"><?= datecourt4($ladate) ?></th>
                                            <?php }
                                            $ladate = dateAjoute1($ladate, 1);
                                        } ?>
                                    </tr>
                                    <tr>
                                        <?php $ladate = dateAjoute(-10); 
                                        for ($i=0; $i < 100 ; $i++) { 
                                            if ((date("W", strtotime($ladate)) != date("W", strtotime(dateAjoute1($ladate, -1))) || $i == 0)) {
                                                $nb = ($i == 0)?7 - date("w", strtotime($ladate)) : 7; ?>
                                                <th class="small text-center gras" colspan="<?= $nb  ?>">Semaine <?= date("W", strtotime($ladate))  ?></th>
                                            <?php }
                                            $ladate = dateAjoute1($ladate, 1);
                                        } ?>
                                    </tr>
                                    <tr>
                                        <?php $ladate = dateAjoute(-10);
                                        for ($i=0; $i < 100 ; $i++) { 
                                            $ladate = dateAjoute1($ladate, 1); ?>
                                            <th class="small text-center" ><span class="d-block" style="width: 40px"><?= ucfirst(tronquer(jour($ladate), 3, "")) ?> <?= date("d", strtotime($ladate)) ?></span></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($vehicules as $key => $vehicule) {
                                        $vehicule->actualise();
                                        $tems = $vehicule->fourni("infovehicule");
                                        $info = $tems[0];
                                        $info->actualise();
                                        $locations = $vehicule->fourni("location"); ?>
                                        <tr data-id="<?= $vehicule->id ?>">
                                            <td >
                                                <a style="width: 300px" class="row" href="<?= $this->url("gestion", "master", "vehicule", $vehicule->id)  ?>">
                                                    <div class="col-3">
                                                        <img alt="image" style="width: 120%;" class="m-t-xs" src="<?= $this->stockage("images", "vehicules", $vehicule->image) ?>">
                                                    </div>
                                                    <div class="col-9">
                                                        <h4 style="margin: 0" class="text-uppercase"><strong><?= $vehicule->immatriculation ?></strong></h4>
                                                        <span><?= $vehicule->marque->name ?> <?= $vehicule->modele ?></span>
                                                    </div>
                                                </a>
                                            </td>
                                            <?php $ladate = dateAjoute(-10);
                                            for ($i=0; $i < 100 ; $i++) { 
                                                $ladate = dateAjoute1($ladate, 1); ?>
                                                <td id="<?= $ladate ?>" class="mp0 grid"></td>
                                            <?php  } ?>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

        <?php foreach ($reservations__ as $key => $reservation) { 
            $cris = $reservation->fourni("critere");
            if (count($cris) > 0) {
                $critere = $cris[0];
                include($this->rootPath("composants/assets/modals/modal-critere.php"));
            }
        } ?>


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>

        <?php foreach ($locations__ as $key => $location) {
            $location->actualise(); 
            include($this->rootPath("composants/assets/modals/modal-location.php"));
        } ?>

    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>

<script type="text/javascript" src="<?= $this->relativePath("../locations/script.js")  ?>"></script>
<script type="text/javascript" src="<?= $this->relativePath("../reservations/script.js")  ?>"></script>


<script type="text/javascript">
    var events =  [
    <?php foreach ($locations__ as $key => $item) {
        $item->actualise(); ?>
        {
            title: 'Location de <?= $item->client->name(); ?>',
            start: "<?= $item->started; ?>",
            end: "<?= $item->finished ?>",
            className: "bg-green",
            borderColor: "white",
            type: 'location',
            id: "<?= $item->id; ?>",
            veh: "<?= $item->vehicule->id; ?>"
        },
    <?php } ?>

    <?php foreach ($reservations__ as $key => $item) {
        if ($item->vehicule->id != null) {
            $item->actualise(); ?>
            {
                title: 'Reservation de <?= $item->client->name(); ?>',
                start: "<?= $item->started; ?>",
                end: "<?= $item->finished ?>",
                className: "bg-warning",
                borderColor: "white",
                type: 'reservation',
                id: "<?= $item->id; ?>",
                veh: "<?= $item->vehicule->id; ?>"
            },
        <?php }
    } ?>

    ];


</script>


</body>

</html>
