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
                    <a href="<?= $this->url("gestion", "")  ?>" class="btn btn-primary dim"><i class="fa fa-plus"></i> Nouvelle reservation</a>
                </div>
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Liste des reservations</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="product-images">
                                    <div>
                                        <div class="image-imitation">
                                            [IMAGE 1]
                                        </div>
                                    </div>
                                    <div>
                                        <div class="image-imitation">
                                            [IMAGE 2]
                                        </div>
                                    </div>
                                    <div>
                                        <div class="image-imitation">
                                            [IMAGE 3]
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">

                                <h2 class="font-bold m-b-xs">
                                    Desktop publishing software
                                </h2>
                                <small>Many desktop publishing packages and web page editors now.</small>
                                <div class="m-t-md">
                                    <h2 class="product-main-price">$406,602 <small class="text-muted">Exclude Tax</small> </h2>
                                </div>
                                <hr>

                                <h4>Product description</h4>

                                <div class="small text-muted">
                                    It is a long established fact that a reader will be distracted by the readable
                                    content of a page when looking at its layout. The point of using Lorem Ipsum is

                                    <br/>
                                    <br/>
                                    There are many variations of passages of Lorem Ipsum available, but the majority
                                    have suffered alteration in some form, by injected humour, or randomised words
                                    which don't look even slightly believable.
                                </div>
                                <dl class="small m-t-md">
                                    <dt>Description lists</dt>
                                    <dd>A description list is perfect for defining terms.</dd>
                                    <dt>Euismod</dt>
                                    <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
                                    <dd>Donec id elit non mi porta gravida at eget metus.</dd>
                                    <dt>Malesuada porta</dt>
                                    <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
                                </dl>
                                <hr>

                                <div>
                                    <div class="btn-group">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Add to cart</button>
                                        <button class="btn btn-white btn-sm"><i class="fa fa-star"></i> Add to wishlist </button>
                                        <button class="btn btn-white btn-sm"><i class="fa fa-envelope"></i> Contact with author </button>
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
