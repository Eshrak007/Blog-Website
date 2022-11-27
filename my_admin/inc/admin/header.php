<?php
   ob_start();
   session_start();
  include "inc/db.php";
  
if(empty($_SESSION['email']) && empty($_SESSION['user_id'])){
    header("Location:index.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Blog Website</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- for data table  -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- data table end --> 
<!-- tags input -->
  <link rel="stylesheet" type="text/css" href="dist/css/tagsinput.css">
  <!--uploader plugin start -->
<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="dist/css/jquery.mn-file.css" rel="stylesheet" type="text/css">
<style>

.previewContainer{text-align: center; margin-top:30px;}
.previewContainer img {border: 5px solid #FFF; box-shadow: 0 0 3px -1px rgba(0, 0, 0, 0.8); max-height: 100px;}
</style>
  <!--uploader plugin end -->
  <!-- password plugin -->
  <link rel="stylesheet" href="dist/css/passtrength.css">
  <!-- password plugin -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

     <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/mirlogo.png" alt="AdminLTELogo" height="60" width="80">
  </div>