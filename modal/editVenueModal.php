<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';

  $info = venueData();
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Venue?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/editVenue.php">
        <div class="form-group">
          <input type="hidden" class="form-control form-control-user" id="id" name="id" aria-describedby="emailHelp" placeholder="Venue Name" value="<?php echo $stmt['ID'] ?>">
          <input type="text" class="form-control form-control-user" id="venue" name="venue" aria-describedby="emailHelp" placeholder="Venue Name" value="<?php echo $stmt['nameVenue'] ?>" required="" oninvalid="this.setCustomValidity('Please enter venue name')" oninput="setCustomValidity('')">
          <!-- <span style="color: red;">
            <?php echo (isset($_SESSION['errors']['msgNotVenue']) ? $_SESSION['errors']['msgNotVenue'] : "")?><?php unset($_SESSION['errors']['msgNotVenue']) ?>
          </span> -->
        </div>
        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="capacity" name="capacity" aria-describedby="emailHelp" placeholder="Capacity" value="<?php echo $stmt['capacity'] ?>" required="" oninvalid="this.setCustomValidity('Please enter capacity')" oninput="setCustomValidity('')">
          <!-- <span style="color: red;">
            <?php echo (isset($_SESSION['errors']['msgNotCapacity']) ? $_SESSION['errors']['msgNotCapacity'] : "")?><?php unset($_SESSION['errors']['msgNotCapacity']) ?>
          </span> -->
        </div>
        <div class="form-group">
          <select class="form-control" name="status" id="status" required="" oninvalid="this.setCustomValidity('Choose status')" oninput="setCustomValidity('')">
            <option value="">Choose status</option>
            <option value="1">Enable</option>
            <option value="0">Disable</option>
          </select>
          <!-- <span style="color: red">
            <?php if(isset($_SESSION['msgNotStatus'])){ echo $_SESSION['msgNotStatus']; unset($_SESSION['msgNotStatus']);}?>    
          </span> -->
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
          <button class="btn btn-primary" type="submit"><i class="fas fa-pen fa-sm text-white-50"></i> Update</button>
        </div>
      </form>
    </div> 
  </div>
</div>
<input type="hidden" name="getStatus" id="getStatus" value="<?php echo $stmt['status'] ?>">

<script type="text/javascript">
  var status = document.getElementById('getStatus').value;
  $("#status option[value=" + status + "]").attr('selected', true);
</script>