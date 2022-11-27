<?php

    $con = mysqli_connect("localhost","root","","blogwebsite");

    if($con){
        //echo "connected";
    }
    else{
        die("connection failed." . mysqli_error($con));
    }


?>
