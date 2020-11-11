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
            <h1 class="h3 mb-0 text-gray-800">Manage Request</h1>
            <a href="addRequest.php" class="btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Request</a>
            
          </div>
<style type="text/css">
  .messageNotif{
    padding: 30%;
  }
</style>
<button class="btn btn-primary btn-sm" type="button" onclick="showCalendar()"><i class="fas fa-calendar text-white-50"></i> <span id="showCalendar"> Hide calendar</span></button>
<hr>
  <div class="calender-area mg-b-20">
      <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12">
                  <div class="calender-inner">
                      <div id='calendar'></div>
                  </div>
              </div>
          </div>
      </div>
  </div>
<hr>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Request List
                <span style="color: green" class="messageNotif">
                  <?php if(isset($_SESSION['msgAdd'])){ echo $_SESSION['msgAdd']; unset($_SESSION['msgAdd']);}?>
                  <?php if(isset($_SESSION['msgApprove'])){ echo $_SESSION['msgApprove']; unset($_SESSION['msgApprove']);}?>
                  <?php if(isset($_SESSION['message'])){ echo $_SESSION['message']; unset($_SESSION['message']);}?>
                  <?php if(isset($_SESSION['msgRelocate'])){ echo $_SESSION['msgRelocate']; unset($_SESSION['msgRelocate']);}?>
                </span>
                <span style="color: red" class="messageNotif">
                  <?php
                  if(isset($_SESSION['msgCapacityError'])){ echo $_SESSION['msgCapacityError']; unset($_SESSION['msgCapacityError']);}?>
                </span>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Facility</th>
                      <th>Date Event</th>
                      <th>Date and Time File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Facility</th>
                      <th>Date Event</th>
                      <th>Date and Time File</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $request = getRequestDean();
                      while($rowRequest = mysqli_fetch_assoc($request)){
                        extract($rowRequest);
                    ?>
                    <tr>
                      <td><?php echo $reserve_id; ?></td>
                      <td><?php echo $department; ?></td>
                      <td><?php echo $venue; ?></td>
                      <td><?php echo $dateEvent; ?></td>
                      <td><?php echo $dateTimeFile; ?></td>
                      <td>
                        <a href="<?php echo getBaseUrl() ?>pages/viewInfoRequest.php?id=<?php echo $reserve_id ?>"><button class="btn btn-info  btn-sm" title="view info"><i class="fas fa-info fa-sm text-white-50"></i></button></a> 

                        <button class="btn btn-primary btn-sm" title="approve" onclick="approve('<?php echo $reserve_id ?>')"><i class="fas fa-check fa-sm text-white-50"></i></button>

                        <button class="btn btn-danger btn-sm" title="disapprove" onclick="disapprove('<?php echo $reserve_id ?>')"><i class="fas fa-trash fa-sm text-white-50"></i></button>

                        <button class="btn btn-success btn-sm" title="relocate" onclick="transfer('<?php echo $reserve_id ?>')"><i class="fas fa-compass fa-sm text-white-50"></i></button>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Event Today List
                <span style="color: green" class="messageNotif">
                  <?php if(isset($_SESSION['msgAdd'])){ echo $_SESSION['msgAdd']; unset($_SESSION['msgAdd']);}?>
                  <?php if(isset($_SESSION['msgApprove'])){ echo $_SESSION['msgApprove']; unset($_SESSION['msgApprove']);}?>
                  <?php if(isset($_SESSION['message'])){ echo $_SESSION['message']; unset($_SESSION['message']);}?>
                </span>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Facility</th>
                      <th>Date Event</th>
                      <th>Date and Time File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Facility</th>
                      <th>Date Event</th>
                      <th>Date and Time File</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $request = getRequestHistoryHSOP();
                      while($rowRequest = mysqli_fetch_assoc($request)){
                        extract($rowRequest);
                    ?>
                    <tr>
                      <td><?php echo $department; ?></td>
                      <td><?php echo $reserve_id; ?></td>
                      <td><?php echo $venue; ?></td>
                      <td><?php echo $dateEvent; ?></td>
                      <td><?php echo $dateTimeFile; ?></td>
                      <td>
                        <a href="<?php echo getBaseUrl() ?>pages/eventTodayInfo.php?id=<?php echo $reserve_id ?>"><button class="btn btn-info  btn-sm"><i class="fas fa-info fa-sm text-white-50"></i></button></a>
                        <button class="btn btn-danger btn-sm" onclick="disapprove('<?php echo $reserve_id ?>')"><i class="fas fa-trash fa-sm text-white-50"></i></button>
                      </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Upcoming Event List
                <span style="color: green" class="messageNotif">
                  <?php if(isset($_SESSION['msgAdd'])){ echo $_SESSION['msgAdd']; unset($_SESSION['msgAdd']);}?>
                  <?php if(isset($_SESSION['msgApprove'])){ echo $_SESSION['msgApprove']; unset($_SESSION['msgApprove']);}?>
                  <?php if(isset($_SESSION['message'])){ echo $_SESSION['message']; unset($_SESSION['message']);}?>
                </span>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Facility</th>
                      <th>Date Event</th>
                      <th>Date and Time File</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Department</th>
                      <th>Facility</th>
                      <th>Date Event</th>
                      <th>Date and Time File</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $request = getRequestHistoryHUSOP();
                      while($rowRequest = mysqli_fetch_assoc($request)){
                        extract($rowRequest);
                    ?>
                    <tr>
                      <td><?php echo $reserve_id; ?></td>
                      <td><?php echo $department; ?></td>
                      <td><?php echo $venue; ?></td>
                      <td><?php echo $dateEvent; ?></td>
                      <td><?php echo $dateTimeFile; ?></td>
                      <td>
                        <a href="<?php echo getBaseUrl() ?>pages/upcomingInfoRequest.php?id=<?php echo $reserve_id ?>"><button class="btn btn-info  btn-sm"><i class="fas fa-info fa-sm text-white-50"></i></button></a>
                        <button class="btn btn-danger btn-sm" onclick="disapprove('<?php echo $reserve_id ?>')"><i class="fas fa-trash fa-sm text-white-50"></i></button>
                        <button class="btn btn-success btn-sm" title="relocate" onclick="transfer('<?php echo $reserve_id ?>')"><i class="fas fa-compass fa-sm text-white-50"></i></button>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
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
<style type="text/css">
  .datePick{
    width: 50%;
    float: left;
  }
  .buttonPlus{
    float: right;
  }
</style>

<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="disapproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="transferModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>


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
  <script src="<?php echo getBaseUrl() ?>js/demo/dataTableVenue.js"></script>
  <script src="<?php echo getBaseUrl() ?>js/demo/dataTableEquip.js"></script>

  <script src="<?php echo getBaseUrl() ?>js/calendar/moment.min.js"></script>
  <script src="<?php echo getBaseUrl() ?>js/calendar/fullcalendar.min.js"></script>
  <script src="<?php echo getBaseUrl() ?>js/calendar/fullcalendar.js"></script>

<script type="text/javascript">
  function approve(idx){
    let url = "<?php echo getBaseUrl() ?>modal/approveModal.php";
    $.post(url,{id:idx},function(result){
      $("#approveModal").html(result);
      $("#approveModal").modal('show');
    });
  }

  function disapprove(idx){
    let url = "<?php echo getBaseUrl() ?>modal/disapproveModalSOP.php";
    $.post(url,{id:idx},function(result){
      $("#approveModal").html(result);
      $("#approveModal").modal('show');
    });
  }

  function transfer(idx){
    let url = "<?php echo getBaseUrl() ?>modal/transferModal.php";
    $.post(url,{id:idx},function(result){
      $("#transferModal").html(result);
      $("#transferModal").modal('show');
    });
  }

  function showCalendar(){
    var x = document.getElementById("calendar");
    if (x.style.display === "none") {
      document.getElementById("showCalendar").textContent=" Hide calendar";
      x.style.display = "block";
    } else {
      x.style.display = "none";
      document.getElementById("showCalendar").textContent=" Show calendar";
    }
  }

  $(document).ready(function(){
    $('#dataTable2').DataTable({
    })
  })

  $(document).ready(function(){
    $('#dataTable3').DataTable({
    })
  })
</script>

</body>

</html>
