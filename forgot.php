<?php  include('config/constants.php');
 print @$order_user =  $_SESSION['user-email'];


include_once("smtp_stable/class.phpmailer.php");
include_once("smtp_stable/class.smtp.php");



?>


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
                $_SESSION['message-user'] = "<div class='error text-center'>Email did not found.</div>";
                //REdirect to HOme Page/Dashboard
               // header('location:' . SITEURL . 'forgot.php');
               echo "<script> window.location.href = 'http://localhost/food-order/forgot.php' </script>";
            }
        }

        ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <style>
            .text-color{
                color: #597bf6;
                 padding-top: 10px;
                padding-bottom: 10px;
            }    
            .container {         
            height: 100vh;
            display: flex;
            align-items: center;        
            }
            .total-card{
                border: 1px solid #A0B2FA;
                border-radius: 10px ;
            }    
            
        </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center  total-card shadow">

            
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <h2 class="my-3 text-color">Forgot Password</h2>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="cus_email" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    
                    <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Please select one</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Secret</option>
                    </select> -->
                    
                    <!-- <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Accept our <a href="#">Terms And Conditions</a>
                        </label>
                    </div> -->

                    
                <?php
                if (isset($_SESSION['message-user'])) {
                    echo $_SESSION['message-user'];
                    unset($_SESSION['message-user']);
                }

                
                ?>
                    <input type="submit" class="btn btn-primary mb-3" name="submit" value="Reset Password">

                    <div class="form-check">
                        <label class="form-check-label" for="flexCheckDefault">Not a member ? <a href="<?php echo SITEURL; ?>signup.php" class="text-decoration-none">Sign Up</a>
                        </label>
                    </div>
                </form>

                

            </div>
            <div class="col-md-6 my-image ">
                <img class="img-fluid " src="/food-order/images/forgot.jpg" alt="">
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>

<!-- Created by Eh.Emon -->

