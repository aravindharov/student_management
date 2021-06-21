<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo site_title; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo asset_url?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo asset_url?>plugins/summernote/summernote-bs4.min.css">
<link href="<?php echo asset_url; ?>plugins/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/tether/dist/css/tether.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-select/dist/css/bootstrap-select.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?= asset_url ?>plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/select2/dist/css/select2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/ion-rangeslider/css/ion.rangeSlider.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/owl.carousel/dist/assets/owl.carousel.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/owl.carousel/dist/assets/owl.theme.default.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/quill/dist/quill.snow.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/summernote/dist/summernote.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/animate.css/animate.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/toastr/build/toastr.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/socicon/css/socicon.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/plugins/line-awesome/css/line-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo asset_url; ?>plugins/general/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />

  <!--end:: Vendor Plugins -->
  <link href="<?php echo asset_url; ?>css/style.bundle.css" rel="stylesheet" type="text/css" />

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="<?php echo site_url?>" class="nav-link <?php  if ($menu==1){
              echo "active";
              } ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo site_url.'home/student_list'?>" class="nav-link <?php  if ($menu==2){
              echo "active";
              } ?>">
              <i class="far fa-circle nav-icon"></i>
              <p>Student List</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

  
    <!-- /.sidebar -->
  </aside>