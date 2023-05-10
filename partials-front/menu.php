<?php include('config/constants.php');
 @$order_user =  $_SESSION['user-email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/admin.css"> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css"> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">


	<!-- ajax request -->
	<!-- <script src=" https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/dojo/1.16.4/dojo/dojo.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/mootools/1.6.0/mootools.min.js"></script>

	<script src="https://yui-s.yahooapis.com/3.18.1/build/yui/yui-min.js"></script> -->



</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>

                    <?php
                    if ($order_user) {
                    ?>

                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    <?php

                    }


                    ?>

                    <?php

                        
                    if ($order_user) {
                    ?>
                        <li>
                            <?php
                            
                       
                        ?>

                            <a href="order_status.php">Order status</a>

                        </li>

                    <?php

                    }

                    ?>

                    <?php
                    if ($order_user) {
                    ?>
                        <li>
                            <a href="logout.php">Logout</a>
                        </li>
                    <?php

                    } else {
                    ?>
                        <li>
                            <a href="login.php">Login</a>
                        </li>
                        <li>
                            <a href="signup.php">Signup</a>
                        </li>
                    <?php
                    }

                    ?>



                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->