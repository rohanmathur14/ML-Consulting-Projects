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
            <div id="sidebar-collapse" class="sidebar-collapse btn">
                <i class="fa fa-bars" data-icon1="fa fa-bars" data-icon2="fa fa-bars"></i>
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