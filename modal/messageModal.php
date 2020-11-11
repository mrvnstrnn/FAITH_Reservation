<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';
?>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Message</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <?php
      $message = getMessage();
      while($stmtMessage = mysqli_fetch_assoc($message)){
    ?>
      <div class="modal-body"><b><?php echo $stmtMessage['sender']; ?>:<textarea rows="1" cols="40" class="form-control" name="message" id="message" disabled><?php echo $stmtMessage['message']; ?></textarea></b>
        <b>Date & Time: </b><?php echo $stmtMessage['dateMessage']; ?></div>
    <?php } ?>

    <!-- <form method="post" action="<?php echo getBaseUrl() ?>api/approveRequest.php"> -->
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
      </div>
    <!-- </form> -->
  </div>
</div>