<?php
  
$Dashboard = array("", "", array("", "", "", "", "", "", "", "", "", ""));
$Maintain = array("", "", array("", "", "", "", "", "", "", "", "", ""));
$Account = array("", "", array("", "", "", "", "", "", "", "", "", ""));


$DashboardMenu = "hidden";
$MaintainMenu = "hidden";
$AccountMenu = "hidden"; 


foreach ($AccountPermit as $Permit) {

  if ($Permit == "Dashboard") {
    $DashboardMenu = "";
  }
  if ($Permit == "Maintain") {
    $MaintainMenu = "";
  }
  if ($Permit == "Account") {
    $AccountMenu = "";
  } 
}

switch ($page_focus) {

  case 'Dashboard':
    $Dashboard[0] = "menu-is-opening menu-open";
    $Dashboard[1] = "active";
    $Dashboard[2][$page_menu] = "active";
    break;

  case 'Maintain':
    $Maintain[0] = "menu-is-opening menu-open";
    $Maintain[1] = "active";
    $Maintain[2][$page_menu] = "active";
    break;

  case 'Account':
    $Account[0] = "menu-is-opening menu-open";
    $Account[1] = "active";
    $Account[2][$page_menu] = "active";
    break; 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ร้านเท้งขนมไทยของแทร่</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- fullCalendar -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/fullcalendar/main.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="http://203.156.9.157/kanoomthai/plugins/summernote/summernote-bs4.min.css">

  <!-- jQuery -->
  <script src="http://203.156.9.157/kanoomthai/plugins/jquery/jquery.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="http://203.156.9.157/kanoomthai/plugins/jquery-ui/jquery-ui.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script> -->
  <!-- Bootstrap 4 -->
  <script src="http://203.156.9.157/kanoomthai/plugins/bootstrap/js/bootstrap.bundle.js"></script>
  <!-- DataTables  & Plugins -->
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables/jquery.dataTables.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/jszip/jszip.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/pdfmake/vfs_fonts.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <!-- ChartJS -->
  <script src="http://203.156.9.157/kanoomthai/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="http://203.156.9.157/kanoomthai/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="http://203.156.9.157/kanoomthai/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="http://203.156.9.157/kanoomthai/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="http://203.156.9.157/kanoomthai/plugins/moment/moment.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="http://203.156.9.157/kanoomthai/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="http://203.156.9.157/kanoomthai/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="http://203.156.9.157/kanoomthai/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="http://203.156.9.157/kanoomthai/dist/js/adminlte.js"></script>

  <!-- fullCalendar 2.2.5 -->
  <script src="http://203.156.9.157/kanoomthai/plugins/moment/moment.min.js"></script>
  <script src="http://203.156.9.157/kanoomthai/plugins/fullcalendar/main.js"></script>

  <!-- Select2 -->
  <script src="http://203.156.9.157/kanoomthai/plugins/select2/js/select2.full.min.js"></script>

  <!-- bs-custom-file-input -->
  <script src="http://203.156.9.157/kanoomthai/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <!-- AdminLTE for demo purposes -->
  <!-- <script src="http://203.156.9.157/kanoomthai/dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="http://203.156.9.157/kanoomthai/dist/js/pages/dashboard.js"></script>

  <script src="http://203.156.9.157/kanoomthai/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

  <!-- sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.5.0/socket.io.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-footer-fixed layout-navbar-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
          <img class="animation__shake" src="http://203.156.9.157/kanoomthai/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!--
                <li class="nav-item d-none d-sm-inline-block">
                  <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                  <a href="#" class="nav-link">Contact</a>
                </li> -->
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-success elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link text-center">
        <!-- <img src="http://203.156.9.157/kanoomthai/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <span class="brand-text font-weight-light">จัดการร้านเท้งขนมไทย</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="http://203.156.9.157/kanoomthai/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info text-center">
            <a href="http://203.156.9.157/kanoomthai/index.php/Management/Logout" class="d-block"><?php echo $EmployeeName; ?> (ลงชื่อออก)</a>
          </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

            <!-- บริการหน้าร้าน-->
            <li class="nav-item <?php echo $Dashboard[0]; ?>" <?php echo $DashboardMenu; ?>>
              <a href="#" class="nav-link <?php echo $Dashboard[1]; ?>">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                    บริการหน้าร้าน
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Dashboard" class="nav-link <?php echo $Dashboard[2][0]; ?>">
                    <i class="nav-icon fas fa-arrow-circle-right"></i>
                    <p>จัดการรายการสั่งซื้อ</p>
                  </a>
                </li>

              </ul>
            </li>
            <!-- บริการหน้าร้าน-->
            <!-- จัดการข้อมูลสินค้า -->
            <li class="nav-item <?php echo $Maintain[0]; ?>" <?php echo $MaintainMenu; ?>>
              <a href="#" class="nav-link <?php echo $Maintain[1]; ?>">
                <i class="nav-icon ion ion-person-add"></i>
                <p>
                    ข้อมูลสินค้า
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Maintain" class="nav-link <?php echo $Maintain[2][0]; ?>">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>คลังสินค้า/ราคาขาย</p>
                  </a>
                </li>
              </ul> 
            </li>
            <!-- จัดการข้อมูลสินค้า -->
            <!-- บัญชีผู้ใช้ -->
            <li class="nav-item <?php echo $Account[0]; ?>" <?php echo $AccountMenu; ?>>
              <a href="#" class="nav-link <?php echo $Account[1]; ?>">
                <i class="nav-icon far fa-flag"></i>
                <p>
                    บัญชีผู้ใช้
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="Account" class="nav-link <?php echo $Account[2][0]; ?>">
                    <i class="nav-icon fas fa-user-plus"></i>
                    <p>บัญชีผู้ใช้ระบบ</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- บัญชีผู้ใช้ --> 


          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>