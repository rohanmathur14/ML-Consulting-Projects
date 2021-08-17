<?php require_once 'includes/header.php'; ?>

<body>
    <!-- HEADER -->
    <?php require_once 'includes/inner_header.php'; ?>
    <!--/HEADER -->
    <!-- PAGE -->
    <section id="page">
        <!-- SIDEBAR -->
        <?php //require_once 'includes/sidebar.php'; ?>
        <!-- /SIDEBAR -->
        <div id="main-content">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-lg-12">
                        <!-- PAGE HEADER-->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-header">
                                    <!-- BREADCRUMBS -->
                                    <ul class="breadcrumb">
                                        <li>
                                            <i class="fa fa-home"></i>
                                            <a href="<?php echo $site_path['admin_url']; ?>">Home</a>
                                        </li>
                                        <li><?php echo $pageBreadCrumbs; ?></li>
                                    </ul>
                                    <!-- /BREADCRUMBS -->
                                    <div class="clearfix">
                                        <h3 class="content-title pull-left"><?php echo $pageBreadCrumbs; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /PAGE HEADER -->
                        <!-- DASHBOARD CONTENT -->

                        <div class="row">
                            <!-- COLUMN 1 -->
                            <div class="col-md-12">
                                <!-- load flash message file -->
                                <?php $this->view('admin/includes/messagefile'); ?>

                                <div class="row">

                                    <?php
                                    if($adminDetail['main_admin']=='1'){
                                        ?>

                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/users">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory">
                                                            <i class="fa fa-users"></i>
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Super User Manager</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/emailtemplates">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory">
                                                            <i class="fa fa-envelope-o"></i>
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Email Templates</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/index/adminSetting">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory">
                                                            <i class="fa fa-cog"></i>
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Settings</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                    <?php }
                                    else{?>

                                        <!--<div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php /*echo BASE_URL; */?>admin">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory">
                                                            <img src="<?php /*echo BASE_URL; */?>images/admin/Inventory.png" title="Projects" alt="Projects">
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Projects</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php /*echo BASE_URL; */?>admin">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory" style="height: 76px;">
                                                            <i class="fa fa-users"></i>
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Employees</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php /*echo BASE_URL; */?>admin">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory" style="height: 76px;">
                                                            <i class="fa fa-clock-o"></i>
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Employees Attendance</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>-->


                                        <?php if($adminDetail['user_type']=='0'){?>
                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/inventory">
                                                    <div class="panel-body">
                                                        <div class="panel-left inventory">
                                                            <img src="<?php echo BASE_URL; ?>images/admin/Inventory.png" title="Inventory" alt="Inventory">
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Inventory</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/index/dashboard_hr">
                                                    <div class="panel-body">
                                                        <div class="panel-left human_resources">
                                                            <img src="<?php echo BASE_URL; ?>images/admin/human-resources.png" title="Human Resources" alt="Human Resources">
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Human Resources</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/projects">
                                                    <div class="panel-body">
                                                        <div class="panel-left boq">
                                                            <img src="<?php echo BASE_URL; ?>images/admin/boq.png" title="BOQ" alt="BOQ">
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">BOQ</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>


                                        <div class="col-md-3">
                                            <div class="dashbox panel panel-default">
                                                <a href="<?php echo BASE_URL; ?>admin/equipments">
                                                    <div class="panel-body">
                                                        <div class="panel-left equipment">
                                                            <img src="<?php echo BASE_URL; ?>images/admin/equipment.png" title="Equipment" alt="Equipment">
                                                        </div>
                                                        <div class="panel-right">
                                                            <div class="title_hr">Equipment</div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <?php }else{ ?>
                                            <div class="col-md-12">
                                                <div class="box border blue">
                                                    <div class="box-title">
                                                        <h4><i class="fa fa-file-text"></i>Project Detail</h4>
                                                    </div>
                                                    <div class="box-body">
                                                        <?php if(!empty($projectDetail)){?>
                                                        <table class="table no_border">
                                                            <tr>
                                                                <td width="200px">Name</td>
                                                                <td><?php echo $projectDetail['name'];?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Start Date</td>
                                                                <td><?php echo convert_sqltime_to_calnderdate(strtotime($projectDetail['start_date']));?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>End Date</td>
                                                                <td><?php echo convert_sqltime_to_calnderdate(strtotime($projectDetail['end_date']));?></td>
                                                            </tr>
                                                            <!--<tr>
                                                                <td>Your Role</td>
                                                                <td></td>
                                                            </tr>-->
                                                            <tr>
                                                                <td>Description</td>
                                                                <td><?php echo $projectDetail['description'];?></td>
                                                            </tr>
                                                        </table>
                                                        <?php }else{ ?>
                                                            <p class="alert alert-danger">You don't have any project.</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                                <?php if(!empty($projectDetail)){?>
                                                    <div class="col-md-3">
                                                        <div class="dashbox panel panel-default">
                                                            <a href="<?php echo BASE_URL; ?>admin/projects/boq/<?php echo $projectDetail['id'];?>">
                                                                <div class="panel-body">
                                                                    <div class="panel-left boq">
                                                                        <img src="<?php echo BASE_URL; ?>images/admin/boq.png" title="BOQ" alt="BOQ">
                                                                    </div>
                                                                    <div class="panel-right">
                                                                        <div class="title_hr">BOQ</div>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                        <?php } ?>

                                    <?php }
                                    ?>


                                </div>
                            </div>

                        </div>

                        <div class="footer-tools">
                            <span class="go-top">
                                <i class="fa fa-chevron-up"></i> Top
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/PAGE -->

    <script>
        jQuery(document).ready(function () {
            App.setPage("dashboard");  //Set current page
        });

    </script>
</body>
<?php require_once 'includes/footer.php'; ?>
</html>