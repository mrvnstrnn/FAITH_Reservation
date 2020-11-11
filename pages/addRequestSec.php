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
          <h1 class="h3 mb-4 text-gray-800">Add Request</h1>

          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-5">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Request Form</h6>
                </div>
                <?php
                  $row = userInfo();
                  $user = mysqli_fetch_assoc($row);
                ?>
                <div class="card-body">
                  <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/addRequestSec.php">
                    <div class="form-group row">
                      <div class="col-lg-4">
                        <span>Employee number:</span> <b><span style="color: red">*</span></b>
                        <input type="text" class="form-control form-control" id="employeeNos" name="employeeNos" aria-describedby="emailHelp" value="<?php echo $_SESSION['user']['employeeNo'] ?>" disabled>
                      </div>

                      <div class="col-lg-4">
                        <span>Firstname:</span> <b><span style="color: red">*</span></b>
                        <input type="text" class="form-control form-control" id="fnames" name="fnames" aria-describedby="emailHelp"value="<?php echo $user['firstName'] ?>" disabled>
                      </div>

                      <div class="col-lg-4">
                        <span>Lastname:</span> <b><span style="color: red">*</span></b>
                        <input type="text" class="form-control form-control" id="lnames" name="lnames" aria-describedby="emailHelp" value="<?php echo $user['lastName'] ?>" disabled>
                      </div>
                    </div>
                    <input type="hidden" name="employeeNo" id="employeeNo" value="<?php echo $_SESSION['user']['employeeNo'] ?>">
                    <input type="hidden" name="fname" id="fname" value="<?php echo $user['firstName'] ?>">
                    <input type="hidden" name="lname" id="lname" value="<?php echo $user['lastName'] ?>">
                    <input type="hidden" name="department" id="department" value="<?php echo $user['department'] ?>">
                    <div class="form-group row">
                      <div class="col-lg-4">
                        <span>Purpose:</span> <b><span style="color: red">*</span></b>
                        <input type="text" class="form-control form-control" id="purpose" name="purpose" aria-describedby="emailHelp" placeholder="Purpose" required="" oninvalid="this.setCustomValidity('Please enter purpose')" oninput="setCustomValidity('')">
                        <span style="color: red;">
                          <?php echo (isset($_SESSION['errors']['msgNotPurpose']) ? $_SESSION['errors']['msgNotPurpose'] : "")?><?php unset($_SESSION['errors']['msgNotPurpose']) ?>
                        </span>
                      </div>

                      <div class="col-lg-4">
                        <span>Department:</span> <b><span style="color: red">*</span></b>
                        <input type="text" class="form-control form-control" id="departments" name="departments" aria-describedby="emailHelp" value="<?php echo $user['department'] ?>" disabled>
                      </div>

                      <div class="col-lg-4">
                        <span>Number of Participants:</span> <b><span style="color: red">*</span></b>
                        <input type="number" class="form-control form-control" id="noOfParticipant" name="noOfParticipant" aria-describedby="emailHelp" placeholder="Number of Participant" required="" oninvalid="this.setCustomValidity('Please enter number of participants')" oninput="setCustomValidity('')">
                        <span style="color: red;">
                          <?php echo (isset($_SESSION['errors']['msgNotNoOfParticipant']) ? $_SESSION['errors']['msgNotNoOfParticipant'] : "")?><?php unset($_SESSION['errors']['msgNotNoOfParticipant']) ?>
                        </span>
                      </div>
                    </div>

                    <div class="form-group row">
                      <div class="col-lg-12">
                        <span>Detail of Request(s):</span> <b><span style="color: red">*</span></b>
                        <input type="text" class="form-control form-control" id="details" name="details" aria-describedby="emailHelp" placeholder="Details of request" required="" oninvalid="this.setCustomValidity('Please enter details of request(s)')" oninput="setCustomValidity('')">
                        <span style="color: red;">
                          <?php echo (isset($_SESSION['errors']['msgNotDetails']) ? $_SESSION['errors']['msgNotDetails'] : "")?><?php unset($_SESSION['errors']['msgNotDetails']) ?>
                        </span>
                      </div>

                    </div>

                      <table id="dateTime" class="table table-bordered">
                        <tbody>
                          <tr>
                    <div class="form-group row">
                            
                      <div class="col-lg-4">
                        <span>Date Needed:</span> <b><span style="color: red">*</span></b>
                        <input class="form-control form-control" id="dateNeeded" name="dateNeeded[]" aria-describedby="emailHelp" required="" placeholder="Date needed" oninvalid="this.setCustomValidity('Please enter date')" oninput="setCustomValidity('')">
                        <span style="color: red;">
                          <?php echo (isset($_SESSION['errors']['msgNotDateNeeded']) ? $_SESSION['errors']['msgNotDateNeeded'] : "")?><?php unset($_SESSION['errors']['msgNotDateNeeded']) ?>
                        </span>
                      </div>
                            
                      <div class="col-lg-3">
                        <span>Start time:</span> <b><span style="color: red">*</span></b>
                        <input type="time" class="form-control form-control" id="startTime" name="startTime[]" aria-describedby="emailHelp" placeholder="Start time" required="" oninvalid="this.setCustomValidity('Please enter start time')" oninput="setCustomValidity('')">
                        <span style="color: red;">
                          <?php echo (isset($_SESSION['errors']['msgNotDetails']) ? $_SESSION['errors']['msgNotDetails'] : "")?><?php unset($_SESSION['errors']['msgNotDetails']) ?>
                        </span>
                      </div>
                            
                      <div class="col-lg-3">
                        <span>End time:</span> <b><span style="color: red">*</span></b>
                        <input type="time" class="form-control form-control" id="endTime" name="endTime[]" aria-describedby="emailHelp" placeholder="End time" required="" oninvalid="this.setCustomValidity('Please enter end time')" oninput="setCustomValidity('')">
                        <span style="color: red;">
                          <?php echo (isset($_SESSION['errors']['msgNotEndTime']) ? $_SESSION['errors']['msgNotEndTime'] : "")?><?php unset($_SESSION['errors']['msgNotEndTime']) ?>
                        </span>
                      </div>
                            
                      <div class="col-lg-1">
                        <span>Add</span>
                          <button class="btn btn-primary" type="button" onclick="addRowTime()"><i class="fas fa-plus fa-sm text-white-50"></i></button>
                      </div>

                    </div>
                          </tr>
                        </tbody>
                      </table>

<hr><br>

                    <div class="form-group row">
                      <div class="col-lg-6">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Facility List <b><span style="color: red">*</span></b>
                              <span style="color: red;" class="errorMsg">
                                <?php echo (isset($_SESSION['errors']['msgNotVenueName']) ? $_SESSION['errors']['msgNotVenueName'] : "")?><?php unset($_SESSION['errors']['msgNotVenueName']) ?>

                                <?php echo (isset($_SESSION['errors']['msgCapacityvError']) ? $_SESSION['errors']['msgCapacityvError'] : "")?><?php unset($_SESSION['errors']['msgCapacityvError']) ?>
                              </span>
                            </h6>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="dataTableVenue" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Facility</th>
                                    <th>Capacity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php
                                    $venueList = getVenueListAll();
                                    while($list = mysqli_fetch_assoc($venueList)){
                                  ?>
                                  <tr>
                                    <td>
                                      <input type="checkbox" name="venueName[]" value="<?php echo $list['nameVenue'] ?>"> <?php echo $list['nameVenue'] ?>
                                    </td>
                                    <td>
                                      <div>
                                        <?php echo number_format($list['capacity']) ?>
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
<style type="text/css">
  .errorMsg{
    padding: 20%;
  }
</style>
                      <div class="col-lg-6">
                        <div class="card shadow mb-4">
                          <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Equipment List <b><span style="color: red">*</span></b>
                              <span style="color: red;" class="errorMsg">
                                <?php echo (isset($_SESSION['errors']['msgNotEquipName']) ? $_SESSION['errors']['msgNotEquipName'] : "")?><?php unset($_SESSION['errors']['msgNotEquipName']) ?>

                                <?php echo (isset($_SESSION['errors']['msgNotCapacityEquip']) ? $_SESSION['errors']['msgNotCapacityEquip'] : "")?><?php unset($_SESSION['errors']['msgNotCapacityEquip']) ?>

                                <?php echo (isset($_SESSION['errors']['msgCapacityError']) ? $_SESSION['errors']['msgCapacityError'] : "")?><?php unset($_SESSION['errors']['msgCapacityError']) ?>
                              </span>
                            </h6>
                          </div>
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-bordered" id="dataTableEquip" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Equipment</th>
                                    <th>Capacity</th>
                                    <th>Quantity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php
                                  $equipList = getEquipListAll();
                                  while($listEquip = mysqli_fetch_assoc($equipList)){
                                ?>
                                <tr>
                                  <td>
                                    <input type="checkbox" name="equipName[]" id="equipName" value="<?php echo $listEquip['equipmentName'] ?>"> <?php echo $listEquip['equipmentName'] ?>
                                  </td>

                                  <td>
                                    <?php if($listEquip['capacity'] < 0){ ?>
                                      <span style="color: red">0</span>
                                    <?php } else {
                                      echo number_format($listEquip['capacity']);
                                    }
                                    ?>
                                  </td>

                                  <td>
                                    <div>
                                      <input class="form-control" type="number" name="capacityEquip[]" id="capacity">
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
                      <a href="<?php echo getBaseUrl() ?>pages/request.php"><button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button></a>
                      <button class="btn btn-primary" type="submit"><i class="fas fa-plus fa-sm text-white-50"></i> Add Request</button>
                    </div>

                  </form>
                </div>
                
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
<script type="text/javascript">
  $('#dateNeeded').datepicker({
    format: "yyyy/mm/dd",
    autoclose: true,
    todayHighlight: true,
    showOtherMonths: true,
    selectOtherMonths: true,
    autoclose: true,
    changeMonth: true,
    changeYear: true,
    minDate: new Date()
  });

  $('#startTime').timepicker({
      timeFormat: 'h:mm',
      interval: 30,
      minTime: '10',
      maxTime: '6:00pm',
      defaultTime: '11',
      startTime: '10:00',
      dynamic: true,
      dropdown: true,
      scrollbar: true
  });

  $('#endTime').timepicker({
      timeFormat: 'h:mm',
      interval: 30,
      minTime: '10',
      maxTime: '6:00pm',
      defaultTime: '11',
      startTime: '10:00',
      dynamic: true,
      dropdown: true,
      scrollbar: true
  });
</script>
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

<script type="text/javascript">
var today = new Date();
var dd = today.getDate() + 1;
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();

if (dd < 10) {
  dd = '0' + dd;
}

if (mm < 10) {
  mm = '0' + mm;
}

today = yyyy + '/' + mm + '/' + dd;
$("#dateNeeded").val(today);

var date = new Date();
var hh = date.getHours();
var hh1 = date.getHours() + 1;
var mm = date.getMinutes();
var pp = date.getHours() < 12 ? 'AM' : 'PM';

hh = hh < 10 ? '0'+hh : hh; 
mm = mm < 10 ? '0'+mm : mm;
  
hh1 = hh1 < 10 ? '0'+hh1 : hh1; 

curr_time = hh+':'+mm+ ' ' +pp;
// curr_time1 = hh1+':'+mm;

$("#startTime").val(curr_time);
$("#endTime").val(curr_time);

  function addRowTime(){

    let myDate = $("#dateNeeded").val();
    let myStartTime = $("#startTime").val();
    let myEndTime = $("#endTime").val();

    $('#dateTime').find('tbody').append($(
      '<div class="form-group row">' +
        '<div class="col-lg-4">' +
          '<input type="text" class="form-control form-control" id="dateNeeded" name="dateNeeded[]" aria-describedby="emailHelp" required="" oninvalid="this.setCustomValidity("Please enter date")" oninput="setCustomValidity("")" placeholder="Date needed" value="'+myDate+'">' +
        '</div>' +
              
        '<div class="col-lg-3">' +
          '<input type="time" class="form-control form-control" id="startTime" name="startTime[]" aria-describedby="emailHelp" required="" oninvalid="this.setCustomValidity("Please enter start time")" oninput="setCustomValidity("")" placeholder="Start time" value="'+myStartTime+'">' +
        '</div>' +
              
        '<div class="col-lg-3">' +
          '<input type="time" class="form-control form-control" id="endTime" name="endTime[]" aria-describedby="emailHelp" required="" oninvalid="this.setCustomValidity("Please enter end time")" oninput="setCustomValidity("")" placeholder="End time" value="'+myEndTime+'">' +
        '</div>'+

        '<div class="col-lg-1">' +
          '<button class="btn btn-danger" type="button" onclick="removeRowTime(this)"><i class="fas fa-trash fa-sm text-white-50"></i></button>' +
        '</div>' +

      '</div>'
    ));

  }

  function removeRowTime(btn){
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
</script>

</body>

</html>
