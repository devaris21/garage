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
                <h2 class="text-uppercase">Les bons de sorties</h2>
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

               <div class="ibox">
                   <div class="ibox-content">


                    <div class="table-responsive">
                        <table class="table table-hover issue-tracker">
                            <thead>
                                <tr>
                                    <th colspan="2">Reference</th>
                                    <th>Agence</th>
                                    <th>Technicien</th>
                                    <th>Nb Articles</th>
                                    <th class="text-right">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="label label-primary">En attente</span>
                                    </td>
                                    <td class="issue-info">
                                        <a href="#" class="text-uppercase">bon de sortie N° jlzkfj</a>
                                        <small>Emise depuis le ....</small>
                                    </td>
                                    <td>Adrian Novak</td>
                                    <td class="text-center">03</td>
                                    <td class="text-right">
                                        <button class="btn btn-white btn-xs"><i class="fa fa-check text-green"></i> Croiser la liste</button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-eye"></i> Voir la liste</button>
                                        <button class="btn btn-white btn-xs"><i class="fa fa-close text-danger"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="label label-primary">Added</span>
                                    </td>
                                    <td class="issue-info">
                                        <a href="#">
                                            ISSUE-17
                                        </a>

                                        <small>
                                            Desktop publishing packages and web page editors now use Lorem Ipsum as their default model text
                                        </small>
                                    </td>
                                    <td>
                                        Anna Smith
                                    </td>                                    
                                    <td>
                                        02.03.2015 06:02 am
                                    </td>
                                    <td>
                                        <span class="pie">3,2</span>
                                        2d
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-white btn-xs"> Tag</button>
                                        <button class="btn btn-white btn-xs"> Rag</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="label label-primary">Added</span>
                                    </td>
                                    <td class="issue-info">
                                        <a href="#">
                                            ISSUE-12
                                        </a>

                                        <small>
                                            It is a long established fact that a reader will be
                                        </small>
                                    </td>
                                    <td>
                                        Anthony Jackson
                                    </td>
                                    <td>
                                        02.03.2015 06:02 am
                                    </td>
                                    <td>
                                        <span class="pie">1,2</span>
                                        1d
                                    </td>
                                    <td class="text-right">
                                        <button class="btn btn-white btn-xs"> Tag</button>
                                        <button class="btn btn-white btn-xs"> Mag</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
