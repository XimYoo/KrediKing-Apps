<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
include('header.php');?>
<?php include('../conf/config.php');?>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <?php include('preloader.php');?>

  <!-- Navbar -->
  <?php include('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php include('logo.php');?>

    <!-- Sidebar -->
    <?php include('sidebar.php');?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php include('content_header.php');?>
    <!-- /.content-header -->

    <!-- Main content -->
    <?php 
    if (isset($_GET['page'])){
      if ($_GET['page']=='dashboard'){
        include('dashboard.php');
      }

      else if ($_GET['page']=='data-Credit-Card'){
        include('data_kartu_kredit.php');
      }
      else if ($_GET['page']=='edit-data'){
        include('edit/edit_data.php');
      }
      else if ($_GET['page']=='data-monthly-bill'){
        include('data_monthly_bill.php');
      }
      else if ($_GET['page']=='edit-bill'){
        include('edit/edit_bill.php');
      }
      else if ($_GET['page']=='data-transaction'){
        include('data_transaction.php');
      }
      else if ($_GET['page']=='data-statistics'){
        include('data_statistics.php');
      }
      else if ($_GET['page']=='edit-transaction'){
        include('edit/edit_transaction.php');
      }
      else{
        include('not_found.php');
      }

    }
    else{
      include('dashboard.php');
    }
    ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include('footer.php');?>
</div>
<!-- ./wrapper -->


</body>
</html>
