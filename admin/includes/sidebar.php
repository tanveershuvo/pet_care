<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-light-danger">
  <!-- Brand Logo -->
  <a href="dashboard" class="brand-link text-center">

    <span class="brand-text font-weight-bold">Pet Clinic Admin</span>
  </a>
  <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
  <!-- Sidebar -->
  <div class="sidebar">


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="dashboard" class="nav-link <?= ($activePage == 'dashboard') ? 'active' : ''; ?> ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="service-list" class="nav-link <?= ($activePage == 'service-list') ? 'active' : ''; ?> ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Service List
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="vet-verification" class="nav-link <?= ($activePage == 'vet-verification') ? 'active' : ''; ?> ">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Vet Varification
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>