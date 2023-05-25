
    <?php include('partials-front/menu.php');

    
    
     @$order_user =  $_SESSION['user-email'];
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM tbl_food WHERE active='Yes'";

 

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                        ?>
                   

                        <?php
                            //Foods Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get the Values
                                $id = $row['id'];
                                $title = $row['title'];
                                $description = $row['description'];
                                $price = $row['price'];
                                $image_name = $row['image_name'];
                                ?>
                                
                                <form method="POST">
                                
                                    <div class="food-menu-box">
                                        <div class="food-menu-img">
                                            <?php 
                                                //CHeck whether image available or not
                                                if($image_name=="")
                                                {
                                                    //Image not Available
                                                    echo "<div class='error'>Image not Available.</div>";
                                                }
                                                else
                                                {
                                                    //Image Available
                                                    ?>
                                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                                    <?php
                                                }
                                            ?>
                                            
                                        </div>

                                        <div class="food-menu-desc">
                                            <h4><?php echo $title; ?></h4>
                                            <input type="hidden" name="title[]" value="<?php echo $title; ?>">
                                            <input type="hidden" name="id[]" value="<?php echo $id; ?>">

                                            <p class="food-price">৳ <?php echo $price; ?></p>
                                            <p class="food-detail">
                                                <?php echo $description; ?>
                                            </p>
                                            <br>

                                            <!-- <a href="<?php /*echo SITEURL; ?>order.php?food_id=<?php echo $id; */?>" name="add_to_card" class="btn btn-primary">Order Now</a> -->
                                            <input type="submit" name="add_to_card" value="Add to cart" class="btn btn-primary">
                                        </div>
                                    </div>

                                </form>

                                <?php


                               
                            }

                        ?>
                 

                    <?php

                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>Food not found.</div>";
                }
            ?>

            <?php
            
            if(isset($_POST['add_to_card'])){

                include('partials-front/check-login.php');

                $title =$_POST['title'];
                $id =$_POST['id'];
                $add_to_cart_date = date("Y-m-d h:i:sa"); //Order DAte
                foreach ($id  as $value) {


                    $query = "INSERT INTO `tbl_cart`
                    SET 
                    `from_order` = '$order_user',
                    `food_id` = '$value',

                    `add_to_cart_date` = '$add_to_cart_date'";


                    if (mysqli_query($conn, $query)) {
                      
                        echo '<script type="text/javascript">alert(" Food Added to cart successfully");</script>';
                        echo "<script> window.location.href = 'http://localhost/food-order/foods.php' </script>";
                    } else {
                        echo "Error: " .  $query . "<br>" . mysqli_error($conn);
                    }

                }

            }
            
            ?>

            

            

            <div class="clearfix"></div>

            

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>