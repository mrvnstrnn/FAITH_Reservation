<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Manage Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $row = countUser();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countUser'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="users.php" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Manage Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $row = countRequest();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countRequest'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="request.php" class="btn btn-warning">View Details</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Manage Facility</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $row = countVenue();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countVenue'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-home fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="venue.php" class="btn btn-danger">View Details</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Manage Equipment</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $row = countEquip();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countEquip'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-plug fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="equipment.php" class="btn btn-success">View Details</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Manage Course</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $row = countCourse();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countCourse'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-book fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="course.php" class="btn btn-info">View Details</a>
        </div>
      </div>
    </div>

    <!-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">Count</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="course.php" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div> -->

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">History</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php echo date("M d, Y") ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-history fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="history.php" class="btn btn-warning">View Details</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Setting</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">Password</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-cogs fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="changePassword.php" class="btn btn-primary">View Details</a>
        </div>
      </div>
    </div>

  </div>

</div>