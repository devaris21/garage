<!DOCTYPE html>
<html>

<?php include($this->rootPath("webapp/gestion/elements/templates/head.php")); ?>


<body class="fixed-sidebar">

    <div id="wrapper">

        <?php include($this->rootPath("webapp/gestion/elements/templates/sidebar.php")); ?>  

        <div id="page-wrapper" class="gray-bg">

          <?php include($this->rootPath("webapp/gestion/elements/templates/header.php")); ?>  


          <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-6">
                <h2>File Manager</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        App Views
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>File Manager</strong>
                    </li>
                </ol>
            </div>
        </div>



        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">
                <div class="ibox">
                    <div class="tabs-container">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> This is tab</a></li>
                            <li><a class="nav-link" data-toggle="tab" href="#tab-2">This is second tab</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" id="tab-1" class="tab-pane active">
                                <div class="panel-body">

                                  <div class="ibox">
                                    <div class="ibox-title">
                                        <h5>All projects assigned to this account</h5>
                                        <div class="ibox-tools">
                                            <a href="" class="btn btn-primary btn-xs">Create new project</a>
                                        </div>
                                    </div>
                                    <div class="ibox-content">
                                            <div class="project-list">

                                                <table class="table table-hover">
                                                    <tbody>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Contract with Zender Company</a>
                                                                <br/>
                                                                <small>Created 14.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 48%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a1.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a2.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a4.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a5.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">There are many variations of passages</a>
                                                                <br/>
                                                                <small>Created 11.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 28%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 28%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a7.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a6.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-default">Unactive</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                                <br/>
                                                                <small>Created 10.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 8%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 8%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a5.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Letraset sheets containing</a>
                                                                <br/>
                                                                <small>Created 22.07.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 83%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 83%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a2.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a1.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a7.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Contrary to popular belief</a>
                                                                <br/>
                                                                <small>Created 14.07.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 97%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 97%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a4.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Contract with Zender Company</a>
                                                                <br/>
                                                                <small>Created 14.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 48%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 48%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a1.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a2.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a4.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a5.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">There are many variations of passages</a>
                                                                <br/>
                                                                <small>Created 11.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 28%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 28%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a7.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a6.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-default">Unactive</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Many desktop publishing packages and web</a>
                                                                <br/>
                                                                <small>Created 10.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 8%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 8%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a5.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Letraset sheets containing</a>
                                                                <br/>
                                                                <small>Created 22.07.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 83%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 83%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a2.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a1.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">Contrary to popular belief</a>
                                                                <br/>
                                                                <small>Created 14.07.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 97%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 97%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a4.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="project-status">
                                                                <span class="label label-primary">Active</span>
                                                            </td>
                                                            <td class="project-title">
                                                                <a href="project_detail.html">There are many variations of passages</a>
                                                                <br/>
                                                                <small>Created 11.08.2014</small>
                                                            </td>
                                                            <td class="project-completion">
                                                                <small>Completion with: 28%</small>
                                                                <div class="progress progress-mini">
                                                                    <div style="width: 28%;" class="progress-bar"></div>
                                                                </div>
                                                            </td>
                                                            <td class="project-people">
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a7.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a6.jpg"></a>
                                                                <a href=""><img alt="image" class="rounded-circle" src="img/a3.jpg"></a>
                                                            </td>
                                                            <td class="project-actions">
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-folder"></i> View </a>
                                                                <a href="#" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
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
        </div>


        <?php include($this->rootPath("webapp/gestion/elements/templates/footer.php")); ?>


    </div>
</div>


<?php include($this->rootPath("webapp/gestion/elements/templates/script.php")); ?>


<style type="text/css">
    .connectList li{
        font-size: 11px;
        padding: 5px !important;
    }
</style>

</body>

</html>
