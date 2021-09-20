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
                                                    <form enctype="multipart/form-data" method="post" name="addVa" id="addVa" action="<?php echo $site_path['admin_url']; ?>inventory/va_edit/<?php echo $dbdata['id'];?>"  class="form-horizontal">

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Project</label>
                                                            <div class="col-md-7 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['project_name']) ? $dbdata['mrDetail']['project_name'] : 'N/A';?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Description of material</label>
                                                            <div class="col-md-7 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['item_description']) ? $dbdata['mrDetail']['item_description'] : 'N/A';?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Project Manager</label>
                                                            <div class="col-md-7 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['project_manager_name']) ? $dbdata['mrDetail']['project_manager_name'] : 'N/A';?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Store Incharge</label>
                                                            <div class="col-md-7 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['store_incharge_name']) ? $dbdata['mrDetail']['store_incharge_name'] : 'N/A';?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Required Quantity</label>
                                                            <div class="col-md-2 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['required_qty']) ? $dbdata['mrDetail']['required_qty'] : 'N/A';?>
                                                            </div>

                                                            <label class="col-md-1 control-label">Unit</label>
                                                            <div class="col-md-2 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['unit_type_name']) ? $dbdata['mrDetail']['unit_type_name'] : 'N/A';?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Approved Quantity</label>
                                                            <div class="col-md-2">
                                                                <input type="text" name="approved_quantity" id="approved_quantity" class="form-control" value="<?php echo $dbdata['approved_quantity']; ?>" >
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Quantity taken from BOQ Item No</label>
                                                            <div class="col-md-7 mr_t">
                                                                <?php echo !empty($dbdata['mrDetail']['boq_item_code']) ? $dbdata['mrDetail']['boq_item_code']." (".$dbdata['mrDetail']['boq_item_heading'].")" : 'N/A';?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Name of the Approved Vendor</label>
                                                            <div class="col-md-4 mr_t">
                                                                <input type="text" name="vendor_name" id="vendor_name" value="<?php echo $dbdata['vendor_name'];?>" class="form-control">
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
                                                                        <?php if(!empty($dbdata['attachment'])){
                                                                            ?><div class="listingResult col-md-12"><span class="imgTitle"><?php echo $dbdata['attachment'];?></span><div class="upimgopt"><input  type="hidden" name="field[<?php echo ($uploadIdAttachment);?>][]" value="<?php echo $dbdata['attachment'];?>"><a title="Delete" class="deleteimg remove_img<?php echo ($uploadIdAttachment);?>"  href="javascript:void(0);"><i class="fa  fa-trash-o"></i></a></div></div>
                                                                        <?php }?>
                                                                    </div>
                                                                    <button id="upload<?=($uploadIdAttachment);?>" type="button"  class="btn btn-primary btn-file browse-but" <?php if(!empty($dbdata['attachment'])){ ?>style="display:none;"<?php }?>>Upload</button>
                                                                    <input type="file" id="files<?=($uploadIdAttachment);?>" style="display:none;" multiple >
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group" id="attach_ele">
                                                            <label class="col-md-2 control-label">Attach Approval Copy</label>
                                                            <div class="col-md-5">
                                                                <div class="input-group">
                                                                    <?php $uploadIdApprovedAttachment = 'approved_attachment';?>
                                                                    <span class="input-group-btn1 ">
                                                                    <div class="progressCont">
                                                                        <div class="progress" id="progressBar<?=($uploadIdApprovedAttachment);?>" style="display: none;">
                                                                            <div class="progress-bar" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                                        </div>
                                                                        <div id="cancel<?=toPublicId($uploadIdApprovedAttachment);?>" class="closeUpload" style="display: none;"><i class="fa fa-times"></i></div>
                                                                    </div>
                                                                    <div class="clearfix"></div>

                                                                    <div class="uploadstatus" style="display: none;" id="status<?=($uploadIdApprovedAttachment);?>"></div>
                                                                    <div id="result<?=($uploadIdApprovedAttachment);?>">
                                                                        <?php if(!empty($dbdata['approved_attachment'])){
                                                                            ?><div class="listingResult col-md-12"><span class="imgTitle"><?php echo $dbdata['approved_attachment'];?></span><div class="upimgopt"><input  type="hidden" name="field[<?php echo ($uploadIdApprovedAttachment);?>][]" value="<?php echo $dbdata['approved_attachment'];?>"><a title="Delete" class="deleteimg remove_img<?php echo ($uploadIdApprovedAttachment);?>"  href="javascript:void(0);"><i class="fa  fa-trash-o"></i></a></div></div>
                                                                        <?php }?>
                                                                    </div>
                                                                    <button id="upload<?=($uploadIdApprovedAttachment);?>" type="button"  class="btn btn-primary btn-file browse-but" <?php if(!empty($dbdata['approved_attachment'])){ ?>style="display:none;"<?php }?>>Upload</button>
                                                                    <input type="file" id="files<?=($uploadIdApprovedAttachment);?>" style="display:none;" multiple >
                                                                </span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label class="col-md-2 control-label">Is Approved?</label>
                                                            <div class="col-md-2 mr_t">
                                                                <input type="radio" class="form-check-input" name="status" value="1" <?php if($dbdata['status']=='1'){?>checked="checked"<?php } ?>>Yes  &nbsp;
                                                                <input type="radio" class="form-check-input" name="status" value="0" <?php if($dbdata['status']=='0'){?>checked="checked"<?php } ?> >No
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

<script type="text/javascript" src="<?php echo JS_PATH; ?>uploads.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        App.setPage("AddAdminUser");

        fileUploader('<?php echo $uploadIdAttachment;?>','document','1');
        fileUploader('<?php echo $uploadIdApprovedAttachment;?>','document','1');

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
                item_description_id:{
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

    });
</script>
</body>
</html>