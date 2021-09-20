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
                                                <input type="text" placeholder="Search By Date..." class="form-control"  maxlength="255"  value="<?php if(isset($search_date)){echo date('d-m-Y',strtotime($search_date));} ?>" name="date" id="date" autocomplete="off">
                                            </div>

                                            <label class="col-sm-1 control-label">Project</label>
                                            <div class="col-sm-3">
                                                <select name="project_id" id="project_id" class="form-control">
                                                    <option value="">All</option>
                                                    <?php if(!empty($projects)){ foreach($projects as $p){?>
                                                        <option value="<?php echo $p['id'];?>" <?php if(isset($FormData['project_id']) && $FormData['project_id']==$p['id']){echo 'selected="selected"';} ?>><?php echo $p['name'];?></option>
                                                    <?php }} ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="button" class="btn btn-primary" onClick="searchFrm();"><i class="fa fa-search"></i> Search</button>
                                                <!--<a href="<?php /*echo $site_path['admin_url']; */?>attendance"><button class="btn btn-inverse" type="button">Show All</button></a>-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                            </div>


                                    <div class="box border blue">
                                        <div class="box-title">
                                            <h4><i class="fa fa-file-text"></i>Mark Employee's Attendance</h4>
                                        </div>
                                    <div class="box-body">

                                        <?php if(!empty($dbdata)){?>
                                        <button type="button" class="btn btn-primary" id="mark_present">Present</button>
                                        <button type="button" class="btn btn-primary" id="mark_absent">Absent</button>
                                        <?php } ?>

                                        <div class="table-responsive">
                                            <table class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th width="2%">#</th>
                                                    <th  width="2%">
                                                        <label class="i-checks m-b-none" style="margin-bottom: 0px;">
                                                            <input type="checkbox" id="multicheck"><i></i>
                                                        </label>
                                                    </th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('u.name');">Name</a></th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('u.phone_number');">Contact Number</a></th>
                                                    <th><a href="javascript:void(0);" onClick="return sortList('p.name');">Project</a></th>
                                                    <th><a href="javascript:void(0);">Date</a></th>
                                                    <th><a href="javascript:void(0);">Status</a></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if ($dbdata == false) {
                                                    ?>
                                                    <tr>
                                                        <td colspan="7">No Employee's Found.</td>
                                                    </tr>
                                                <?php
                                                } else {
                                                    for ($i = 0; $i < count($dbdata); $i++) {
                                                        ?>
                                                        <tr>
                                                            <td class="row"><?php echo $i+1; ?></td>
                                                            <td>
                                                                <label class="i-checks m-b-none" style="margin-bottom: 0px;">
                                                                    <input type="checkbox" class="item_multicheck" name="item_id" id="item_id<?php echo $i; ?>" value="<?php echo $dbdata[$i]['id'];?>"><i></i>
                                                                </label>
                                                            </td>
                                                            <td class="row"
                                                                align="left"><?php echo $dbdata[$i]['name']; ?></td>
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
                                                                align="left"><?php echo convert_sqltime_to_calnderdate(strtotime($search_date)); ?></td>
                                                            <td class="row" align="left">
                                                                <button type="button" class="btn btn-primary mark_present" id="<?php echo $dbdata[$i]['id']; ?>" style="padding: 2px 12px;font-size: 13px;">Present</button>
                                                                <button type="button" class="btn btn-primary mark_absent" id="<?php echo $dbdata[$i]['id']; ?>" style="padding: 2px 12px;font-size: 13px;">Absent</button>
                                                                <button type="button" class="btn btn-primary mark_half_day" id="<?php echo $dbdata[$i]['id']; ?>" style="padding: 2px 12px;font-size: 13px;">Half Day</button>
                                                                <button type="button" class="btn btn-primary mark_on_leave" id="<?php echo $dbdata[$i]['id']; ?>" style="padding: 2px 12px;font-size: 13px;">On Leave</button>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                }?>
                                                </tbody>
                                            </table>
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
    jQuery(document).ready(function () {
        App.setPage("usermanager");  //Set current page
        //App.init(); //Initialise plugins and elements
        $(".item_multicheck").change(function () {
            var i = 0;
            $('.item_multicheck').each(function (e) { //loop through each checkbox
                if (this.checked) {
                    i++;
                }
            });
            if (i == $('.item_multicheck').length) {
                $("#multicheck").prop('checked', true);
            } else {
                $("#multicheck").prop('checked', false);
            }
        });

        $('body').delegate('#multicheck', 'click', function (e) {
            //alert('!!');
            var aa = document.getElementById('multicheck');
            checked = aa.checked;
            $('.item_multicheck').each(function (e) { //loop through each checkbox
                //alert($(this).attr('disabled'));
                if ($(this).attr('readonly') != 'readonly' &&  $(this).attr('disabled') != 'disabled') {
                    $(this).prop('checked', checked);
                }
            });
        });

        $('#mark_present').stop(true).click(function(){
            mark_unmark_attendance(1);
        });
        $('#mark_absent').stop(true).click(function(){
            mark_unmark_attendance(2);
        });

        $('.mark_present').stop(true).click(function(){
            mark_unmark_attendance_single(1,$(this).attr('id'));
        });
        $('.mark_absent').stop(true).click(function(){
            mark_unmark_attendance_single(2,$(this).attr('id'));
        });
        $('.mark_half_day').stop(true).click(function(){
            mark_unmark_attendance_single(3,$(this).attr('id'));
        });
        $('.mark_on_leave').stop(true).click(function(){
            mark_unmark_attendance_single(4,$(this).attr('id'));
        });

        var current_year = new Date().getFullYear();
        $('#date').datepicker({
            dateFormat:'dd-mm-yy',
            changeMonth: true,
            changeYear: true,
            maxDate:0
        });

    });

    function mark_unmark_attendance(flag)
        {
            //flag 1-present, 2-absent
            var i = 0;
            var employeeArray = new Array();
            $('.item_multicheck').each(function (e) {
                if (this.checked) {
                    i++;
                    employeeArray.push(this.value);
                }
            });
            /*console.log(employeeArray.join(','));
            return false;*/
            if(i==0)
            {
                alert('Please select atleast one employee');
            }
            else
            {
                if(confirm('Are you sure to perform this?'))
                    {
                        ajaxLoaderStart();
                        $.ajax({
                            url: "<?php echo base_url(); ?>admin/attendance/mark_attendance_ajax",
                            dataType: 'json',
                            type: 'POST',
                            data: {
                                flag:flag,
                                employees:employeeArray.join(','),
                                date:'<?php echo date('Y-m-d',strtotime($search_date));?>'
                            },
                            success: function(data) {
                                ajaxLoaderStop();
                                if(data.status=='1')
                                {
                                    alert(data.msg);
                                    window.location.href = '<?php echo BASE_URL.'admin/attendance/mark_attendance';?>'+getQueryString();
                                }
                                else
                                {
                                    alert(data.msg);
                                }
                            }
                        });
                    }
            }
        }

    function mark_unmark_attendance_single(flag,employeeId)
    {
        //flag 1-present, 2-absent
        if(confirm('Are you sure to perform this?'))
        {
            ajaxLoaderStart();
            $.ajax({
                url: "<?php echo base_url(); ?>admin/attendance/mark_attendance_ajax",
                dataType: 'json',
                type: 'POST',
                data: {
                    flag:flag,
                    employees:employeeId,
                    date:'<?php echo date('Y-m-d',strtotime($search_date));?>'
                },
                success: function(data) {
                    ajaxLoaderStop();
                    if(data.status=='1')
                    {
                        alert(data.msg);
                        window.location.href = '<?php echo BASE_URL.'admin/attendance/mark_attendance';?>'+getQueryString();
                    }
                    else
                    {
                        alert(data.msg);
                    }
                }
            });
        }
    }

    function getQueryString()
        {
            var qStr = '';
            var qArray = new Array();
            if($('#date').val().trim()!='')qArray.push('date='+$('#date').val().trim());
            if($('#project_id').val().trim()!='')qArray.push('project_id='+$('#project_id').val().trim());
            if(qArray.length>0)
                {
                    qStr = '?'+qArray.join('&');
                }
            return qStr;
        }
    function searchFrm()
        {
            window.location.href = '<?php echo BASE_URL.'admin/attendance/mark_attendance';?>'+getQueryString();
        }
</script>
</html>