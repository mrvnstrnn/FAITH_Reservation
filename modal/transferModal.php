<?php
  session_start();
  require '../database/database.php';
  include '../database/connection.php';

  $info = transferLocation();
  $stmt = mysqli_fetch_assoc($info);

?>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Relocate venue?</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">Select "Relocate" below to change venue/s of <b><?php echo $stmt['lastName']; ?>, <?php echo $stmt['firstName']; ?></b> with employee number <b><?php echo $stmt['employeeNo']; ?></b>.</div>
    <form method="post" action="<?php echo getBaseUrl() ?>api/relocate.php">
      <input type="hidden" name="id" value="<?php echo $stmt['reserve_id'] ?>">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTableVenue" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Venue</th>
                <th>Capacity</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $venueList = getVenueListAll();
                while($list = mysqli_fetch_assoc($venueList)){
              ?>
              <tr>
                <td>
                  <input type="checkbox" name="venueName[]" value="<?php echo $list['nameVenue'] ?>"> <?php echo $list['nameVenue'] ?>
                </td>
                <td>
                  <div>
                    <?php echo $list['capacity'] ?>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal"><i class="fas fa-ban fa-sm text-white-50"></i> Cancel</button>
        <button class="btn btn-primary" type="sumbit"><i class="fas fa-compass fa-sm text-white-50"></i> Relocate</button>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#dataTableVenue").DataTable();
  })
</script>