<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<style>
    .inventory_box{background: #116bc4;
        text-align: center;
        padding: 0px 10px !important;
        min-height: 100px;}
    .inventory_box .title_hr{font-size: 20px;color: #fff;vertical-align: middle;}
    .panel.panel-default a:hover{text-decoration: none;}
</style>
<body>
    <!-- HEADER -->
    <?php require_once ADMINVIEWPATH.'includes/inner_header.php'; ?>
    <!--/HEADER -->
    <!-- PAGE -->
    <section id="page">
        <!-- SIDEBAR -->
        <?php require_once ADMINVIEWPATH.'includes/sidebar.php'; ?>
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
                                        <li><a href="<?php echo $site_path['admin_url']; ?>/inventory">Inventory</a> </li>
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

                                    <div class="col-md-2 col-md-offset-3">
                                        <div class="dashbox panel panel-default">
                                            <a href="<?php echo BASE_URL; ?>admin/inventory/indent_request">
                                                <div class="panel-body inventory_box">
                                                    <div class="title_hr">INDENT REQUEST</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="dashbox panel panel-default">
                                            <a href="<?php echo BASE_URL; ?>admin/inventory/indent_request_approval">
                                                <div class="panel-body inventory_box">
                                                    <div class="title_hr">INDENT APPROVAL</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                                    <div class="col-md-2">
                                        <div class="dashbox panel panel-default">
                                            <a href="<?php echo BASE_URL; ?>admin/inventory/indent_outward">
                                                <div class="panel-body inventory_box">
                                                    <div class="title_hr">INDENT OUTWARD</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>

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
<?php require_once ADMINVIEWPATH.'includes/footer.php'; ?>
</html>