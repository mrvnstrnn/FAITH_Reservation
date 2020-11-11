<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n">
      <!-- <i class="fas fa-laugh-wink"></i> -->
      <!-- <span class="logoText">FAITH</span> -->
<style type="text/css">
  .logoImg{
    width: 50px;
    height: 40px;
  }
</style>
      <img src="<?php echo getBaseUrl() ?>img/Logo.png" class="logoImg">
    </div>
    <div class="sidebar-brand-text mx-3"><img src="<?php echo getBaseUrl() ?>img/F.png" class="logoFaith"><sup></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Management
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="users.php">
      <i class="fas fa-fw fa-users"></i>
      <span>Users</span>
    </a>
  </li>

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="request.php">
      <i class="fas fa-fw fa-comments"></i>
      <span>Request</span>
      <span style="float: right;" class="badge badge-danger">
        <?php 
          $row = countRequest();
          $res = mysqli_fetch_assoc($row);
          echo $res['countRequest'];
        ?>
      </span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="venue.php">
      <i class="fas fa-fw fa-home"></i>
      <span>Facility</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="equipment.php">
      <i class="fas fa-fw fa-plug"></i>
      <span>Equipment</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="course.php">
      <i class="fas fa-fw fa-book"></i>
      <span>Department</span>
    </a>
  </li>

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="course.php">
      <i class="fas fa-fw fa-dollar-sign"></i>
      <span>Count</span>
    </a>
  </li> -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="history.php">
      <i class="fas fa-fw fa-history"></i>
      <span>History</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="changePassword.php">
      <i class="fas fa-fw fa-cogs"></i>
      <span>Setting</span>
    </a>
  </li>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>