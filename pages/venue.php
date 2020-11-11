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

            <!-- Nav Item - User Information -->
            <?php
              include '../template/session.php';
            ?>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
<style type="text/css">
  .successNotif{
    padding-left: 210px;
  }
</style>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage Facility</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addVenueModal"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add Facility</a>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Facility List
<span style="color: green" class="successNotif">
  <?php if(isset($_SESSION['msgEnable'])){ echo $_SESSION['msgEnable']; unset($_SESSION['msgEnable']);}?>
  <?php if(isset($_SESSION['msgDisable'])){ echo $_SESSION['msgDisable']; unset($_SESSION['msgDisable']);}?>
  <?php if(isset($_SESSION['msgAdd'])){ echo $_SESSION['msgAdd']; unset($_SESSION['msgAdd']);}?>
  <?php if(isset($_SESSION['msgUpdate'])){ echo $_SESSION['msgUpdate']; unset($_SESSION['msgUpdate']);}?>
</span>
<span style="color: red;">
  <?php echo (isset($_SESSION['errors']['msgAlready']) ? $_SESSION['errors']['msgAlready'] : "")?><?php unset($_SESSION['errors']['msgAlready']); ?>
  <?php if(isset($_SESSION['msgDeleteError'])){ echo $_SESSION['msgDeleteError']; unset($_SESSION['msgDeleteError']);}?>
</span>
              </h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Facility Name</th>
                      <th>Capacity</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Facility Name</th>
                      <th>Capacity</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $venue = getVenueList();
                      while($listVenue = mysqli_fetch_assoc($venue)){
                    ?>
                    <tr>
                      <td>
                        <?php echo $listVenue['nameVenue']; ?>
                      </td>
                      <td><?php echo number_format($listVenue['capacity']); ?></td>
                        <?php if($listVenue['status'] == 0){ ?>
                          <td><span style="color: red">Under renovation</span></td>
                        <?php } else { ?>
                          <td><span>Working</span></td>
                        <?php } ?>
                      <td>
                        <button class=" btn btn-success btn-sm" onclick="editVenue(<?php echo $listVenue['ID'] ?>)">Edit</button>
                        <?php if($listVenue['status'] == 0){ ?>
                          <a href="<?php echo getBaseUrl() ?>api/enable.php?id=<?php echo $listVenue['ID'] ?>"><button class="btn btn-primary btn-sm">Working</button></a>
                        <?php } else { ?>
                          <a href="<?php echo getBaseUrl() ?>api/disable.php?id=<?php echo $listVenue['ID'] ?>"><button class="btn btn-danger btn-sm">Renovate</button></a>
                        <?php } ?>
                      </td>
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

<div class="modal fade" id="editVenuerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="addVenueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 60%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add facility?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
<!-- <style type="text/css">
  .name{
    width: 50%;
  }
</style> -->
      <div class="modal-body">
        <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/addVenue.php">
          <div class="form-group">
            <input type="text" class="form-control form-control-user" id="venue" name="venue" aria-describedby="emailHelp" placeholder="Facility Name"  required="" oninvalid="this.setCustomValidity('PLease enter facility name')" oninput="setCustomValidity('')">
            <!-- <span style="color: red;">
              <?php echo (isset($_SESSION['errors']['msgNotVenue']) ? $_SESSION['errors']['msgNotVenue'] : "")?><?php unset($_SESSION['errors']['msgNotVenue']) ?>
            </span> -->
          </div>
          <div class="form-group">
            <input type="number" class="form-control form-control-user name" id="capacity" name="capacity" aria-describedby="emailHelp" placeholder=" Capacity"  required="" oninvalid="this.setCustomValidity('PLease enter capacity')" oninput="setCustomValidity('')">
            <!-- <span style="color: red;">
              <?php echo (isset($_SESSION['errors']['msgNotCapacity']) ? $_SESSION['errors']['msgNotCapacity'] : "")?><?php unset($_SESSION['errors']['msgNotCapacity']) ?>
            </span> -->
          </div>
          <div>
            <select class="form-control" name="status"  required="" oninvalid="this.setCustomValidity('Choose status')" oninput="setCustomValidity('')">
              <option value="">Choose status...</option>
              <option value="1">Enable</option>
              <option value="0">Disable</option>
            </select>
            <!-- <span style="color: red;">
              <?php echo (isset($_SESSION['errors']['msgNotStatus']) ? $_SESSION['errors']['msgNotStatus'] : "")?><?php unset($_SESSION['errors']['msgNotStatus']) ?>
            </span> -->
          </div>
      </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
          <button class="btn btn-primary" type="submit"><i class="fas fa-plus fa-sm text-white-50"></i> Add Facility</button>
        </div>
      </form> 
    </div>
  </div>
</div>

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
    function editVenue(idx){
      let url = "<?php echo getBaseUrl() ?>modal/editVenueModal.php";
      $.post(url,{id:idx},function(result){
        $("#editVenuerModal").html(result);
        $("#editVenuerModal").modal('show');
      });
    }
  </script>

</body>

</html>