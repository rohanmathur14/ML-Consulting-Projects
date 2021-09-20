<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css"/>
<style type="text/css">
    .imgTitle{float: left;}
    .upimgopt{float: left;}
    .btn-file.browse-but{clear: both;display: block;}
    .listingResult{display: block;margin: 10px auto;min-height: 21px;font-size: 16px;}
    .deleteimg{color:#ac1111;margin-left: 20px;}
    .mr_t{margin-top: 8px;font-size: 15px;}
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
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/outward">Outward</a> </li>
                                    <li><?php echo $pageBreadCrumbs; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /PAGE HEADER -->
                    <!-- USER PROFILE -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php $this->view('admin/includes/messagefile'); ?>
                                </div>
                            </div>
                            <!-- BOX -->
                            <div class="box border">
                                <div class="box-title">
                                    <h4><i class="fa fa-cogs fa-fw"></i><span class="hidden-inline-mobile"><?php echo $pageBreadCrumbs; ?></span></h4>
                                </div>
                            <div>
                                <div class="tabbable header-tabs user-profile">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="javascript:void(0);"><i class="fa fa-dot-circle-o"></i><span class="hidden-inline-mobile"><?php echo $pageBreadCrumbs; ?></span></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- OVERVIEW -->
                                        <div class="tab-pane fade in active" id="personal_information">
                                            <div class="box-body ">
                                                <form enctype="multipart/form-data" method="post" name="searchIndent" id="searchIndent" action="<?php echo $site_path['admin_url']; ?>inventory/indent_outward"  class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Indent No</label>
                                                        <div class="col-md-3">
                                                            <input type="text" name="indent_no" id="indent_no" class="form-control" autocomplete="off">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">&nbsp;</label>
                                                        <div class="col-md-6"> <input type="submit" class="btn btn-primary" value="Search" name="addUser"></div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /USER PROFILE -->
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="footer-tools">
                            <span class="go-top">
                                <i class="fa fa-chevron-up"></i> Top
                            </span>
                        </div>

                    </div><!-- /CONTENT-->
                </div>
            </div>
        </div>
</section>
<!--/PAGE -->
<?php require_once ADMINVIEWPATH.'includes/footer.php'; ?>
<script type="text/javascript" src="<?php echo JS_PATH; ?>uploads.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("AddAdminUser");

        $('#searchIndent').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            fields: {
                    indent_no: {
                        validators: {
                            notEmpty: {
                                message: 'Required and can\'t be empty'
                            }
                        }
                    }
            }
        });
    });
</script>
</body>
</html>