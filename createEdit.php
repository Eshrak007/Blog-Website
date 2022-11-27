<?php 
include "inc/header.php";
 ?>
    <!-- :::::::::: Page Banner Section Start :::::::: -->
    <section class="blog-bg background-img">
        <div class="container">
            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <h6 class="page-title cd-headline clip is-full-width">
                        <span class="cd-words-wrapper">
                            <b class="is-visible">Sign in. </b>
                            <b>Log in.</b>
                            <b>Have Fun. </b>
                        </span>
                    </h6>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Sign in</li>
                        </ol>
                    </nav>
                    <!-- Page Heading Breadcrumb End -->
                </div>
                  
            </div>
            <!-- Row End -->
        </div>
    </section>
    <!-- ::::::::::: Page Banner Section End ::::::::: -->



    <!-- :::::::::: Blog With Right Sidebar Start :::::::: -->
    <section>
        <div class="container">
            <div class="row">
                <!-- Blog Posts Start -->
                <div class="col-md-12">

                   <?php 

                   $do=isset($_GET['do'])?$_GET['do']:'create';
                   if(empty($_SESSION['user_id'])){

                   if($do=="create"){
                    ?>
                        <div class="row">
                            <div class="col-md-6">
                                <h3 class="mb-4 text-center">Sign in</h3>
                                <form action="createEdit.php?do=insertUser" method="POST">
                                     <div class="form-group">
                                    <input type="text" name="fullname" placeholder="Name" class="form-control custom-form" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="User Name" class="form-control custom-form" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email" class="form-control custom-form" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control custom-form" required="required" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="repassword" placeholder="Retype-Password" class="form-control custom-form" required="required" autocomplete="off">
                                </div>
                                <div class="form-group text-right" style="width: 85%; margin-bottom: 40px;">
                                    <input type="submit" name="signinUser" placeholder="Retype-Password" value="Sign in" class="btn btn-primary colorbutton">
                                </form>
              
                               </div>
                            </div>
                            <div class="col-md-6">
                                <img src="assets/images/signinblog.jpg">
                            </div>
                        </div>
                  <?php }
                  else if($do=="insertUser"){
                    if(isset($_POST['signinUser'])){
                        $fullName       =mysqli_real_escape_string($con,$_POST['fullname']);
                        $userName       =mysqli_real_escape_string($con,$_POST['username']);
                        $email          =mysqli_real_escape_string($con,$_POST['email']);
                        $password       =mysqli_real_escape_string($con,$_POST['password']);
                        $repassword     =mysqli_real_escape_string($con,$_POST['repassword']);

                        if($password==$repassword){
                            $hasspass=sha1($password);

                            $signinQuery="INSERT INTO users(fullname,username,email,password)VALUES('$fullName','$userName','$email','$hasspass')";
                            $passQuery=mysqli_query($con,$signinQuery);
                            if($passQuery){
                                header("Location:index.php");
                            }else{
                                die("Sign in attempt fail".mysqli_error($con));
                            }

                        }else{
                            echo '<div class="alert alert-danger text-center">Password and Retype-Password didn\'t match</div>';
                        }
                    }
                  }
              }else{
                if($do=="create"){
                    echo '<div class="alert alert-danger text-center">You are already signed in.....</div>';  
                }
              
              }
                    ?>              
              
                </div>

            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    
<?php 
include "inc/footer.php";
 ?>


   