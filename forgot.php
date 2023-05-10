<?php include('partials-front/menu.php');

include_once("smtp_stable/class.phpmailer.php");
include_once("smtp_stable/class.smtp.php");



?>


<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Forgot Password </h2>

        <form action="" method="POST" class="order">


            <fieldset>
                <legend>fill the information</legend>
                <div class="order-label">Email</div>
                <input type="text" name="cus_email" placeholder="Enter Your Email" class="input-responsive" required>




                <?php
                if (isset($_SESSION['message-user'])) {
                    echo $_SESSION['message-user'];
                    unset($_SESSION['message-user']);
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

            $cus_email = mysqli_real_escape_string($conn, $_POST['cus_email']);



            //2. SQL to check whether the user with username and password exists or not
            $sql = "SELECT * FROM `customer_info` WHERE `cus_email`='$cus_email'";


            //3. Execute Query 
            $res = mysqli_query($conn, $sql);

            //4. Count rows to check whether the user exists or not
            echo   $count = mysqli_num_rows($res);




            if ($count == 1) {
                //User AVailable and Login Success
              //  $_SESSION['user-login'] = "<div class='success'>Login Successful.</div>";
              //  $_SESSION['user-email'] = $cus_email; //TO check whether the user is logged in or not and logout will unset it

                try {


                    $from  = "ismatara2050@gmail.com";
                    $namefrom = "Eh.Emon";
                    $mail = new PHPMailer();
                    $mail->SMTPDebug = 0;
                    $mail->CharSet = 'UTF-8';
                    $mail->isSMTP();
                    $mail->SMTPAuth   = true;
                    $mail->Host   = "smtp.gmail.com";
                    $mail->Port       = 587;
                    $mail->Username   = "ismatara2050@gmail.com";
                    $mail->Password   = "aswulfhqeojpvzwg";
                    $mail->SMTPSecure = "tls";
                    $mail->setFrom($from, $namefrom);
                    $mail->addCC('Password Recovery');
                    $mail->addAddress($cus_email);

                    $mail->isHTML(TRUE);

                    $mail->Subject = 'Reset Password';
                    $mail->Body = '
                            <p>Dear Sir...</p>
                            <h3 style="font-size: 20px; text-decoration: none">Forgot Your Password?</h3>
                            
                            <p>We have sent you this email in response to your request to reset your password on www.ehemon.com. </p>
                            
                            <p>To reset your password, Please Click the Reset Password Button Link.</p>
                        
                            <a style="background-color: #4CAF50;border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;" href="http://localhost/food-order/reset_password.php?email='.$cus_email.'" target="_blank" class="button">Reset Password</a>';

                    $mail->send();

                    $_SESSION['message-user'] = "<div class='success text-center' >We have send you the reset link in your e-mail ID, Please check your e-mail Inbox.</div>";

                     //echo ('We have send you the reset link in your e-mail ID, Please check your e-mail Inbox');
                     $_SESSION['current-author'] = $cus_email;
                } catch (Exception $e) {
                    echo ( 'something went wrong please try again later');
                }
                echo '<script>alert("We have send you the reset link in your e-mail ID, Please check your e-mail Inbox.")</script>';
                //REdirect to HOme Page/Dashboard
              //  header('location:' . SITEURL . 'forgot.php');
              echo "<script> window.location.href = 'http://localhost/food-order/forgot.php' </script>";
            } else {
                //User not Available and Login FAil
                $_SESSION['message-user'] = "<div class='error text-center'>Email did not match.</div>";
                //REdirect to HOme Page/Dashboard
               // header('location:' . SITEURL . 'forgot.php');
               echo "<script> window.location.href = 'http://localhost/food-order/forgot.php' </script>";
            }
        }

        ?>

    </div>
</section>

<?php include('partials-front/footer.php'); ?>