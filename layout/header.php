<!DOCTYPE html>
<html>
    
<!-- Mirrored from coderthemes.com/ubold_1.1/dark/dashboard_3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Nov 2015 02:12:13 GMT -->
<head>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="assets/images/pln.jpg">
        <title>Information of Payment</title>
        <link href="assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        
        <!-- DataTables -->
        <link href="assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/plugins/jquery-datatables-editable/datatables.css" />
        <link href="assets/plugins/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
        
        <!--Option Dropdown-->
        <link href="assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/plugins/switchery/dist/switchery.min.css" rel="stylesheet" />
        <link href="assets/plugins/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />
        <link href="assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
        
        <!--Datepicker-->
        <link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <link href="assets/plugins/sweetalert/dist/sweetalert.css" rel="stylesheet" type="text/css">
        <script src="assets/js/modernizr.min.js"></script>
        
    </head>
    <body class="fixed-left">
        <div id="wrapper">
            <div class="topbar">
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="" class="logo"><span>iPay</span></a>
                    </div>
                </div>
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left">
                                    <i class="ion-navicon"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>

                            <ul class="nav navbar-nav navbar-right pull-right">
                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect"><i class="icon-size-fullscreen"></i></a>
                                </li>                                
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle profile waves-effect" data-toggle="dropdown" aria-expanded="true"><?php echo $_SESSION['nama']; ?> </a>
                                    <ul class="dropdown-menu">
                                        <!-- <li><a href="profile.php?id=<?php echo $_SESSION['username'];?>"><i class="ti-user m-r-5"></i> Profile</a></li>   -->       
                                        <li><a href="#" id="sa-warning"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div id="sidebar-menu">
                        <ul>
                            <li><a href="home.php" class="waves-effect waves-light"><i class="ti-home"></i> Home</a></li>
                            <li><a href="upload.php" class="waves-effect waves-light"><i class="ti-upload"></i> Upload Data</a></li>
                            <li><a href="sudah_kirim.php" class="waves-effect waves-light"><i class="ti-check-box"></i> Sudah Terkirim</a></li>
                            <li><a href="belum_kirim.php" class="waves-effect waves-light"><i class="ti-layout-width-full"></i> Belum Terkirim</a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>