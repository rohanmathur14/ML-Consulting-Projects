<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo $site_path['admin_css_url']; ?>zabuto_calendar.css">
<script type="text/javascript" src="<?php echo $site_path['admin_js_url']; ?>zabuto_calendar.js"></script>
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
                                    <li> <i class="fa fa-home"></i> <a href="<?php echo $site_path['admin_url']; ?>">Home</a> </li>
                                    <li><?php echo $pageBreadCrumbs; ?></li>
                                </ul>
                                <!-- /BREADCRUMBS -->
                                <div class="clearfix">
                                    <h3 class="content-title pull-left"><?php echo $pageBreadCrumbs; ?> </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- DASHBOARD CONTENT -->
                    <!-- /PAGE HEADER -->
                    <!-- SIMPLE STRIPED -->
                    <div class="row">
                        <form method="post" id="pagination_form" name="pagination_form"  class="form-horizontal"  enctype="multipart/form-data">
                        <div class="col-md-12">
                            <!-- BOX -->
                            <?php $this->view('admin/includes/messagefile'); ?>

                                    <div class="box border blue">
                                        <div class="box-title">
                                            <h4><i class="fa fa-file-text"></i>My Attendance</h4>
                                        </div>
                                    <div class="box-body">
                                        <div id="calendar">

                                        </div>
                                    </div>
                                </div>


                            <!-- /BOX -->
                        </div>
                           </form>
                    </div>
                    <!-- SIMPLE STRIPED -->
                    <div class="separator"></div>
                </div>
                <div class="footer-tools"> <span class="go-top"> <i class="fa fa-chevron-up"></i> Top </span> </div>
            </div>
            <!-- /CONTENT-->
            <div class="separator"></div>
        </div>
    </div>
</section>
<!--/PAGE -->
</body>
<?php require_once ADMINVIEWPATH.'includes/footer.php'; ?>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("usermanager");  //Set current page

        $("#calendar").zabuto_calendar({
            ajax: {
                url: "<?php echo BASE_URL;?>admin/attendance/getHistory",
                modal:true
            },
            showPrevious: false
        });
    });
</script>
</html>