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
                                            <!--<div class="col-sm-4">
                                                <input type="text" placeholder="Search By Contact No..." class="form-control"  maxlength="255"  value="<?php /*if(isset($FormData['phone_number'])){echo $FormData['phone_number'];} */?>" name="FormData[phone_number]" id="phone_number" >
                                            </div>-->
                                            <div class="col-sm-2">
                                                <input type="text" placeholder="Search By Date..." class="form-control"  maxlength="255"  value="<?php if(isset($FormData['date'])){echo $FormData['date'];} ?>" name="FormData[date]" id="date" autocomplete="off">
                                            </div>

                                            <label class="col-sm-1 control-label">Project</label>
                                            <div class="col-sm-3">
                                                <select name="FormData[project_id]" class="form-control">
                                                    <option value="">All</option>
                                                    <?php if(!empty($projects)){ foreach($projects as $p){?>
                                                        <option value="<?php echo $p['id'];?>" <?php if(isset($FormData['project_id']) && $FormData['project_id']==$p['id']){echo 'selected="selected"';} ?>><?php echo $p['name'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-primary" onClick="$('#search').val('1');document.pagination_form.action='<?php echo base_url();?>admin/attendance';"><i class="fa fa-search"></i> Search</button>
                                                <!--<a href="<?php /*echo $site_path['admin_url']; */?>attendance"><button class="btn btn-inverse" type="button">Show All</button></a>-->

                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>
                                    <div class="box border blue">
                                        <div class="box-title">
                                            <h4><i class="fa fa-file-text"></i>Employee's Attendance</h4>
                                        </div>
                                    <div class="box-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <!--<th style="width:20px;">
                                                        <label class="i-checks m-b-none">
                                                            <input type="checkbox" id="multicheck"><i></i>
                                                        </label>
                                                    </th>-->
                                                    <th><a href="javascript:void(0);" onClick="return sortList('u.name');">Name</a></th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('u.phone_number');">Contact Number</a></th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('p.name');">Project</a></th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('a.clockin_date_time');">Date</a></th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('u.status');">Status</a></th>
                                                    <th><a href="javascript:void(0);">Action</a></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($dbdata == false) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7">No Employee's Attendance Found.</td>
                                                    </tr>
                                                <?php
                                                } else {
                                                    for ($i = 0; $i < count($dbdata); $i++) {
                                                        ?>
                                                        <tr>
                                                            <td class="row"><?php echo $start+$i+1; ?></td>
                                                            <!--<td>
                                                        <label class="i-checks m-b-none">
                                                            <input type="checkbox" class="item_multicheck" name="item_id" id="item_id<?php /*echo $i; */?>" value="<?php /*echo $dbdata[$i]['id'];*/?>"><i></i>
                                                        </label>
                                                    </td>-->
                                                            <td class="row"
                                                                align="left"><?php echo $dbdata[$i]['user_name']; ?></td>
                                                            <td class="row"
                                                                align="left"><?php echo $dbdata[$i]['phone_number']; ?></td>
                                                            <td class="row"
                                                                align="left">
                                                                <?php
                                                                if(!empty($dbdata[$i]['project_name']))
                                                                {
                                                                    $maxLen = 20;
                                                                    $proLen = strlen($dbdata[$i]['project_name']);
                                                                    $proName = ($proLen>$maxLen) ? substr($dbdata[$i]['project_name'],0,$maxLen)."..." : $dbdata[$i]['project_name'];

                                                                    ?>
                                                                    <a href="<?php echo BASE_URL;?>admin/projects/view/<?php echo $dbdata[$i]['project_id'];?>" target="_blank" title="<?php echo $dbdata[$i]['project_name'];?>"><?php echo $proName;?></a>
                                                                <?php
                                                                }
                                                                else
                                                                {
                                                                    echo 'N/A';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="row"
                                                                align="left"><?php echo convert_sqltime_to_calnderdate(strtotime($dbdata[$i]['date_string'])); ?></td>
                                                            <td class="row" align="left">
                                                                <select id="Sel<?php echo $dbdata[$i]['id'] ;?>"  onChange="ChangeStatus(this.value,'<?php echo $dbdata[$i]['id'] ;?>');">
                                                                    <?php if($dbdata[$i]['status']=='0'){?>
                                                                    <option value="">Pending for approval</option>
                                                                    <?php } ?>
                                                                    <option value="approve" <?php if($dbdata[$i]['status']=='1'){?>selected="selected"<?php } ?>>Present</option>
                                                                    <option value="reject" <?php if($dbdata[$i]['status']=='2'){?>selected="selected"<?php } ?>>Absent</option>
                                                                    <option value="half_day" <?php if($dbdata[$i]['status']=='3'){?>selected="selected"<?php } ?>>Half Day</option>
                                                                    <option value="on_leave" <?php if($dbdata[$i]['status']=='4'){?>selected="selected"<?php } ?>>On Leave</option>
                                                                </select>

                                                            </td>
                                                            <td>
                                                                <a href="" class="tip" data-original-title="History"  data-toggle="modal" data-target="#myModal<?php echo $i;?>"><i class="fa fa-info"></i></a>
                                                                <div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
                                                                    <div class="modal-dialog">
                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title" style="text-align: center;"><b>History</b></h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="responsive">
                                                                                    <table class="table">
                                                                                        <tr>
                                                                                            <th>Clock in</th>
                                                                                            <th>Clock out</th>
                                                                                            <th>Map</th>
                                                                                        </tr>
                                                                                        <?php foreach($dbdata[$i]['history'] as $h){?>
                                                                                            <tr>
                                                                                                <td><?php echo date('d-m-Y H:i:s',strtotime($h['clockin_date_time']));?></td>
                                                                                                <td><?php
                                                                                                    echo !is_null($h['clockout_date_time']) && $h['clockout_date_time']!='0000:00:00 00:00:00' ? date('d-m-Y H:i:s',strtotime($h['clockout_date_time'])) : '---';?></td>
                                                                                                <td>
                                                                                                    <?php if(!empty($h['clockin_lat']) || !empty($h['clockin_lng'])){?>
                                                                                                    <a href="https://www.google.com/maps/dir/<?php echo $h['clockin_lat'].",".$h['clockin_lng'];?>/<?php echo !empty($h['clockout_lat']) ? $h['clockout_lat'].",".$h['clockout_lng'] : '';?>" target="_blank" class="tip" data-original-title="Map"><i class="fa fa-map-marker"></i></a>
                                                                                                    <?php } else{ ?>
                                                                                                        ---
                                                                                                    <?php } ?>
                                                                                                </td>
                                                                                            </tr>
                                                                                        <?php }?>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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

    $('.deleteAdminUser').click(function () {
        var confirmation = confirm("Are you sure you want to delete this admin user?");
        if (confirmation) {
            return true;
        } else {
            return false;
        }
    });

        var current_year = new Date().getFullYear();

        $('#date').datepicker({
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            /*yearRange: '1960:' +(current_year-18),*/
            onSelect: function(selected,evnt) {
            }
        });

    });
</script>
</html>