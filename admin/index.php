<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Dashboard</h1>
        <br><br>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <br><br>

        <div class="col-4 text-center">

            <?php
            //Sql Query 
            $sql = "SELECT * FROM tbl_category";
            //Execute Query
            $res = mysqli_query($conn, $sql);
            //Count Rows
            $count = mysqli_num_rows($res);
            ?>

            <h1><?php echo $count; ?></h1>
            <br />
            Categories
        </div>

        <div class="col-4 text-center">

            <?php
            //Sql Query 
            $sql2 = "SELECT * FROM tbl_food";
            //Execute Query
            $res2 = mysqli_query($conn, $sql2);
            //Count Rows
            $count2 = mysqli_num_rows($res2);
            ?>

            <h1><?php echo $count2; ?></h1>
            <br />
            Foods
        </div>

        <div class="col-4 text-center">

            <?php
            //Sql Query 
            $sql3 = "SELECT COUNT(`status`) AS all_Ordered  FROM `tbl_order`  WHERE `status`= 'Ordered' ;";
            //Execute Query
            $res3 = mysqli_query($conn, $sql3);
            //Count Rows
            //  $count3 = mysqli_num_rows($res3);

            //fetch data 
            $total_Ordered  = mysqli_fetch_assoc($res3);
            $ordered = $total_Ordered['all_Ordered'];
            ?>

            <h1><?php echo $ordered; ?></h1>
            <br />
            Total Ordered
        </div>
        <div class="col-4 text-center">

            <?php
            //Sql Query 
            $sql4 = "SELECT COUNT(`status`) AS all_On_Delivery FROM `tbl_order`  WHERE `status`= 'On Delivery' ;";
            //Execute Query
            $res4 = mysqli_query($conn, $sql4);
            //Count Rows
            //  $count3 = mysqli_num_rows($res3);

            //fetch data 
            $total_On_Delivery  = mysqli_fetch_assoc($res4);
            $On_Delivery = $total_On_Delivery['all_On_Delivery'];
            ?>

            <h1><?php echo $On_Delivery; ?></h1>
            <br />
            Total On Delivery
        </div>



        <div class="col-4 text-center">

            <?php
            //Creat SQL Query to Get Total Revenue Generated
            //Aggregate Function in SQL
            $sql5 = "SELECT COUNT(`status`) AS all_Delivered FROM `tbl_order`  WHERE `status`= 'Delivered' ";

            //Execute the Query
            $res5 = mysqli_query($conn, $sql5);

            //fetch data 
            $total_Delivered  = mysqli_fetch_assoc($res5);
            $Delivered = $total_Delivered['all_Delivered'];
            ?>


            <h1><?php echo $Delivered; ?></h1>
            <br />
            Total Delivered
        </div>
        <div class="col-4 text-center">

            <?php
            //Creat SQL Query to Get Total Revenue Generated
            //Aggregate Function in SQL
            $sql6 = "SELECT COUNT(`status`) AS all_Cancelled FROM `tbl_order`  WHERE `status`= 'Cancelled' ";

            //Execute the Query
            $res6 = mysqli_query($conn, $sql6);

            //fetch data 
            $total_Cancelled  = mysqli_fetch_assoc($res6);
            $Cancelled = $total_Cancelled['all_Cancelled'];
            ?>


            <h1><?php echo $Cancelled; ?></h1>
            <br />
            Total Cancelled
        </div>
        <div class="col-4 text-center">

            <?php
            //Creat SQL Query to Get Total Revenue Generated
            //Aggregate Function in SQL
            $sql4 = "SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

            //Execute the Query
            $res4 = mysqli_query($conn, $sql4);

            //Get the VAlue
            $row4 = mysqli_fetch_assoc($res4);

            //GEt the Total REvenue
            $total_revenue = $row4['Total'];

            ?>

            <h1>$<?php echo $total_revenue; ?></h1>
            <br />
            Revenue Generated
        </div>

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>