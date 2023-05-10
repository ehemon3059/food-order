<?php include('partials-front/menu.php');

include_once("smtp_stable/class.phpmailer.php");
include_once("smtp_stable/class.smtp.php");


            if(isset($_GET['email']))
            {
               echo $email=$_GET['email'];
            }
        ?>




<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Reset Password </h2>

        <form action="" method="POST" class="order">


            <fieldset>
                <legend>fill the information</legend>

                <div class="order-label">Password</div>
                <input type="password" name="cus_pass" placeholder="Enter Your New Password" class="input-responsive" required>


                <div class="order-label">Confirm Password</div>
                <input type="password" name="cus_con_psw" placeholder="Enter Your Confirm Password" class="input-responsive" required>




                <?php
                if (isset($_SESSION['pws-warning-msg'])) {
                    echo $_SESSION['pws-warning-msg'];
                    unset($_SESSION['pws-warning-msg']);
                }
                
                
                ?>

                <input type="submit" name="submit" value="Reset Password" class="btn btn-primary">


                <div class="signup-link">Not a member ? <a class="signup-link" href="<?php echo SITEURL; ?>signup.php">Signup</a></div>
            </fieldset>


        </form>

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) {


            

            //Process for Login
            //1. Get the Data from Login form
          

            $cus_psw = mysqli_real_escape_string($conn, md5($_POST['cus_pass']));
            $cus_con_psw = mysqli_real_escape_string($conn, md5($_POST['cus_con_psw']));

          


            if($cus_psw == $cus_con_psw){


                //Update Password 

                // $sql = "UPDATE `cus_password` FROM `customer_info` WHERE `cus_email` = '$email' ";
                print $sql = "UPDATE `customer_info` SET `cus_password` = '$cus_con_psw' WHERE `cus_email`= '$email'";
                 $res = mysqli_query($conn,$sql);

                 if($res == true){
                    echo '<script>alert("Password Update Successful Please login.")</script>';

                    $_SESSION['pws-warning-msg'] = "<div class='success'>Password Update Successful Please login.</div>";
                  //  header('location:' . SITEURL . 'login.php');
                  echo "<script> window.location.href = 'http://localhost/food-order/login.php' </script>";
                  header("Refresh:0");
                 }


               


            }else{
                $_SESSION['pws-warning-msg'] = "<div class='error'>Password and confirm password does not match</div>";
                header("Refresh:0");

            }



            // //2. SQL to check whether the user with username and password exists or not
            // $sql = "SELECT * FROM `customer_info` WHERE `cus_email`='$cus_email'";


            // //3. Execute Query 
            // $res = mysqli_query($conn, $sql);

            // //4. Count rows to check whether the user exists or not
            // echo   $count = mysqli_num_rows($res);




            // if ($count == 1) {
            //     //User AVailable and Login Success
            //     $_SESSION['pws-warning-msg'] = "<div class='success'>Login Successful.</div>";
            //     $_SESSION['user-email'] = $cus_email; //TO check whether the user is logged in or not and logout will unset it

                

            //     //REdirect to HOme Page/Dashboard
            //     header('location:' . SITEURL . 'order.php/');
            // } else {
            //     //User not Available and Login FAil
            //     $_SESSION['user-login'] = "<div class=' text-center'>Email did not match.</div>";
            //     //REdirect to HOme Page/Dashboard
            //     header('location:' . SITEURL . 'forgot.php');
            // }
        }

        ?>

    </div>
</section>

<?php include('partials-front/footer.php'); ?>