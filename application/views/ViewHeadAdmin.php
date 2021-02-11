<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Sistem Informasi Data Center LPTSI Unsoed">
    <meta name="keywords" content="data center, unsoed, lptsi">
    <meta name="author" content="LPTSI Unsoed">
    <title><?php echo $title; ?> Data Center LPTSI Unsoed</title>
    
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/vendors/css/calendars/extensions/daygrid.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/vendors/css/calendars/extensions/timegrid.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/app-assets/css/plugins/calendars/fullcalendar.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <!-- li.nav-item.mobile-menu.d-xl-none.mr-auto-->
                            <!--   a.nav-link.nav-menu-main.menu-toggle.hidden-xs(href='#')-->
                            <!--     i.ficon.feather.icon-menu-->
                            <li class="nav-item d-none d-lg-block"><a class="nav-link" href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Todo"><i></i>Selamat Datang</a></li>
                           
                        </ul>
                        
                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon feather icon-maximize"></i></a></li>
                        
                        
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">Admin Data Center LPTSI</span><span class="user-status">Admin</span></div><span><img class="round" src="<?php echo base_url();?>assets/images/<?php echo $this->session->userdata('photo'); ?>" alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="<?php echo base_url();?>Admin/ubahdata"><i class="feather icon-user"></i> Ubah Data Akun</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item" href="<?php echo base_url();?>Admin/logout"><i class="feather icon-power"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto"><a class="navbar-brand" href="<?php echo base_url();?>">
                    <div class="logo"><img style="height: 25px; width: auto;" src="<?php echo base_url();?>assets/app-assets/images/logo/Logo.png"></div>
                    </a></li>

            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="active nav-item"><a href="<?php echo base_url();?>Admin"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Beranda</span></a>
                </li>
                <li class=" navigation-header"><span>Master Data</span>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url();?>Admin/user"><i class="feather icon-user"></i><span class="menu-title" data-i18n="User">User</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="feather icon-cpu"></i><span class="menu-title" data-i18n="Components">Komponen</span></a>
                    <ul class="menu-content">
                        <li><a href="<?php echo base_url();?>Admin/prosesor"><i class="fa fa-cogs"></i><span class="menu-item">Prosesor</span></a>
                        </li>
                        <li><a href="<?php echo base_url();?>Admin/ram"><i class="fa fa-cogs"></i><span class="menu-item">RAM</span></a>
                        </li>
                        <li><a href="<?php echo base_url();?>Admin/storage"><i class="fa fa-cogs"></i><span class="menu-item">Storage</span></a>
                        </li>
                        <li><a href="<?php echo base_url();?>Admin/kabel"><i class="fa fa-cogs"></i><span class="menu-item">Kabel Port</span></a>
                        </li>
                        
                    </ul>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="fas fa-door-closed"></i><span class="menu-title" data-i18n="Email">Ruangan</span></a>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="fa fa-building"></i><span class="menu-title" data-i18n="Email">Lemari</span></a>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="feather icon-inbox"></i><span class="menu-title" data-i18n="Email">Rak</span></a>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="fa fa-desktop"></i><span class="menu-title" data-i18n="Email">Server</span></a>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="fa fa-server"></i><span class="menu-title" data-i18n="Email">VPS</span></a>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="fa fa-dot-circle-o"></i><span class="menu-title" data-i18n="Email">Sistem</span></a>
                </li>
                <li class=" nav-item"><a href="app-email.html"><i class="feather icon-alert-octagon"></i><span class="menu-title" data-i18n="Email">Log</span></a>
                </li>
                

                <li class=" navigation-header"><span>Akun</span>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url();?>Admin/ubahdata"><i class="feather icon-settings"></i><span class="menu-title">Ubah Data Akun</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo base_url();?>Admin/logout"><i class="feather icon-log-out"></i><span class="menu-title">Logout</span></a>
                </li>

            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->