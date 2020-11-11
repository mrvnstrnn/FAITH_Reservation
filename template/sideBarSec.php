<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
    <div class="sidebar-brand-icon rotate-n">
      <!-- <i class="fas fa-laugh-wink"></i> -->
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
<?php 
  $loginStatusSession = $_SESSION['user']['loginStatus'];
  // print_r($loginStatusSession);
  if($loginStatusSession == 1){
?>
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

  <!-- Nav Item - Utilities Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#">
      <i class="fas fa-fw fa-user"></i>
      <span>Profile</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="requestSec.php">
      <i class="fas fa-fw fa-comments"></i>
      <span>Request</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="historySecretary.php">
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
<?php } else { ?>
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="dashboard.php">
      <i class="fas fa-fw fa-lock"></i>
      <span>Password</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
<?php } ?>
</ul>