<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>MaXXi</title>

        <!--jQuery 3-->
        <script src="<?php echo base_url('js/jquery/jquery.min.js'); ?>"></script>

        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap.min.js'); ?>"></script>
        
        <!--Bootstrap 3.3.7 plugin-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap-select.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap-select.min.js'); ?>"></script>
        <script src="<?php echo base_url('js/moment.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap-datetimepicker.min.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap-datetimepicker.min.js'); ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap/bootstrap-table.css'); ?>"/>
        <script src="<?php echo base_url('js/bootstrap/bootstrap-table.js'); ?>"></script>
        
        <!--Font Awesome-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('font-awesome/css/font-awesome.min.css'); ?>"/>

        <!--Ionicons-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/Ionicons/css/ionicons.min.css'); ?>"/>

        <!--AdminLTE Theme-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/theme/AdminLTE.min.css'); ?>"/>
        <script src="<?php echo base_url('js/theme/adminlte.min.js'); ?>"></script>

        <!--iCheck-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/iCheck/square/blue.css'); ?>"/>
        <script src="<?php echo base_url('css/iCheck/icheck.min.js'); ?>"></script>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>
        
        <!--Custom CSS/JS-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>"/>
        <script src="<?php echo base_url('js/script.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('css/skins/skin-blue.min.css'); ?>">
        <script src="<?php echo base_url('js/bootbox.min.js'); ?>"></script>
        
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
          <header class="main-header">
            <a class="logo">
              <span class="logo-mini"><b>MaXXi</b></span>
              <span class="logo-lg"><b>Admin</b> MaXXi</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
              <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-user-o"></i> &nbsp; Welcome <?php echo $namaKaryawan; ?>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <ul class="menu">
                                <li>
                                <?php if($r == 1){ ?>
                                    <a href="<?php echo base_url('Administrator/changePassword'); ?>">Change Password</a>
                                <?php }else if($r == 2){ ?>
                                    <a href="<?php echo base_url('Director/changePassword'); ?>">Change Password</a>
                                <?php }else if($r == 3){ ?>
                                    <a href="<?php echo base_url('HRD/changePassword'); ?>">Change Password</a>
                                <?php }else{ ?>
                                    <a href="<?php echo base_url('Employee/changePassword'); ?>">Change Password</a>
                                <?php } ?>
                              </li>
                              <li>
                                  <a href="<?php echo base_url('Login/doLogOut'); ?>">Log Out</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                    </li>
                  </ul>
              </div>
            </nav>
          </header>
          <aside class="main-sidebar">

            <section class="sidebar">
              <!-- Sidebar Menu -->
              <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU</li>
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i><span>Home</span></a></li>
                <?php 
                    foreach($menu as $m){
                        if($m->URL === '#'){
                ?>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-link"></i> <span><?php echo $m->NamaMenu; ?></span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <li><a href="<?php echo base_url('Administrator/MasterMenu'); ?>">Master Menu</a></li>
                          <li><a href="<?php echo base_url('Administrator/MasterSubMenu'); ?>">Master Sub Menu</a></li>
                          <li><a href="<?php echo base_url('Administrator/AuthorizeMenu'); ?>">Authorize Menu</a></li>
                          <li><a href="<?php echo base_url('Administrator/AuthorizeSubMenu'); ?>">Authorize Sub Menu</a></li>
                        </ul>
                    </li>
                <?php
                        }else{
                ?>
                    <li><a href="<?php echo $path . $m->URL; ?>"><i class="fa fa-link"></i> <span><?php echo $m->NamaMenu; ?></span></a></li>
                    <?php } }?>
              </ul>
              <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <section class="content container-fluid">