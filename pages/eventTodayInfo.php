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
<?php
  $getID = isset($_GET["id"]);
  if(isset($getID)) {
    $row = getInfoRequest();
    $res = mysqli_fetch_assoc($row);
  }
?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
<?php if($getID != $res['ID']){ ?>

<h1 class="h3 mb-4 text-gray-800">View Request</h1>
          
<hr>

<hr>

  <div class="row">

    <div class="col-lg-12">

      <!-- Circle Buttons -->
      <div class="card shadow mb-5">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Request Form</h6>
        </div>

        <div class="card-body">
          <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/editRequestSec.php">
            <div class="form-group row">
              <div class="text-center">
                <div class="error mx-auto" data-text="404">404</div>
                <p class="lead text-gray-800 mb-5">Request Not Found</p>
                <a href="<?php echo getBaseUrl() ?>pages/request.php">&larr; Back to request list</a>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

<?php } else { ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">View Request</h1>
<!-- https://1stwebdesigner.com/calendar-ui-layout-css/ -->
          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Request Form</h6>
                </div>

                <div class="card-body">
                  <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/addRequest.php">
                    <div class="form-group row">
                      <div class="col-lg-4">
                        <span>Employee number:</span>
                        <input type="text" class="form-control form-control" id="employeeNo" name="employeeNo" aria-describedby="emailHelp" value="<?php echo $res['employeeNo'] ?>" disabled>
                      </div>

                      <div class="col-lg-4">
                        <span>Firstname:</span>
                        <input type="text" class="form-control form-control" id="fname" name="fname" aria-describedby="emailHelp" value="<?php echo $res['firstName'] ?>" disabled>
                      </div>

                      <div class="col-lg-4">
                        <span>Lastname:</span>
                        <input type="text" class="form-control form-control" id="lname" name="lname" aria-describedby="emailHelp" value="<?php echo $res['lastName'] ?>" disabled>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-4">
                        <span>Purpose:</span>
                        <input type="text" class="form-control form-control" id="purpose" name="purpose" aria-describedby="emailHelp" value="<?php echo $res['purpose'] ?>" disabled>
                      </div>

                      <div class="col-lg-4">
                        <span>Department:</span>
                        <select class="form-control" name="department" disabled>
                          <option class="form-control" value="">Select department...</option>
                          <option class="form-control" value="CCIT">College of Computing and Information Technology</option>
                          <option class="form-control" value="COED">College of Education</option>
                          <option class="form-control" value="COP">College of Psychology</option>
                          <option class="form-control" value="COE">College of Engineering</option>
                          <option class="form-control" value="COPS">College of Public Safety</option>
                          <option class="form-control" value="CON">College of Nursing</option>
                          <option class="form-control" value="CIHM">College of International and Hospitality Management</option>
                        </select>
                      </div>

                      <div class="col-lg-4">
                        <span>Number of Participants:</span>
                        <input type="number" class="form-control form-control" id="noOfParticipant" name="noOfParticipant" aria-describedby="emailHelp" value="<?php echo $res['participant'] ?>" disabled>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-12">
                        <span>Details of Request(s):</span>
                        <input type="text" class="form-control form-control" id="details" name="details" aria-describedby="emailHelp" value="<?php echo $res['detailRequest'] ?>" disabled>
                      </div>

                    </div>

                    <div class="form-group row">
                    <?php
                      // $dateEvent = array();
                      // $dateEvent = explode(", ", $res['dateEvent']);

                      // $startTime = array();
                      // $startTime = explode(", ", $res['startTime']);

                      // $endTime = array();
                      // $endTime = explode(", ", $res['endTime']);

                    $row2 = getInfoRequest2();
                    while($res2 = mysqli_fetch_assoc($row2)){

                      //foreach ($dateEvent as $i => $date) { ?>
                        <div class="col-lg-4">
                          <span>Date Needed:</span>
                          <input type="text" class="form-control form-control" id="dateNeeded" name="dateNeeded" aria-describedby="emailHelp" value="<?php echo $res2['dateEvent'] ?>" disabled>
                        </div>

                        <div class="col-lg-4">
                          <span>Start time:</span>
                          <input type="time" class="form-control form-control" id="startTime" name="startTime[]" aria-describedby="emailHelp" value="<?php echo $res2['startTime'] ?>" disabled>
                        </div>

                        <div class="col-lg-4">
                          <span>End time:</span>
                          <input type="time" class="form-control form-control" id="endTime" name="endTime[]" aria-describedby="emailHelp" value="<?php echo $res2['endTime'] ?>" disabled>
                        </div>
                      <?php } ?>
                    </div><hr><br>

                    <div class="form-group row">
                      <div class="col-lg-6">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Venue List</h6>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Venue</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $venue = array();
                                  $nameOfVenue = explode(", ", $res['venue']);

                                  foreach ($nameOfVenue as $b => $nameOfVenues) {
                                    if(empty($capacityOfVenue)) 
                                ?>
                                  <tr>
                                    <td>
                                      <?php echo $nameOfVenues; ?>
                                    </td>
                                  </tr>
                                <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment List</h6>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Equipment</th>
                                    <th>Capacity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                  $item = array();
                                  $item = explode(", ", $res['item']);

                                  $itemCapacity = array();
                                  $itemCapacity = explode(",", $res['itemCapacity']);

                                  foreach ($item as $c => $items) {
                                ?>
                                <tr>  
                                  <td>
                                    <?php echo $items; ?>
                                  </td>
                                  <td>
                                    <div>
                                      <input class="form-control" type="text" name="capacityEquip[]" value="<?php echo $itemCapacity[$c]; ?>" disabled>
                                    </div>
                                  </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <a href="<?php echo getBaseUrl() ?>pages/request.php"><button class="btn btn-info" type="button"><i class="fas fa-info fa-sm text-white-50"></i> View more todays' events</button></a>
                      <!-- <button class="btn btn-info" type="button" onclick="approve('<?php echo $res['reserve_id'] ?>')"><i class="fas fa-check fa-sm text-white-50"></i> Approve</button> -->
                    </div>

                  </form>
                </div>
                
              </div>
            <?php } ?>
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
  
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<!-- <div class="modal fade" id="disapproveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div> -->
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

<input type="hidden" name="getDepartment" id="getDepartment" value="<?php echo $res['department'] ?>">
<input type="hidden" name="getRole" id="getRole" value="<?php echo $stmt['role'] ?>">

<script type="text/javascript">
  var department = document.getElementById('getDepartment').value;
  $("#department option[value=" + department + "]").attr('selected', true);
</script>

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
</script>

</body>

</html>
