<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
      <?php $user = userInfo();
            $row = mysqli_fetch_array($user);
      ?>
      <?php echo $row['firstName']; ?> <?php echo $row['lastName']; ?>
    </span>
    <img class="img-profile rounded-circle" src="<?php echo getBaseUrl() ?>profile/<?php echo $row['profilePic']; ?>">
  </a>
  <!-- Dropdown - User Information -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
    <a class="dropdown-item" href="<?php echo getBaseUrl() ?>pages/profile.php">
      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
      <?php echo $row['role']; ?> - <?php echo $row['department']; ?>
    </a>
    <a class="dropdown-item" href="<?php echo getBaseUrl() ?>pages/changePassword.php">
      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
      Settings
    </a>
    <!-- <a class="dropdown-item" href="#">
      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
      Activity Log
    </a> -->
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      Logout
    </a>
  </div>
</li>