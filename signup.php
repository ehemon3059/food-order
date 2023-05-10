<?php include('partials-front/menu.php'); ?>

<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Signup Form</h2>

        <form action="" method="POST" class="order">


            <fieldset>
                <legend>fill the information</legend>
                <div class="order-label">First Name</div>
                <input type="text" name="first_name" placeholder="First Name" class="input-responsive" required>

                <div class="order-label">Last Name</div>
                <input type="text" name="last_name" placeholder="Last Name" class="input-responsive" required>


                <div class="order-label">Email</div>
                <input type="email" name="cus_email" placeholder="Email" class="input-responsive" required>



                <div class="order-label">Password</div>
                <input type="password" name="cus_password" placeholder="Password" class="input-responsive" required>

                <div class="order-label">Confirm Password</div>
                <input type="password" name="confirm_pass" placeholder="Confirm Password" class="input-responsive" required>




                <?php
                
        
                if (isset($_SESSION['signup'])) {
                    echo $_SESSION['signup'];
                    unset($_SESSION['signup']);
                }
                
                ?>

                <input type="submit" name="submit" value="Signup" class="btn btn-primary">


                <div class="signup-link">Already have an account ? <a class="signup-link" href="<?php echo SITEURL; ?>login.php">Login</a></div>
            </fieldset>


        </form>

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) if(isset($_POST['submit']))
    
        {
    
            //1. Get the Data from form
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $cus_email = $_POST['cus_email'];

            $cus_password = md5($_POST['cus_password']);
            $confirm_pass = md5($_POST['confirm_pass']);
   
    
           if($cus_password == $confirm_pass){


                //2.to check already user exist or not 
                $query1 = "SELECT * FROM `customer_info` WHERE `cus_email` = '$cus_email'";
    
                // Execute query
                $result = mysqli_query($conn, $query1);
        
                // Check if any rows were returned
                if (mysqli_num_rows($result) > 0) {
                // User already exists
        
                $_SESSION['signup'] = "<div class='error'>User already exists with this Email.</div>";
                //header("location:" . SITEURL . 'signup.php');
                echo "<script> window.location.href = 'http://localhost/food-order/signup.php' </script>";
                } else {
        
                    // User does not exist
                    // Proceed with signup process `first_name``last_name``cus_email``cus_password`
        
                    //3. SQL Query to Save the data into database
                    $sql = "INSERT INTO customer_info SET 
                        first_name='$first_name',
                        last_name='$last_name',
                        cus_email='$cus_email',
                        cus_password='$confirm_pass'
                    
                    ";
        
                    //3. Executing Query and Saving Data into Database
                    $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
                    //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
                    if ($res == TRUE) {
                        //Data Inserted
                        //echo "Data Inserted";
                        //Create a Session Variable to Display Message
                        $_SESSION['signup'] = "<div class='success'>Account create Successfully.</div>";
                        echo '<script>alert("Account create Successfully.")</script>';
                        //Redirect Page to Manage Admin
                      //  header("location:" . SITEURL .'signup.php');
                      echo "<script> window.location.href = 'http://localhost/food-order/signup.php' </script>";
                    } else {
                        //FAiled to Insert DAta
                        //echo "Faile to Insert Data";
                        //Create a Session Variable to Display Message
                        $_SESSION['signup'] = "<div class='error'>Failed to create Account.</div>";
                        echo '<script>alert("Failed to create Account.")</script>';
                        //Redirect Page to Add Admin
                     //   header("location:" . SITEURL .'signup.php');
                     echo "<script> window.location.href = 'http://localhost/food-order/signup.php' </script>";
                    }
        
                }
            }else{
                $_SESSION['signup'] = "<div class='error'>password and confirm password did not match.</div>";
               // header("location:" . SITEURL .'signup.php');
               echo "<script> window.location.href = 'http://localhost/food-order/signup.php' </script>";
            }
    
    
    
    
            
    
        }

        ?>

    </div>
</section>

<?php include('partials-front/footer.php'); ?>