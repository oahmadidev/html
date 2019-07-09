<?php
session_start();
$pageId = "TB Invoice"; 
//if($_SESSION['is_login'] != True){
//  header("Location: login.php");
    //302/301 Redirection
// }
//else {header("Location: index.php");}
require("includes/head.php"); /* Head */
?>


<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">ورود</div>
      <div class="card-body">
       
        <form method="POST" action="engine/login_check.php">
          <div class="form-group">
            <div class="form-label-group">
              <input type="username" name="username"  id="userName" class="form-control" placeholder="Email address" required="required" autofocus="autofocus" maxlength="50">
              <label for="userName">نام کاربری</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" name="password"  id="inputPassword" class="form-control" placeholder="Password" required="required" maxlength="50">
              <label for="inputPassword">رمز عبور</label>
            </div>
          </div>
          <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">  مرا به خاطر بسپار
              </label>
            </div>
          </div>


          <!-- <a class="btn btn-primary btn-block" href="index.php">ورود</a> -->
          <input type="submit" class="btn btn-success btn-block" value="ورود">


        </form>
        <!--<div class="text-center">
          <a class="d-block small mt-3" href="register.html">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div> -->
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
