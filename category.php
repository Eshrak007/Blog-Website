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
                            <li class="active">Blog</li>
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
                <div class="col-md-8">

                    <?php
                    if(isset($_GET['article'])){
                        $menuShow=$_GET['article'];
                        $menudataQuery="SELECT * FROM category WHERE cat_name='$menuShow'";
                        $passmenudataQuery=mysqli_query($con,$menudataQuery);
                        while($row=mysqli_fetch_assoc($passmenudataQuery)){
                          $cat_id     = $row['cat_id'];
                          $cat_name   = $row['cat_name'];
                          $cat_desc   = $row['cat_desc'];
                          $cat_parent = $row['parent_id'];
                          $cat_status = $row['cat_status'];  
                        } 
                    $postData="SELECT * FROM posts WHERE status=1 AND category_id='$cat_id' ORDER BY post_id DESC ";
                        $postQuery=mysqli_query($con,$postData);
                        $count=mysqli_num_rows($postQuery);

                        if($count!=0){
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

                                 <!-- Single Item Blog Post Start -->
                    <div class="blog-post">
                        <!-- Blog Banner Image -->
                        <div class="blog-banner">
                            <a href="single.php?article=<?php echo $title; ?>">
                                <?php 
                                    if(!empty($image)){
                                ?>
                                    <img src="my_admin/dist/img/Posts/<?php echo $image; ?>" alt="borolox">
                                <?php
                                    }else{
                                ?>
                                    <img src="my_admin/dist/img/Posts/avatar.jpg" alt="default image for rohinga">
                                <?php
                                }

                         ?>
                                <!-- Post Category Names -->
                                <div class="blog-category-name">
                                    <?php
                                        $showCat="SELECT * FROM category WHERE cat_id='$category_id'";
                                        $passshowCat=mysqli_query($con,$showCat);
                                        while($row=mysqli_fetch_assoc($passshowCat)){
                                            $showCatname=$row['cat_name'];
                                            ?>
                                            <h6><?php echo $showCatname; ?></h6>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                            </a>
                        </div>
                        <!-- Blog Title and Description -->
                        <div class="blog-description">
                            <a href="single.php?article=<?php echo $title; ?>">
                                <h3 class="post-title"><?php echo $title; ?></h3>
                            </a>
                            <div>
                                <?php echo substr($description,0,300)."..."; ?>
                            </div>
                            <!-- Blog Info, Date and Author -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="blog-info">
                                        <ul>
                                            <li><i class="fa fa-calendar"></i>
                                                <?php

                                                $post_join=date("j F,Y",strtotime($post_date));
                                                    echo $post_join;
                                                ?>
                                            </li>
                                            <li><i class="fa fa-user"></i>
                                                 <?php
                                                    $showauther="SELECT * FROM users WHERE user_id='$author_id'";
                                                    $passshowauther=mysqli_query($con,$showauther);
                                                    while($row=mysqli_fetch_assoc($passshowauther)){
                                                        $showauthername=$row['fullname'];
                                                       echo "Author- ". $showauthername;     
                                                    }
                                                ?>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-md-3 read-more-btn">
                                    <a type="button" href="single.php?article=<?php echo $title; ?>" class="btn-main" style="color: #fff;">Read More <i class="fa fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Item Blog Post End -->

                              <?php
                          }
                        }else{
                            echo '<div class="alert alert-info text-center">No Post found in this category.</div>';
                        }
                    }   
                     ?>

                    <!-- Blog Paginetion Design Start -->
                    <div class="paginetion">
                        <ul>
                            <!-- Next Button -->
                            <li class="blog-prev">
                                <a href=""><i class="fa fa-long-arrow-left"></i>  Previous</a>
                            </li>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href="">4</a></li>
                            <li><a href="">5</a></li>
                            <!-- Previous Button -->
                            <li class="blog-next">
                                <a href=""> Next <i class="fa fa-long-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- Blog Paginetion Design End -->               
                </div>

               <?php 
               include "inc/sidebar.php";

                ?>
            </div>
        </div>
    </section>
    <!-- ::::::::::: Blog With Right Sidebar End ::::::::: -->
    
<?php 
include "inc/footer.php";
 ?>


   