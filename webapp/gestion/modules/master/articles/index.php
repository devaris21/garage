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

                <div class="grid row" >

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold text-uppercase">FILTRES </h4><br>
                                <table class="table table-stripped">
                                    <tbody>
                                        <tr class="border-bottom">
                                            <td>
                                                <i class="fa fa-eye cursor myPopover"
                                                data-toggle="popover"
                                                data-placement="right"
                                                title="<small><b>FILTRES</b> | Filtre à air</small>"
                                                data-trigger="hover"
                                                data-html="true"
                                                data-content="<span>Stock de veille : <b>120</b></span><br> <span>Production du jour : <b>120</b></span><br>  <span>Livraisons du jour : <b>120</b></span><br> <span>Perte : <b>120</b></span> 
                                                <hr style='margin:1.5%'> <span>Ref : <b>4589AS4</b></span><br> <span>">
                                                </i>
                                            </td>
                                            <td  class="no-borders"><a href="">Lorem ipsum dolor.</a></td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td><i class="fa fa-info"></i></td>
                                            <td  class="no-borders">
                                                Example element 1
                                            </td>
                                            <td class="text-right">10</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td><i class="fa fa-info"></i></td>

                                            <td  class="no-borders">
                                                Example element 1
                                            </td>
                                            <td class="text-right"><button class="btn btn-xs btn-outline btn-rounded small"> TecDoc</button></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td><i class="fa fa-info"></i></td>

                                            <td  class="no-borders">
                                                Example element 1
                                            </td>
                                            <td class="text-right">10</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                            </div>
                        </div>
                    </div>

                    <div class="grid-item col-sm-6 col-md-4 col-lg-3">
                        <div class="ibox">
                            <div class="ibox-content">
                                <h4 class="font-bold">
                                    Example masonary box
                                </h4>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
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
