<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css"/>
<style type="text/css">
    .mr_t{margin-top: 8px;font-size: 15px;}
    #elementData .pd10{padding: 0px 15px;}
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
                                                <form enctype="multipart/form-data" method="post" name="indentOutward" id="indentOutward" action="<?php echo $site_path['admin_url']; ?>inventory/indent_outward/<?php echo $indentDetail['id'];?>"  class="form-horizontal">

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Project</label>
                                                        <div class="col-md-7 mr_t">
                                                            <?php echo !empty($indentDetail['project_name']) ? $indentDetail['project_name'] : 'N/A';?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Name of Site Incharge</label>
                                                        <div class="col-md-3 mr_t">
                                                            <?php echo !empty($indentDetail['site_incharge']) ? $indentDetail['site_incharge'] : 'N/A';?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Work Site</label>
                                                        <div class="col-md-3 mr_t">
                                                            <?php echo !empty($indentDetail['work_site']) ? $indentDetail['work_site'] : 'N/A';?>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="col-md-2 control-label">Indent Request By</label>
                                                        <div class="col-md-3 mr_t">
                                                            <?php
                                                            if(!empty($indentDetail['user_name']))
                                                            {
                                                                ?>
                                                                <a href="javascript:void(0);" class="tip" data-original-title="<?php echo $indentDetail['user_name'];?>" title="<?php echo $indentDetail['user_name'];?>"><?php echo $indentDetail['user_name'];?><br><?php echo $indentDetail['user_phone_number'];?></a>
                                                            <?php
                                                            }
                                                            else
                                                            {
                                                                echo 'N/A';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>

                                                    <?php $i=0;$qtyFld = array();?>
                                                    <div class="form-group" id="elementData">
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered">
                                                                <thead style="background: #116bc4;color: #fff;">
                                                                <tr>
                                                                    <th width="5%">Sr. No</th>
                                                                    <th width="30%">Description of Material</th>
                                                                    <th width="7%">Unit</th>
                                                                    <th width="7%">Approved Indented Quantity</th>
                                                                    <th width="10%">Remaining Indented Quantity</th>
                                                                    <th width="7%">Total Available in Store</th>
                                                                    <th width="10%">Issued</th>
                                                                    <th width="20%">Remarks</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <?php
                                                                $rowCount = 1;
                                                                foreach($indentDetail['items'] as $item){?>
                                                                <tr>
                                                                    <td><?php echo $rowCount;?></td>
                                                                    <td>
                                                                        <div class="">
                                                                            <?php echo $item['item_description'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="">
                                                                            <?php echo $item['unit_type_name'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="">
                                                                            <?php echo $item['quantity'];?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="">
                                                                            <?php $balQty = $item['quantity']-$item['issued_qty'];?>
                                                                            <div id="balQty<?php echo $item['id'];?>"><?php echo $balQty;?></div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="">
                                                                            <?php
                                                                            $in_store_qty = ($item['total_inward_qty']-$item['total_outward_qty']);
                                                                            echo $in_store_qty;?>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1' || $item['store_incharge_id']==$adminDetail['id']){?>
                                                                        <div class="form-group">
                                                                            <div class="pd10">
                                                                                <input type="text" name="request[<?php echo $item['id'];?>][quantity]" id="qty<?php echo $rowCount;?>" data-bal="<?php echo $balQty;?>" data-id="<?php echo $item['id'];?>" class="form-control quantity number" >
                                                                                <input type="hidden" name="request[<?php echo $item['id'];?>][nr_id]" value="<?php echo $item['indent_request_id'];?>">
                                                                                <input type="hidden" name="request[<?php echo $item['id'];?>][mr_id]" value="<?php echo $item['material_request_id'];?>">
                                                                            </div>
                                                                        </div>
                                                                        <?php
                                                                        $valQty = $balQty>$in_store_qty ? $in_store_qty : $balQty;
                                                                        $qtyFld[] = array('id'=>$item['id'],'min'=>'1','max'=>$valQty);
                                                                        }else{ ?>
                                                                            <?php echo $item['store_incharge_name'];?>
                                                                        <?php } ?>
                                                                    </td>

                                                                    <td>
                                                                            <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1' || $item['store_incharge_id']==$adminDetail['id']){?>
                                                                            <div class="form-group">
                                                                                <div class="pd10">
                                                                                    <textarea name="request[<?php echo $item['id'];?>][remarks]" class="form-control remarks" ></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <?php }else{ ?>
                                                                                <?php echo '---';?>
                                                                            <?php } ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <?php $rowCount++;}?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label class="col-md-1 control-label">&nbsp;</label>
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

        $('.quantity').keyup(function(){
            var rowId = $(this).data('id');
            var balQty = parseInt($(this).data('bal'));
            var qty = parseInt($(this).val());
            if(qty>0)
                {
                    var newBal = (balQty-qty);
                    if(newBal>=0)
                        {
                            $('#balQty'+rowId).text(balQty-qty);
                        }
                    else
                        {
                            $('#balQty'+rowId).text(balQty);
                        }
                }
            else
                {
                    $('#balQty'+rowId).text(balQty);
                }
        });

        $('#indentOutward').formValidation({
            framework: 'bootstrap',
            excluded: [':disabled'],
            fields: {
                    <?php if(!empty($qtyFld)){$f=1;foreach($qtyFld as $row){?>
                    'request[<?php echo $row['id'];?>][quantity]': {
                        row:'.pd10',
                        validators: {
                            notEmpty: {
                                message: 'Required'//Required and can\'t be empty
                            },
                            regexp: {
                                regexp: /^([0-9]+)$/,
                                message: 'Invalid Number' //The value is not a valid number.
                            },
                            between: {
                                min: 1,
                                max: <?php echo $row['max'];?>,
                                message: 'Max <?php echo $row['max'];?>'
                            }
                        }
                    }<?php if($f!=count($qtyFld)){?>,<?php }?>
                    <?php $f++;}}?>
            }
        });
    });
</script>
</body>
</html>