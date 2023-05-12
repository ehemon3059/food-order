<?php include('partials-front/menu.php'); ?>


<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Our service area</h2>

            <?php 
                //Display Foods that are Active
                $sql = "SELECT * FROM `service_area`";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the foods are availalable or not
                if($count>0)
                {
                    ?>
                <div class="services-container">
                    <?php

                    //Foods Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $area_name = $row['area_name'];
                        $area_image = $row['area_image'];
                        
                        ?>


                            <div class="service image-container">


                            <?php 
                                    //CHeck whether image available or not
                                    if($area_image=="")
                                    {
                                        //Image not Available
                                        echo "<div class='error'>Image not Available.</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $area_image; ?>"  >
                                        <?php
                                    }
                                ?>
                 
                                <h2><?php echo $area_name; ?></h2>
                            </div>


                        <?php
                    }
                    
                }
                else
                {
                    //Food not Available
                    echo "<div class='error'>Area not found.</div>";
                }
            ?>


            <div class="clearfix"></div>
      

        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>