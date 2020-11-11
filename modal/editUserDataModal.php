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
      <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/editUser.php" enctype="multipart/form-data">
        <div class="form-group">
          <center>
            <img class="profileMe rounded-circle" src="<?php echo getBaseUrl() ?>profile/<?php echo $stmt['profilePic'] ?>">
          </center>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="employeeNo" name="employeeNo" aria-describedby="emailHelp" placeholder="Employee Number" value="<?php echo $stmt['employeeNo'] ?>">
          <input type="hidden" class="form-control form-control-user" id="employeeNos" name="employeeNos" aria-describedby="emailHelp" placeholder="Employee Number" value="<?php echo $stmt['employeeNo'] ?>" required="" oninvalid="this.setCustomValidity('PLease enter employee number')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="fname" name="fname" aria-describedby="emailHelp" placeholder=" Firstname" value="<?php echo $stmt['firstName'] ?>" required="" oninvalid="this.setCustomValidity('Please enter firstname')" oninput="setCustomValidity('')">
          <!-- <span style="color: red;"> -->
            <?php echo (isset($_SESSION['errors']['msgNotFname']) ? $_SESSION['errors']['msgNotFname'] : "")?><?php unset($_SESSION['errors']['msgNotFname']) ?>
          </span>
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="lname" name="lname" aria-describedby="emailHelp" placeholder="Lastname" value="<?php echo $stmt['lastName'] ?>" required="" oninvalid="this.setCustomValidity('Please enter lastname')" oninput="setCustomValidity('')">
        </div>
        <div class="form-group">
          <select class="form-control" name="department" id="department" required="" oninvalid="this.setCustomValidity('Choose department')" oninput="setCustomValidity('')">
            <option class="form-control" value="">Select department...</option>
            <?php
              $row = getCourseListE();
              while($res = mysqli_fetch_assoc($row)){ 
            ?>
              <option class="form-control" value="<?php echo $res['courseDept'] ?>"><?php echo $res['courseDesc'] ?></option>
            <?php } ?> 
            </select>
          </select>
          <!-- <span style="color: red">
            <?php if(isset($_SESSION['msgNotDepartment'])){ echo $_SESSION['msgNotDepartment']; unset($_SESSION['msgNotDepartment']);}?>    
          </span> -->
        </div>
        <div class="form-group">
          <select class="form-control" name="role" id="role" required="" oninvalid="this.setCustomValidity('Choose role')" oninput="setCustomValidity('')">
            <option class="form-control" value="">Select role...</option>
            <option class="form-control" value="Secretary">Secretary</option>
            <option class="form-control" value="Dean">Dean</option>
          </select>
          <!-- <span style="color: red">
            <?php if(isset($_SESSION['msgNotRole'])){ echo $_SESSION['msgNotRole']; unset($_SESSION['msgNotRole']);}?>    
          </span> -->
        </div>

        <div class="form-group">
          <select class="form-control" id="status" name="status">
            <option class="form-control" value="0">Disabled</option>
            <option class="form-control" value="1">Enabled</option>
          </select>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
          <button class="btn btn-primary" type="submit"><i class="fas fa-pen fa-sm text-white-50"></i> Update</button>
        </div>
      </form>
    </div> 
  </div>
</div>
<input type="hidden" name="getDepartment" id="getDepartment" value="<?php echo $stmt['department'] ?>">
<input type="hidden" name="getRole" id="getRole" value="<?php echo $stmt['role'] ?>">
<input type="hidden" name="getStatus" id="getStatus" value="<?php echo $stmt['status'] ?>">

<script type="text/javascript">
  var department = document.getElementById('getDepartment').value;
  $("#department option[value=" + department + "]").attr('selected', true);

  var role = document.getElementById('getRole').value;
  $("#role option[value=" + role + "]").attr('selected', true);

  var status = document.getElementById('getStatus').value;
  $("#status option[value=" + status + "]").attr('selected', true);
</script>