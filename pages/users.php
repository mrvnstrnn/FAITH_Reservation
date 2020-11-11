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
            <h1 class="h3 mb-0 text-gray-800">Manage Users</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#addUserModal"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add User</a>
          </div>
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Users List
<span style="color: green" class="successNotif">
  <?php if(isset($_SESSION['msgAdd'])){ echo $_SESSION['msgAdd']; unset($_SESSION['msgAdd']);}?>
  <?php if(isset($_SESSION['msgUpdate'])){ echo $_SESSION['msgUpdate']; unset($_SESSION['msgUpdate']);}?>
  <?php if(isset($_SESSION['msgReset'])){ echo $_SESSION['msgReset']; unset($_SESSION['msgReset']);}?> 
  <?php if(isset($_SESSION['msgDelete'])){ echo $_SESSION['msgDelete']; unset($_SESSION['msgDelete']);}?>
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
                      <th style="width: 10%">Employee Number</th>
                      <th>Full name</th>
                      <th>Department</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th style="width: 10%">Employee Number</th>
                      <th>Full name</th>
                      <th>Department</th>
                      <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php
                      $user = getUserList();
                      while($list = mysqli_fetch_assoc($user)){
                    ?>
                    <tr>
                      <td><a href="#" onclick="viewUserData('<?php echo $list['employeeNo'] ?>')"><?php echo $list['employeeNo']; ?></a></td>
                      <td>
                        <?php echo $list['lastName']; ?>, <?php echo $list['firstName']; ?>
                      </td>
                      <td><?php echo $list['department'] ?></td>
                      <td><?php echo $list['role'] ?></td>
                      <?php if($list['status'] == 0){ ?>
                      <td><h5><span class="badge badge-danger">Disabled</span></h5></td>
                      <?php } else { ?>
                      <td><h5><span class="badge badge-success">Active</span></h5></td>
                      <?php } ?>
                      <td><button title="Edit user" class="btn btn-info btn-sm" onclick="getUserData('<?php echo $list['employeeNo'] ?>')"><i class="fas fa-pen fa-sm text-white-50" aria-hidden="true"></i></button> <button title="Delete user" class="btn btn-danger btn-sm" onclick="deleteUser('<?php echo $list['employeeNo'] ?>')"><i class="fas fa-trash fa-sm text-white-50"></i></button> <button title="Reset password" class="btn btn-secondary btn-sm" onclick="resetPass('<?php echo $list['employeeNo'] ?>')"><i class="fas fa-lock fa-sm text-white-50"></i></button></td>
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
  
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="resetPassModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width: 60%">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add user?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/addUser.php" enctype="multipart/form-data">
          <div class="form-group">
              <label>Insert Profile</label> <b><span style="color: red">*</span></b>
              <input class="form-control" type="file" name="file" required="" oninvalid="this.setCustomValidity('Insert Profile picture')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label>Employee number</label> <b><span style="color: red">*</span></b>
            <input type="text" class="form-control form-control-user" id="employeeNo" name="employeeNo" aria-describedby="emailHelp" placeholder="Employee Number" required="" oninvalid="this.setCustomValidity('Please input employee number')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label>Firstname</label> <b><span style="color: red">*</span></b>
            <input type="text" class="form-control form-control-user name" id="fname" name="fname" aria-describedby="emailHelp" placeholder=" Firstname" required="" oninvalid="this.setCustomValidity('Please input firstname')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label>Lastname</label> <b><span style="color: red">*</span></b>
            <input type="text" class="form-control form-control-user name" id="lname" name="lname" aria-describedby="emailHelp" placeholder="Lastname" required="" oninvalid="this.setCustomValidity('Please input lastname')" oninput="setCustomValidity('')">
          </div>
          <div class="form-group">
            <label>Department</label> <b><span style="color: red">*</span></b>
            <select class="form-control" name="department" id="department" required="" oninvalid="this.setCustomValidity('Please choose department')" oninput="setCustomValidity('')">
              <option class="form-control" value="">Select department...</option>
            <?php
              $row = getCourseListE();
              while($res = mysqli_fetch_assoc($row)){ 
            ?>
              <option class="form-control" value="<?php echo $res['courseDept'] ?>"><?php echo $res['courseDesc'] ?></option>
            <?php } ?> 
            </select>
          </div>
          <div class="form-group">
            <label>Role</label> <b><span style="color: red">*</span></b>
            <select class="form-control" name="role" id="role" required="" oninvalid="this.setCustomValidity('Please choose role')" oninput="setCustomValidity('')">
              <option class="form-control" value="">Select role...</option>
              <option class="form-control" value="Secretary">Secretary</option>
              <option class="form-control" value="Dean">Dean</option>
            </select>
          </div>
      </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
          <button class="btn btn-primary" type="submit"><i class="fas fa-user-plus fa-sm text-white-50"></i> Add User</button>
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
    function getUserData(idx){
      let url = "<?php echo getBaseUrl() ?>modal/editUserDataModal.php";
      $.post(url,{id:idx},function(result){
        $("#editUserModal").html(result);
        $("#editUserModal").modal('show');
      });
    }

    function viewUserData(idx){
      let url = "<?php echo getBaseUrl() ?>modal/viewUserDataModal.php";
      $.post(url,{id:idx},function(result){
        $("#viewUserModal").html(result);
        $("#viewUserModal").modal('show');
      });
    }

    function deleteUser(idx){
      let url = "<?php echo getBaseUrl() ?>modal/deleteUserDataModal.php";
      $.post(url,{id:idx},function(result){
        $("#deleteUserModal").html(result);
        $("#deleteUserModal").modal('show');
      });
    }

    function resetPass(idx){
      let url = "<?php echo getBaseUrl() ?>modal/resetPassModal.php";
      $.post(url,{id:idx},function(result){
        $("#resetPassModal").html(result);
        $("#resetPassModal").modal('show');
      });
    }
  </script>

</body>

</html>