<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';

  $info = userData();
  $stmt = mysqli_fetch_assoc($info);

?>
<style type="text/css">
  .profileMe{
    width: 150px;
    height: 150px;
  }
</style>
<div class="modal-dialog" role="document" style="width: 60%">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit user?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="user">
        <div class="form-group">
          <center>
            <img class="profileMe rounded-circle" src="<?php echo getBaseUrl() ?>profile/<?php echo $stmt['profilePic'] ?>">
          </center>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="employeeNo" name="employeeNo" aria-describedby="emailHelp" placeholder="Employee Number" value="<?php echo $stmt['employeeNo'] ?>" disabled>
          <input type="hidden" class="form-control form-control-user" id="employeeNos" name="employeeNos" aria-describedby="emailHelp" placeholder="Employee Number" value="<?php echo $stmt['employeeNo'] ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="fname" name="fname" aria-describedby="emailHelp" placeholder=" Firstname" value="<?php echo $stmt['firstName'] ?>" disabled>
          <span style="color: red;">
            <?php echo (isset($_SESSION['errors']['msgNotFname']) ? $_SESSION['errors']['msgNotFname'] : "")?><?php unset($_SESSION['errors']['msgNotFname']) ?>
          </span>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="lname" name="lname" aria-describedby="emailHelp" placeholder="Lastname" value="<?php echo $stmt['lastName'] ?>" disabled>
          <span style="color: red;">
            <?php echo (isset($_SESSION['errors']['msgNotLname']) ? $_SESSION['errors']['msgNotLname'] : "")?><?php unset($_SESSION['errors']['msgNotLname']) ?>
          </span>
        </div>
        <div class="form-group">
          <select class="form-control" name="department" id="department" disabled>
            <option class="form-control" value="">Select department...</option>
            <option class="form-control" value="CCIT">College of Computing and Information Technology</option>
            <option class="form-control" value="COED">College of Education</option>
            <option class="form-control" value="COP">College of Psychology</option>
            <option class="form-control" value="COE">College of Engineering</option>
            <option class="form-control" value="COPS">College of Public Safety</option>
            <option class="form-control" value="CON">College of Nursing</option>
            <option class="form-control" value="CIHM">College of International and Hospitality Management</option>
          </select>
          <span style="color: red">
            <?php if(isset($_SESSION['msgNotDepartment'])){ echo $_SESSION['msgNotDepartment']; unset($_SESSION['msgNotDepartment']);}?>    
          </span>
        </div>
        <div class="form-group">
          <select class="form-control" name="role" id="role" disabled>
            <option class="form-control" value="">Select role...</option>
            <option class="form-control" value="Secretary">Secretary</option>
            <option class="form-control" value="Dean">Dean</option>
          </select>
          <span style="color: red">
            <?php if(isset($_SESSION['msgNotRole'])){ echo $_SESSION['msgNotRole']; unset($_SESSION['msgNotRole']);}?>    
          </span>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
          <a href="<?php echo getBaseUrl() ?>pages/users.php"><button class="btn btn-primary" type="button"><i class="fas fa-eye fa-sm text-white-50"></i> View more users</button></a>
        </div>
      </form>
    </div> 
  </div>
</div>
<input type="hidden" name="getDepartment" id="getDepartment" value="<?php echo $stmt['department'] ?>">
<input type="hidden" name="getRole" id="getRole" value="<?php echo $stmt['role'] ?>">

<script type="text/javascript">
  var department = document.getElementById('getDepartment').value;
  $("#department option[value=" + department + "]").attr('selected', true);

  var role = document.getElementById('getRole').value;
  $("#role option[value=" + role + "]").attr('selected', true);
</script>