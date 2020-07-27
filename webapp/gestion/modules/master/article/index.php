<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">


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
                                <div class="col-md-7">

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
                        <div class="ibox-footer">
                            <span class="float-right">
                                Full stock - <i class="fa fa-clock-o"></i> 14.04.2016 10:04 pm
                            </span>
                            The generated Lorem Ipsum is therefore always free
                        </div>
                    </div>

                </div>
            </div>



            <div>
                <div class="tabs-container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Ces pièces peuvent faire l'affaire (TecDoc)</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" id="tab-1" class="tab-pane active">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Images</th>
                                            <th>Description</th>
                                            <th>Qté dispo</th>
                                            <th>P.U TTC</th>
                                            <th>Lable</th>
                                            <th>P.U Net</th>
                                            <th>Marge de prix</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="http://dummyimage.com/100x70/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image"><br><br>
                                                <img src="http://dummyimage.com/100x50/4d494d/686a82.gif&text=placeholder+image" alt="placeholder+image">
                                            </td>
                                            <td>
                                                <div><strong>Description de l'artcile</strong> // Marque</div>
                                                <small>La liste de tous les details ut labore et dolore magna aliqua.</small><br>
                                                <small>reference - etat</small>
                                            </td>
                                            <td>1</td>
                                            <td>$26.00</td>
                                            <td>$5.98</td>
                                            <td>le lable</td>
                                            <td>$31,98 - $31,98</td>
                                            <td><button class="btn btn-white btn-xs"><i class="fa fa-plus text-green"></i> Ajouter</button>
                                            </td>
                                        </tr>
                                        <tr><div><strong>Admin Theme with psd project layouts</strong></div>
                                            <small>Lorem ipsum dolor sit amet, tempor incididunt ut labore et dolore magna aliqua.</small></td>
                                            <td>1</td>
                                            <td>$26.00</td>
                                            <td>$5.98</td>
                                            <td>$31,98</td>
                                            <td><i class="fa fa-trash text-danger"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div role="tabpanel" id="tab-2" class="tab-pane">
                            <div class="panel-body">
                                <strong>Donec quam felis</strong>

                                <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
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
