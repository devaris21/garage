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
                <h2>Planning de locations et reservations</h2>
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
            <div class="row animated fadeInDown d-flex justify-content-center">
                <div class="col-lg-11">
                    <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Striped Table </h5>
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
                        <div class="ibox-content">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>
        

    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


<script type="text/javascript">
    var events =  [
    <?php foreach ($locations__ as $key => $item) {
        $item->actualise(); ?>
        {
            title: 'Location de <?= $item->client->name(); ?> // <?= $item->vehicule->immatriculation; ?>',
            start: "<?= dateAjoute1($item->started, +1); ?>",
            end: "<?= dateAjoute1($item->finished, +1); ?>",
            className: "bg-green",
            border: "white",
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
        start: "<?= dateAjoute1($item->started, +1); ?>",
        end: "<?= dateAjoute1($item->finished, +1); ?>",
        className: "bg-danger",
        border: "white",
        extendedProps: {
            type: 'reservation',
            id: "<?= $item->id; ?>"
        }
    },
<?php } ?>

]
</script>
</body>

</html>
