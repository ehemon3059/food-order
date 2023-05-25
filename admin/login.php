<?php include('../config/constants.php'); ?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Rapido-admin-system</title>
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

            <h1 class="my-3 text-color text-center">Rapido Food Order System (Admin)</h1>
                <h2 class="my-3 text-color">Login Form</h2>


                <?php 
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
                ?>
                <br><br>

                <form method="POST">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username" id="floatingInput" placeholder="Username">
                        <label for="floatingInput">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
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
                                    

                   
                    <div class="form-check mb-3 text-right">
                    
                    
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

<?php 

    //CHeck whether the Submit Button is Clicked or NOt
    if(isset($_POST['submit_login']))
    {
        //Process for Login
        //1. Get the Data from Login form
        // $username = $_POST['username'];
        // $password = md5($_POST['password']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        
        $raw_password = md5($_POST['password']);
        $password = mysqli_real_escape_string($conn, $raw_password);

        //2. SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. Execute the Query
        $res = mysqli_query($conn, $sql);

        //4. COunt rows to check whether the user exists or not
     echo   $count = mysqli_num_rows($res);

        if($count==1)
        {
            //User AVailable and Login Success
           // $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
           echo '<script>alert("login successful.")</script>';
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it

            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/');
        }
        else
        {
            //User not Available and Login FAil
            echo '<script>alert("Username or Password did not match..")</script>';
            $_SESSION['login'] = "<div class='danger text-center'>Username or Password did not match.</div>";
            //REdirect to HOme Page/Dashboard
            header('location:'.SITEURL.'admin/login.php');
        }


    }

?>