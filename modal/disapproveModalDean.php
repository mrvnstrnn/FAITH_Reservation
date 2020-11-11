<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';

  $info = getRequestName();
  $stmt = mysqli_fetch_assoc($info);

  $user = userInfo();
  $row = mysqli_fetch_array($user);
?>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Disapprove Request?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Submit" below to send message to <b><?php echo $stmt['lastName']; ?>, <?php echo $stmt['firstName']; ?></b> with employee number <b><?php echo $stmt['employeeNo']; ?></b>.</div>
    <form method="post" action="<?php echo getBaseUrl() ?>api/sendMessage.php">
      <input type="hidden" name="id" value="<?php echo $stmt['reserve_id'] ?>">
      <input type="hidden" name="employeeNo" value="<?php echo $stmt['employeeNo'] ?>">
      <input type="hidden" name="sender" value="<?php echo $row['firstName'] ?> <?php echo $row['lastName'] ?> - <?php echo $row['role'] ?>">
    <div class="modal-body">
      <textarea rows="4" cols="40" class="form-control" name="message" id="message" placeholder="Message"></textarea>
    </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
        <button class="btn btn-primary" type="sumbit"><i class="fas fa-check fa-sm text-white-50"></i> Submit</button>
      </div>
    </form>
  </div>
</div>