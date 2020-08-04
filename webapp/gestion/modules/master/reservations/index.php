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
                <h2 class="text-uppercase gras">Les reservations en cours</h2>
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
                    <a href="<?= $this->url("gestion", "master", "newreservation")  ?>" class="btn btn-primary dim"><i class="fa fa-plus"></i> Nouvelle reservation</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Liste des reservations</h5>
                    </div>

                    <?php foreach ($reservations as $key => $reservation) { ?>
                        <div class="ibox-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <tbody>
                                        <tr>
                                            <td width="90">
                                                <div class="cart-product-imitation">
                                                </div>
                                            </td>
                                            <td class="desc">
                                                <h3>Reservation N°<?= $reservation->reference ?></h3>
                                                <p class="small">
                                                    It is a long established fact that a reader will be distracted by the readable
                                                    content of a page when looking at its layout. The point of using Lorem Ipsum is
                                                </p>
                                                <dl class="small m-b-none">
                                                    <dt>Description lists</dt>
                                                    <dd>A description list is perfect for defining terms.</dd>
                                                </dl>

                                                <div class="m-t-sm">Du <?= datecourt($reservation->started) ?> au <?= datecourt($reservation->finished) ?> (<?= ceil(dateDiffe($reservation->started, $reservation->finished)) ?> jours)</div>
                                            </td>

                                            <td>
                                                $180,00
                                                <s class="small text-muted">$230,00</s>
                                            </td>
                                            <td width="65">
                                                <input type="text" class="form-control" placeholder="1">
                                            </td>
                                            <td>
                                                <h4>
                                                    $180,00
                                                </h4>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } ?>

                    <div class="ibox-content">
                        <button class="btn btn-primary float-right"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                        <button class="btn btn-white"><i class="fa fa-arrow-left"></i> Continue shopping</button>
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
