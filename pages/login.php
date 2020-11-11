<?php
  session_start();
  include "../database/database.php";
  if(isset($_SESSION['user'])){
    header("Location: dashboard.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<?php include '../template/heading.php'; ?>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
<style type="text/css">
  .bg-login-images {
    background: url("../img/Mabinis.jpg");
    background-position: center;
    background-size: cover;
  }
</style>
              <div class="col-lg-6 d-none d-lg-block bg-login-images">
                <!-- <img  class="photoLogin" src="../img/FAITH-at-18.jpg"> -->
              </div>

              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">

                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
<span style="color: red">
  <?php echo (isset($_SESSION['errors']['disableMsg']) ? $_SESSION['errors']['disableMsg'] : "")?><?php unset($_SESSION['errors']['disableMsg']) ?>     
</span>
<span style="color: red">
  <?php echo (isset($_SESSION['errors']['wrongMsg']) ? $_SESSION['errors']['wrongMsg'] : "")?><?php unset($_SESSION['errors']['wrongMsg']) ?>     
</span>
<span style="color: red">
  <?php if(!isset($_SESSION['errors']['employeeNo'])){
  echo (isset($_SESSION['errors']['notFound']) ? $_SESSION['errors']['notFound'] : ""); } ?>
  <?php unset($_SESSION['errors']['notFound']) ?>     
</span>
                  <form class="user" method="post" action="<?php echo getBaseUrl() ?>api/login.php">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
                      <span style="color: red">
                        <?php echo (isset($_SESSION['errors']['employeeNo']) ? $_SESSION['errors']['employeeNo'] : "")?><?php unset($_SESSION['errors']['employeeNo']) ?>    
                      </span>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                      <span style="color: red">
                        <?php echo (isset($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : "")?><?php unset($_SESSION['errors']['password']) ?>     
                      </span>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button class="btn btn-primary btn-user btn-block" type="submit">
                      Login
                    </button>
                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <!-- <a class="small" href="register.php">Create an Account!</a> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo getBaseUrl() ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo getBaseUrl() ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo getBaseUrl() ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo getBaseUrl() ?>js/sb-admin-2.min.js"></script>

  <script src="<?php echo getBaseUrl() ?>js/jquery-form.min.js"></script>

</body>

</html>
