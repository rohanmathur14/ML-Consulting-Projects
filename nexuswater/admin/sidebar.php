<?php
	$current_controller = $this->uri->segment(2);
	$current_action     = $this->uri->segment(3);
    $admin_id = getSessionUserData('admin_id');
?>
<div id="sidebar" class="sidebar">
    <div class="sidebar-menu nav-collapse">
        <div class="divide-20"></div>
        <!-- SIDEBAR MENU -->
        <ul>
            <li <?php if($current_controller == '' && $current_action == ''){echo 'class="active"';} ?> >
                <a href="<?php echo $site_path['admin_url']; ?>">
                    <i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>

            <?php if(is_super_admin()){ ?>
                <li class="has-sub <?php if($current_controller == 'index'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-table fa-fw"></i> <span class="menu-text">Admin Setting</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($current_controller == 'index' && $current_action == 'adminSetting'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>index/adminSetting"><span class="sub-menu-text">Account Setting</span></a></li>
                        <li <?php if($current_controller == 'index' && $current_action == 'privacySetting'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>index/privacySetting"><span class="sub-menu-text">Change Password</span></a></li>
                    </ul>
                </li>

                <li class="has-sub <?php if($current_controller == 'users'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-user"></i> <span class="menu-text">Super User Manager</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if(($current_controller == 'users') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>users"><span class="sub-menu-text">Manage Super Users</span></a></li>
                        <li <?php if($current_controller == 'users' && $current_action == 'add'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>users/add"><span class="sub-menu-text">Add Super User</span></a></li>
                    </ul>
                </li>
                <li class="has-sub <?php if($current_controller == 'emailtemplates'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-columns fa-fw"></i> <span class="menu-text">Email Templates</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if($current_controller == 'emailtemplates' && $current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>emailtemplates"><span class="sub-menu-text">Manage Email Templates</span></a></li>
                    </ul>
                </li>
            <?php }
            else{
            ?>
                <?php if($adminDetail['user_type']=='0'){?>
                <li class="has-sub <?php if($current_controller == 'projects'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-tasks"></i> <span class="menu-text">Projects</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if(($current_controller == 'projects') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>projects"><span class="sub-menu-text">Manage Projects</span></a></li>
                        <?php if($adminDetail['user_type']=='0'){?>
                                <li <?php if($current_controller == 'projects' && $current_action == 'add'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>projects/add"><span class="sub-menu-text">Add Project</span></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <?php } ?>

                <?php if($adminDetail['user_type']=='0'){?>
                    <li class="has-sub <?php if($current_controller == 'employee'){echo 'active';} ?>">
                        <a href="javascript:;" class="">
                            <i class="fa fa-users"></i> <span class="menu-text">Employees</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li <?php if(($current_controller == 'employee') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>employee"><span class="sub-menu-text">Manage Employee</span></a></li>
                            <li <?php if($current_controller == 'employee' && $current_action == 'add'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>employee/add"><span class="sub-menu-text">Add Employee</span></a></li>
                            <li <?php if($current_controller == 'employee' && $current_action == 'export_salary'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>employee/export_salary"><span class="sub-menu-text">Export Salary</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if($adminDetail['user_type']=='0'){?>
                    <li class="has-sub <?php if($current_controller == 'equipments'){echo 'active';} ?>">
                        <a href="javascript:;" class="">
                            <i class="fa fa-cog"></i> <span class="menu-text">Equipments</span>
                            <span class="arrow"></span>
                        </a>
                        <ul class="sub">
                            <li <?php if(($current_controller == 'equipments') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>equipments"><span class="sub-menu-text">Manage Equipments</span></a></li>
                            <li <?php if($current_controller == 'equipments' && $current_action == 'add'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>equipments/add"><span class="sub-menu-text">Add Equipment</span></a></li>
                            <li <?php if($current_controller == 'equipments' && $current_action == 'logbook'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>equipments/logbook"><span class="sub-menu-text">Log Book</span></a></li>
                            <li <?php if($current_controller == 'equipments' && $current_action == 'servicebook'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>equipments/servicebook"><span class="sub-menu-text">Service Book</span></a></li>
                            <li <?php if($current_controller == 'equipments' && $current_action == 'requests'){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>equipments/requests"><span class="sub-menu-text">Requests</span></a></li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="has-sub <?php if($current_controller == 'attendance'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-clock-o"></i> <span class="menu-text">Attendance</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                        <li <?php if(($current_controller == 'attendance' && $current_action == '')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>attendance"><span class="sub-menu-text">Employees Attendance</span></a></li>
                        <?php } ?>
                        <?php if($adminDetail['user_type']=='1' || $adminDetail['user_type']=='2'){?>
                        <li <?php if(($current_controller == 'attendance' && $current_action == '')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>attendance/my"><span class="sub-menu-text">My Attendance</span></a></li>
                        <?php } ?>
                        <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                            <li <?php if(($current_controller == 'attendance' && $current_action == 'mark_attendance')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>attendance/mark_attendance"><span class="sub-menu-text">Mark Employees Attendance</span></a></li>
                        <?php } ?>
                    </ul>
                </li>


                <li class="has-sub <?php if($current_controller == 'leaves'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-calendar-o"></i> <span class="menu-text">Leaves</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <?php if($adminDetail['user_type']=='0'){?>
                        <li <?php if(($current_controller == 'leaves') && ($current_action == 'holiday')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>leaves/holiday"><span class="sub-menu-text">Manage Holiday</span></a></li>
                        <?php }else{ ?>
                        <li <?php if(($current_controller == 'leaves') && ($current_action == 'holiday')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>leaves/holiday"><span class="sub-menu-text">Holiday's</span></a></li>
                        <?php } ?>

                        <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                            <li <?php if(($current_controller == 'leaves') && ($current_action == 'employee_leave_history')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>leaves/employee_leave_history"><span class="sub-menu-text">Employee's Leave History</span></a></li>
                        <?php } ?>

                        <?php if($adminDetail['user_type']=='1' || $adminDetail['user_type']=='2'){?>
                            <li <?php if(($current_controller == 'leaves') && ($current_action == 'my_leave_history')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>leaves/my_leave_history"><span class="sub-menu-text">My Leave History</span></a></li>
                        <?php } ?>

                    </ul>
                </li>

                <li class="has-sub <?php if($current_controller == 'inventory'){echo 'active';} ?>">
                    <a href="javascript:;" class="">
                        <i class="fa fa-building-o"></i> <span class="menu-text">Inventory</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub">
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory"><span class="sub-menu-text">Dashboard</span></a></li>

                        <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                            <li <?php if(($current_controller == 'inventory') && ($current_action=='material_request' || $current_action=='mr_add' || $current_action=='mr_edit')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/material_request"><span class="sub-menu-text">Material Request</span></a></li>
                            <li <?php if(($current_controller == 'inventory') && ($current_action=='vendor_approval' || $current_action=='va_add' || $current_action=='va_edit')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/vendor_approval"><span class="sub-menu-text">Vendor Approval</span></a></li>
                            <li <?php if(($current_controller == 'inventory') && ($current_action=='qap_approval' || $current_action=='qap_add' || $current_action=='qap_edit')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/qap_approval"><span class="sub-menu-text">QAP Approval</span></a></li>
                            <li <?php if(($current_controller == 'inventory') && ($current_action=='order_placement' || $current_action=='op_add' || $current_action=='op_edit')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/order_placement"><span class="sub-menu-text">Order Placement</span></a></li>
                        <?php }?>

                        <li <?php if(($current_controller == 'inventory') && ($current_action=='supply' || $current_action=='s_search' || $current_action=='s_add' || $current_action=='s_edit')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/supply"><span class="sub-menu-text">Supply</span></a></li>
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='inward' || $current_action=='i_search' || $current_action=='i_add' || $current_action=='i_edit')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/inward"><span class="sub-menu-text">Inward</span></a></li>
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='outward' || $current_action=='indent_request' || $current_action=='indent_request_approval' || $current_action=='indent_outward')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/outward"><span class="sub-menu-text">Outward</span></a></li>
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='stock_inventory')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/stock_inventory"><span class="sub-menu-text">Stock Inventory</span></a></li>

                        <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='status_report')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/status_report"><span class="sub-menu-text">Status Report</span></a></li>
                        <?php } ?>
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='stock_database')){echo 'class="current"';} ?>><a class="" href="<?php echo $site_path['admin_url']; ?>inventory/stock_database"><span class="sub-menu-text">Stock Database</span></a></li>

                    </ul>
                </li>

            <?php } ?>
        </ul>
        <!-- /SIDEBAR MENU -->
    </div>
</div>

<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border:none;">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <!--<h4 class="modal-title" id="myModalLabel">Image preview</h4>-->
            </div>
            <div class="modal-body" style="text-align: center;">
                <img src="" id="imagepreview" class="img-responsive" >
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function setModalMaxHeight(element) {
        this.$element     = $(element);
        var dialogMargin  = $(window).width() > 767 ? 62 : 22;
        var contentHeight = $(window).height() - dialogMargin;
        var headerHeight  = this.$element.find('.modal-header').outerHeight() || 2;
        var footerHeight  = this.$element.find('.modal-footer').outerHeight() || 2;
        var maxHeight     = contentHeight - (headerHeight + footerHeight);

        this.$element
            .find('.modal-content').css({
                'overflow': 'hidden'
            });

        this.$element
            .find('.modal-body').css({
                'max-height': maxHeight,
                'overflow-y': 'auto'
            });
    }
$(document).ready(function () {
    $(".imgpop").on("click", function(e) {
        e.preventDefault();

        $('#imagepreview').attr('src',$(this).attr('href'));
        $('#imagemodal').modal('show');
    });

    $('.modal').on('show.bs.modal', function() {
        $(this).show();
        setModalMaxHeight(this);
    });

    $(window).resize(function() {
        if ($('.modal.in').length != 0) {
            setModalMaxHeight($('.modal.in'));
        }
    });
});
</script>