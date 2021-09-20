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
                                    <div class="col-md-12">
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
                                                        <option value="<?php echo $key;?>" <?php if(isset($FormData['shift_type']) && $FormData['shift_type']==$key){echo 'selected="selected"';} ?>><?php echo $st;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" onClick="$('#search').val('1');document.pagination_form.action='<?php echo base_url();?>admin/leaves/my_leave_history';"><i class="fa fa-search"></i> Search</button>
                                                <a href="<?php echo $site_path['admin_url']; ?>leaves/my_leave_history"><button class="btn btn-inverse" type="button">Show All</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                                    <div class="box border blue">
                                        <div class="box-title">
                                            <h4><i class="fa fa-file-text"></i>Holiday's</h4>
                                            <a href="#applyLeavePopup" data-toggle="modal" data-target="#applyLeavePopup" class="btn btn-primary" style="float: right;padding:1px 12px;">Apply Leave</a>
                                        </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="15%"><a href="javascript:void(0);" onClick="return sortList('l.leave_date');">Date</a></th>
                                                    <th width="20%"><a href="javascript:void(0);" onClick="return sortList('l.leave_type_title');">Leave Type</a></th>
                                                    <th width="10%"><a href="javascript:void(0);" onClick="return sortList('l.shift_type');">Shift</a></th>
                                                    <th width="40%"><a href="javascript:void(0);" onClick="return sortList('l.reason_text');">Reason</a></th>
                                                    <th width="5%"><a href="javascript:void(0);" onClick="return sortList('l.status');">Status</a></th>
                                                    <th width="5%"><a href="javascript:void(0);">Action</a></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($dbdata == false) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7">No Leaves Found.</td>
                                                    </tr>
                                                <?php
                                                } else {
                                                    for ($i = 0; $i < count($dbdata); $i++) {
                                                        ?>
                                                        <tr>
                                                            <td class="row"><?php echo $start+$i+1; ?></td>
                                                            <td class="row" align="left"><?php echo convert_sqltime_to_calnderdate(strtotime($dbdata[$i]['leave_date'])); ?></td>
                                                            <td class="row" align="left"><?php echo $dbdata[$i]['leave_type_title']; ?></td>
                                                            <td class="row" align="left">
                                                                <?php echo $shift_types[$dbdata[$i]['shift_type']];?>
                                                            </td>
                                                            <td class="row" align="left"><?php echo $dbdata[$i]['reason_text']; ?></td>
                                                            <td class="row" align="left">
                                                                <?php if($dbdata[$i]['status']=='0'){?>
                                                                    <span class="label bg-pending" title="Pending">Pending</span>
                                                                <?php }elseif($dbdata[$i]['status']=='1'){ ?>
                                                                    <span class="label bg-success" title="Approved">Approved</span>
                                                                <?php }elseif($dbdata[$i]['status']=='2'){ ?>
                                                                    <span class="label bg-error" title="Rejected">Rejected</span>
                                                                <?php }?>
                                                            </td>
                                                            <td>
                                                                <?php if($dbdata[$i]['status']=='0'){?>
                                                                    <a class="tip" data-original-title="Delete" onclick="singleOperation('delete','<?=$dbdata[$i]['id'];?>')" href="javascript:void(0);"><i class="fa fa-trash-o fa-1x"></i></a>
                                                                <?php }else{
                                                                    ?>---<?php
                                                                } ?>

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
<!-- Modal -->
<div id="applyLeavePopup" class="modal fade" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-sm vertical-align-center">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-weight: bold">Apply Leave</h4>
                </div>
                <div class="modal-body">
                    <form name="frmApplyLeave" id="frmApplyLeave" class="form-horizontal"  action="<?php echo $site_path['admin_url']; ?>leaves/apply_leave">

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Leave Type</label>
                            <div class="col-md-5">
                                <select name="leave_type_id" id="leave_type_id" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach($leave_types as $lt){?>
                                        <option value="<?php echo $lt['id'];?>"><?php echo $lt['title'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Date</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="apply_from_date" id="apply_from_date" readonly autocomplete="off" placeholder="From Date">
                            </div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="apply_to_date" id="apply_to_date" readonly autocomplete="off" placeholder="To Date">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Shift</label>
                            <div class="col-md-5">
                                <select name="shift_type" id="shift_type" class="form-control">
                                    <option value="">Select</option>
                                    <?php foreach($shift_types as $key=>$st){?>
                                        <option value="<?php echo $key;?>"><?php echo $st;?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label">Reason</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="reason_text" id="reason_text"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <input type="submit" class="btn btn-primary" value="Apply" name="applyLeave">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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

        $('#holidayPopup').on('hidden.bs.modal', function () {
            // do something…
            $('#holidayPopup #holiday_id').val('');
            $('#frmHoliday')
                .formValidation('disableSubmitButtons', false) // Enable the submit buttons
                .formValidation('resetForm', true);
        });

        $('#frmApplyLeave').formValidation({
            fields: {
                leave_type_id: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        }
                    }
                },
                apply_from_date: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        },
                        date: {
                            format: 'DD-MM-YYYY',
                            message: ' '
                        }
                    }
                },
                apply_to_date: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        },
                        date: {
                            format: 'DD-MM-YYYY',
                            message: ' '
                        }
                    }
                },
                shift_type: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        }
                    }
                },
                reason_text: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        }
                    }
                }
            }
        }).on('success.form.fv', function (e) {
            // Prevent form submission
            e.preventDefault();
            ajaxLoaderStart();
            // Get the form instance
            var $form = $(e.target);
            // Get the FormValidation instance
            var bv = $form.data('formValidation');
            // Use Ajax to submit form data
            $.post($form.attr('action'), $form.serialize(), function (result) {
                alert(result.msg);
                if(result.status=='1')
                    {
                        location.reload();
                    }
                ajaxLoaderStop();
            }, 'json');
        });

        var current_year = new Date().getFullYear();

        $('#from_date,#to_date,#on_date').datepicker({
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            onSelect: function(selected,evnt) {
            }
        });

        $( "#apply_from_date" ).datepicker({
            changeMonth: true,
            dateFormat: 'dd-mm-yy',
            changeYear: true,
            clearBtn: true,
            onClose: function( selectedDate ) {
                $( "#apply_to_date" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#apply_to_date" ).datepicker({
            changeMonth: true,
            minDate: '0',
            dateFormat: 'dd-mm-yy',
            changeYear: true,
            clearBtn: true,
            onClose: function( selectedDate ) {
                $( "#apply_from_date" ).datepicker( "option", "maxDate", selectedDate );
            }
        });

    });

</script>
</html>