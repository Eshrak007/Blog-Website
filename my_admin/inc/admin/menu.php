  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard.php" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">My Blog Website</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
     

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
         
          <li class="nav-header">Blog Functionalities</li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Catagory</p>
                </a>
              </li>
             
              
            </ul>
          </li>
           <li class="nav-item">
            <a href="post.php?do=managePost" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Post
              </p>
            </a>
        </li>
          <?php 
              if($_SESSION['user_role']==1){
              ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Users
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users.php?do=Manage" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users.php?do=Add" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Users</p>
                </a>
              </li>
            </ul>
          </li>

              <?php
              }

           ?>
 <li class="nav-header">Profile options</li>
         <li class="nav-item">
            <a href="profile.php?do=View" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Profile
              </p>
            </a>
        </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>