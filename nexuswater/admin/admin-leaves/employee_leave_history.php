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
                                    <?php
                                    //pr($shift_types);
                                    //pr($FormData,1);
                                    ?>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label class="col-md-1 control-label">Name</label>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="Name" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['employee_name']) && !empty($FormData['employee_name'])){echo $FormData['employee_name'];} ?>" name="FormData[employee_name]" id="employee_name">
                                            </div>
                                            <label class="col-md-2 control-label">Phone Number</label>
                                            <div class="col-sm-4">
                                                <input type="text" placeholder="Phone Number" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['phone_number']) && !empty($FormData['phone_number'])){echo $FormData['phone_number'];} ?>" name="FormData[phone_number]" id="phone_number">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Leave type</label>
                                            <div class="col-sm-2">
                                                <select class="form-control" name="FormData[leave_type_id]">
                                                    <option value="">All</option>
                                                    <?php if(!empty($leave_types)){foreach($leave_types as $lt){?>
                                                    <option value="<?php echo $lt['id'];?>" <?php if(isset($FormData['leave_type_id']) && $FormData['leave_type_id']==$lt['id']){echo 'selected="selected"';} ?>><?php echo $lt['title'];?></option>
                                                    <?php }}?>
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

                                            <label class="col-sm-1 control-label">Shift Type</label>
                                            <div class="col-sm-2">
                                                <select name="FormData[shift_type]" id="shift_type" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php foreach($shift_types as $key=>$st){?>
                                                        <option value="<?php echo $key;?>" <?php if(isset($FormData['shift_type']) && $FormData['shift_type']!='' && $FormData['shift_type']==$key){echo 'selected="selected"';} ?>><?php echo $st;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-1 control-label">Status</label>
                                            <div class="col-sm-2">
                                                <select name="FormData[status]" id="status" class="form-control">
                                                    <option value="">All</option>
                                                    <option value="0" <?php if(isset($FormData['status']) && $FormData['status']=='0'){echo 'selected="selected"';} ?>>Pending</option>
                                                    <option value="1" <?php if(isset($FormData['status']) && $FormData['status']=='1'){echo 'selected="selected"';} ?>>Approve</option>
                                                    <option value="2" <?php if(isset($FormData['status']) && $FormData['status']=='2'){echo 'selected="selected"';} ?>>Reject</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" onClick="$('#search').val('1');document.pagination_form.action='<?php echo base_url();?>admin/leaves/employee_leave_history';"><i class="fa fa-search"></i> Search</button>
                                                <a href="<?php echo $site_path['admin_url']; ?>leaves/employee_leave_history"><button class="btn btn-inverse" type="button">Show All</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                                    <div class="box border blue">
                                        <div class="box-title">
                                            <h4><i class="fa fa-file-text"></i>Employee's Leave History</h4>
                                        </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="10%"><a href="javascript:void(0);" onClick="return sortList('u.name');">Name</a></th>
                                                    <th width="15%"><a href="javascript:void(0);" onClick="return sortList('l.leave_date');">Date</a></th>
                                                    <th width="20%"><a href="javascript:void(0);" onClick="return sortList('l.leave_type_title');">Leave Type</a></th>
                                                    <th width="10%"><a href="javascript:void(0);" onClick="return sortList('l.shift_type');">Shift</a></th>
                                                    <th width="30%"><a href="javascript:void(0);" onClick="return sortList('l.reason_text');">Reason</a></th>
                                                    <th width="5%"><a href="javascript:void(0);" onClick="return sortList('l.status');">Status</a></th>
                                                    <th width="5%"><a href="javascript:void(0);">Action</a></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($dbdata == false) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="8">No Leaves Found.</td>
                                                    </tr>
                                                <?php
                                                } else {
                                                    for ($i = 0; $i < count($dbdata); $i++) {
                                                        ?>
                                                        <tr>
                                                            <td class="row"><?php echo $start+$i+1; ?></td>
                                                            <td class="row" align="left">
                                                                <a href="<?php echo BASE_URL;?>admin/employee/view/<?php echo $dbdata[$i]['employee_id'];?>" target="_blank">
                                                                    <?php echo $dbdata[$i]['name'].'<br>('.$dbdata[$i]['phone_number'].')'; ?>
                                                                </a>
                                                            </td>
                                                            <td class="row" align="left"><?php echo convert_sqltime_to_calnderdate(strtotime($dbdata[$i]['leave_date'])); ?></td>
                                                            <td class="row" align="left"><?php echo $dbdata[$i]['leave_type_title']; ?></td>
                                                            <td class="row" align="left">
                                                                <?php echo $shift_types[$dbdata[$i]['shift_type']];?>
                                                            </td>
                                                            <td class="row" align="left"><?php echo $dbdata[$i]['reason_text']; ?></td>
                                                            <td class="row" align="left">
                                                                <select id="Sel<?php echo $dbdata[$i]['id'] ;?>"  onChange="ChangeStatus(this.value,'<?php echo $dbdata[$i]['id'] ;?>');">
                                                                    <?php if($dbdata[$i]['status']=='0'){?>
                                                                        <option value="">Pending</option>
                                                                    <?php } ?>
                                                                    <option value="approve" <?php if($dbdata[$i]['status']=='1'){?>selected="selected"<?php } ?>>Approve</option>
                                                                    <option value="reject" <?php if($dbdata[$i]['status']=='2'){?>selected="selected"<?php } ?>>Reject</option>
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <a class="tip" data-original-title="Delete" onclick="singleOperation('delete','<?=$dbdata[$i]['id'];?>')" href="javascript:void(0);"><i class="fa fa-trash-o fa-1x"></i></a>
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
        App.setPage("usermanager");  //Set current page
        //App.init(); //Initialise plugins and elements

        var current_year = new Date().getFullYear();

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