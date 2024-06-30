<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="dist/img/Profile.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="#" class="d-block">
        <?php
        // Check if the session variable 'nama' is set before accessing it
        if (isset($_SESSION['nama'])) {
          echo $_SESSION['nama'];
        } else {
          echo 'Guest'; // Default value if 'nama' is not set
        }
        ?>
      </a>
    </div>
  </div>

  <!-- SidebarSearch Form -->
  <div class="form-inline">
    <div class="input-group" data-widget="sidebar-search">
      <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" id="sidebar-search-input">
      <div class="input-group-append">
        <button class="btn btn-sidebar">
          <i class="fas fa-search fa-fw"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" id="sidebar-menu">
      <li class="nav-item">
        <a href="index.php?page=dashboard" class="nav-link <?php echo $page == 'dashboard' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=data-Credit-Card" class="nav-link <?php echo $page == 'data-Credit-Card' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-credit-card"></i>
          <p>
            Credit Card
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=data-monthly-bill" class="nav-link <?php echo $page == 'data-monthly-bill' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-file-invoice"></i>
          <p>
            Monthly Bill
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=data-transaction" class="nav-link <?php echo $page == 'data-transaction' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-exchange-alt"></i>
          <p>
            Transaction
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index.php?page=data-statistics" class="nav-link <?php echo $page == 'data-statistics' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-chart-pie"></i>
          <p>
            Statistics
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="logout.php" class="nav-link">
          <i class="nav-icon fas fa-sign-out-alt"></i>
          <p>
            Log Out
          </p>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
