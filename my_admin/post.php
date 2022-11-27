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
            <h1 class="m-0">Post</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Post</li>
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
          $do= isset($_GET['do'])?$_GET['do']:"managePost";
          if ($do=="managePost") {
          ?>
          <div class="text-right mb-2"><a href="post.php?do=addPost" class="btn btn-primary mr-auto">Add New Post</a></div>
          <div class="card card-primary">
            <div class="card-header manageBack">
              <h3 class="card-title">Manage All Posts</h3>

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
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Status</th>
                        <th>Post Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 

                        $postData="SELECT * FROM posts ORDER BY post_id DESC ";
                        $postQuery=mysqli_query($con,$postData);
                        $i=1;
                      
                     
                          while($row=mysqli_fetch_assoc($postQuery)){
                          $post_id          =$row['post_id'];
                          $title            =$row['title'];
                          $description      =$row['description'];
                          $image            =$row['image'];
                          $tags             =$row['tags'];
                          $status           =$row['status'];
                          $author_id        =$row['author_id'];
                          $category_id      =$row['category_id'];       
                          $post_date        =$row['post_date'];
                          ?>

                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php 
                          if(!empty($image)){
                            ?>
                              <img src="dist/img/Posts/<?php echo $image; ?>" alt="borolox" width="50">
                            <?php
                          }else{
                            ?>
                            <img src="dist/img/Posts/avatar.jpg" alt="default image for rohinga" width="50">
                            <?php
                          }

                         ?></td>
                        <td><?php echo $title; ?></td>
                        <td>
                          <?php
                          $show_cat="SELECT * FROM category WHERE cat_id='$category_id'";
                          $passShow=mysqli_query($con,$show_cat);
                          while($row=mysqli_fetch_array($passShow)){
                            $showCatId=$row['cat_id'];
                            $showCatname=$row['cat_name'];
                          echo $showCatname;
                          }

                          ?>
                        </td>
                         <td>
                            <?php
                          $show_auther="SELECT * FROM users WHERE user_id='$author_id'";
                          $passShowAuther=mysqli_query($con,$show_auther);
                          while($row=mysqli_fetch_array($passShowAuther)){
                            $showuserId=$row['user_id'];
                            $showusername=$row['fullname'];
                          echo $showusername;
                          }

                          ?>
                         </td>
                        <td><?php 

                          if($status==1){
                            echo '<div class="badge badge-success">Published</div>';
                          }else if($status==2){
                            echo '<div class="badge badge-danger">Draft</div>';
                          }
                         ?></td>
                         
                       
                        <td><?php echo $post_date; ?></td>

                        <td>
                          <div class="text-center">
                              <a href="post.php?do=editPost&p_id=<?php echo $post_id; ?>"><i class="fa fa-edit"></i></a>
                              <a href="" data-toggle="modal" data-target="#deletePost<?php echo $post_id; ?>"><i class="fa fa-trash icon-mar"></i></a>
                          </div>
        
                        </td>
                    
                            <div class="modal fade" id="deletePost<?php echo $post_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are You sure to Delete this Post??</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <a href="post.php?do=deletePosts&d_id=<?php echo $post_id; ?>" type="button" class="btn btn-danger">Confirm</a>
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

          }
          else if($do=="addPost"){
            ?>
            <div class="card card-primary">
                <div class="card-header manageBack">
                  <h3 class="card-title">Add New Posts</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="post.php?do=insertPost" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="title" placeholder="Type Fullname" class="form-control" required="required" autocomplete="off">
                        </div>

                        <div class="form-group">
                          <label>category</label>
                          <select name="categoryp" class="form-control" required="required">
                            <option value="">Please Select Post category / subcategory</option>
                            <?php 
                            $fetchCategory="SELECT * FROM category WHERE parent_id=0 ORDER BY cat_name ASC";
                            $passfetchQ=mysqli_query($con,$fetchCategory);
                            while($row=mysqli_fetch_assoc($passfetchQ)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];                               
                                $cat_parent = $row['parent_id'];
                                ?>
                                <option value="<?php echo $cat_id; ?>"><?php echo $cat_name; ?></option>

                                <?php
                              $fetchsubCategory="SELECT * FROM category WHERE parent_id='$cat_id' ORDER BY cat_name ASC";
                              $passsubfetchQ=mysqli_query($con,$fetchsubCategory);
                              while($row=mysqli_fetch_assoc($passsubfetchQ)){
                                $cat_sub_id     = $row['cat_id'];
                                $cat_sub_name   = $row['cat_name'];           
                                $cat_sub_parent = $row['parent_id'];
                                ?>
                                <option value="<?php echo $cat_sub_id; ?>">---<?php echo $cat_sub_name; ?></option>
                             <?php
                              }

                            }

                             ?>
                          </select>
                        </div>
                          <div class="form-group">
                          <label>Status</label>
                          <select name="statuspost" class="form-control">
                            <option value="2">Please Select Post status</option>
                            <option value="1">Publish</option>
                            <option value="2">Draft</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Meta tags</label>
                        <input type="text" name="tags" data-role="tagsinput" class="form-control">
                        </div>
                         <div class="form-group">
                          <label>Thumbnail</label>
                          
                         <div class="customFile" data-controlMsg="Choose a file">
                            <span class="selectedFile">No thumbnail selected</span>
                            <input type="file" name="thumbnail"  class="widthPreview">
                        </div>
                        <div class="previewContainer">
                            <img class="preview" src="" alt="Image preview..." />
                        </div>

                          
                        </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="form-group">
                          <label>Post Description</label>
                          <textarea class="form-control formborder" rows="3" name="description"
                          required="required"></textarea>
                        </div>
                       
                          
                      </div>

                        
                      <div class="col-lg-12 text-center">
                         <input type="submit" name="addpost" value="Add Post" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
                      </div>
                      



                      </div>
                      

                    </div>
                  </form>
                </div>
              </div> 

           <?php
          }
          else if($do=="insertPost"){
            if(isset($_POST['addpost'])){
              $title           = mysqli_real_escape_string($con,$_POST['title']);
              $category_id     =$_POST['categoryp'];
              $status          =$_POST['statuspost'];
              $author_id       = $_SESSION['user_id'];
              $tags            =mysqli_real_escape_string($con,$_POST['tags']);
              $description     =mysqli_real_escape_string($con,$_POST['description']);
              $image=$_FILES['thumbnail']['name'];
              $image_tmp=$_FILES['thumbnail']['tmp_name'];

              $randnum=rand(0,999999);
              if(!empty($image)){
                $imageFile=$randnum . $image;
                move_uploaded_file($image_tmp, "dist/img/Posts/".$imageFile);
              }

              $postQuery="INSERT INTO posts(title,description,image,tags,category_id,author_id,status,post_date)VALUES('$title','$description','$imageFile','$tags','$category_id','$author_id','$status',now())";
              $passQueryP=mysqli_query($con,$postQuery);
               if($passQueryP){
                    header("Location: post.php?do=managePost");
                  }else{
                    die("operation failed" . mysqli_error($con));

                  }

            }
          }
          else if($do=="editPost"){
           if (isset($_GET['p_id'])) {
             $editPostid=$_GET['p_id'];
             $editQuery="SELECT * FROM posts WHERE post_id='$editPostid'";
             $passeditId=mysqli_query($con,$editQuery);
             while ($row=mysqli_fetch_array($passeditId)) {
                 $post_id          =$row['post_id'];
                 $title            =$row['title'];
                 $description      =$row['description'];
                 $image            =$row['image'];
                 $tags             =$row['tags'];
                 $status           =$row['status'];
                 $author_id        =$row['author_id'];
                 $category_id      =$row['category_id'];       
                 $post_date        =$row['post_date'];
                 ?>
              <div class="card card-primary">
                <div class="card-header manageBack">
                  <h3 class="card-title">Edit Post</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <form action="post.php?do=updatePost" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label>Post Title</label>
                          <input type="text" name="title" class="form-control" autocomplete="off" value="<?php echo $title; ?>">
                        </div>

                        <div class="form-group">
                          <label>category</label>
                          <select name="categoryp" class="form-control">
                            <option>Please Select Post category / subcategory</option>
                            <?php 
                            $fetchCategory="SELECT * FROM category WHERE parent_id=0 ORDER BY cat_name ASC";
                            $passfetchQ=mysqli_query($con,$fetchCategory);
                            while($row=mysqli_fetch_assoc($passfetchQ)){
                                $cat_id     = $row['cat_id'];
                                $cat_name   = $row['cat_name'];                               
                                $cat_parent = $row['parent_id'];
                                ?>
                                <option value="<?php echo $cat_id; ?>" <?php if($category_id==$cat_id){ echo 'selected'; } ?>><?php echo $cat_name; ?></option>

                                <?php
                              $fetchsubCategory="SELECT * FROM category WHERE parent_id='$cat_id' ORDER BY cat_name ASC";
                              $passsubfetchQ=mysqli_query($con,$fetchsubCategory);
                              while($row=mysqli_fetch_assoc($passsubfetchQ)){
                                $cat_sub_id     = $row['cat_id'];
                                $cat_sub_name   = $row['cat_name'];           
                                $cat_sub_parent = $row['parent_id'];
                                ?>
                                <option value="<?php echo $cat_sub_id; ?>" <?php if($category_id==$cat_sub_id){ echo 'selected'; }?>>---<?php echo $cat_sub_name; ?></option>
                             <?php
                              }

                            }

                             ?>
                          </select>
                        </div>
                          <div class="form-group">
                          <label>Status</label>
                          <select name="statuspost" class="form-control">
                            <option value="2">Please Select Post status</option>
                            <option value="1" <?php if($status==1){ echo 'selected';} ?>>Publish</option>
                            <option value="2" <?php if($status==2){ echo 'selected';} ?>>Draft</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Meta tags</label>
                        <input type="text" name="tags" data-role="tagsinput" class="form-control" value="<?php echo $tags; ?>">
                        </div>
                          <div class="form-group">
                            <label>Thumbnail</label><br>     
                              <div class="customFile" data-controlMsg="Choose a file">
                                <span class="selectedFile"><?php echo $image; ?></span>
                                  <input type="file" name="thumbnail"  class="widthPreview">
                              </div>
                                      
                              <div class="previewContainer">
                                  <?php
                                  if(!empty($image)){
                                  ?>
                                  <img src="dist/img/Posts/<?php echo $image; ?>" alt="borolox" width="100" class="preview">
                                 <?php
                                  }else{?>
                                 <img src="" alt="No Thumbnail Found" width="100" class="preview">
                                  <?php
                                    }

                                  ?>
                              </div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                         <div class="form-group">
                          <label>Post Description</label>
                          <textarea class="form-control formborder" rows="3" name="description"><?php echo $description; ?></textarea>
                        </div>
                       
                          
                      </div>

                        
                      <div class="col-lg-12 text-center">
                        <input type="hidden" name="updatedID" value="<?php echo $editPostid; ?>">
                         <input type="submit" name="updatePost" value="Save changes" class="btn btn-primary" style="padding: 10px 100px 10px 100px">
                      </div>
                      



                      </div>
                      

                    </div>
                  </form>
                </div>
              </div> 

                 <?php
             }
           }
          }
          else if($do=="updatePost"){
           if (isset($_POST['updatePost'])) {
             $updatedPostID       = $_POST['updatedID'];
             $title               = mysqli_real_escape_string($con,$_POST['title']);
             $category_id         =$_POST['categoryp'];
             $status              =$_POST['statuspost'];
             $tags                =mysqli_real_escape_string($con,$_POST['tags']);
             $description         =mysqli_real_escape_string($con,$_POST['description']);

             $image               =$_FILES['thumbnail']['name'];
             $image_tmp           =$_FILES['thumbnail']['tmp_name'];
              if(!empty($image)){
                  /*removing previous image from the folder*/
                  $removeImageQuery="SELECT * FROM posts WHERE post_id='$updatedPostID'";
                  $passRemoveImage=mysqli_query($con,$removeImageQuery);
                  while($row=mysqli_fetch_assoc($passRemoveImage)){
                    $r_Image=$row['image'];
                    unlink("dist/img/Posts/" . $r_Image);
                  }
                  /*removing previous image from the folder done*/

                  /*uploading new image with a unique number */
                  $randomNumber= rand(0,999999);
                 
                  $imageFile= $randomNumber . $image;
                  move_uploaded_file($image_tmp, "dist/img/Posts/" .$imageFile);

                  /*uploading new image with a unique number done*/

                  $upPostquery="UPDATE posts SET title='$title',description='$description',image='$imageFile',tags='$tags',category_id='$category_id',status='$status' WHERE post_id='$updatedPostID'";

                  $upPostsbabse=mysqli_query($con,$upPostquery);
                  if($upPostsbabse){
                    header("Location: post.php?do=managePost");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }
                }else if(empty($image)){
                    $upPostquery="UPDATE posts SET title='$title',description='$description',tags='$tags',category_id='$category_id',status='$status' WHERE post_id='$updatedPostID'";

                  $upPostsbabse=mysqli_query($con,$upPostquery);
                  if($upPostsbabse){
                    header("Location: post.php?do=managePost");
                  }else{
                    die("Operation failed" . mysqli_connect_error());
                  }
                }

                }
           }
          else if($do=="deletePosts"){
            if(isset($_GET['d_id'])){
              
             $deleteId= $_GET['d_id'];
             $deleteimageQuery="SELECT * FROM posts WHERE post_id='$deleteId'";
             $passDeleteQuery=mysqli_query($con,$deleteimageQuery);
             while($row=mysqli_fetch_assoc($passDeleteQuery)){
              $remove_image= $row['image'];
              unlink("dist/img/Posts/" . $remove_image);
             }
             $deletePostQuery="DELETE FROM posts WHERE post_id='$deleteId'";
             $passdeletePostQuery=mysqli_query($con,$deletePostQuery);
             if($passdeletePostQuery){
                header("Location: post.php?do=managePost");
              }else{
                die("Operation failed" . mysqli_connect_error());
                }
            }
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