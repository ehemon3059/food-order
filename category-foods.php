    
    <?php include('partials-front/menu.php'); ?>

    <?php 
        //CHeck whether id is passed or not
        if(isset($_GET['category_id']))
        {
            //Category id is set and get the id
            $category_id = $_GET['category_id'];
            // Get the CAtegory Title Based on Category ID
            $sql = "SELECT title FROM tbl_category WHERE id=$category_id";

            //Execute the Query
            $res = mysqli_query($conn, $sql);

            //Get the value from Database
            $row = mysqli_fetch_assoc($res);
            //Get the TItle
            $category_title = $row['title'];
        }
        else
        {
            //CAtegory not passed
            //Redirect to Home page
            header('location:'.SITEURL);
        }
    ?>


    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php 
            
                //Create SQL Query to Get foods based on Selected CAtegory
                $sql2 = "SELECT * FROM tbl_food WHERE category_id=$category_id";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //Count the Rows
                $count2 = mysqli_num_rows($res2);

                //CHeck whether food is available or not
                if($count2>0)
                {
                    //Food is Available
                    while($row2=mysqli_fetch_assoc($res2))
                    {
                        $id = $row2['id'];
                        $title = $row2['title'];
                        $price = $row2['price'];
                        $description = $row2['description'];
                        $image_name = $row2['image_name'];
                        ?>
                        <form method="POST">
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php 
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

                                    <input type="submit" name="add_to_card" value="Add to cart" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                        <?php
                    }
                }
                else
                {
                    //Food not available
                    echo "<div class='error'>Food not Available.</div>";
                }
            
            ?>
   <?php
            
            if(isset($_POST['add_to_card'])){

                include('partials-front/check-login.php');

                $title =$_POST['title'];
                $id =$_POST['id'];
                $add_to_cart_date = date("Y-m-d h:i:sa"); //Order DAte
                foreach ($id  as $value) {
               
                  //  echo '<script type="text/javascript">alert("'. $value  .' ");</script>';
                  //  echo '<script type="text/javascript">alert("'. $order_user  .' ");</script>';


                    $query = "INSERT INTO `tbl_cart`
                    SET 
                    `from_order` = '$order_user',
                    `food_id` = '$value',

                    `add_to_cart_date` = '$add_to_cart_date'";


                    if (mysqli_query($conn, $query)) {
                      
                        echo '<script type="text/javascript">alert(" Food Added to cart successfully");</script>';
                        echo "<script> window.location.href = 'http://localhost/food-order/category-foods.php??category_id='$category_id' </script>";
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