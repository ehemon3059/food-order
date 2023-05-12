<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user-email'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please login to access Admin Panel.</div>";
        //REdirect to Login Page
       // header('location:login.php');
      //  header("location:" . SITEURL .'login.php');
    //    echo "<script> window.location.href = 'http://localhost/food-order/login.php' <script>";


        echo "<script> window.location.href = 'http://localhost/food-order/login.php' </script>";
    }
