 <!-- BEGIN: Body-->
<?php 
$user = $this->adminm->get_user();
?>
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky fixed-footer  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="/admin/">
                        <div class="brand-logo"></div>
                        <h2 class="brand-text mb-0">Subnet Data</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary" data-ticon="icon-disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="/admin/"><i class="feather icon-home"></i><span class="menu-title" data-i18n="">Home</span></a>
                </li>
                
                <li class=" nav-item"><a href="/admin/support/"><i class="feather icon-message-circle"></i><span class="menu-title" data-i18n="">Supports</span></a>
                </li>
                <li class=" nav-item"><a href="/admin/networks/"><i class="fa fa-wifi"></i><span class="menu-title" data-i18n="">Networks</span></a>
                </li>
                <li class=" nav-item"><a href="/admin/coupon/"><i class="feather icon-tag"></i><span class="menu-title" data-i18n="">Coupon</span></a>
                </li>
                <li class=" nav-item"><a href="/admin/dataplans/"><i class="feather icon-share"></i><span class="menu-title" data-i18n="">Data Plans</span></a>
                </li>
                <li class=" nav-item"><a href="/admin/airtime/"><i class="feather icon-share"></i><span class="menu-title" data-i18n="">Airtime</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-unlock"></i><span class="menu-title" data-i18n="Users">Users</span></a>
                        <ul class="menu-content">
                         <li><a href="/admin/users/"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Login">All</span></a>
                         </li>
                         <li><a href="/admin/users/blocked"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Login">Blocked</span></a>
                         </li>
                     </ul>
                 </li>

                <li class=" nav-item"><a href="/admin/staff/"><i class="feather icon-user"></i><span class="menu-title" data-i18n="">Staff Management</span></a>
                </li>

                
                <li class=" nav-item"><a href="/admin/settings"><i class="fa fa-cogs"></i><span class="menu-title" data-i18n="">Settings</span></a>
                </li>
            </ul>
        </div>
    </div>

    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">

        <!-- BEGIN: Header-->
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top navbar-light navbar-shadow">
            <div class="navbar-wrapper">
                <div class="navbar-container content">
                    <div class="navbar-collapse" id="navbar-mobile">
                        <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                            <ul class="nav navbar-nav">
                                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                            </ul>
                           
                            
                        </div>
                        <ul class="nav navbar-nav float-right">
                            
                            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                               
                                    <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600"><?php echo $user->first_name; ?><span> </span><?php echo substr($user->last_name,0,1); ?>.</span><span class="user-status"><?php echo $user->email; ?></span></div><span><img class="round" src="/assets/images/portrait/small/avatar-s-11.png" alt="avatar" height="40" width="40" /></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="/admin/profile/"><i class="feather icon-user"></i>Profile</a>
                                    <a class="dropdown-item" href="/admin/messages"><i class="feather icon-mail"></i>Inbox</a>
                                    <!-- <a class="dropdown-item" href="/admin/messages"><i class="feather icon-check-square"></i> Task</a> -->
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="/admin/auth/logout"><i class="feather icon-power"></i> Logout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

    
        <!-- END: Header-->

        <div class="content-wrapper">
            <div class="content-header row">
            </div>
                