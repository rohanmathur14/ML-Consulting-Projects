<header class="navbar clearfix" id="header">
    <div class="container">
        <div class="navbar-brand">
            <!-- COMPANY LOGO -->
            <a href="<?php echo $site_path['admin_url']; ?>">
                <img src="<?php echo IMAGES_PATH; ?>logo.png" width="140" alt="UTIPL">
            </a>
            <!-- /COMPANY LOGO -->
            <!-- TEAM STATUS FOR MOBILE -->
            <!--<div class="visible-xs">
                <a href="#" class="team-status-toggle switcher btn dropdown-toggle">
                    <i class="fa fa-users"></i>
                </a>
            </div>-->
            <!-- /TEAM STATUS FOR MOBILE -->
            <!-- SIDEBAR COLLAPSE -->
            <div id="sidebar-collapse" class="sidebar-collapse btn nexus-mob-menu">
                <i class="fa fa-bars menu_icon_toggle" data-icon1="fa fa-bars" data-icon2="fa fa-bars"></i>
            </div>
            <!-- /SIDEBAR COLLAPSE -->
        </div>
        <!-- NAVBAR LEFT -->

        <!-- /NAVBAR LEFT -->
        <!-- BEGIN TOP NAVIGATION MENU -->

        <ul class="nav navbar-nav pull-right">
            <!-- BEGIN USER LOGIN DROPDOWN -->

            <li class="dropdown user pull-right" id="header-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="username">
                        <?php echo ucfirst($adminDetail['name']); ?>
                    </span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <!--<li><a href="#"><i class="fa fa-user"></i> My Profile</a></li>-->
                    <?php
                    if($adminDetail['main_admin']=='1'){?>
                        <li><a href="<?php echo $site_path['admin_url']; ?>index/adminSetting"><i class="fa fa-cog"></i> Account Settings</a></li>
                        <li><a href="<?php echo $site_path['admin_url']; ?>index/privacySetting"><i class="fa fa-lock"></i> Change Password</a></li>
                    <?php }
                    else{
                        ?>
                        <!--<li><a href="<?php /*echo $site_path['admin_url']; */?>index/profile"><i class="fa fa-user"></i> Profile</a></li>-->
                        <li><a href="<?php echo $site_path['admin_url']; ?>index/change_password"><i class="fa fa-lock"></i> Change Password</a></li>
                        <?php
                    }
                    ?>
                    <!--<li><a href="#"><i class="fa fa-cog"></i> Other Settings</a></li>-->
                    <li><a href="<?php echo $site_path['admin_url']; ?>index/doLogout"><i class="fa fa-power-off"></i>
                            Log Out</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>

    <!-- BOTTOM NAVIGATION -->
      <header class="oildrop-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-xl-12 col-4">
              <div class="text-center">
                <div class="header-wrap">              
                  <!-- <a href="javascript:void(0);" class="oildrop-toggle d-xl-none"><span></span></a> -->
                  <nav class="oildrop-navigation">
                    <!-- <a href="#0" class="close-icon d-xl-none">
                      <span></span>
                    </a> -->
                    <ul>
                        <li class="menu-item-has-children" <?php if($current_controller == '' && $current_action == ''){echo 'class="active"';} ?>>
                            <a href="<?php echo $site_path['admin_url']; ?>"><span class="menu-text"><span class="menu-text-wrap" data-hover="Dashboard">Dashboard</span></span></a>
                        </li>

                        <?php if(is_super_admin()){ ?>

                            <li class="menu-item-has-children <?php if($current_controller == 'index'){echo 'active';} ?>">
                                <a href="#0"><span class="menu-text"><span class="menu-text-wrap" data-hover="Admin Setting">Admin Setting</span></span></a>
                                <span class="dropdown-arrow"></span>
                                <ul class="sub-menu">
                                  <li <?php if($current_controller == 'index' && $current_action == 'adminSetting'){echo 'class="current"';} ?>>
                                    <a class="" href="<?php echo $site_path['admin_url']; ?>index/adminSetting"><span class="menu-text"><span class="menu-text-wrap" data-hover="Account Setting">Account Setting</span></span></a>
                                  </li>
                                  <li <?php if($current_controller == 'index' && $current_action == 'privacySetting'){echo 'class="current"';} ?>>
                                    <a class="" href="<?php echo $site_path['admin_url']; ?>index/privacySetting"><span class="menu-text"><span class="menu-text-wrap" data-hover="Change Password">Change Password</span></span></a>
                                  </li>
                                </ul>
                              </li>

                        
                    <?php }
                    else{
                    ?>

                    <?php if($adminDetail['user_type']=='0'){?>
                        <li class="menu-item-has-children has-sub <?php if($current_controller == 'projects'){echo 'active';} ?>">
                            <a href="javascript:;"><span class="menu-text"><span class="menu-text-wrap" data-hover="Projects">Projects</span></span></a>
                            <span class="dropdown-arrow"></span>
                            <ul class="sub-menu">
                              <li <?php if(($current_controller == 'projects') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>projects"><span class="menu-text"><span class="menu-text-wrap" data-hover="Manage Projects">Manage Projects</span></span></a>
                              </li>
                               <?php if($adminDetail['user_type']=='0'){?>
                                    <li <?php if($current_controller == 'projects' && $current_action == 'add'){echo 'class="current"';} ?>>
                                        <a class="" href="<?php echo $site_path['admin_url']; ?>projects/add"><span class="menu-text"><span class="menu-text-wrap" data-hover="Add Project">Add Project</span></span></a>
                                      </li>
                                <?php } ?>
                            </ul>
                          </li>
                    <?php } ?>

                    <?php if($adminDetail['user_type']=='0'){?>
                        <li class="menu-item-has-children has-sub <?php if($current_controller == 'employee'){echo 'active';} ?>">
                            <a href="javascript:;"><span class="menu-text"><span class="menu-text-wrap" data-hover="Employees">Employees</span></span></a>
                            <span class="dropdown-arrow"></span>
                            <ul class="sub-menu">
                              <li <?php if(($current_controller == 'employee') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>employee"><span class="menu-text"><span class="menu-text-wrap" data-hover="Manage Employee">Manage Employee</span></span></a>
                              </li>
                              <li <?php if($current_controller == 'employee' && $current_action == 'add'){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>employee/add"><span class="menu-text"><span class="menu-text-wrap" data-hover="Add Employee">Add Employee</span></span></a>
                              </li>
                              <li <?php if($current_controller == 'employee' && $current_action == 'export_salary'){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>employee/export_salary"><span class="menu-text"><span class="menu-text-wrap" data-hover="Export Salary">Export Salary</span></span></a>
                              </li>
                            </ul>
                          </li>
                    <?php } ?>

                    <?php if($adminDetail['user_type']=='0'){?>
                        <li class="menu-item-has-children has-sub <?php if($current_controller == 'equipments'){echo 'active';} ?>">
                            <a href="javascript:;"><span class="menu-text"><span class="menu-text-wrap" data-hover="Equipments">Equipments</span></span></a>
                            <span class="dropdown-arrow"></span>
                            <ul class="sub-menu">
                              <li <?php if(($current_controller == 'equipments') && ($current_action == '' || $current_action == 'view' || $current_action == 'edit' || $current_action == 'index')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>equipments"><span class="menu-text"><span class="menu-text-wrap" data-hover="Manage Equipments">Manage Equipments</span></span></a>
                              </li>
                              <li <?php if($current_controller == 'equipments' && $current_action == 'add'){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>equipments/add"><span class="menu-text"><span class="menu-text-wrap" data-hover="Add Equipments">Add Equipments</span></span></a>
                              </li>
                              <li <?php if($current_controller == 'equipments' && $current_action == 'logbook'){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>equipments/logbook"><span class="menu-text"><span class="menu-text-wrap" data-hover="Log Book">Log Book</span></span></a>
                              </li>
                              <li <?php if($current_controller == 'equipments' && $current_action == 'servicebook'){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>equipments/servicebook"><span class="menu-text"><span class="menu-text-wrap" data-hover="Service Book">Service Book</span></span></a>
                              </li>
                              <li <?php if($current_controller == 'equipments' && $current_action == 'requests'){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>equipments/requests"><span class="menu-text"><span class="menu-text-wrap" data-hover="Requests">Requests</span></span></a>
                              </li>
                            </ul>
                          </li>
                    <?php } ?>

                    <li class="menu-item-has-children has-sub <?php if($current_controller == 'attendance'){echo 'active';} ?>">
                        <a href="javascript:;"><span class="menu-text"><span class="menu-text-wrap" data-hover="Attendance">Attendance</span></span></a>
                        <span class="dropdown-arrow"></span>
                        <ul class="sub-menu">
                            <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                          <li <?php if(($current_controller == 'attendance' && $current_action == '')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>attendance"><span class="menu-text"><span class="menu-text-wrap" data-hover="Employees Attendance">Employees Attendance</span></span></a>
                          </li>
                          <?php } ?>
                          <?php if($adminDetail['user_type']=='1' || $adminDetail['user_type']=='2'){?>
                          <li <?php if(($current_controller == 'attendance' && $current_action == '')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>attendance/my"><span class="menu-text"><span class="menu-text-wrap" data-hover="My Attendance">My Attendance</span></span></a>
                          </li>
                          <?php } ?>
                          <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                          <li <?php if(($current_controller == 'attendance' && $current_action == 'mark_attendance')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>attendance/mark_attendance"><span class="menu-text"><span class="menu-text-wrap" data-hover="Mark Employees Attendance">Mark Employees Attendance</span></span></a>
                          </li>
                          <?php } ?>
                        </ul>
                      </li>

                      <li class="menu-item-has-children has-sub <?php if($current_controller == 'leaves'){echo 'active';} ?>">
                        <a href="javascript:;"><span class="menu-text"><span class="menu-text-wrap" data-hover="Leaves">Leaves</span></span></a>
                        <span class="dropdown-arrow"></span>
                        <ul class="sub-menu">
                            <?php if($adminDetail['user_type']=='0'){?>
                          <li <?php if(($current_controller == 'leaves') && ($current_action == 'holiday')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>leaves/holiday"><span class="menu-text"><span class="menu-text-wrap" data-hover="Manage Holiday">Manage Holiday</span></span></a>
                          </li>
                          <?php }else{ ?>
                          <li <?php if(($current_controller == 'leaves') && ($current_action == 'holiday')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>leaves/holiday"><span class="menu-text"><span class="menu-text-wrap" data-hover="Holiday's">Holiday's</span></span></a>
                          </li>
                          <?php } ?>

                          <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                            <li <?php if(($current_controller == 'leaves') && ($current_action == 'employee_leave_history')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>leaves/employee_leave_history"><span class="menu-text"><span class="menu-text-wrap" data-hover="Employee's Leave History">Employee's Leave History</span></span></a>
                              </li>
                            <?php } ?>


                          <?php if($adminDetail['user_type']=='1' || $adminDetail['user_type']=='2'){?>
                          <li <?php if(($current_controller == 'leaves') && ($current_action == 'my_leave_history')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>leaves/my_leave_history"><span class="menu-text"><span class="menu-text-wrap" data-hover="My Leave History">My Leave History</span></span></a>
                          </li>
                          <?php } ?>

                        </ul>
                      </li>

                      <li class="menu-item-has-children has-sub <?php if($current_controller == 'inventory'){echo 'active';} ?>">
                        <a href="javascript:;"><span class="menu-text"><span class="menu-text-wrap" data-hover="Inventory">Inventory</span></span></a>
                        <span class="dropdown-arrow"></span>
                        <ul class="sub-menu">

                          <li <?php if(($current_controller == 'inventory') && ($current_action=='')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>inventory"><span class="menu-text"><span class="menu-text-wrap" data-hover="Dashboard">Dashboard</span></span></a>
                          </li>

                          <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                            <li <?php if(($current_controller == 'inventory') && ($current_action=='material_request' || $current_action=='mr_add' || $current_action=='mr_edit')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/material_request"><span class="menu-text"><span class="menu-text-wrap" data-hover="Material Request">Material Request</span></span></a>
                              </li>

                              <li <?php if(($current_controller == 'inventory') && ($current_action=='vendor_approval' || $current_action=='va_add' || $current_action=='va_edit')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/vendor_approval"><span class="menu-text"><span class="menu-text-wrap" data-hover="Vendor Approval">Vendor Approval</span></span></a>
                              </li>

                              <li <?php if(($current_controller == 'inventory') && ($current_action=='qap_approval' || $current_action=='qap_add' || $current_action=='qap_edit')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/qap_approval"><span class="menu-text"><span class="menu-text-wrap" data-hover="QAP Approval">QAP Approval</span></span></a>
                              </li>

                              <li <?php if(($current_controller == 'inventory') && ($current_action=='order_placement' || $current_action=='op_add' || $current_action=='op_edit')){echo 'class="current"';} ?>>
                                <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/order_placement"><span class="menu-text"><span class="menu-text-wrap" data-hover="Order Placement">Order Placement</span></span></a>
                              </li>
                          <?php }?>

                          <li <?php if(($current_controller == 'inventory') && ($current_action=='supply' || $current_action=='s_search' || $current_action=='s_add' || $current_action=='s_edit')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/supply"><span class="menu-text"><span class="menu-text-wrap" data-hover="Supply">Supply</span></span></a>
                          </li>

                          <li <?php if(($current_controller == 'inventory') && ($current_action=='inward' || $current_action=='i_search' || $current_action=='i_add' || $current_action=='i_edit')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/inward"><span class="menu-text"><span class="menu-text-wrap" data-hover="Inward">Inward</span></span></a>
                          </li>

                          <li <?php if(($current_controller == 'inventory') && ($current_action=='outward' || $current_action=='indent_request' || $current_action=='indent_request_approval' || $current_action=='indent_outward')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/outward"><span class="menu-text"><span class="menu-text-wrap" data-hover="Outward">Outward</span></span></a>
                          </li>

                          <li <?php if(($current_controller == 'inventory') && ($current_action=='stock_inventory')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/stock_inventory"><span class="menu-text"><span class="menu-text-wrap" data-hover="Stock Inventory">Stock Inventory</span></span></a>
                          </li>

                          <?php if($adminDetail['user_type']=='0' || $adminDetail['user_type']=='1'){?>
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='status_report')){echo 'class="current"';} ?>>
                            <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/status_report"><span class="menu-text"><span class="menu-text-wrap" data-hover="Status Report">Status Report</span></span></a>
                          </li>
                        <?php } ?>
                        
                        <li <?php if(($current_controller == 'inventory') && ($current_action=='stock_database')){echo 'class="current"';} ?>>
                        <a class="" href="<?php echo $site_path['admin_url']; ?>inventory/stock_database"><span class="menu-text"><span class="menu-text-wrap" data-hover="Stock Database">Stock Database</span></span></a>
                      </li>

                          
                        </ul>
                      </li>

                      

                      <?php } ?>
                       
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
    <!-- /BOTTOM NAVIGATION -->

    <!-- TEAM STATUS -->

    <!-- /TEAM STATUS -->
</header>

<script type="text/javascript">
    jQuery(".nexus-mob-menu").click(()=>{
        jQuery(".header-wrap").toggleClass("open");
        jQuery(".menu_icon_toggle").toggleClass("fa-bars");
        jQuery(".menu_icon_toggle").toggleClass("fa-times");
    });

    // Sub Menu Scripts
  jQuery('.dropdown-arrow').on('click', function() {
    var element = jQuery(this).parent('.menu-item-has-children');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.btn-prev').remove();
      element.find('.menu-item-has-children').removeClass('open');
      element.find('.sub-menu, .submenu-inner').removeClass('open');
    }
    else {
      var name = element.find('a').html();
      element.addClass('open');
      element.children('.sub-menu, .submenu-inner').addClass('open');
      element.find('.btn-prev').remove();
      element.children('.sub-menu, .submenu-inner').prepend('<li class="btn-prev"><a href="javascript:void(0)">' + name + '</a></li>')
      element.siblings('.menu-item-has-children').children('.sub-menu, .submenu-inner').removeClass('open');
      element.siblings('.menu-item-has-children').removeClass('open');
      element.siblings('.menu-item-has-children').find('.menu-item-has-children').removeClass('open');
      element.siblings('.menu-item-has-children').find('.sub-menu, .submenu-inner').removeClass('open');
      jQuery('.sub-menu .btn-prev, .submenu-inner .btn-prev').click(function() {
        jQuery(this).parent().removeClass('open');
        jQuery(this).parent().parent().removeClass('open');
      });
    }
  });
</script>