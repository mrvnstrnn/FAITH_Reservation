<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';

  $info = userData();
  $stmt = mysqli_fetch_assoc($info);

?>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Reset Password?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Reset" below to reset password for <b><?php echo $stmt['lastName']; ?>, <?php echo $stmt['firstName']; ?></b> with employee number <b><?php echo $stmt['employeeNo']; ?></b>.</div>
    <form method="post" action="<?php echo getBaseUrl() ?>api/resetPassword.php">
      <input type="hidden" name="employeeNo" value="<?php echo $stmt['employeeNo'] ?>">
      <input type="hidden" name="department" value="<?php echo $stmt['department'] ?>">
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
        <button class="btn btn-primary" type="sumbit"><i class="fas fa-lock fa-sm text-white-50"></i> Reset</button>
      </div>
    </form>
  </div>
</div>