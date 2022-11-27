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
                            <b class="is-visible">Single Post page</b>
                            <b>Read Post. </b>
                            <b>Give a review. </b>
                        </span>
                    </h6>
                    <!-- Page Heading Breadcrumb Start -->
                    <nav class="page-breadcrumb-item">
                        <ol>
                            <li><a href="index.html">Home <i class="fa fa-angle-double-right"></i></a></li>
                            <li><a href="">Blog <i class="fa fa-angle-double-right"></i></a></li>
                            <!-- Active Breadcrumb -->
                            <li class="active">Single Right Sidebar</li>
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
                <!-- Blog Single Posts -->
                <div class="col-md-8">
                    <?php 

                    if(isset($_GET['article'])){
                        $showPosttitle= $_GET['article'];

                        $showQuery= "SELECT * FROM posts WHERE title='$showPosttitle'";
                        $passQuery=mysqli_query($con,$showQuery);
                        while($row=mysqli_fetch_assoc($passQuery)){
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
                        <div class="blog-single">
                        <!-- Blog Title -->
                            <h3 class="post-title"><?php echo $title; ?></h3>
                     
                        <!-- Blog Categories -->
                        <div class="single-categories">
                            <?php
                            $catQuery="SELECT * FROM category WHERE cat_id='$category_id'";
                            $passQuerycat=mysqli_query($con,$catQuery);
                            while($row=mysqli_fetch_assoc($passQuerycat)){
                                $showcatName=$row['cat_name'];
                                ?>

                                <span><?php echo $showcatName; ?></span>
                                <?php
                            }
                             
                            ?>
                            
                        </div>
                        
                        <!-- Blog Thumbnail Image Start -->
                        <div class="blog-banner">
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
                        </div>
                        <!-- Blog Thumbnail Image End -->

                        <!-- Blog Description Start -->
                       <div>
                           <?php echo $description; ?>
                       </div>
                        <!-- Blog Description End -->
                    </div>

                            <?php
                        }
                    }

                     ?>

                   

                    <!-- Single Comment Section Start -->
                    <div class="single-comments">
                        <!-- Comment Heading Start -->
                        <div class="row">
                            <div class="col-md-12">
                                <h4>All Latest Comments (3)</h4>
                                <div class="title-border"></div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                            </div>
                        </div>
                        <!-- Comment Heading End -->

                        <!-- Single Comment Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                                </div>
                            </div>

                            <div class="col-md-10 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <!-- Comment Box End -->
                            </div>
                        </div>
                        <!-- Single Comment Post End -->


                        <!-- Comment Reply Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2 offset-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-2.jpg">
                                </div>
                            </div>

                            <div class="col-md-8 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <!-- Comment Box Start -->
                            </div>
                        </div>
                        <!-- Comment Reply Post End -->

                        <!-- Single Comment Post Start -->
                        <div class="row each-comments">
                            <div class="col-md-2">
                                <!-- Commented Person Thumbnail -->
                                <div class="comments-person">
                                    <img src="assets/images/corporate-team/team-1.jpg">
                                </div>
                            </div>

                            <div class="col-md-10 no-padding">
                                <!-- Comment Box Start -->
                                <div class="comment-box">
                                    <div class="comment-box-header">
                                        <ul>
                                            <li class="post-by-name">Someone Special</li>
                                            <li class="post-by-hour">20 Hours Ago</li>
                                        </ul>
                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                                <!-- Comment Box Start -->
                            </div>
                        </div>
                        <!-- Single Comment Post End -->
                    </div>
                    <!-- Single Comment Section End -->

                    <?php 

                    if(!empty($_SESSION['user_id'])){?>

                        <!-- Post New Comment Section Start -->
                    <div class="post-comments">
                        <h4>Post Your Comments</h4>
                        <div class="title-border"></div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <!-- Form Start -->
                        <form action="" method="POST" class="contact-form">
                            <!-- Right Side Start -->
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Comments Textarea Field -->
                                    <div class="form-group">
                                        <textarea name="comments" class="form-input" placeholder="Your Comments Here..." required="required"></textarea>
                                        <i class="fa fa-pencil-square-o"></i>
                                    </div>
                                    <!-- Post Comment Button -->
                                    <button type="submit" name="commentSubmit" class="btn-main">Post Your Comment</button>
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </form>
                        <?php

                    if(isset($_POST['commentSubmit'])){
                     $userComments  =mysqli_real_escape_string($con,$_POST['comments']);

                     $commentId=$_SESSION['user_id'];
                     
                         if(isset($_GET['article'])){
                            $postname=$_GET['article'];
                            $commentQuery="SELECT * FROM posts WHERE title LIKE '%$postname%'";
                            $passcommentQuery=mysqli_query($con,$commentQuery);
                            while($row=mysqli_fetch_assoc($passcommentQuery)){
                                $commentPost_id=$row['post_id'];
                            } 
                        }
                        $commentInsert="INSERT INTO comments(post_id,user_id,cmt_description,cmt_date)VAlUES('$commentPost_id','$commentId','$userComments',now())";
                        $passcommentInsert=mysqli_query($con,$commentInsert);

                        if($passcommentInsert){
                            header("Location:single.php?article=$postname");
                        }else{
                            die("Operation failed.".mysqli_error($con));
                        }

                    }

                    ?>
                        <!-- Form End -->
                    </div>
                    
                    <!-- Post New Comment Section End -->

                  <?php  }else{?>
                             <div class="info text-center">
                                <button type="submit" data-toggle="modal" data-target="#loginUsers" class="btn-main">Want to Post a comment Then Login First</button>
                            </div>

                 <?php }


                     ?>
                                  
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