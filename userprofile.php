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
                            <b class="is-visible">This is Blog Section. </b>
                            <b>Read Posts. </b>
                            <b>Give a review. </b>
                        </span>
                    </h6>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.php">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Profile</li>
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

      <?php

      $do=isset($_GET['do']) ? $_GET['do']:'veiwUser';
      if(!empty($_SESSION['user_id'])){
        if($do=="veiwUser"){

            $viewId=$_SESSION['user_id'];
                  $viewIdQuery="SELECT * FROM users WHERE user_id='$viewId'";
                  $passviewIdQuery=mysqli_query($con,$viewIdQuery);
                  while($row=mysqli_fetch_array($passviewIdQuery)){
                    $user_id                  =$row['user_id'];
                    $fullName                 =$row['fullname'];
                    $userName                 =$row['username'];
                    $email                    =$row['email'];
                    $phone                    =$row['phone'];
                    $address                  =$row['address'];
                    $status                   =$row['status'];
                    $userRole                 =$row['user_role'];
                    $avater                   =$row['avater'];
                    $join_date                =$row['join_date'];

            ?>
                   
        <section style="color: #1a202c; text-align: left; background: linear-gradient(to right,#ffafbd,#ffc3a0); min-height: 100vh;">
        <div class="container">
            <div class="main-body">
             <div class="row">
                <div class="col-sm-12 text-right">
                  <a class="btn btn-grad" href="" data-toggle="modal" data-target="#updatefront">Edit Profile</a>
                </div>

              </div>
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card-custom">
                <div style=" flex: 1 1 auto; min-height: 1px; padding: 1rem;">
                  <div class="d-flex flex-column align-items-center text-center">
                   <?php 
                    if(!empty($avater)){
                      ?>
                  <a href="#">
                      <img src="my_admin/dist/img/Users/<?php echo $avater; ?>" alt=""class="rounded-circle" width="150">
                  </a>
                   <?php 
                 }else if(empty($avater)){
                  ?>
                  <a href="#">
                      <img src="my_admin/dist/img/Users/avatar.png" alt="" class="rounded-circle" width="150">
                  </a>
                   <?php 

                    }
                 ?>
                    <div class="mt-3">
                      <h4><?php echo $fullName; ?></h4>
                      <p class="text-secondary mb-1"><?php echo $email; ?></p>
                      <p class="text-muted font-size-sm"><?php echo $address; ?></p>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-md-8">
              <div class="card-custom mb-3">
                <div style=" flex: 1 1 auto; min-height: 1px; padding: 1rem;">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $fullName; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $userName; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $email; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $phone; ?>
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $address; ?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Updated</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php 
                        $date=date_create($join_date);
                        echo date_format($date,"l jS \of F Y");
                       ?>
                    </div>
                  </div>
                  <hr>
                </div>
              </div>
            </div>
          </div>

        </div>
    </div>
</section>
       <!-- update modal -->
        <div class="modal fade" id="updatefront" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Your Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="container-fluid">
                  <div class="row">

                    <form action="userprofile.php?do=editUser" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" placeholder="Type Fullname" class="form-control" autocomplete="off" value="<?php echo $fullName; ?>">
                          </div>
                          <div class="form-group">
                            <label>User Name</label>
                            <input type="text" name="username" placeholder="give a username" class="form-control" autocomplete="off" value="<?php echo $userName; ?>">
                          </div>
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email Address" class="form-control" autocomplete="off" value="<?php echo $email; ?>" readonly="readonly">
                          </div>

                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone" placeholder="Phone Number" class="form-control" autocomplete="off" value="<?php echo $phone; ?>">
                          </div>
                          <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" placeholder="Address" class="form-control" autocomplete="off" value="<?php echo $address; ?>">
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="*****" class="form-control" autocomplete="off" id="Password">
                          </div>
                          <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password" name="repassword" placeholder="*****" class="form-control" autocomplete="off" id="Password1">
                          </div>
                          <div class="form-group">
                            <label>Profile Picture</label><br>
                           
                            <div class="customFile" data-controlMsg="Choose a file">
                              <span class="selectedFile"><?php echo $avater; ?></span>
                              <input type="file" name="avater"  class="widthPreview">
                          </div>
                          
                          <div class="previewContainer">
                              <?php
                            if(!empty($avater)){
                              ?>
                                <img src="my_admin/dist/img/Users/<?php echo $avater; ?>" alt="borolox" width="100" class="preview">
                              <?php
                            }else{?>
                              <img src="" alt="No Image Found" width="100" class="preview">
                              <?php
                            }

                           ?>
                          </div>
                          </div>
                            
                          </div>

                          
                        <div class="col-lg-12 text-center">
                          <input type="hidden" name="UpdateID" value="<?php echo  $user_id;?>">
                           <input type="submit" name="profileupdate" value="Update Information" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
                        </div>
                        



                        </div>
                        

                      </div>
                    </form>
                  </div>
                </div>  
              </div>
            </div>
          </div>
        </div>

        <?php
          }
      }
          else if($do=="editUser"){
             if(isset($_POST['profileupdate'])){
                $userId=$_POST['UpdateID'];
                $fullname       =mysqli_real_escape_string($con, $_POST['fullname']);
                $username       =mysqli_real_escape_string($con, $_POST['username']);
                $email          =mysqli_real_escape_string($con, $_POST['email']);
                $phone          =mysqli_real_escape_string($con, $_POST['phone']);
                $address        =mysqli_real_escape_string($con, $_POST['address']);

                $password       =mysqli_real_escape_string($con, $_POST['password']);
                $repassword     =mysqli_real_escape_string($con, $_POST['repassword']);

                $avater         =$_FILES['avater']['name'];
                $avater_tmp     =$_FILES['avater']['tmp_name'];

                /*update procedure start*/
            if(!empty($password) && !empty($avater)){
              if($password==$repassword){
              $hashpass=sha1($password);

              /*removing previous image from the folder*/
              $removeAvaterQuery="SELECT * FROM users WHERE user_id='$userId'";
              $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
              while($row=mysqli_fetch_assoc($passRemoveAvater)){
                $r_avater=$row['avater'];
                unlink("my_admin/dist/img/Users/" . $r_avater);
              }
              /*removing previous image from the folder done*/

              /*uploading new image with a unique number */
              $randomNumber= rand(0,999999);
             
                $avaterFile= $randomNumber . $avater;
                move_uploaded_file($avater_tmp, "my_admin/dist/img/Users/" .$avaterFile);

              /*uploading new image with a unique number done*/

              $upquery="UPDATE users SET fullname='$fullname',username='$username',phone='$phone',address='$address',password='$hashpass',avater='$avaterFile' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }
            }else{
              echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>'; 
            }

            }else if(!empty($avater) && empty($password)){

              $removeAvaterQuery="SELECT * FROM users WHERE user_id='$userId'";
              $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
              while($row=mysqli_fetch_assoc($passRemoveAvater)){
                $r_avater=$row['avater'];
                unlink("my_admin/dist/img/Users/" . $r_avater);

                $randomNumber= rand(0,999999);
             
                $avaterFile= $randomNumber . $avater;
                move_uploaded_file($avater_tmp, "my_admin/dist/img/Users/" .$avaterFile);

                $upquery="UPDATE users SET fullname='$fullname',username='$username',phone='$phone',address='$address',avater='$avaterFile' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }

            }
          }else if(empty($avater) && !empty($password)){
               if($password==$repassword){
                $hashpass=sha1($password);

                 $upquery="UPDATE users SET fullname='$fullname',username='$username',phone='$phone',address='$address',password='$hashpass' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }

            }else{
              echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>';
            }


            }else if(empty($password) && empty($avater)){
              $upquery="UPDATE users SET fullname='$fullname',username='$username',phone='$phone',address='$address' WHERE user_id='$userId'";

              $upbabse=mysqli_query($con,$upquery);
              if($upbabse){
              session_start();
              session_unset();
              session_destroy();
              header("Location:index.php");
              }else{
                die("Operation failed" . mysqli_connect_error());
              }

            }
                /*update procedure end*/
              }
          }

         }
         else{
            if($do=="veiwUser"){
            echo '<div class="alert alert-danger text-center mt-4">Need to login first.</div>';
              }
                
            }
              
              ?>
              
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    
<?php 
include "inc/footer.php";
 ?>


   