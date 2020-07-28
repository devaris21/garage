<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  

          <div class="wrapper border-bottom white-bg page-heading"><br>
            <div class="row">
                <div class="col-sm-4">
                    
                </div>
                <div class="col-sm-4 border-left">
                    <h5 class="gras text-uppercase text-blue">Recherche de marques et groupes de produits</h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>Rechercher un véhicule</label>
                            <?php Native\BINDING::html("select", "marque") ?>
                        </div>
                        <div class="col-sm-6">
                            <label>Rechercher un devis</label>
                            <?php Native\BINDING::html("select", "marque") ?>
                        </div>
                    </div><br>
                    <div>
                        <button class="btn btn-xs bg-blue pull-right"><i class="fa fa-search"></i> Rechercher</button>
                    </div><br><hr class="">

                    <h5 class="gras text-uppercase text-blue">Identification du véhicule</h5>
                    <div>
                        <label>Saisir le VIN</label>
                        <input type="text" minlength="3" maxlength="17" name="vin" class="form-control">
                    </div><br>
                    <div>
                        <button class="btn btn-xs bg-blue pull-right"><i class="fa fa-search"></i> Rechercher</button>
                    </div>
                </div>
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
            </div>
        </div>

        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">

                <div class="tabs-container">
                    <ul class="nav nav-tabs" role="tablist">
                        <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> This is tab</a></li>
                        <li><a class="nav-link" data-toggle="tab" href="#tab-2">This is second tab</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" id="tab-1" class="tab-pane active">
                            <div class="panel-body">

                                <strong>Lorem ipsum dolor sit amet, consectetuer adipiscing</strong>

                                <p>A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart. I am alone, and feel the charm of
                                existence in this spot, which was created for the bliss of souls like mine.</p>

                                <p>I am so happy, my dear friend, so absorbed in the exquisite sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at
                                the present moment; and yet I feel that I never was a greater artist than now. When.</p>
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
                
                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                         <div class="col-sm-6 col-md-4 col-lg-3" style="margin: 1%">
                            <div class="ibox">
                                <div class="ibox-content mp5">
                                    <h5><i class="fa fa-home fa-2x"></i> Last notification</h5>
                                    <table class="table table-stripped small">
                                        <tbody>
                                            <tr class="border-bottom">
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <small class="pull-right">Afficher tous >></small><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="ibox">
                                <div class="ibox-content mp5">
                                    <h5>Last notification</h5>
                                    <table class="table table-stripped small m-t-md">
                                        <tbody>
                                            <tr>
                                                <td class="no-borders">
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 2
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 3
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="ibox">
                                <div class="ibox-content mp5">
                                    <h5>Last notification</h5>
                                    <table class="table table-stripped small m-t-md">
                                        <tbody>
                                            <tr>
                                                <td class="no-borders">
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 2
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 3
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="ibox">
                                <div class="ibox-content mp5">
                                    <h5>Last notification</h5>
                                    <table class="table table-stripped small m-t-md">
                                        <tbody>
                                            <tr>
                                                <td class="no-borders">
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 2
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 3
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="ibox">
                                <div class="ibox-content mp5">
                                    <h5>Last notification</h5>
                                    <table class="table table-stripped small m-t-md">
                                        <tbody>
                                            <tr>
                                                <td class="no-borders">
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 2
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 3
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="ibox">
                                <div class="ibox-content mp5">
                                    <h5>Last notification</h5>
                                    <table class="table table-stripped small m-t-md">
                                        <tbody>
                                            <tr>
                                                <td class="no-borders">
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td  class="no-borders">
                                                    Example element 1
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 2
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <i class="fa fa-circle text-danger"></i>
                                                </td>
                                                <td>
                                                    Example element 3
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Lorem ipsum dolor.</h5>
                        </div>
                        <div class="ibox-content mp0">
                            <div class="row text-center">
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>

                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>

                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
                                <div class="col-sm-3"><img src="http://dummyimage.com/40x40/4d494d/686a82.gif&text=placeholder+image"></div>
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
