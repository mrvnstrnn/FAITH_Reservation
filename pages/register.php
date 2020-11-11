<?php
	session_start();
  include '../database/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../template/heading.php'; ?>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-images"></div>
<style type="text/css">
  .bg-register-images {
    background: url("../img/FAITH-at-18.jpg");
    background-position: center;
    background-size: cover;
  } 
</style>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/register.php">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="firstName" name="firstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="lastName" name="lastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <select class="form-control form-control-user">
                      <option value="CCIT">College of Computing and Information Technology</option>
                      <option value="COED">College of Education</option>
                      <option value="COP">College of Psychology</option>
                      <option value="COE">College of Engineering</option>
                      <option value="COPS">College of Public Safety</option>
                      <option value="CON">College of Nursing</option>
                      <option value="CIHM">College of International and Hospitality Management</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <select class="form-control form-control-user">
                      <option></option>
                      <option>askjdh</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="cPassword" name="cPassword" placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
