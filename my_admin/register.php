<?php
  include "inc/auth/header.php";
?>

<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Welcome</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="text" name="fullName" class="form-control" placeholder="Full name" required="required" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="userName" class="form-control" placeholder="User name" required="required" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-users"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required="required" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="repassword" class="form-control" placeholder="Retype password" required="required">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required="required">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="register" class="btn btn-primary btn-block" value="Register">
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="index.php" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->
<?php 

  if(isset($_POST['register'])){
    $fullName          =mysqli_real_escape_string($con,$_POST['fullName']);
    $userName          =mysqli_real_escape_string($con,$_POST['userName']);
    $email             =$_POST['email'];
    $password          =mysqli_real_escape_string($con,$_POST['password']);
    $repassword        =mysqli_real_escape_string($con,$_POST['repassword']);

    if($password==$repassword){
      $hashpass=sha1($password);
      $regQuery="INSERT INTO users (fullname,username,email,password,join_date) VALUES ('$fullName','$userName','$email','$hashpass',now())";
      $passregQuery=mysqli_query($con,$regQuery);
       if($passregQuery){
          header("Location:index.php");
       }else{
          die("operation failed" . mysqli_error($con));

      }

    }else{
       echo '<div class="alert alert-danger margin_alert text-center">Password and ReType Password didn\'t match. Registration failed.</div>';
    }
  }


 ?>


<?php
  include "inc/auth/footer.php";
?>
