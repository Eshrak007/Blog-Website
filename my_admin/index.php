<?php
  include "inc/auth/header.php";
?>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>My Blog Website</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login for start your session</p>

      <form method="POST">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Login">
          </div>
          <!-- /.col -->
        </div>
      </form>
      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
      <?php 
      /*log in code start*/
          if(isset($_POST['login'])){
            $logEmail   =mysqli_real_escape_string($con, $_POST['email']);
            $logpass    =mysqli_real_escape_string($con, $_POST['password']);

            $loghashpass=sha1($logpass);
            $log_query= "SELECT * FROM users WHERE email='$logEmail' AND status=1 AND password='$loghashpass'";
            $passlogQuery=mysqli_query($con,$log_query);
            $count=mysqli_num_rows($passlogQuery);
            if ($count>0) {
              while ($row=mysqli_fetch_array($passlogQuery)) {
               $_SESSION['user_id']      =$row['user_id'];
               $_SESSION['fullName']     =$row['fullname'];
               $_SESSION['userName']     =$row['username'];
               $_SESSION['email']        =$row['email'];
               $phone                    =$row['phone'];
               $address                  =$row['address'];
               $password                 =$row['password'];
               $_SESSION['status']       =$row['status'];
               $_SESSION['user_role']    =$row['user_role'];
               $avater                   =$row['avater'];
               $join_date                =$row['join_date'];
                if($_SESSION['email'] == $logEmail && $password == $loghashpass ){
                  header("Location:dashboard.php");
                }
                else if($_SESSION['email'] != $logEmail || $password != $loghashpass){
                  header("Location:index.php");
                }
                else{
                  header("Location:index.php");
                }
            }
          }else if($count<=0){
            $restat="SELECT * FROM users WHERE email='$logEmail' AND status=2 AND password='$loghashpass'";
            $passrestat=mysqli_query($con,$restat);
            $countr=mysqli_num_rows($passrestat);
            if($countr > 0){
                echo '<div class="alert alert-info mt-3">Wait for the admin approval.</div>';
              }else if($countr <= 0){
                echo '<div class="alert alert-danger mt-3">Invalid Email or Password.</div>';
              }
            }
            }
            


       ?>

<?php
  include "inc/auth/footer.php";
?>