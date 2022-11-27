<?php 
session_start();
include "my_admin/inc/db.php";
ob_start();
 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Website Description -->
    <meta name="description" content="Blue Chip: Corporate Multi Purpose Business Template" />
    <meta name="author" content="Blue Chip" />

    <!--  Favicons / Title Bar Icon  -->
    <link rel="shortcut icon" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" href="assets/images/favicon/favicon.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon/favicon.png" />
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon/favicon.png" />

    <title>My Blog Website</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">

    <!-- Flat Icon CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/flaticon.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.min.css">

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/owl.theme.default.min.css">

    <!-- Fency Box CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.min.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <!-- for many fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <!-- animated headline -->
    <link rel="stylesheet" type="text/css" href="assets/css/animated-headline.css">
    <!-- profile forntend -->
    <link rel="stylesheet" type="text/css" href="assets/css/profile.css">
    
      <!--uploader plugin start -->
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="my_admin/dist/css/jquery.mn-file.css" rel="stylesheet" type="text/css">
    
    <style>

    .previewContainer{text-align: center; margin-top:30px;}
    .previewContainer img {border: 5px solid #FFF; box-shadow: 0 0 3px -1px rgba(0, 0, 0, 0.8); max-height: 100px;}
    </style>
  <!--uploader plugin end -->
  <!-- Theme Main Style CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  </head>

  <body>
    <!-- :::::::::: Header Section Start :::::::: -->
    <header>
      <div class="container">
      <div class="row">
        <div class="col-lg-12">
           <nav class="navbar navbar-expand-lg navbar-light custom-padding">
    
          <div class="hero-area1">
            <a class="navbar-brand logo-center" href="index.php">Blog Online</a>
          </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
       <li class="nav-item">
                <a class="nav-link nav-font active" href="index.php">Home</a>
        </li>
      <?php 

      $mainCat="SELECT cat_id AS 'mcat_id', cat_name AS 'mcat_name' FROM category WHERE cat_status=1 AND parent_id=0";
        $passmainCat=mysqli_query($con,$mainCat);
        /*if there is session id then category will not vissible*/
        if(!empty($_SESSION['user_id'])){
          /*parent category loop*/
        while ($row=mysqli_fetch_assoc($passmainCat)) {
          extract($row);
          /*For Child category*/
          $mainsubCat="SELECT cat_id AS 'smcat_id' , cat_name AS 'smcat_name' FROM category WHERE cat_status=1 AND parent_id='$mcat_id'";
          $passsubmainCat=mysqli_query($con,$mainsubCat);
          $counts=mysqli_num_rows($passsubmainCat);

          if($counts==0){?>
             <li class="nav-item">
                <a class="nav-link nav-font" href="category.php?article=<?php echo $mcat_name; ?>"><?php echo $mcat_name; ?></a>
             </li>
             <?php
          }else{
            
              ?>
                <li class="nav-item dropdown">
                  <a class="nav-link nav-font" href="category.php?article=<?php echo $mcat_name; ?>">
                        <?php echo $mcat_name; ?></a>
                  <div class="dropdown-menu custom-top">
                     <?php

                            while($rows=mysqli_fetch_assoc($passsubmainCat)){
                                extract($rows);
                                ?>
                              <a class="dropdown-item nav-font" href="category.php?article=<?php echo $smcat_name; ?>"><?php echo $smcat_name; ?></a>
                                <?php
                            }
                            ?>
                  </div>
                </li>

            <?php
          }
          }
      }
       ?>

        <?php 


        if(!empty($_SESSION['user_id'])){
          $imageId=$_SESSION['user_id'];
          $imageQuery="SELECT * FROM users WHERE user_id='$imageId'";
          $passImageQuery=mysqli_query($con,$imageQuery);
          
            while ($row=mysqli_fetch_array($passImageQuery)) {
                $showImage=$row['avater'];

                if(empty($showImage)){?>
                  <div class="image image-custom dropdown">
                    <img src="my_admin/dist/img/Users/avatar.png" class="img-circle elevation-2 custom_height" alt="User Image" width="50px" style="border-radius: 50px;">
                     <div class="dropdown-menu custom-top">
                          <a href="userprofile.php?do=veiwUser" class="dropdown-item nav-font">Profile</a>
                          <a href="logout.php" class="dropdown-item nav-font">Logout</a>
                    </div>
                  </div>
               <?php }else{?>
                 <div class="image image-custom dropdown">
                     <img src="my_admin/dist/img/Users/<?php echo $showImage; ?>" class="img-circle elevation-2 image-custom" alt="User Image" width="30px" style="border-radius: 50px;">
                     <div class="dropdown-menu custom-top">
                          <a href="userprofile.php?do=veiwUser" class="dropdown-item nav-font">Profile</a>
                          <a href="logout.php" class="dropdown-item nav-font">Logout</a>
                    </div>
                 </div>
                 <?php
               }
               ?>
                 <div class="info">
                  <a href="#" class="d-block togole_color link-custom"><?php echo $_SESSION['fullName'];?></a>
                </div>
              
              <?php }
            
              ?>
                
       <?php 
            }else if(empty($_SESSION['user_id'])){?>
              <div class="image image-custom dropdown">
                <img src="my_admin/dist/img/Users/avatar.png" class="img-circle elevation-2 custom_height" alt="User Image" width="50px" >
              </div>
               <div class="info">
                  <a href="#" data-toggle="modal" data-target="#loginUsers" class="d-block togole_color link-custom">Log in/Sign in</a>
              </div>
           <?php }
            
         ?>
         </ul>
    <div class="modal fade" id="loginUsers" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title custom-modal-center">Login For More Features</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                <form action="" method="POST">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                       <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                      </div>

                    </div>
                     <div class="col-lg-12 text-right">
                          <input type="submit" name="login" value="Login" class="btn btn-primary">
                    </div>
                    <a href="createEdit.php?do=create" class="create-account">Create a free account.</a>
                  </div>
                </form>
                </div>
              </div>
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
   <?php 

    if(isset($_POST['login'])){
      $email=mysqli_real_escape_string($con,$_POST['email']);
      $password=mysqli_real_escape_string($con,$_POST['password']);
      $loghashpass=sha1($password);
      $log_query= "SELECT * FROM users WHERE email='$email' AND password='$loghashpass'";
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
                
                if($_SESSION['email'] == $email && $password == $loghashpass ){
                  header("Location:index.php");
                }
                
            }
          } else if($count<=0){
              echo '<div class="alert alert-danger mt-3">Invalid Email or Password.</div>';
              
            }
     
    }


     ?>

        </div>
      </div>
    </div>
    </header>
   

    <!-- ::::::::::: Header Section End ::::::::: -->
