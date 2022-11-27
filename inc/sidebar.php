 <!-- Blog Right Sidebar -->
<div class="col-md-4">
    <!-- Latest News -->
    <div class="widget">
        <h4>Latest News</h4>
        <div class="title-border"></div>
        
        <!-- Sidebar Latest News Slider Start -->
        <div class="sidebar-latest-news owl-carousel owl-theme">
            <?php 
            $newsQuery="SELECT * FROM posts ORDER BY post_id DESC LIMIT 3";
            $passnewsQuery=mysqli_query($con,$newsQuery);
            while($row=mysqli_fetch_assoc($passnewsQuery)){
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
            <!--Latest News Start -->
            <div class="item">
                <div class="latest-news">
                    <!-- Latest News Slider Image -->
                    <div class="latest-news-image">
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
                        </a>
                    </div>
                    <!-- Latest News Slider Heading -->
                    <h5><a href="single.php?article=<?php echo $title; ?>"><?php echo $title; ?></a></h5>
                    <!-- Latest News Slider Paragraph -->
                    
                       <div>
                        <?php echo substr($description,0,130)."... ..." ; ?></div>
                    
                </div>
            </div>
            <!--Latest News End -->
                <?php
            }

            ?>
          

        </div>
        <!-- Sidebar Latest News Slider End -->
    </div>


    <!-- Search Bar Start -->
    <div class="widget"> 
            <!-- Search Bar -->
            <h4>Blog Search</h4>
            <div class="title-border"></div>
            <div class="search-bar">
                <!-- Search Form Start -->
                <form action="search.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="search" placeholder="Search Here" autocomplete="off" class="form-input">
                        <i class="fa fa-paper-plane-o"></i>
                    </div>
                </form>
                <!-- Search Form End -->
            </div>
    </div>
    <!-- Search Bar End -->

    <!-- Recent Post -->
    <div class="widget">
        <h4>Recent Posts</h4>
        <div class="title-border"></div>
        <div class="recent-post">
            <?php 

            $recentp="SELECT * FROM posts WHERE status=1 ORDER BY post_id DESC LIMIT 4";
            $passrecentp=mysqli_query($con,$recentp);
            $countrecent=mysqli_num_rows($passrecentp);
            if($countrecent!=0){
                 while($row=mysqli_fetch_assoc($passrecentp)){
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

                      <!-- Recent Post Item Content Start -->
            <div class="recent-post-item">
                <div class="row">
                    <!-- Item Image -->
                    <div class="col-md-4">
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
                    <!-- Item Tite -->
                    <div class="col-md-8 no-padding">
                        <a href="single.php?article=<?php echo $title; ?>"><h5><?php echo $title?></h5></a>
                        <ul>
                            <li><i class="fa fa-clock-o"></i>
                                <?php 
                             echo $post_date;
                                ?>
                            </li>
                            <li><i class="fa fa-comment-o"></i>15</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Post Item Content End -->


                    <?php
                 }
            }
           
            ?>
     

        </div>
    </div>

    <!-- All Category -->
    <div class="widget">
        <h4>Blog Categories</h4>
        <div class="title-border"></div>
        <!-- Blog Category Start -->
        <div class="blog-categories">
            <ul>
                <?php 
                $catquery="SELECT * FROM category WHERE parent_id=0 AND cat_status=1 ORDER BY cat_name ASC";
                $passcatquery=mysqli_query($con,$catquery);
                $i=0;
                while ($row=mysqli_fetch_assoc($passcatquery)) {
                    $maincat_id     = $row['cat_id'];
                    $maincat_name       = $row['cat_name'];
                    $maincat_desc       = $row['cat_desc'];
                    $maincat_parent     = $row['parent_id'];
                    $maincat_status     = $row['cat_status'];
                    $i++;
                    ?>
                    <li>
                    <i class="fa fa-check"></i>
                    <?php echo $maincat_name; ?> 
                    <span>
                        <?php
                        $postQuery="SELECT * FROM posts WHERE category_id='$maincat_id'";
                        $passpostQuery=mysqli_query($con,$postQuery);
                        $countcat=mysqli_num_rows($passpostQuery);
                        echo $countcat;
                        ?>
                    </span>
                </li>
                    <?php
                    $subcatQuery="SELECT * FROM category WHERE parent_id='$maincat_id' AND cat_status=1 ORDER BY cat_name ASC";
                    $passSubcatquery=mysqli_query($con,$subcatQuery);
                
                    while ($row=mysqli_fetch_assoc($passSubcatquery)) {
                        $subcat_id     = $row['cat_id'];
                        $subcat_name   = $row['cat_name'];
                        $subcat_desc   = $row['cat_desc'];
                        $subcat_parent = $row['parent_id'];
                        $subcat_status = $row['cat_status'];
                        $i++;
                        ?>
                        <li>
                            <i class="fa fa-square" style="margin-left: 20px;"></i>
                            <?php echo $subcat_name; ?> 
                        <span>
                            <?php
                            $subPostquery="SELECT * FROM posts WHERE category_id='$subcat_id'";
                            $passSubpostquery=mysqli_query($con,$subPostquery);
                            $countsubcat=mysqli_num_rows($passSubpostquery);
                            echo $countsubcat;
                            ?>
                        </span>
                       </li>

                        <?php

                    }

                }



                ?>
               
                
            </ul>
        </div>
        <!-- Blog Category End -->
    </div>

    <!-- Recent Comments -->
    <div class="widget">
        <h4>Recent Comments</h4>
        <div class="title-border"></div>
        <div class="recent-comments">
            
            <!-- Recent Comments Item Start -->
            <div class="recent-comments-item">
                <div class="row">
                    <!-- Comments Thumbnails -->
                    <div class="col-md-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <!-- Comments Content -->
                    <div class="col-md-8 no-padding">
                        <h5>admin on blog posts</h5>
                        <!-- Comments Date -->
                        <ul>
                            <li>
                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Comments Item End -->

            <!-- Recent Comments Item Start -->
            <div class="recent-comments-item">
                <div class="row">
                    <!-- Comments Thumbnails -->
                    <div class="col-md-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <!-- Comments Content -->
                    <div class="col-md-8 no-padding">
                        <h5>admin on blog posts</h5>
                        <!-- Comments Date -->
                        <ul>
                            <li>
                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Comments Item End -->

            <!-- Recent Comments Item Start -->
            <div class="recent-comments-item">
                <div class="row">
                    <!-- Comments Thumbnails -->
                    <div class="col-md-4">
                        <i class="fa fa-comments-o"></i>
                    </div>
                    <!-- Comments Content -->
                    <div class="col-md-8 no-padding">
                        <h5>admin on blog posts</h5>
                        <!-- Comments Date -->
                        <ul>
                            <li>
                                <i class="fa fa-clock-o"></i>Dec 15, 2018
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Recent Comments Item End -->

        </div>
    </div>

    <!-- Meta Tag -->
    <div class="widget">
        <h4>Tags</h4>
        <div class="title-border"></div>
        <!-- Meta Tag List Start -->
        <div class="meta-tags">
            <?php 

            $tagQuery="SELECT * FROM posts ORDER BY post_id DESC LIMIT 10";
            $passtagQuery=mysqli_query($con,$tagQuery);
            while($row=mysqli_fetch_assoc($passtagQuery)){
                $alltag=$row['tags'];

                $tags=explode(",",$alltag);
                foreach($tags as $tag){
                    ?>
                    <a href="search.php?searchtags=<?php echo $tag; ?>"><span><?php echo $tag; ?></span></a>
                    <?php
                }
            }


             ?>
          
                     
        </div>
        <!-- Meta Tag List End -->
    </div>

</div>
<!-- Right Sidebar End -->