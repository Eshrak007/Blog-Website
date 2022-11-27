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
          <div class="col-sm-12 col-md-6">
            <h1 class="m-0">Manage All Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item active">Manage All Category</li>
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
        <!-- add new  catagory start -->
        <div class="col-md-6">

        <!-- edit block start -->
       
        <?php
        
        if(isset($_GET['up_id'])){
          $updateCat=$_GET['up_id'];
          $updateDataQuery="SELECT * FROM category WHERE cat_id=$updateCat";
          $updateQueryPassing=mysqli_query($con,$updateDataQuery);

          while($row=mysqli_fetch_assoc($updateQueryPassing))
          {
              $cat_id     = $row['cat_id'];
              $cat_name   = $row['cat_name'];
              $cat_desc   = $row['cat_desc'];
              $cat_parent = $row['parent_id'];
              $cat_status = $row['cat_status'];

        ?>

          <div class="card card-primary">
            <div class="card-header edithead">
              <h3 class="card-title">Edit Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body cardcolor">
           
            <form action="" method="POST">

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control formborder" name="cat_name" autocomplete="off" value="<?php echo $cat_name; ?>">
              </div>

              <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control formborder" rows="3" name="description_edit"><?php echo $cat_desc; ?></textarea>
              </div>

              <div class="form-group">
                <label>category type</label>
                <select class="form-control custom-select formborder" name="parent_id">
                  <option value="0">Select catagory type</option>
                  <?php
                    $parent_read="SELECT * FROM category WHERE parent_id=0 ORDER BY cat_name ASC";
                    $read_query=mysqli_query($con,$parent_read);
                    
                    while($row=mysqli_fetch_assoc($read_query)){
                        $parent_cat_id=$row['cat_id'];
                        $parent_cat_name=$row['cat_name'];
                        ?>
                          <option value="<?php echo $parent_cat_id; ?>"<?php
                          
                          if($parent_cat_id==$cat_parent){
                            echo "selected";
                          }?>>
                          <?php echo $parent_cat_name; ?></option>   

                  <?php
                    }
                  ?>
               
                </select>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control custom-select formborder" name="cat_status">
                  <option value="0">Select Status</option>
                  <option value="1" <?php if($cat_status==1){echo "selected"; }?>>Active</option>
                  <option value="0" <?php if($cat_status==0){echo "selected"; }?>>Inactive</option>
            
                </select>
              </div>
              <div class="form-group text-center">
                    <input type="submit" name="save" value="Save Changes" class="btn btn-secondary">
              
              </div>
            
            </form>
           
            </div>
            <!-- /.card-body -->
          </div>

      <?php
          }

          if(isset($_POST['save'])){
            $up_cat_name      = mysqli_real_escape_string($con,$_POST['cat_name']);
            $up_cat_desc      = mysqli_real_escape_string($con,$_POST['description_edit']);
            $up_parent_id     = $_POST['parent_id'];
            $up_cat_status    = $_POST['cat_status'];

            $updateQuery="UPDATE category SET cat_name='$up_cat_name', cat_desc='$up_cat_desc', parent_id='$up_parent_id', cat_status='$up_cat_status' WHERE cat_id='$updateCat'";

            $update_cat=mysqli_query($con,$updateQuery);
 
            if($update_cat){ 
              header("Location: category.php");
            }else{
              die("operation failed.");
          }
          }
        
        }
        
      ?>
  
         <!-- edit block end -->

            <!-- add category start-->

          <div class="card card-primary">
            <div class="card-header colorRed">
              <h3 class="card-title">Add Category</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body cardcolor">
           
            <form action="" method="POST">

            <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control formborder" name="cat_name" autocomplete="off" required="required">
              </div>

              <div class="form-group">
                <label>Category Description</label>
                <textarea class="form-control formborder" rows="3" name="description"></textarea>
              </div>

              <div class="form-group">
                <label>category type</label>
                <select class="form-control custom-select formborder" name="parent_id">
                  <option value="0">Select catagory type</option>
                  <?php
                    $parent_read="SELECT * FROM category WHERE parent_id=0 ORDER BY cat_name ASC";
                    $read_query=mysqli_query($con,$parent_read);
                    
                    while($row=mysqli_fetch_assoc($read_query)){
                        $parent_cat_id=$row['cat_id'];
                        $parent_cat_name=$row['cat_name'];
                        ?>
                          <option value="<?php echo $parent_cat_id; ?>"><?php echo $parent_cat_name; ?></option>   

                        <?php
                    }
                  ?>
               
                </select>
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control custom-select formborder" name="cat_status">
                  <option value="0">Select Status</option>
                  <option value="1">Active</option>
                  <option value="0">Inactive</option>
            
                </select>
              </div>
              <div class="form-group text-center">
                    <input type="submit" name="add_cat" value="Add Category" class="btn btn-primary colorbutton">
              
              </div>
            
            </form>
           
            </div>
            <!-- /.card-body -->
          </div>
          <!-- add category end -->
          <!-- /.card -->
        </div>

        <?php
        
            if(isset($_POST['add_cat'])){

                $cat_name      = mysqli_real_escape_string($con,$_POST['cat_name']);
                $cat_desc      = mysqli_real_escape_string($con,$_POST['description']);
                $parent_id     = $_POST['parent_id'];
                $cat_status    = $_POST['cat_status'];

                $query="INSERT INTO category (cat_name, cat_desc, parent_id, cat_status) VALUES   ('$cat_name', '$cat_desc', '$parent_id', '$cat_status')";

                $addCat=mysqli_query($con,$query);

                if($addCat){ 
                    header("Location: category.php");
                }else{
                    die("operation failed.");
                }
            }
        
        ?>
        <!-- add new  catagory end -->

        <!-- manage category start -->
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header manageBack">
              <h3 class="card-title">Manage Category</h3>

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
                        <th>Category Name</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                    $query="SELECT * FROM category WHERE parent_id=0 ORDER BY cat_name ASC";
                    $read_data=mysqli_query($con,$query);
                    $i=0;
                    while($row=mysqli_fetch_assoc($read_data))
                    {
                        $read_data_id     = $row['cat_id'];
                        $read_data_name   = $row['cat_name'];
                        $read_data_desc   = $row['cat_desc'];
                        $read_data_parent = $row['parent_id'];
                        $read_data_status = $row['cat_status'];
                        $i++;
                        ?>

                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><span class="primary-highliter"><?php echo $read_data_name; ?></span></td>
                        <td>
                        <?php
                          echo '<span class="badge badge-success">Primary-category</span>';
                        ?>
                        
                        </td>
                        <td>
                        <?php
                          if($read_data_status==0){
                            echo '<span class="badge badge-dark">Inactive</span>';
                          }else if($read_data_status==1){
                            echo '<span class="badge badge-success">Active</span>';
                          }
                        ?>
                        </td>
                        <td>
                          <div class="text-center">
                              <a href="category.php?up_id=<?php echo $read_data_id;?>"><i class="fa fa-edit"></i></a>
                              <a href="#"><i class="fa fa-trash icon-mar"></i></a>
                          </div>
        
                        </td>
                      </tr>
                 <!-- for sub-category -->
                      <?php
                         $child_query="SELECT * FROM category WHERE parent_id='$read_data_id' ORDER BY cat_name ASC";
                         $read_child=mysqli_query($con,$child_query);
                         while($row=mysqli_fetch_assoc($read_child))
                         {
                             $child_data_id     = $row['cat_id'];
                             $child_data_name   = $row['cat_name'];
                             $child_data_desc   = $row['cat_desc'];
                             $child_data_parent = $row['parent_id'];
                             $child_data_status = $row['cat_status'];
                             $i++;
                             ?>
                              <!-- SUb-category html code -->
                              <tr>
                                <td><?php echo $i; ?></td>
                                <td>--<span class="secondary-highlight"><?php echo $child_data_name; ?></span></td>
                                <td>
                                <?php
                                  echo '<span class="badge badge-info">Sub-category</span>';
                                ?>
                                
                                </td>
                                <td>
                                <?php
                                  if($child_data_status==0){
                                    echo '<span class="badge badge-dark">Inactive</span>';
                                  }else if($child_data_status==1){
                                    echo '<span class="badge badge-success">Active</span>';
                                  }
                                ?>
                                </td>
                                <td>
                                  <div class="text-center">
                                      <a href="category.php?up_id=<?php echo $child_data_id; ?>"><i class="fa fa-edit"></i></a>
                                      
                                      <a href="#"><i class="fa fa-trash icon-mar"></i></a>
                                  </div>
                
                                </td>
                              </tr>


                             <?php
                         }
                        
                    }
                    ?>
                    </tbody>
                  </table>

            <!-- data table end -->
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div> 
        <!-- manage category end -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php
 
    include "inc/admin/footer.php";
 
 ?>