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
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/vendor_approval">Vendor Approval</a> </li>
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
                                                <form enctype="multipart/form-data" method="post" name="addVa" id="addVa" action="<?php echo $site_path['admin_url']; ?>inventory/va_add"  class="form-horizontal">

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
                                                        <label class="col-md-2 control-label">Project Manager</label>
                                                        <div class="col-md-7 mr_t">
                                                            <div id="project_manager">N/A</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Store Incharge</label>
                                                        <div class="col-md-7 mr_t">
                                                            <div id="store_manager">N/A</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Required Quantity</label>
                                                        <div class="col-md-2 mr_t">
                                                            <div id="required_qty">N/A</div>
                                                        </div>

                                                        <label class="col-md-1 control-label">Unit</label>
                                                        <div class="col-md-2 mr_t">
                                                            <div id="unit_type">N/A</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Quantity taken from BOQ Item No</label>
                                                        <div class="col-md-7 mr_t">
                                                            <div id="boq_item">N/A</div>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Name of the Selected Vendor</label>
                                                        <div class="col-md-4 mr_t">
                                                            <input type="text" name="vendor_name" id="vendor_name" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-4 control-label">Is approval of vendor required form Client / Department</label>
                                                        <div class="col-md-2 mr_t">
                                                            <input type="radio" class="form-check-input" name="is_approved_client_department" value="1" checked="checked">Yes  &nbsp;
                                                            <input type="radio" class="form-check-input" name="is_approved_client_department" value="0" >No
                                                        </div>
                                                    </div>

                                                    <div class="form-group" id="attach_ele">
                                                        <label class="col-md-2 control-label">Attach Credentials (If Yes)</label>
                                                        <div class="col-md-5">
                                                            <div class="input-group">
                                                                <?php $uploadIdAttachment = 'attachment';?>
                                                                <span class="input-group-btn1 ">
                                                                    <div class="progressCont">
                                                                        <div class="progress" id="progressBar<?=($uploadIdAttachment);?>" style="display: none;">
                                                                            <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                        <div id="cancel<?=toPublicId($uploadIdAttachment);?>" class="closeUpload" style="display: none;"><i class="fa fa-times"></i></div>
                                                                    </div>
                                                                    <div class="clearfix"></div>

                                                                    <div class="uploadstatus" style="display: none;" id="status<?=($uploadIdAttachment);?>"></div>
                                                                    <div id="result<?=($uploadIdAttachment);?>">
                                                                        <?php /*if(!empty($dbdata['attachment'])){
                                                                            */?><!--
                                                                            <div class="listingResult col-md-12"><span class="imgTitle"><?/*=$dbdata['attachment'];*/?></span><div class="upimgopt"><input  type="hidden" name="field[<?/*=($uploadIdAttachment);*/?>][]" value="<?/*=$dbdata['attachment'];*/?>"><a title="Delete" class="deleteimg remove_img<?/*=($uploadIdAttachment);*/?>"  href="javascript:void(0);"><i class="fa  fa-trash-o"></i></a></div></div>
                                                                        --><?php
/*                                                                        }*/?>
                                                                    </div>
                                                                    <button id="upload<?=($uploadIdAttachment);?>" type="button"  class="btn btn-primary btn-file browse-but" >Upload</button>
                                                                    <?php /*if(!empty($dbdata['attachment'])){*/?><!-- style="display:none;" --><?php /*}*/?>
                                                                    <input type="file" id="files<?=($uploadIdAttachment);?>" style="display:none;" multiple >
                                                                </span>
                                                            </div>
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

<script type="text/javascript" src="<?php echo JS_PATH; ?>admin/select2/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH; ?>admin/select2/select2.min.css" id="skin-switcher">

<script type="text/javascript" src="<?php echo JS_PATH; ?>uploads.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("AddAdminUser");

        fileUploader('<?php echo $uploadIdAttachment;?>','document','1');

        var $eventSelect = $("#item_description_ele");
        $eventSelect.select2();

        $('#project_id').change(function(){
            getMrData($(this).val());
        });

        function getMrData(projectId)
            {
                //$eventSelect.clearing();
                $('#item_description_id').val('');
                $('#addVa').bootstrapValidator('revalidateField','item_description_id');
                $('#project_manager,#store_manager,#required_qty,#unit_type,#boq_item').html('N/A');
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
                $('#project_manager,#store_manager,#required_qty,#unit_type,#boq_item').html('N/A');
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
                                $('#project_manager').html(data.data.project_manager_name);
                                $('#store_manager').html(data.data.store_manager_name);
                                $('#required_qty').html(data.data.required_qty);
                                $('#unit_type').html(data.data.unit_type_name);
                                $('#boq_item').html(data.data.boq_display_text);
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

        $('#addVa').formValidation({
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
                }
            }
        });

        $('input[type="radio"][name="is_approved_client_department"]').change(function(){
           if($(this).val()=='1'){ $('#attach_ele').show();}
           if($(this).val()=='0'){ $('#attach_ele').hide();}
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
                    $('#project_manager,#store_manager,#required_qty,#unit_type,#boq_item').html('N/A');
                    $('#item_description_id').val('');
                }
            $('#addVa').bootstrapValidator('revalidateField','item_description_id');
        });

    });
</script>
</body>
</html>