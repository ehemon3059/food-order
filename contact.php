
<?php include('partials-front/menu.php'); ?>

<section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Contact with us</h2>

            <form action="" method="POST" class="order">
                
                
                <fieldset>
                    <legend>fill the information</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Your Name" class="input-responsive" required>

                   

                    <!-- <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="example@email.com" class="input-responsive" required> -->

                    <div class="order-label">Mobile Number</div>
                    <input type="number" name="mobile_number" placeholder="Enter your valid mobile number" class="input-responsive" required>

                    <div class="order-label">Message</div>
                    <textarea name="cus_message" rows="10" placeholder="write your message" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="SEND MESSAGE" class="btn btn-primary">

                        <?php
                        
                        if (isset($_SESSION['contact_message'])) {
                            echo $_SESSION['contact_message'];
                            unset($_SESSION['contact_message']);
                        }
                        ?>
                </fieldset>

            </form>

            <?php 

                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form


                    $cus_name = $_POST['full-name'];
                    $mobile = $_POST['mobile_number'];
      
             
                    $cus_message = $_POST['cus_message'];
                    
                    $from_customer =  $_SESSION['user-email'] ;


                    //Save the Order in Databaase
                    //Create SQL to save the data
                   $sql2 = "INSERT INTO  `contact_us` 
                    SET `user_name`='$cus_name',
               
                    `mobile_num`='$mobile',
                    `from_customer`='$from_customer',
                    `status`='No reply',
                    `message`='$cus_message'";

                    //echo $sql2; die();

                    //Execute the Query
                    $res2 = mysqli_query($conn, $sql2);

                    //Check whether query executed successfully or not
                    if($res2==true)
                    {
                        //Query Executed and Order Saved
                        $_SESSION['contact_message'] = "<div class='success text-center'>Message send Successfully.</div>";
                        echo '<script>alert("Our representative will reply to your query shortly via Email. Please check your Email")</script>';
                     //   header('location:'.SITEURL.'contact.php');
                     echo "<script> window.location.href = 'http://localhost/food-order/contact.php' </script>";
                    }
                    else
                    {
                        //Failed to Save Order
                        $_SESSION['contact_message'] = "<div class='error text-center'>Failed to Message send .</div>";
                      //  header('location:'.SITEURL.'contact.php');
                      echo "<script> window.location.href = 'http://localhost/food-order/contact.php' </script>";
                    }

                }
            
            ?>

        </div>
    </section>

<?php include('partials-front/footer.php'); ?>