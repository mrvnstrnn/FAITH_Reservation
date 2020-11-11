<?php
  session_start();
  include '../database/database.php';
  if(!isset($_SESSION['user'])){
    header("Location:" .getBaseUrl()."pages/login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../template/heading.php'; ?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
<style type="text/css">
  .logoFaith{
    width: 120px;
  }
</style>
    <!-- Sidebar -->
    <?php
      if($_SESSION['user']['role'] == 'Secretary of OP'){
    ?>
    <?php include "../template/sideBarSOP.php" ?>
    <?php
      } else if($_SESSION['user']['role'] == 'Secretary'){
    ?>
    <?php include "../template/sideBarSec.php" ?>
    <?php
      } else {
    ?>
    <?php include "../template/sideBarDean.php" ?>
    <?php
      }
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <!-- Nav Item - Alerts -->
            <?php include "../template/alertArea.php" ?>

            <div class="topbar-divider d-none d-sm-block"></div>

            <?php
              include '../template/session.php';
            ?>

          </ul>

        </nav>
        <!-- End of Topbar -->
<style type="text/css">
  .successNotif{
    padding-left: 210px;
  }
</style>
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Manage Password</h1>
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
      <span style="color: red">
        <?php if(isset($_SESSION['errors']['msgOldEr'])){ echo $_SESSION['errors']['msgOldEr']; unset($_SESSION['errors']['msgOldEr']);}?>
      </span>
      <span style="color: green">
        <?php if(isset($_SESSION['msgSuccess'])){ echo $_SESSION['msgSuccess']; unset($_SESSION['msgSuccess']); }?>
      </span>
    </h6>
  </div>

  <div class="card-body">
    <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/changePassword2.php">
      <div class="form-group row">

        <input type="hidden" name="employeeNo" id="employeeNo" value="<?php echo $_SESSION['user']['employeeNo'] ?>">
        <div class="col-lg-4">
          <span>Old Password:</span> <b><span style="color: red">*</span></b>
          <input type="password" class="form-control form-control" id="oPass" name="oPass" aria-describedby="emailHelp" placeholder="Old Password" required="" oninvalid="this.setCustomValidity('Please enter old password')" oninput="setCustomValidity('')">
        </div>
        <div class="col-lg-4">
          <span>New Password:</span> <b><span style="color: red">*</span></b>
          <input type="password" class="form-control form-control" id="newPass" name="newPass" aria-describedby="emailHelp" placeholder="New Password" required="" oninvalid="this.setCustomValidity('Please enter password')" oninput="setCustomValidity('')">
        </div>
        <div class="col-lg-4">
          <span>Confirm Password:</span> <b><span style="color: red">*</span></b>
          <input type="password" class="form-control form-control" id="cPass" name="cPass" aria-describedby="emailHelp" placeholder="Confirm Password" required="" oninvalid="this.setCustomValidity('Please confirm password')" oninput="setCustomValidity('')">
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Submit</button>
    </form>
  </div>
</div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; First Asia Institute of Technology and Humanities 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <?php include "../modal/logout.php" ?>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo getBaseUrl() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo getBaseUrl() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo getBaseUrl() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo getBaseUrl() ?>js/sb-admin-2.min.js"></script>

  <script src="<?php echo getBaseUrl() ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo getBaseUrl() ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo getBaseUrl() ?>js/demo/datatables-demo.js"></script>

  <!-- <script type="text/javascript">
    function changePass(){
      let oPass = $("#oPass").val()
      let employeeNo = $('#employeeNo').val()
      // alert(employeeNo);
      if (oPass.length > 6) {
        $.post("../api/getOldPass.php", {oPass: oPass, employeeNo:employeeNo}, function (o) {
          $("#newPass").val(o.password)
          if(oPass =){

          }
          alert('asdlhasd');
        }, 'json')
      }
    }
  </script> -->

</body>

</html>
