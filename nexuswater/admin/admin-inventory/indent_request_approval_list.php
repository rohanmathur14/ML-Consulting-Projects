<?php require_once ADMINVIEWPATH.'includes/header.php'; ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery-ui.css"/>
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
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory">Inventory</a> </li>
                                    <li><a href="<?php echo $site_path['admin_url']; ?>/inventory/outward">Outward</a> </li>
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
                                        <h4><i class="fa fa-search "></i>Filter Your Results</h4>
                                    </div>
                                    <div class="box-body">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Project</label>
                                                <div class="col-sm-5">
                                                    <select name="FormData[project_id]" id="project_id" class="form-control select2">
                                                        <option value="">Select</option>
                                                        <?php if(!empty($projects)){foreach($projects as $project){?>
                                                            <option value="<?php echo $project['id'];?>" <?php if(isset($FormData['project_id']) && $FormData['project_id']==$project['id']){echo 'selected="selected"';} ?>><?php echo $project['name'];?></option>
                                                        <?php }} ?>
                                                    </select>
                                                </div>

                                                <label class="col-sm-1 control-label">From Date</label>
                                                <div class="col-sm-2">
                                                    <input type="text" placeholder="From Date" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['from_date']) && !empty($FormData['from_date'])){echo date('d-m-Y',strtotime($FormData['from_date']));} ?>" name="FormData[from_date]" id="from_date" autocomplete="off">
                                                </div>

                                                <label class="col-sm-1 control-label">To Date</label>
                                                <div class="col-sm-2">
                                                    <input type="text" placeholder="To Date" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['to_date']) && !empty($FormData['to_date'])){echo date('d-m-Y',strtotime($FormData['to_date']));} ?>" name="FormData[to_date]" id="to_date" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-1 control-label">Indent No</label>
                                                <div class="col-sm-2">
                                                    <input type="text" placeholder="Indent No" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['indent_no']) && !empty($FormData['indent_no'])){echo $FormData['indent_no'];} ?>" name="FormData[indent_no]" id="indent_no" autocomplete="off">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-primary" onClick="$('#search').val('1');document.pagination_form.action='<?php echo base_url();?>admin/inventory/indent_request_approval';"><i class="fa fa-search"></i> Search</button>
                                                    <a href="<?php echo $site_path['admin_url']; ?>inventory/indent_request_approval"><button class="btn btn-inverse" type="button">Show All</button></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>

                                    </div>
                                </div>
                                <div class="box border blue">
                                    <div class="box-title">
                                        <h4><i class="fa fa-file-text"></i><?php echo $pageBreadCrumbs;?></h4>
                                    </div>
                                    <div class="box-body">

                                        <div class="panel panel-default">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-sm">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 20px;">#</th>
                                                        <th><a href="javascript:void(0);" onClick="return sortList('ir.created_at');">Date</a></th>
                                                        <th><a href="javascript:void(0);" onClick="return sortList('ir.indent_no');">Indent No</a></th>
                                                        <th><a href="javascript:void(0);" onClick="return sortList('ir.user_id');">Name of Contractor</a></th>
                                                        <th><a href="javascript:void(0);" onClick="return sortList('p.name');">Project</a></th>
                                                        <th><a href="javascript:void(0);" onClick="return sortList('ir.status');">Status</a></th>
                                                        <th><a href="javascript:void(0);">Detail</a></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php if ($dbdata == false) {
                                                        ?>
                                                        <tr>
                                                            <td colspan="6">No Record Found.</td>
                                                        </tr>
                                                    <?php
                                                    } else {
                                                        for ($i = 0; $i < count($dbdata); $i++) {
                                                            ?>
                                                            <tr>
                                                                <td class="row"><?php echo $start+$i+1; ?></td>
                                                                <td class="row" align="left"><?php echo convert_sqltime_to_calnderdate(strtotime($dbdata[$i]['created_at'])); ?></td>
                                                                <td class="row" align="left"><?php echo $dbdata[$i]['indent_no']; ?></td>
                                                                <td class="row" align="left">
                                                                    <?php
                                                                    if(!empty($dbdata[$i]['user_name']))
                                                                    {
                                                                        ?>
                                                                        <a href="javascript:void(0);" class="tip" data-original-title="<?php echo $dbdata[$i]['user_name'];?>" title="<?php echo $dbdata[$i]['user_name'];?>"><?php echo strWordCut($dbdata[$i]['user_name'],20);?><br><?php echo $dbdata[$i]['user_phone_number'];?></a>
                                                                    <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        echo 'N/A';
                                                                    }
                                                                    ?>
                                                                </td>
                                                                <td class="row" align="left">
                                                                    <?php
                                                                    if(!empty($dbdata[$i]['project_name']))
                                                                    {
                                                                        ?>
                                                                        <a href="javascript:void(0);" class="tip" data-original-title="<?php echo $dbdata[$i]['project_name'];?>" title="<?php echo $dbdata[$i]['project_name'];?>"><?php echo strWordCut($dbdata[$i]['project_name'],20);?></a>
                                                                    <?php
                                                                    }
                                                                    else
                                                                    {
                                                                        echo 'N/A';
                                                                    }
                                                                    ?>
                                                                </td>

                                                                <td class="row" align="left">
                                                                    <?php if($dbdata[$i]['status']=='0'){?>
                                                                        <select id="Sel<?php echo $dbdata[$i]['id'] ;?>"  onChange="ChangeStatus(this.value,'<?php echo $dbdata[$i]['id'] ;?>');">
                                                                            <option value="">Pending</option>
                                                                            <option value="approve">Approve</option>
                                                                            <option value="reject">Reject</option>
                                                                        </select>
                                                                    <?php }elseif($dbdata[$i]['status']=='1'){ ?>
                                                                        <span class="label bg-success" title="Approved">Approved</span>
                                                                    <?php }elseif($dbdata[$i]['status']=='2'){ ?>
                                                                        <span class="label bg-error" title="Rejected">Rejected</span>
                                                                    <?php }?>
                                                                </td>

                                                                <td class="row" align="left">
                                                                    <a href="#indent<?php echo $dbdata[$i]['id'];?>" data-toggle="modal" data-target="#indent<?php echo $dbdata[$i]['id'];?>">View</a>
                                                                    <div id="indent<?php echo $dbdata[$i]['id'];?>" class="modal fade" role="dialog">
                                                                        <div class="vertical-alignment-helper">
                                                                            <div class="modal-dialog modal-lg vertical-align-center">
                                                                                <!-- Modal content-->
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                        <h4 class="modal-title text-center" style="font-weight: bold">#<?php echo $dbdata[$i]['indent_no']; ?> Indent Detail</h4>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <?php $itemC=1;?>
                                                                                        <table class="table no-border">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>Sr. No</th>
                                                                                                <th>Description of Material</th>
                                                                                                <th>Unit</th>
                                                                                                <th>Quantity</th>
                                                                                                <th>Total Available in Store</th>
                                                                                                <th>Remarks</th>
                                                                                            </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                            <?php if(!empty($dbdata[$i]['items'])){ foreach($dbdata[$i]['items'] as $row){?>
                                                                                                <tr>
                                                                                                    <td><?php echo $itemC;?></td>
                                                                                                    <td><?php echo $row['item_description'];?></td>
                                                                                                    <td><?php echo !empty($row['unit_type_name']) ? $row['unit_type_name'] : 'N/A'?></td>
                                                                                                    <td><?php echo $row['quantity'];?></td>
                                                                                                    <td><?php echo ($row['total_inward_qty']-$row['total_outward_qty']);?></td>
                                                                                                    <td><?php echo !empty($row['remarks']) ? $row['remarks'] : 'N/A'?></td>
                                                                                                </tr>
                                                                                                <?php $itemC++;}} ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>


                                                            </tr>
                                                        <?php
                                                        }
                                                    }?>
                                                    </tbody>
                                                </table>
                                                <div class="text-center">
                                                    <ul class="pagination">
                                                        <input type="hidden" name="FormData[purpose_hidden]" id="purpose_hidden" value="" />
                                                        <input type="hidden" name="FormData[csv_ids_hidden]" id="csv_ids_hidden" value="" />
                                                        <input value="<?php if(isset($FormData['order']['order_by'])){echo $FormData['order']['order_by'];} ?>" type="hidden" name="FormData[order][order_by]" id="order_by" />
                                                        <input value="<?php if(isset($FormData['order']['order_type'])){echo $FormData['order']['order_type'];} ?>" type="hidden" name="FormData[order][order_type]" id="order_type" />
                                                        <input type="hidden" name="search" id="search"  value="0" />
                                                        <?php echo $pagination;?>
                                                    </ul>
                                                </div>
                                            </div>
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
<script type="text/javascript" src="<?php echo JS_PATH; ?>admin/select2/select2.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PATH; ?>admin/select2/select2.min.css" id="skin-switcher">
<script type="text/javascript">
    function ChangeStatus(status,userid)
    {
        if(userid!='' && status!='')
        {

            if(!singleOperation(status,userid))
            {
                //$('#Sel'+userid+' option[value=""]').prop('selected', true);
            }
        }
        else{
            //$('#Sel'+userid+' option[value=""]').prop('selected', true);
        }
    }
    jQuery(document).ready(function () {
        $(".select2").select2();
        App.setPage("usermanager");  //Set current page
        //App.init(); //Initialise plugins and elements

        $('#from_date,#to_date,#on_date').datepicker({
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            onSelect: function(selected,evnt) {
            }
        });
    });
</script>
</html>