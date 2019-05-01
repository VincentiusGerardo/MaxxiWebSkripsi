<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Admin MaXXi</title>

        <!--jQuery 3-->
        <script src="<?= base_url('js/jquery/jquery.min.js') ?>"></script>

        <!--Bootstrap 3.3.7-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap/bootstrap.min.css') ?>"/>
        <script src="<?= base_url('js/bootstrap/bootstrap.min.js') ?>"></script>

        <!--Bootstrap 3.3.7 plugin-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap/bootstrap-select.min.css') ?>"/>
        <script src="<?= base_url('js/bootstrap/bootstrap-select.min.js') ?>"></script>
        <script src="<?= base_url('js/moment.js') ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>"/>
        <script src="<?= base_url('bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/bootstrap/bootstrap-table.css') ?>"/>
        <script src="<?= base_url('js/bootstrap/bootstrap-table.js') ?>"></script>

        <!--Font Awesome-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('font-awesome/css/font-awesome.min.css') ?>"/>

        <!--Ionicons-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/Ionicons/css/ionicons.min.css') ?>"/>

        <!--AdminLTE Theme-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/theme/AdminLTE.min.css') ?>"/>
        <script src="<?= base_url('js/theme/adminlte.min.js') ?>"></script>

        <!--iCheck-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/iCheck/square/blue.css') ?>"/>
        <script src="<?= base_url('css/iCheck/icheck.min.js') ?>"></script>

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"/>

        <!--Custom CSS/JS-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>"/>
        <script src="<?= base_url('js/script.js') ?>"></script>
        <link rel="stylesheet" href="<?= base_url('css/skins/skin-blue.min.css') ?>">

        <!--Summernote-->
        <link rel="stylesheet" type="text/css" href="<?= base_url('dist/summernote.css') ?>"/>
        <script src="<?= base_url('dist/summernote.min.js') ?>"></script>
    </head>
    <!-- <body class="hold-transition skin-blue sidebar-mini sidebar-collapse"> -->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
          <header class="main-header">
            <a class="logo">
              <span class="logo-mini"><b>MaXXi</b></span>
              <span class="logo-lg"><b>Admin</b> MaXXi</span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a> -->
              <div class="navbar-custom-menu">
                  <ul class="nav navbar-nav">
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                          <i class="fa fa-user-o"></i>
                          &nbsp;
                          <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <ul class="menu">
                            <li>
                                    <a data-toggle="modal" data-target="#changePassword"><i class="fa fa-key fa-fw"></i> Change Password</a>
                              </li>
                              <li>
                                  <a href="<?= base_url('Login/doLogOut') ?>"><i class="fa fa-sign-out fa-fw"></i> Log Out</a>
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
                <li><a href="<?= base_url() ?>"><i class="fa fa-home"></i><span>Home</span></a></li>
                <li><a href="<?= base_url('Module/Cuti/') ?>"><i class="fa fa-newspaper-o"></i><span>Cuti</span></a></li>
                <li><a href="<?= base_url('Module/RekapAbsensi/') ?>"><i class="fa fa-archive"></i><span>Rekap Absensi</span></a></li>
                <?php
                    foreach($menu as $m){
                        if($m->URL === '#'){
                ?>
                    <li class="treeview">
                        <a href="#"><i class="fa <?= $m->Logo ?>"></i> <span><?= $m->NamaMenu ?></span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                          <?php
                            $sql = "select b.ID_SubMenu,b.NamaSubMenu,b.URL,b.ID_Menu from tr_authorizesubmenu a, ms_submenu b where a.ID_SubMenu = b.ID_SubMenu and a.ID_Karyawan = ? and b.FlagActive = 'Y' and b.ID_Menu = ?";
                            $query = $this->db->query($sql, array($this->session->userdata('username'),$m->ID_Menu)) ;
                            foreach($query->result() as $s){
                          ?>
                          <li><a href="<?= base_url('Module/' . $s->URL) ?>"><?= $s->NamaSubMenu ?></a></li>
                        <?php
                          }
                        ?>
                        </ul>
                    </li>
                <?php
                        }else{
                ?>
                    <li><a href="<?= base_url('Module/' . $m->URL) ?>"><i class="fa <?= $m->Logo ?>"></i> <span><?= $m->NamaMenu ?></span></a></li>
                    <?php } }?>
                <?php if($this->session->userdata('role') == 1){ ?>
                  <li class="treeview">
                        <a href="#"><i class="fa fa-rocket"></i> <span>Mission Control</span>
                          <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                        <li><a href="<?= base_url('Module/MissionControl/MasterMenu') ?>">Master Menu</a></li>
                        <li><a href="<?= base_url('Module/MissionControl/MasterSubMenu') ?>">Master Sub Menu</a></li>
                          <li><a href="<?= base_url('Module/MissionControl/AuthorizeMenu') ?>">Authorize Menu</a></li>
                          <li><a href="<?= base_url('Module/MissionControl/AuthorizeSubMenu') ?>">Authorize Sub Menu</a></li>
                        </ul>
                    </li>
                <?php } ?>
              </ul>
              <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
          </aside>

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <section class="content container-fluid">
