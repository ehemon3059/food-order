<?php include('config/constants.php');


?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapido | Signup</title>
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
                <h2 class="my-3 text-color">Signup Form</h2>

                
                <?php
                    if (isset($_SESSION['signup'])) {
                        $signup_message = $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        $alert_type = "danger"; // can be set to "success", "info", "warning", or "danger"
                        ?>
                        <div class="alert alert-<?php echo $alert_type; ?> alert-dismissible fade show" role="alert">
                            <?php echo $signup_message; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                    }
                    ?>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" name="first_name" class="form-control" id="floatingInput" placeholder="First Name" required>
                        <label for="floatingInput">First Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="last_name" class="form-control" id="floatingInput" placeholder="Last Name" required>
                        <label for="floatingInput">Last Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" name="cus_email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                        <label for="floatingInput">Email</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="cus_password" class="form-control" id="floatingInput" placeholder="Password" required>
                        <label for="floatingInput">Password</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" name="confirm_pass" class="form-control" id="floatingInput" placeholder="Confirm Password" required>
                        <label for="floatingInput">Confirm Password</label>
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
                    <input type="submit" name="submit" class="btn btn-primary mb-3" value="Sign Up">


                    <!-- <div class="alert alert-danger" role="alert"> -->






                    <div class="form-check">
                        <label class="form-check-label" for="flexCheckDefault">Already have an account  ? <a href="<?php echo SITEURL; ?>login.php" class="text-decoration-none">Login</a>
                        </label>
                    </div>
                </form>

                

            </div>
            <div class="col-md-6 my-image ">
                <img class="img-fluid " src="/food-order/images/sign-up.jpg" alt="">
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>

<!-- Created by Eh.Emon -->

        <?php

        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit'])) 
    
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

