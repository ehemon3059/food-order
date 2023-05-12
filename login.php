<?php include('partials-front/menu.php');

?>


<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Login Form</h2>

      

        <form action="" method="POST" class="order" id="alert_box">


            <fieldset>
                <legend>fill the information</legend>
                <div class="order-label">Email</div>
                <input type="text" name="cus_email" placeholder="Enter Your Email" class="input-responsive" required>



                <div class="order-label">Password</div>
                <input type="password" name="cus_password" placeholder="Enter Your Password" class="input-responsive" required>

                <?php
                
        
                if (isset($_SESSION['login-unsuccess'])) {
                    echo $_SESSION['login-unsuccess'];
                    unset($_SESSION['login-unsuccess']);
                }
                if (isset($_SESSION['pws-warning-msg'])) {
                    echo $_SESSION['pws-warning-msg'];
                    unset($_SESSION['pws-warning-msg']);
                }
                
                ?>

                <div class="signup-link"> <a class="signup-link" href="<?php echo SITEURL; ?>forgot.php">Forgot Password?</a></div>


                <input type="submit" name="submit" value="LOGIN" class="btn btn-primary">


                <div class="signup-link">Not a member ? <a class="signup-link" href="<?php echo SITEURL; ?>signup.php">Signup</a></div>
            </fieldset>


        </form>

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) {

            //Process for Login
            //1. Get the Data from Login form

            $cus_email = mysqli_real_escape_string($conn, $_POST['cus_email']);

            $cus_password = md5($_POST['cus_password']);

            $password = mysqli_real_escape_string($conn, $cus_password);

            //2. SQL to check whether the user with username and password exists or not
            $sql = "SELECT * FROM `customer_info` WHERE `cus_email`='$cus_email' AND `cus_password`='$password'";


            //3. Execute Query 
            $res = mysqli_query($conn, $sql);

            //4. Count rows to check whether the user exists or not
               $count = mysqli_num_rows($res);




            if ($count == 1) {
                //User AVailable and Login Success
                $_SESSION['login-success'] = "<div class='success text-center' >Login successfull</div>";;
        
                $_SESSION['user-email'] = $cus_email; //TO check whether the user is logged in or not and logout will unset it

                //REdirect to HOme Page/Dashboard
              //  header('location:' . SITEURL . 'order.php/');
                echo "<script> window.location.href = 'http://localhost/food-order/' </script>";
            } else {
                //User not Available and Login FAil
                $_SESSION['login-unsuccess'] =  "<div class=' text-center' style='color:red;'>Username or Password did not match.</div>";
    
                 
                
                //REdirect to HOme Page/Dashboard
              //  header('location:' . SITEURL . 'login.php');
                echo "<script> window.location.href = 'http://localhost/food-order/login.php' </script>";
            }
        }

        ?>

    </div>
</section>

<?php include('partials-front/footer.php'); ?>