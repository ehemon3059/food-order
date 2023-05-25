<?php

include('../config/constants.php');
include('login-check.php');

 $username = $_SESSION['user'];

$query = "SELECT `position` FROM `tbl_admin` WHERE `username` = '$username'";
$res = mysqli_query($conn,$query);
 $row = mysqli_fetch_row($res);
 $position = $row[0];


// echo $sql = "SELECT * FROM `tbl_admin` WHERE `username`=  $position";

// $res = mysqli_query($conn,$sql);

// echo $count = mysqli_num_rows($res);

// if ($count  == 1) {


?>


<html>

<head>
    <title>Food Order Website - Home Page</title>

    <link rel="stylesheet" href="../css/admin.css">




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
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		.container {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-around;
			align-items: center;
			margin: 50px 0;
		}
		.login-box {
			background-color: #fff;
			border-radius: 10px;
			padding: 20px;
			box-shadow: 0px 0px 10px #ccc;
			margin: 20px;
			width: 400px;
			height: 400px;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		h1 {
			font-size: 24px;
			margin-bottom: 20px;
		}
		input[type="text"], input[type="password"], input[type="submit"] ,textarea{
			width: 100%;
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: none;
			box-shadow: 0px 0px 5px #ccc;
			font-size: 16px;
		}
		input[type="submit"] {
			background-color: #4CAF50;
			color: #fff;
			cursor: pointer;
		}
		input[type="submit"]:hover {
			background-color: #3e8e41;
		}
		.img-responsive{
			width: 6%;
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
    <!-- Menu Section Starts -->
    <div class="menu text-center">
        <div class="wrapper">
			
            <ul>
				<li>
						
						<a href="http://localhost/food-order/" title="Logo">
							<img src="../images/Rapido-Logo.png" alt="Restaurant Logo" class="img-responsive">
						</a>
					
				</li>
                <li><a href="index.php">Home</a></li>
                <?php
                if ($position == 'owner') {
                ?>
                    <li><a href="manage-admin.php">Employee</a></li>
                <?php
                }

                ?>

				<?php
				if($position == 'manager' or $position == 'owner'){
					?>
					<li><a href="manage-category.php">Category</a></li>
				<?php
				}
				?>

                


				<?php
				if($position == 'manager' or $position == 'owner'){
					?>
                	<li><a href="manage-food.php">Food</a></li>
				<?php
				}
				?>


				<?php
				if($position == 'regular staff' or $position == 'owner'){
					?>
                	<li><a href="manage-order.php">Manage Order</a></li>
				<?php
				}
				?>


				<?php
				if($position == 'regular staff'){
					?>
                	<li><a href="manage-ordered.php">Ordered</a></li>
				<?php
				}
				?>



				<?php
				if($position == 'regular staff'  or   $position == 'delivery man'){
					?>
                	<li><a href="manage-all-on-delivery.php">On-Delivery</a></li>
				<?php
				}
				?>


				<?php
				if($position == 'regular staff' ){
					?>
                	 <li><a href="manage-all-delivered.php">Delivered</a></li>
				<?php
				}
				?>



				<?php
				if($position == 'regular staff'){
					?>
                	 <li><a href="manage-all-cancelled.php">Cancelled</a></li>
				<?php
				}
				?>



                


				<?php
				if($position == 'manager' or $position == 'owner'){
					?>
                	<li><a href="message.php">Message</a></li>
				<?php
				}
				?>


				<?php
				if( $position == 'owner'){
					?>
                	<li><a href="service_area.php">service area</a></li>
				<?php
				}
				?>

                




                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <!-- Menu Section Ends -->