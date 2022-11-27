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
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Users</li>
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
          <div class="col-lg-12">
              <?php 

                if($_SESSION['user_role']==1){?>

              <?php 
              $do=isset($_GET['do']) ? $_GET['do'] : 'Manage';

              if($do=="Manage"){
                /*manage category start*/
                ?>

        <div class="card card-primary">
            <div class="card-header manageBack">
              <h3 class="card-title">Manage User</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
        <div class="card-body">
       
            <!-- data table start -->
                  <table id="mydata" class="table table-responsive table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="mydata_info">
                    <thead class="thead-dark">
                      <tr>
                        <th>Serial No</th>
                        <th>Avater</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>User Role</th>
                        <th>Join Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $userData="SELECT * FROM users";
                        $userQuery=mysqli_query($con,$userData);
                        $i=1;
                        while($row=mysqli_fetch_assoc($userQuery)){
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

                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php 
                          if(!empty($avater)){
                            ?>
                              <img src="dist/img/Users/<?php echo $avater; ?>" alt="borolox" width="50">
                            <?php
                          }else{
                            ?>
                            <img src="dist/img/Users/avatar.png" alt="default image for rohinga" width="50">
                            <?php
                          }

                         ?></td>
                        <td><?php echo $fullName; ?></td>
                        <td><?php echo $userName; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $phone; ?></td>
                        <td><?php echo $address; ?></td>
                        <td><?php 

                          if($status==1){
                            echo '<div class="badge badge-success">Active</div>';
                          }else if($status==2){
                            echo '<div class="badge badge-danger">Inactive</div>';
                          }
                         ?></td>
                        <td><?php 
                            if($userRole==1){
                              echo '<div class="badge badge-info">Super Admin</div>';
                            }else if($userRole==2){
                             echo '<div class="badge badge-success">Editor</div>';
                            }else if($userRole==3){
                              echo '<div class="badge badge-danger">User</div>'; 
                            }

                         ?></td>
                        <td><?php echo $join_date; ?></td>
                        <td>
                          <div class="text-center">
                              <a href="users.php?do=Edit&u_id=<?php echo $user_id; ?>"><i class="fa fa-edit"></i></a>
                              <a href="" data-toggle="modal" data-target="#deleteUser<?php echo $user_id; ?>"><i class="fa fa-trash icon-mar"></i></a>
                          </div>
        
                        </td>
                    
                            <div class="modal fade" id="deleteUser<?php echo $user_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Delete this User??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="users.php?do=Delete&d_id=<?php echo $user_id; ?>" type="button" class="btn btn-danger">Confirm</a>
                                <a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>

                                   
                                </div>
                                
                                </div>
                            </div>
                            </div>
                      </tr>


                         <?php
                          $i++;
                         }                        
                       ?>
                    
                 <!-- for sub-category -->
                     
                    </tbody>
                  </table>

            <!-- data table end -->
            </div>
            <!-- /.card-body -->
          </div>

          <?php

               /*manage category end*/

              }else if($do=="Add"){?>
              <div class="card card-primary">
                <div class="card-header manageBack">
                  <h3 class="card-title">Add Users</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="users.php?do=Insert" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" name="fullname" placeholder="Type Fullname" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" placeholder="give a username" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" name="email" placeholder="Email Address" class="form-control" required="required" autocomplete="off">
                        </div>

                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="text" name="phone" placeholder="Phone Number" class="form-control" required="required" autocomplete="off">
                        </div>
                        <div class="form-group">
                          <label>Address</label>
                          <input type="text" name="address" placeholder="Address" class="form-control" autocomplete="off">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" placeholder="*****" class="form-control" required="required" autocomplete="off" id="Password">
                        </div>
                        <div class="form-group">
                          <label>Confirm Password</label>
                          <input type="password" name="repassword" placeholder="*****" class="form-control" required="required" autocomplete="off" id="Password1">
                        </div>

                        <div class="form-group">
                          <label>User Status</label>  
                          <select name="status" class="form-control">
                            <option value="2">please select the User status</option>
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>User Role</label>  
                          <select name="role" class="form-control">
                            <option value="3">please select the User Role</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Editor</option>
                            <option value="3">User</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Profile Picture</label>
                          
                         <div class="customFile" data-controlMsg="Choose a file">
                            <span class="selectedFile">No file selected</span>
                            <input type="file" name="avater"  class="widthPreview">
                        </div>
                        <div class="previewContainer">
                            <img class="preview" src="" alt="Image preview..." />
                        </div>

                          
                        </div>
                          
                      </div>

                        
                      <div class="col-lg-12 text-center">
                         <input type="submit" name="adduser" value="Add User" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
                      </div>
                      



                      </div>
                      

                    </div>
                  </form>
                </div>
              </div>  
                
                <?php
              }else if($do=="Insert"){
                if (isset($_POST['adduser'])) {
                  $fullname         =$_POST['fullname'];
                  $username         =$_POST['username'];
                  $email            =$_POST['email'];
                  $phone            =$_POST['phone'];
                  $address          =$_POST['address'];
                  $status           =$_POST['status'];
                  $role             =$_POST['role'];
                
                  $password         =$_POST['password'];
                  $repassword       =$_POST['repassword'];
                  $avater           =$_FILES['avater']['name'];
                  $avater_tmp       =$_FILES['avater']['tmp_name'];

                if($password==$repassword){
                  $hashpass=sha1($password);
                  
                  $randomNumber= rand(0,999999);
                 
                  if(!empty($avater)){
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "dist/img/Users/" .$avaterFile);
                  }
                  

                  $addquery="INSERT INTO users (fullname,username,email,phone,address,password,status,user_role,avater,join_date) VALUES ('$fullname','$username','$email','$phone','$address','$hashpass','$status','$role','$avaterFile',now())";
                 
                  $addbabse=mysqli_query($con,$addquery);
                  if($addbabse){
                    header("Location: users.php?do=Manage");
                  }else{
                    die("operation failed" . mysqli_error($con));

                  }
                }else{
                  echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>';
                  
                }
                
          
                }
              

              }else if($do=="Edit"){
                if(isset($_GET['u_id'])){
                  $update_id= $_GET['u_id'];

                  $u_query="SELECT * FROM users WHERE user_id='$update_id'";
                  $move_uquery=mysqli_query($con,$u_query);

                  while($row=mysqli_fetch_assoc($move_uquery)){
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

              <div class="card card-primary">
                <div class="card-header manageBack">
                  <h3 class="card-title">Edit Users</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="users.php?do=Update" method="POST" enctype="multipart/form-data">
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
                          <label>User Status</label>  
                          <select name="status" class="form-control">
                            <option value="2">please select the User status</option>
                            <option value="1" <?php if($status == 1){ echo 'selected' ; }?>>Active</option>
                            <option value="2" <?php if($status == 2){ echo 'selected' ; }?>>Inactive</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>User Role</label>  
                          <select name="role" class="form-control">
                            <option value="3">please select the User Role</option>
                            <option value="1" <?php if($userRole == 1){ echo 'selected' ; }?>>Super Admin</option>
                            <option value="2" <?php if($userRole == 2){ echo 'selected' ; }?>>Editor</option>
                            <option value="3" <?php if($userRole == 3){ echo 'selected' ; }?>>User</option>
                          </select>
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
                        <input type="hidden" name="updateUserId" value="<?php echo  $user_id;?>">
                         <input type="submit" name="updateUser" value="Save Changes" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
                      </div>
                      



                      </div>
                      

                    </div>
                  </form>
                </div>
              </div>  

                       <?php   
                        }
                }


              }else if($do=="Update"){

                  if (isset($_POST['updateUser'])) {
                  $updateUserId     =$_POST['updateUserId'];
                  $fullname         =$_POST['fullname'];
                  $username         =$_POST['username'];
                  $email            =$_POST['email'];
                  $phone            =$_POST['phone'];
                  $address          =$_POST['address'];
                  $status           =$_POST['status'];
                  $role             =$_POST['role'];
                
                  $password         =$_POST['password'];
                  $repassword       =$_POST['repassword'];
                  $avater           =$_FILES['avater']['name'];
                  $avater_tmp       =$_FILES['avater']['tmp_name'];

                if(!empty($password) && !empty($avater)){
                  if($password==$repassword){
                  $hashpass=sha1($password);

                  /*removing previous image from the folder*/
                  $removeAvaterQuery="SELECT * FROM users WHERE user_id='$updateUserId'";
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

                  $upquery="UPDATE users SET fullname='$fullname',username='$username',email='$email',phone='$phone',address='$address',password='$hashpass',status='$status',user_role='$role',avater='$avaterFile' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=Manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }
                }else{
                  echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>'; 
                }

                }else if(!empty($avater) && empty($password)){

                  $removeAvaterQuery="SELECT * FROM users WHERE user_id='$updateUserId'";
                  $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
                  while($row=mysqli_fetch_assoc($passRemoveAvater)){
                    $r_avater=$row['avater'];
                    unlink("dist/img/Users/" . $r_avater);

                    $randomNumber= rand(0,999999);
                 
                    $avaterFile= $randomNumber . $avater;
                    move_uploaded_file($avater_tmp, "dist/img/Users/" .$avaterFile);

                    $upquery="UPDATE users SET fullname='$fullname',username='$username',email='$email',phone='$phone',address='$address',status='$status',user_role='$role',avater='$avaterFile' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=Manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }

                }
              }else if(empty($avater) && !empty($password)){
                   if($password==$repassword){
                    $hashpass=sha1($password);

                     $upquery="UPDATE users SET fullname='$fullname',username='$username',email='$email',phone='$phone',address='$address',password='$hashpass',status='$status',user_role='$role' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=Manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }

                }else{
                  echo '<div class="alert alert-danger text-center">Password and Confirm Password didnot Match</div>';
                }


                }else if(empty($password) && empty($avater)){
                  $upquery="UPDATE users SET fullname='$fullname',username='$username',email='$email',phone='$phone',address='$address',status='$status',user_role='$role' WHERE user_id='$updateUserId'";

                  $upbabse=mysqli_query($con,$upquery);
                  if($upbabse){
                    header("Location: users.php?do=Manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }

                }
             }


              }else if($do=="Delete"){
                if(isset($_GET['d_id'])){
                  $delete_id = $_GET['d_id'];

                  $removeAvaterQuery="SELECT * FROM users WHERE user_id='$delete_id'";
                  $passRemoveAvater=mysqli_query($con,$removeAvaterQuery);
                  while($row=mysqli_fetch_assoc($passRemoveAvater)){
                    $r_avater=$row['avater'];
                    unlink("dist/img/Users/" . $r_avater);
                  }
                  $deleteQuery="DELETE FROM users WHERE user_id='$delete_id'";
                  $pass_DeleteQuery=mysqli_query($con,$deleteQuery);
                  if($pass_DeleteQuery){
                    header("Location: users.php?do=Manage");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }
                }
              }
             ?>

               <?php 
             }else{
                  echo '<div class="alert alert-danger text-center">Sorry You have no access in this page.</div>';
                }

               ?>
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php
 
    include "inc/admin/footer.php";
 
 ?>