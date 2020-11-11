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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-4 text-gray-800">Manage History</h1>
            <form action="printHistory.php" target="_blank" method="POST">
              <div class="form-group row">
                <div class="col-lg-3">
                  <select class="form-control" name="department" id="department" required="" oninvalid="this.setCustomValidity('Please choose department')" oninput="setCustomValidity('')">
                    <option value="">Choose department</option>
                    <?php
                      $row = getCourseListE();
                      while($res = mysqli_fetch_assoc($row)){ 
                    ?>
                      <option class="form-control" value="<?php echo $res['courseDept'] ?>"><?php echo $res['courseDesc'] ?></option>
                    <?php } ?> 
                  </select>
                </div>
                <div class="col-lg-3">
                  <input type="date" name="startDate" id="startDate" class="form-control form-control" required="" oninvalid="this.setCustomValidity('Please choose start date')" oninput="setCustomValidity('')">
                </div>
                <div class="col-lg-3">
                  <input type="date" name="endDate" id="endDate" class="form-control form-control" required="" oninvalid="this.setCustomValidity('Please choose end date')" oninput="setCustomValidity('')">
                </div>
                <button  class="btn btn-primary shadow-sm" id="searchDate" name="searchDate"><i class="fas fa-print fa-sm text-white-50"></i> Print</button>
              </div>
            </form>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">History List </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Venue</th>
                      <th>Reserve date</th>
                      <th>Date and Time Approve</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Venue</th>
                      <th>Reserve date</th>
                      <th>Date and Time Approve</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $request = getRequestHistorySOP();
                      while($rowRequest = mysqli_fetch_assoc($request)){
                        extract($rowRequest);
                    ?>
                    <tr>
                      <td><?php echo $reserve_id; ?></td>
                      <td><?php echo $department; ?></td>
                      <td><?php echo $venue; ?></td>
                      <td><?php echo $dateEvent; ?></td>
                      <td><?php echo $dateApprove; ?> <?php echo $timeApprove ?></td>
                      <td><a href="<?php echo getBaseUrl() ?>pages/viewHistoryInfo.php?id=<?php echo $reserve_id ?>"><button class="btn btn-info  btn-sm"><i class="fas fa-info fa-sm text-white-50"></i></button></a></td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
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

  <script type="text/javascript">
    // function sendDate(){
    //   var startDate = document.getElementById("#startDate").value();
    //   var endDate = document.getElementById("#endDate").value();
    //   alert(startDate);
    // }
    $(document).ready(function(){
      $("#searchDate").click(function(){
        var startDate = $("#startDate").val();
        var  endDate = $("#endDate").val();
        $.ajax({
          type: "POST",
          url: "../pages/printHistory.php",
          data: {startDate : startDate, endDate : endDate},
        })
      })
    })
  </script>

</body>

</html>
