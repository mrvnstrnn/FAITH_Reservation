<div class="container-fluid">
<?php 
  $loginStatusSession = $_SESSION['user']['loginStatus'];
  // print_r($loginStatusSession);
  if($loginStatusSession == 1){
?>
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
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">View Profile</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php 
                  $row = countRequestDean();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countRequest'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-user fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="#" class="btn btn-primary">View Details</a>
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
                  $row = countRequestDean();
                  $res = mysqli_fetch_assoc($row);
                  echo $res['countRequest'];
                ?>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="requestDean.php" class="btn btn-warning">View Details</a>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">History</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo date("F d, Y") ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
            </div>
          </div>
          <a href="historyDean.php" class="btn btn-success">View Details</a>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
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
          <a href="changePassword.php" class="btn btn-info">View Details</a>
        </div>
      </div>
    </div>

  </div>

<?php } else { ?>

  <div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Password</h1>

  </div>
<style type="text/css">
  .successNotif{
    padding-left: 210px;
  }
</style>
  <div class="card shadow mb-5">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Change Password
        <span style="color: red" class="successNotif">
          <?php if(isset($_SESSION['errors']['msgWrong'])){ echo $_SESSION['errors']['msgWrong']; unset($_SESSION['errors']['msgWrong']);}?>
          <?php if(isset($_SESSION['errors']['msgLack'])){ echo $_SESSION['errors']['msgLack']; unset($_SESSION['errors']['msgLack']);}?>
        </span>
        <span style="color: red">
          <?php if(isset($_SESSION['errors']['msgLack'])){ echo $_SESSION['errors']['msgLack']; unset($_SESSION['errors']['msgLack']);}?>
        </span>
        <span style="color: green">
          <?php if(isset($_SESSION['msgSuccess'])){ echo $_SESSION['msgSuccess']; isset($_SESSION['msgSuccess']);}?>
        </span>
      </h6>
    </div>

    <div class="card-body">
      <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/changePassword.php">
        <div class="form-group row">

          <input type="hidden" name="employeeNo" value="<?php echo $_SESSION['user']['employeeNo'] ?>">
          <div class="col-lg-6">
            <span>New Password:</span> <b><span style="color: red">*</span></b>
            <input type="password" class="form-control form-control" id="newPass" name="newPass" aria-describedby="emailHelp" placeholder="New Password" required="" oninvalid="this.setCustomValidity('Please enter password')" oninput="setCustomValidity('')" onChange="requestDetails()">
          </div>
          <div class="col-lg-6">
            <span>Confirm Password:</span> <b><span style="color: red">*</span></b>
            <input type="password" class="form-control form-control" id="cPass" name="cPass" aria-describedby="emailHelp" placeholder="Confirm Password" required="" oninvalid="this.setCustomValidity('Please confirm password')" oninput="setCustomValidity('')" onChange="requestDetails()">
          </div>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
      </form>
    </div>

  </div>

<?php } ?>

</div>