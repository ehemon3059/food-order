
<?php include('partials/menu.php'); ?>

<!-- Main Content Section Starts -->
<div class="main-content">
    <div class="wrapper">
        <h1>Message</h1>
        <br><br>
        <?php 
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if(isset($_SESSION['email-send']))
            {
                echo $_SESSION['email-send'];
                unset($_SESSION['email-send']);
            }
            if(isset($_SESSION['sms-delete']))
            {
                echo $_SESSION['sms-delete'];
                unset($_SESSION['sms-delete']);
            }
            
        ?>
        <br><br>

        <table id="example" class="display " style="width:100%">
                <thead>
                    <tr>
                        <th>S.N.</th> 
                        <th>Full Name</th>
                        <th>User email</th>
                        <th> Message</th>
                        <th>Reply User</th>
                    </tr>
                </thead>
                <tbody>

                   
                    
                            <?php 
                                //Query to Get all Admin
                                $sql = "SELECT * FROM `contact_us`  WHERE `status`='No reply' ORDER BY `id` DESC";

                                // $sql or die();
                                //Execute the Query
                                $res = mysqli_query($conn, $sql);

                                //CHeck whether the Query is Executed of Not
                                if($res==TRUE)
                                {
                                    // Count Rows to CHeck whether we have data in database or not
                                    $count = mysqli_num_rows($res); // Function to get all the rows in database

                                    $sn=1; //Create a Variable and Assign the value

                                    //CHeck the num of rows
                                    if($count>0)
                                    {
                                        //WE HAve data in database
                                        while($rows=mysqli_fetch_assoc($res))
                                        {
                                            //Using While loop to get all the data from database.
                                            //And while loop will run as long as we have data in database

                                            //Get individual DAta
                                            $id=$rows['id'];
                                            $user_name=$rows['user_name'];
                                            $user_Email=$rows['from_customer'];
                                    
                                            $message=$rows['message'];

                                            //Display the Values in our Table
                                            ?>
                                            
                                            <tr>
                                                <td><?php echo $sn++; ?>. </td>
                                                <td><?php echo $user_name; ?></td>
                                                <td><?php echo $user_Email; ?></td>
                    
                                                <td> &nbsp;<?php echo  $message; ?></td>
                                                <td>
                                                    <a href="<?php echo SITEURL; ?>admin/replyMessage.php?user_id=<?php echo $id; ?>" class="btn-secondary">Reply Message</a>
                                                </td>
                                                
                                            </tr>

                                            <?php

                                        }

                                    }else{
                                        echo "<tr><td colspan='12' class='error text-center' style='text-align: center; font-size:25px;'>Message not Available</td></tr>";
                                    }
                                }

                            ?>


                    </tbody>
                </table>

                <?php
                
                if(isset($_POST['submit']))
                {
                    $sql2 = "DELETE FROM `contact_us`;";

                 //echo $sql2; die();

                 //Execute the Query
                 $res2 = mysqli_query($conn, $sql2);

                 //Check whether query executed successfully or not
                 if($res2==true)
                 {
                     //Query Executed and Order Saved
                     $_SESSION['login'] = "<div class='success text-center'>Message DELETE Successfully.</div>";
                     header('location:'.SITEURL.'admin/index.php');
                 }
                 else
                 {
                     //Failed to Save Order
                     $_SESSION['login'] = "<div class='error text-center'>Failed to Message Delete .</div>";
                     header('location:'.SITEURL.'admin/index.php');
                 }

                }
                
                ?>
        

        

        <div class="clearfix"></div>

    </div>
</div>
<!-- Main Content Setion Ends -->

<?php include('partials/footer.php') ?>
