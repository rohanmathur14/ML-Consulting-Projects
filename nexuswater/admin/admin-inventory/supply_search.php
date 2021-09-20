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
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/supply">Supply Placement</a> </li>
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
                                                <form enctype="multipart/form-data" method="post" name="searchSupply" id="searchSupply" action="<?php echo $site_path['admin_url']; ?>inventory/s_search"  class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Project</label>
                                                        <div class="col-md-7">
                                                            <select name="project_id" id="project_id" class="form-control">
                                                                <option value="">Select</option>
                                                                <?php if(!empty($projects)){foreach($projects as $project){?>
                                                                    <option value="<?php echo $project['id'];?>"><?php echo $project['name'];?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Description of material</label>
                                                        <div class="col-md-7">
                                                            <select name="item_description_ele" id="item_description_ele" class="form-control select2">
                                                                <option value="">Select</option>
                                                            </select>
                                                            <input type="hidden" id="item_description_id" name="item_description_id">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Name of Vendor</label>
                                                        <div class="col-md-4 mr_t">
                                                            <div id="vendor_name">N/A</div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">PO Order Number</label>
                                                        <div class="col-md-3">
                                                            <input type="text" name="po_order_number" id="po_order_number" class="form-control" autocomplete="off">
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

<script type="text/javascript" src="<?php echo JS_PATH; ?>admin/select2/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH; ?>admin/select2/select2.min.css" id="skin-switcher">

<script type="text/javascript" src="<?php echo JS_PATH; ?>uploads.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("AddAdminUser");

        var $eventSelect = $("#item_description_ele");
        $eventSelect.select2();

        $('#project_id').change(function(){
            getMrData($(this).val());
        });

        function getMrData(projectId)
            {
                //$eventSelect.clearing();
                $('#item_description_id').val('');
                $('#searchSupply').bootstrapValidator('revalidateField','item_description_id');
                $('#vendor_name').html('N/A');
                var mr_html = '<option value="">Select</option>';
                if(projectId>0)
                    {
                        ajaxLoaderStart();
                        $.ajax({
                            'type': 'post',
                            'url': SiteUrl + 'admin/inventory/getMrData',
                            'dataType': 'json',
                            'data':{'project_id':projectId},
                            'success': function (data) {
                                ajaxLoaderStop();
                                if(data.status=='1')
                                    {
                                        if(data.data.length>0)
                                            {
                                                for(p=0;p<data.data.length;p++)
                                                    {
                                                        mr_html+= '<option value="'+data.data[p]['id']+'" data-aa="testing">'+data.data[p]['item_description']+'</option>';
                                                    }
                                            }
                                        $('#item_description_ele').html(mr_html);
                                    }
                                else
                                    {
                                        alert(data.msg);
                                        $('#item_description_ele').html(mr_html);
                                    }
                            }
                        });
                    }
                else{
                    $('#item_description_ele').html(boq_html);
                }
            }

        function getMrDetail(mr_Id)
            {
                $('#vendor_name').html('N/A');
                var mr_html = '<option value="">Select</option>';
                if(mr_Id>0)
                {
                    ajaxLoaderStart();
                    $.ajax({
                        'type': 'post',
                        'url': SiteUrl + 'admin/inventory/getMrDetail',
                        'dataType': 'json',
                        'data':{'mr_id':mr_Id},
                        'success': function (data) {
                            ajaxLoaderStop();
                            console.log(data);
                            if(data.status=='1')
                            {
                                $('#vendor_name').html(data.data.vendor_name);
                            }
                            else
                            {
                                alert(data.msg);
                            }
                        }
                    });
                }
                else{
                    //
                }
            }

        $('#searchSupply').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            fields: {
                    project_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required and can\'t be empty'
                            }
                        }
                    },
                    item_description_id: {
                        validators: {
                            notEmpty: {
                                message: 'Required and can\'t be empty'
                            }
                        }
                    },
                    po_order_number: {
                        validators: {
                            notEmpty: {
                                message: 'Required and can\'t be empty'
                            }
                        }
                    }
            }
        });

        $('#item_description_ele').on('select2:select', function (e) {
            var data = e.params.data;
            if(data.id>0)
                {
                    $('#item_description_id').val(data.id);
                    getMrDetail(data.id);
                }
            else
                {
                    $('#vendor_name').html('N/A');
                    $('#item_description_id').val('');
                }
            $('#searchSupply').bootstrapValidator('revalidateField','item_description_id');
        });
    });
</script>
</body>
</html>