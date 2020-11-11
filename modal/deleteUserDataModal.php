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
      <h5 class="modal-title" id="exampleModalLabel">Delete user?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Delete" below if you want to delete <b><?php echo $stmt['lastName'] ?>, <?php echo $stmt['firstName'] ?></b> with a employee number of <b><?php echo $stmt['employeeNo'] ?></b>.</div>
    <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
      <a class="btn btn-primary" href="<?php echo getBaseUrl() ?>api/delete.php?id=<?php echo $stmt['employeeNo'] ?>"><i class="fas fa-trash fa-sm text-white-50"></i> Delete</a>
    </div>
  </div>
</div>