<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css"/>
<style type="text/css">
    .imgTitle{float: left;}
    .upimgopt{float: left;}
    .btn-file.browse-but{clear: both;display: block;}
    .listingResult{display: block;margin: 10px auto;min-height: 21px;font-size: 16px;}
    .deleteimg{color:#ac1111;margin-left: 20px;}
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
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/material_request">Material Required</a> </li>
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
                                                <form enctype="multipart/form-data" method="post" name="addMr" id="addMr" action="<?php echo $site_path['admin_url']; ?>inventory/mr_add"  class="form-horizontal">
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Project</label>
                                                        <div class="col-md-7">
                                                            <select name="project_id" id="project_id" class="form-control select2">
                                                                <option value="">Select</option>
                                                                <?php if(!empty($projects)){foreach($projects as $project){?>
                                                                    <option value="<?php echo $project['id'];?>" <?php if(isset($FormData['project_id']) && $FormData['project_id']==$project['id']){echo 'selected="selected"';} ?>><?php echo $project['name'];?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <?php if($adminDetail['user_type']=='0'){?>
                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Project Manager</label>
                                                        <div class="col-md-7">
                                                            <select name="project_manager_id" id="project_manager_id" class="form-control">
                                                                <option value="">Select</option>
                                                                <?php /*if(!empty($projects)){foreach($projects as $project){*/?><!--
                                                                    <option value="<?php /*echo $project['id'];*/?>" <?php /*if(isset($FormData['project_manager_id']) && $FormData['project_manager_id']==$project['id']){echo 'selected="selected"';} */?>><?php /*echo $project['name'];*/?></option>
                                                                --><?php /*}} */?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Store Incharge</label>
                                                        <div class="col-md-7">
                                                            <select name="store_manager_id" id="store_manager_id" class="form-control">
                                                                <option value="">Select</option>
                                                                <?php /*if(!empty($projects)){foreach($projects as $project){*/?><!--
                                                                    <option value="<?php /*echo $project['id'];*/?>" <?php /*if(isset($FormData['store_manager_id']) && $FormData['store_manager_id']==$project['id']){echo 'selected="selected"';} */?>><?php /*echo $project['name'];*/?></option>
                                                                --><?php /*}} */?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Description of material</label>
                                                        <div class="col-md-7">
                                                            <textarea class="form-control" name="item_description" id="item_description" rows="4"><?php if((isset($_POST['item_description'])) && ($_POST['item_description']!='')){ echo $_POST['item_description'];} ?></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Required Quantity</label>
                                                        <div class="col-md-2">
                                                            <input type="text" name="required_qty" id="required_qty" class="form-control number" value="<?php if((isset($_POST['required_qty'])) && ($_POST['required_qty']!='')){ echo $_POST['required_qty'];} ?>" >
                                                        </div>

                                                        <label class="col-md-1 control-label">Unit</label>
                                                        <div class="col-md-2">
                                                            <select name="unit_type" id="unit_type" class="form-control">
                                                                <option value="">Select</option>
                                                                <?php if(!empty($unit_types)){foreach($unit_types as $unit_type){?>
                                                                    <option value="<?php echo $unit_type['id'];?>" <?php if(isset($FormData['unit_type']) && $FormData['unit_type']==$unit_type['id']){echo 'selected="selected"';} ?>><?php echo $unit_type['title'];?></option>
                                                                <?php }} ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Quantity taken from BOQ Item No</label>
                                                        <div class="col-md-7">
                                                            <select name="boq_item_id" id="boq_item_id" class="form-control">
                                                                <option value="">Select</option>
                                                                <?php /*if(!empty($projects)){foreach($projects as $project){*/?><!--
                                                                    <option value="<?php /*echo $project['id'];*/?>" <?php /*if(isset($FormData['boq_item_id']) && $FormData['boq_item_id']==$project['id']){echo 'selected="selected"';} */?>><?php /*echo $project['name'];*/?></option>
                                                                --><?php /*}} */?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-3 control-label">&nbsp;</label>
                                                        <div class="col-md-6"> <input type="submit" class="btn btn-primary" value="Submit" name="addUser"></div>
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
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("AddAdminUser");

        $('#project_id').change(function(){
            getData($(this).val());
        });

        function getData(projectId)
            {
                var pm_html = '<option value="">Select</option>';
                var s_html = '<option value="">Select</option>';
                var boq_html = '<option value="">Select</option>';
                if(projectId>0)
                    {
                        ajaxLoaderStart();
                        $.ajax({
                            'type': 'post',
                            'url': SiteUrl + 'admin/inventory/getData',
                            'dataType': 'json',
                            'data':{'project_id':projectId},
                            'success': function (data) {
                                //console.log(data.data.project_manager.length);
                                ajaxLoaderStop();
                                if(data.status=='1')
                                    {
                                        if(data.data.project_manager.length>0)
                                            {
                                                for(p=0;p<data.data.project_manager.length;p++)
                                                    {
                                                        pm_html+= '<option value="'+data.data.project_manager[p]['id']+'">'+data.data.project_manager[p]['display_text']+'</option>';
                                                    }
                                            }
                                        if(data.data.store_manager.length>0)
                                            {
                                                for(p=0;p<data.data.store_manager.length;p++)
                                                {
                                                    s_html+= '<option value="'+data.data.store_manager[p]['id']+'">'+data.data.store_manager[p]['display_text']+'</option>';
                                                }
                                            }
                                        if(data.data.boq_items.length>0)
                                            {
                                                for(p=0;p<data.data.boq_items.length;p++)
                                                {
                                                    boq_html+= '<option value="'+data.data.boq_items[p]['boq_item_id']+'">'+data.data.boq_items[p]['boq_item_title']+'</option>';
                                                }
                                            }
                                        //alert($('#project_manager_id').length);
                                        if($('#project_manager_id').length>0){$('#project_manager_id').html(pm_html);}
                                        $('#store_manager_id').html(s_html);
                                        $('#boq_item_id').html(boq_html);
                                    }
                                else
                                    {
                                        alert(data.msg);
                                        if($('#project_manager_id').length>0){$('#project_manager_id').html('');}
                                        $('#store_manager_id').html('');
                                        $('#boq_item_id').html('');
                                    }
                            }
                        });
                    }
                else{
                    if($('#project_manager_id').length>0){$('#project_manager_id').html('');}
                    $('#store_manager_id').html('');
                    $('#boq_item_id').html('');
                }
            }

        $('#addMr').formValidation({
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
                item_description: {
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