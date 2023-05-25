<?php include('config/constants.php');






        //CHeck whether submit button is clicked or not
        if (isset($_POST['submit_login'])) {

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
                echo '<script>alert("login successful.")</script>';
                //REdirect to HOme Page/Dashboard
              //  header('location:' . SITEURL . 'order.php/');
                echo "<script> window.location.href = 'http://localhost/food-order/' </script>";
            } else {
                //User not Available and Login FAil
            
              
    
                 
                echo '<script>alert("Your entered login information incorrect")</script>';
                //REdirect to HOme Page/Dashboard
              //  header('location:' . SITEURL . 'login.php');
                echo "<script> window.location.href = 'http://localhost/food-order/login.php' </script>";
            }
        }

        

?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rapido | Login</title>
  <!-- //  <link rel="shortcut icon" type="image/png" href="/images/favIcon.png"> -->


    <link rel="shortcut icon" type="image/jpg" href="/images/favIcon.png"/>

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
                <h2 class="my-3 text-color">Login Form</h2>
                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="cus_email" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="cus_password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                    
                    <!-- <select class="form-select mb-3" aria-label="Default select example">
                        <option selected>Please select one</option>
                        <option value="1">Male</option>
                        <option value="2">Female</option>
                        <option value="3">Secret</option>
                    </select>
                     -->



                    <div class="col-md-12 text-center">

                        <input type="submit"  name="submit_login"class="btn btn-primary mb-2 center" value="Login">
                    </div>
                                    

                    <div class="form-check">
                        <label class="form-check-label" for="flexCheckDefault">
                            Don't have an account? <a href="<?php echo SITEURL; ?>signup.php" class="text-decoration-none">Sign Up</a>
                        </label>
                    </div>
                    <div class="form-check mb-3 text-right">
                    
                    <label class="form-check-label" for="flexCheckDefault">
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo SITEURL; ?>forgot.php" class="text-decoration-none ">Forgot your Password?</a>
                    </label>
                </div>

                </form>

                    
             
                

            </div>
            <div class="col-md-6 my-image ">
                <img class="img-fluid " src="/food-order/images/login.jpg" alt="">
            </div>
        </div>
    </div>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>

</html>
