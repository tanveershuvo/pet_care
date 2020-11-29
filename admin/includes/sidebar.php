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
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
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
          <li class="nav-item">
            <a href="all-appointments" class="nav-link <?= ($activePage == 'all-appointments') ? 'active' : ''; ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                All Appointments
              </p>
            </a>
          </li>
        <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] == 2) { ?>
          <li class="nav-item">
            <a href="vet-dashboard" class="nav-link <?= ($activePage == 'vet-dashboard') ? 'active' : ''; ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="appointments" class="nav-link <?= ($activePage == 'vet-schedule') ? 'active' : ''; ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Appointments
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="profile" class="nav-link <?= ($activePage == 'profile') ? 'active' : ''; ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                My Profile
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="vet-schedule" class="nav-link <?= ($activePage == 'vet-schedule') ? 'active' : ''; ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Vet Schedule
              </p>
            </a>
          </li>
        <?php } ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>