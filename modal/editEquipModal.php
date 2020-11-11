<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';

  $info = equipData();
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
      <h5 class="modal-title" id="exampleModalLabel">Edit Equipment?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/editEquip.php">
        <div class="form-group">
          <input type="hidden" class="form-control form-control-user" id="id" name="id" aria-describedby="emailHelp" placeholder="Equipment Name" value="<?php echo $stmt['ID'] ?>">
          <input type="text" class="form-control form-control-user" id="equipName" name="equipName" aria-describedby="emailHelp" placeholder="Equipment Name" value="<?php echo $stmt['equipmentName'] ?>" required="" oninvalid="this.setCustomValidity('PLease enter equipment name')" oninput="setCustomValidity('')">
        </div>

        <div class="form-group">
          <input type="hidden" class="form-control form-control-user" id="capacity" name="capacity" aria-describedby="emailHelp" placeholder="Equipment Name" value="<?php echo $stmt['capacity'] ?>" required="" oninvalid="this.setCustomValidity('PLease enter equipment name')" oninput="setCustomValidity('')">
          <input type="text" class="form-control form-control-user" id="capacitys" name="capacitys" aria-describedby="emailHelp" placeholder="Equipment Name" value="<?php echo $stmt['capacity'] ?>" required="" oninvalid="this.setCustomValidity('PLease enter equipment name')" oninput="setCustomValidity('')" disabled>
        </div>

        <div class="form-group">
          <input type="text" class="form-control form-control-user" id="addCapacity" name="addCapacity" aria-describedby="emailHelp" placeholder="Add capacity" value="0" required="" oninvalid="this.setCustomValidity('Please enter equipment capacity')" oninput="setCustomValidity('')">
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