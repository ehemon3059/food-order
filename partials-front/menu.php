<?php include('config/constants.php');
  @$order_user =  $_SESSION['user-email'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapido | Food and Beverage</title>
    <!-- <link rel="shortcut icon" type="image/jpg" href="/images/icon.png"/> -->
	<link rel="icon" href="/images/icon.jpg" type="image/x-icon">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
   


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css"> -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>


    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

	
     <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"> -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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



				body {
				font-family: Arial, sans-serif;
				margin: 0;
				padding: 0;
			}
			.cart {
				display: flex;
				align-items: center;
				max-width: 505px;
				margin: 0 auto;
				padding: 15px;
				margin-bottom: 35px;
				margin-top: 20px;
				border: 1px solid #A0B2FA;
				border-radius: 10px ;
				/* box-shadow: 0 2px 2px rgba(0,0,0,0.3); */
				box-shadow: 0 .5rem 1rem rgba(0,0,0,.13);
				transition: box-shadow 0.3s ease-in-out;
			}

			.cart:hover {
				box-shadow: 0 4px 8px rgba(0,0,0,0.3);
			}

			.cart img {
				height: 120px;
				width: 120px;
				margin-right: 30px;
				object-fit: cover;
				border-radius: 10px;
				
			}

			.cart-info {
				flex: 1;
				display: flex;
				flex-direction: column;
				align-items: center;
				justify-content: space-between;
			}

			.cart-title {
				font-size: 20px;
				font-weight: bold;
				margin-bottom: 10px;
			}

			.cart-price {
				font-size: 16px;
				color: #888;
				margin-bottom: 10px;
				
			}

			.cart-quantity {
				display: flex;
				align-items: center;
			}

			.cart-quantity-label {
				font-size: 16px;
				margin-right: 10px;
			}

			.cart-quantity-input {
				padding: 5px;
				width: 50px;
				text-align: center;
				border: 1px solid #ccc;
				border-radius: 3px;
				outline: none;
				margin-bottom: 20px
			}

			.cart-remove {
				display: inline-block;
				background-color: #fa5050;
				color: #fff;
				padding: 5px 10px;
				border-radius: 3px;
				cursor: pointer;
				border: 1px solid #969494;
			}

			.cart-remove:hover {
				background-color: #a80606;
			}

			.container-003 {
				max-width: 600px;
				margin: 30px auto;
				padding: 20px;
				box-shadow: 0 2px 2px rgba(0,0,0,0.3);
				transition: box-shadow 0.3s ease-in-out;
			}

			.container-003:hover {
				box-shadow: 0 4px 8px rgba(0,0,0,0.3);
			}

			h1 {
				font-size: 24px;
				font-weight: bold;
				margin-bottom: 20px;
				text-align: center;
			}

			.cart-empty-03 {
				font-size: 16px;
				text-align: center;
				color: #999;
			}

			@media only screen and (max-width: 600px) {
				.container-003 {
					max-width: 100%;
					padding: 10px;
				}
			}

			.container_order_form {
				display: flex;
				flex-direction: column;
				max-width: 500px;  

				margin-top: 50px;

				margin-left: auto;
				margin-right: auto;
				margin-bottom: 50px;
				padding: 20px;
				box-shadow: 0 2px 2px rgba(0,0,0,0.3);
				transition: box-shadow 0.3s ease-in-out;
			}

			.container_order_form:hover {
				box-shadow: 0 4px 8px rgba(0,0,0,0.3);
			}

			.confirm_order_h1 {
				font-size: 24px;
				font-weight: bold;
				margin-bottom: 20px;
				text-align: center;
			}

			

			label {
				font-size: 16px;
				margin-bottom: 5px;
				font-weight: bold;
			}

			.input_form{
				padding: 10px;
				border: 1px solid #ccc;
				border-radius: 5px;
				margin-bottom: 15px;
				font-size: 16px;
				outline: none;
			}

			#select_location {
				-webkit-appearance: none;
				-moz-appearance: none;
				appearance: none;
				background-image: url("arrow.svg");
				background-repeat: no-repeat;
				background-position: right 10px center;
				background-size: 12px 12px;
				padding-right: 25px;
			}

			#text_area_box {
				resize: vertical;
				min-height: 100px;
			}



			@media only screen and (max-width: 600px) {
				.container_order_form {
					max-width: 100%;
					padding: 10px;
				}
			}

		/* footer css start  */
		.custom-footer {

			height: 28rem;
			width: 100%;
			background-color: #5256A5;
			clear: both;
		
		}
		.address-text {
			padding-top: 50px;
			text-align: center;
			color: white;
			display: flex;
			flex-direction: column;
		}
		.address-text p{
			text-align:center;
			color:white;
			font-size:1rem;
			letter-spacing: 2px;
			line-height: 1.5;
		}
		.company-socal-links {
			margin: 10px;
			padding: 20px;
			font-size: 40px;
			color: white !important;
			text-decoration: none;
			cursor: pointer;
		}
		.social-links {
			display: flex;
			flex-direction: row;
			justify-content: center;
		}
		.socail-link {
			margin: 10px;
			padding: 20px;
			font-size: 25px;
			color: white;
			text-decoration: none;
			cursor: pointer;

		}
		.fa-facebook:hover {
			color: #ff09be;
			-o-transition:.5s;
			-ms-transition:.5s;
			-moz-transition:.5s;
			-webkit-transition:.5s;
			transition:.5s;
		}
		.fa-linkedin:hover{
			color: #ff09be;
			-o-transition:.3s;
			-ms-transition:.3s;
			-moz-transition:.3s;
			-webkit-transition:.3s;
			transition:.3s;
		}
		.fa-youtube:hover{
			color: #ff09be;
			-o-transition:.3s;
			-ms-transition:.3s;
			-moz-transition:.3s;
			-webkit-transition:.3s;
			transition:.3s;
		}
		.fa-instagram:hover{
			color: #ff09be;
			-o-transition:.3s;
			-ms-transition:.3s;
			-moz-transition:.3s;
			-webkit-transition:.3s;
			transition:.3s;
		}
		.footer-logo-responsive{
			width: 12%;
			height: auto;
		}
		.copy-right-text{
			text-align:center;
			color:white;
			letter-spacing: 3px;
			

		}
		.copy-right-text a{
			color : #3FFC90;
		}

		/* footer css end  */

</style>
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="header_1">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/Rapido-Logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>"> <i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php"> <i class="fa-solid fa-list"></i> Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php"> <i class="fa-solid fa-bowl-food"></i> Foods</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>service_area.php"> <i class="fa-solid fa-truck-fast"></i> Service Area</a>
                    </li>

                    <?php
                    if ($order_user) {
                    ?>

                        <li>
                            <a href="contact.php"> <i class="fa-solid fa-address-card"></i> Contact</a>
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

                            <a href="order_status.php"> <i class="fa-solid fa-signal"></i> Order status</a>

                        </li>
                        <li>
                            <?php
                           
												
                        ?>

                            <a href="cart.php"> <i class="fa-solid fa-cart-shopping"></i> Cart</a>

							<?php
								$sql = "SELECT COUNT(*) AS total FROM `tbl_cart` WHERE `from_order` = '$order_user'";
															
															
								// Execute the query
								$result = mysqli_query($conn, $sql);

								// Check if the query was successful
								if ($result) {
									// Fetch the result row
									$row = mysqli_fetch_assoc($result);
									
									// Access the 'total' value from the row
									$total = $row['total'];
									
									// Print the result
									
									echo "<span style='color:red'>($total)</span>";
								} else {
									// Handle the case when the query fails
									echo "0";
								}
							?>

                        </li>

                    <?php

                    }

                    ?>

                    <?php
                    if ($order_user) {

						$sql_for_name = "SELECT `last_name` FROM `customer_info` WHERE `cus_email`='$order_user'";
						$execute = mysqli_query($conn,$sql_for_name);
						$row = mysqli_fetch_assoc($execute);
									
						// Access the 'total' value from the row
						$last_name = $row['last_name'];
						

                    ?>
                        <li>
                            <a href=""> <i class="fa-solid fa-user"></i> <?php print $last_name ?>  </a>
                        </li>
						<li>
							<a href="logout.php"> <i class="fa-solid fa-right-from-bracket"></i> Logout</a>
						</li>
                    <?php

                    } else {
                    ?>
                        <li>
                            <a href="login.php"> <i class="fa-solid fa-right-to-bracket"></i> Login</a>
                        </li>
                        <li>
                            <a href="signup.php"> <i class="fa-solid fa-user-plus"></i> Signup</a>
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