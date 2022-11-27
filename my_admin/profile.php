<?php
  include "inc/admin/header.php";
  include "inc/admin/topbar.php";
  include "inc/admin/menu.php";
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <?php 
                $do=isset($_GET['do']) ? $_GET['do'] : 'View';
                if($do=="View"){
             
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

              <!-- profile picture and edit button section -->
                  <div class="profile-nav col-md-3 font-fam">
                      <div class="panel customborder">
                          <div class="user-heading round">
                            <div class="heroarea">
                                <h6 style="font-size: 14px; padding: 3px 0;">
                                  <?php 
                                  if($status==1){
                                    echo "Active";
                                  }else if($status==2){
                                    echo "Inactive";
                                  }
                                 ?>   
                                 </h6>

                            </div>
                            <?php 
                                if(!empty($avater)){
                                  ?>
                              <a href="#">
                                  <img src="dist/img/Users/<?php echo $avater; ?>" alt="">
                              </a>
                               <?php 
                             }else if(empty($avater)){
                              ?>
                              <a href="#">
                                  <img src="dist/img/Users/avatar.png" alt="">
                              </a>
                               <?php 

                                }
                             ?>
                              
                              <h1><?php echo $fullName; ?></h1>
                              <p><?php echo $email; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="" data-toggle="modal" data-target="#updateModal" ><i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>
                      </div>
                  </div>

                    <div class="profile-info col-md-9 font-fam">
                      
                        <div class="panel customborder">
                            <div class="bio-graph-heading">
                                <h3>User Profile</h3>
                            </div>
                            <div class="panel-body bio-graph-info">
                                <h1>Personal Information</h1>
                                <div class="row">
                                    <div class="bio-row">
                                        <p><span>Full Name</span>: <?php echo $fullName ?></p>
                                    </div>

                                    <div class="bio-row">
                                        <p><span>User Name</span>: <?php echo $userName; ?></p>
                                    </div>

                                    <div class="bio-row">
                                        <p><span>Email</span>: <?php echo $email; ?></p>
                                    </div>

                                    <div class="bio-row">
                                        <p><span>Phone</span>: <?php echo $phone ?></p>
                                    </div>

                                    <div class="bio-row">
                                        <p><span>Address</span>: <?php echo $address; ?></p>
                                    </div>

                                    <div class="bio-row">
                                        <p><span>Status</span>: 
                                          <?php 
                                            if($status==1){
                                              echo '<span class="badge badge-success">Active</span>';
                                           }else if($status==2){
                                            echo '<span class="badge badge-danger">Inactive</span>';
                                           }

                                         ?></p>
                                    </div>

                                    <div class="bio-row">
                                        <p><span>User Role</span>: 
                                          <?php 
                                          if($userRole==1){
                                            echo '<span class="badge badge-info">Super Admin</span>';
                                          }else if($userRole==2){
                                            echo '<span class="badge badge-success">Editor</span>';
                                          }else if($userRole==3){
                                            echo '<span class="badge badge-danger">User</span>'; 
                                          }

                                         ?></p>
                                    </div>
                                    
                                    <div class="bio-row">
                                        <p><span>Join Date </span>: <?php echo $join_date; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- update modal -->
                    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog">
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

                                <form action="profile.php?do=Editprofile" method="POST" enctype="multipart/form-data">
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
                                            <img src="dist/img/Users/<?php echo $avater; ?>" alt="borolox" width="100" class="preview">
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
                                       <input type="submit" name="userupdate" value="Save Changes" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
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
              
                }else if($do=="Editprofile"){
                  if(isset($_POST['userupdate'])){
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
                    unlink("dist/img/Users/" . $r_avater);
                  }
                  /*removing previous image from the folder done*/

                  /*uploading new image with a unique number */
                  $randomNumber= rand(0,999999);
                 
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "dist/img/Users/" .$avaterFile);

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
                    unlink("dist/img/Users/" . $r_avater);

                    $randomNumber= rand(0,999999);
                 
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "dist/img/Users/" .$avaterFile);

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
             ?>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php
 
    include "inc/admin/footer.php";
 
 ?>
 