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

    <style>

        
select {
    padding: 10px;
    font-size: 16px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  
  option {
    padding: 10px;
    font-size: 16px;
    background-color: #fff;
    color: #333;
  }
  
  option:hover {
    background-color: #f2f2f2;
  }


  
        .services-container {
	
			display: grid;
            grid-template-columns: repeat(3,1fr);
            gap: 35px;
			justify-content: space-between;
			max-width: 1200px;
			margin: 0 auto;
			padding: 50px 20px;

		}

		.service {
			flex-basis: calc(25% - 20px);
			margin-bottom: 40px;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
			border-radius: 5px;
			text-align: center;
		}

		.service img {
			max-width: 100%;
			margin-bottom: 50px;
		}

		.service h2 {
			font-size: 24px;
			margin-bottom: 20px;
			margin-top:  45px;
		}




		.image-container {
		position: relative;
		/* width: 300px;
		height: 200px; */
		overflow: hidden;
		}

		.image-container img {
		display: block;
		width: 100%;
		height: auto;
		transition: transform 0.3s ease-out;
		}

		.image-container:hover img {
		transform: scale(1.2);
		}

		@media screen and (max-width: 576px) {
					.services-container{
						grid-template-columns: repeat(1,1fr);
					}
					
        }@media screen and (min-width:577px) and (max-width:992px) {
            .services-container{
                 grid-template-columns: repeat(2,1fr);
            }
        }

    </style>

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
                    <li>
                        <a href="<?php echo SITEURL; ?>service_area.php">Service Area</a>
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