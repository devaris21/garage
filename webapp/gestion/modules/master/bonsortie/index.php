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
                <h2 class="text-uppercase">Liste des devis</h2>
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
            <div class=" animated fadeInRightBig">
                <div class="row">
                    <div class="col-md-4">
                        <div class="ibox">
                            <div class="ibox-content">
                                <table class="table table-hover margin bottom">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Ref.</th>
                                            <th>Pièce</th>
                                            <th style="width: 1%" class="text-center">NB</th>
                                            <th ></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center small">16 Jun 2014</td>
                                            <td> Security doors</td>
                                            <td class="text-center">x1</td>
                                            <td class="text-center cursor"><i class="fa fa-search"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="ibox">
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                                        <thead>
                                            <tr>

                                                <th data-toggle="true">Product Name</th>
                                                <th data-hide="phone">Model</th>
                                                <th data-hide="all"></th>
                                                <th data-hide="phone">Price</th>
                                                <th data-hide="phone,tablet" ></th>
                                                <th data-hide="phone">Status</th>
                                                <th class="text-right" data-sort-ignore="true">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                   Example product 1
                                               </td>
                                               <td>
                                                Model 1
                                            </td>
                                            <td>
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
                                                                    <h3>
                                                                        <a href="#" class="text-navy">
                                                                            CRM software
                                                                        </a>
                                                                    </h3>
                                                                    <p class="small">
                                                                        Distracted by the readable
                                                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                                                    </p>
                                                                    <dl class="small m-b-none">
                                                                        <dt>Description lists</dt>
                                                                        <dd>A description list is perfect for defining terms.</dd>
                                                                    </dl>

                                                                    <div class="m-t-sm">
                                                                        <a href="#" class="text-muted"><i class="fa fa-gift"></i> Add gift package</a>
                                                                        |
                                                                        <a href="#" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>
                                                                    </div>
                                                                </td>

                                                                <td>
                                                                    $110,00
                                                                </td>
                                                                <td width="65">
                                                                    <input type="text" class="form-control" placeholder="1">
                                                                </td>
                                                                <td>
                                                                    <h4>
                                                                        $110,00
                                                                    </h4>
                                                                </td>

                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                            </div>
                                        </td>
                                        <td>
                                            $50.00
                                        </td>
                                        <td>
                                            1000
                                        </td>
                                        <td>
                                            <span class="label label-primary">Enable</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <button class="btn-white btn btn-xs">View</button>
                                                <button class="btn-white btn btn-xs">Edit</button>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                           Example product 1
                                       </td>
                                       <td>
                                        Model 1
                                    </td>
                                    <td>
                                        It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout. The point of using Lorem Ipsum is
                                        that it has a more-or-less normal distribution of letters, as opposed to using
                                        'Content here, content here', making it look like readable English.
                                    </td>
                                    <td>
                                        $50.00
                                    </td>
                                    <td>
                                        1000
                                    </td>
                                    <td>
                                        <span class="label label-primary">Enable</span>
                                    </td>
                                    <td class="text-right">
                                        <div class="btn-group">
                                            <button class="btn-white btn btn-xs">View</button>
                                            <button class="btn-white btn btn-xs">Edit</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <ul class="pagination float-right"></ul>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
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
