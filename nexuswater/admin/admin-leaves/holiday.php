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
                            <?php if($can_access){?>
                            <div class="box border blue">
                                <div class="box-title">
                                    <h4><i class="fa fa-search "></i>Filter Your Results</h4>
                                </div>
                                <div class="box-body">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <input type="text" placeholder="Search By Title..." class="form-control"  maxlength="255"  value="<?php if(isset($FormData['title'])){echo $FormData['title'];} ?>" name="FormData[title]" id="title" >
                                            </div>

                                            <label class="col-xs-1 control-label">From Date</label>
                                            <div class="col-xs-2">
                                                <input type="text" placeholder="From Date" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['from_date'])){echo date('d-m-Y',strtotime($FormData['from_date']));} ?>" name="FormData[from_date]" id="from_date" autocomplete="off">
                                            </div>
                                            <label class="col-xs-1 control-label">To Date</label>
                                            <div class="col-xs-2">
                                                <input type="text" placeholder="To Date" class="form-control"  maxlength="255"  value="<?php if(isset($FormData['to_date'])){echo date('d-m-Y',strtotime($FormData['to_date']));} ?>" name="FormData[to_date]" id="to_date" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" onClick="$('#search').val('1');document.pagination_form.action='<?php echo base_url();?>admin/leaves/holiday';"><i class="fa fa-search"></i> Search</button>
                                                <a href="<?php echo $site_path['admin_url']; ?>leaves/holiday"><button class="btn btn-inverse" type="button">Show All</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <?php } ?>
                                    <div class="box border blue">
                                        <div class="box-title">
                                            <h4><i class="fa fa-file-text"></i>Holiday's</h4>
                                            <?php if($can_access){?>
                                            <a href="#holidayPopup" data-toggle="modal" data-target="#holidayPopup" class="btn btn-primary" style="float: right;padding:1px 12px;">Add Holiday</a>
                                            <?php } ?>
                                        </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="5%">#</th>
                                                    <th width="55%"><a href="javascript:void(0);" onClick="return sortList('u.title');">Title</a></th>
                                                    <th width="20%"><a href="javascript:void(0);" onClick="return sortList('u.on_date');">Date</a></th>
                                                    <?php if($can_access){?>
                                                    <th width="20%"><a href="javascript:void(0);">Action</a></th>
                                                    <?php } ?>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($dbdata == false) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="<?php if($can_access){?>4<?php }else{ ?>3<?php } ?>">No Holiday's Found.</td>
                                                    </tr>
                                                <?php
                                                } else {
                                                    for ($i = 0; $i < count($dbdata); $i++) {
                                                        ?>
                                                        <tr>
                                                            <td class="row"><?php echo $start+$i+1; ?></td>
                                                            <td class="row"
                                                                align="left"><?php echo $dbdata[$i]['title']; ?></td>
                                                            <td class="row"
                                                                align="left"><?php echo convert_sqltime_to_calnderdate(strtotime($dbdata[$i]['on_date'])); ?></td>
                                                            <?php if($can_access){?>
                                                            <td>
                                                                <a class="tip" data-original-title="Edit" href="javascript:edit_holiday(<?php echo $dbdata[$i]['id'];?>);"><i class="fa fa-pencil-square-o fa-1x"></i></a>
                                                                <a class="tip" data-original-title="Delete" onclick="singleOperation('delete','<?=$dbdata[$i]['id'];?>')" href="javascript:void(0);"><i class="fa fa-trash-o fa-1x"></i></a>
                                                            </td>
                                                            <?php } ?>
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
<?php if($can_access){?>
<!-- Modal -->
<div id="holidayPopup" class="modal fade" role="dialog">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog modal-sm vertical-align-center">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="font-weight: bold">Holiday</h4>
                </div>
                <div class="modal-body">
                    <form name="frmHoliday" id="frmHoliday" class="form-horizontal"  action="<?php echo $site_path['admin_url']; ?>leaves/holiday_update">
                        <div class="form-group">
                            <label class="col-xs-1 control-label">Title</label>
                            <div class="col-md-9">
                                <input type="text" name="title" id="title" class="form-control" placeholder="Title">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-1 control-label">Date</label>
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="on_date" id="on_date" readonly autocomplete="off" placeholder="Date">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-5">
                                <input type="hidden" id="holiday_id" name="id" value="">
                                <input type="submit" class="btn btn-primary" value="Submit" name="addHoliday"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
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
        <?php if($can_access){?>
        $('#holidayPopup').on('hidden.bs.modal', function () {
            // do something…
            $('#holidayPopup #holiday_id').val('');
            $('#frmHoliday')
                .formValidation('disableSubmitButtons', false) // Enable the submit buttons
                .formValidation('resetForm', true);
        });

        $('#frmHoliday').formValidation({
            fields: {
                title: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        }
                    }
                },
                on_date: {
                    validators: {
                        notEmpty: {
                            message: ' '
                        },
                        date: {
                            format: 'DD-MM-YYYY',
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
        <?php } ?>
        var current_year = new Date().getFullYear();

        $('#from_date,#to_date,#on_date').datepicker({
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            onSelect: function(selected,evnt) {
            }
        });


    });
    <?php if($can_access){?>
    function edit_holiday(id)
    {
        ajaxLoaderStart();
        $.post('<?php echo $site_path['admin_url']; ?>leaves/getHoliday',{'id':id}, function (result) {
            ajaxLoaderStop();
            if(result.status=='1')
            {
                $('#holidayPopup').modal('show');
                $('#holidayPopup #title').val(result.title);
                $('#holidayPopup #on_date').val(result.on_date);
                $('#holidayPopup #holiday_id').val(id);
            }
            else
            {
                alert(result.msg);
                return false;
            }
        }, 'json');
    }
    <?php } ?>
</script>
</html>