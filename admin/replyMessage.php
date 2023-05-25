
<?php include('partials/menu.php');
include_once("../smtp_stable/class.phpmailer.php");

include_once("../smtp_stable/class.smtp.php");



if(isset($_GET['user_id'])){
    $user_id= $_GET['user_id'];
}

?>

    <!-- Main Content Section Starts -->

        <br><br>
        <h1 class="text-center">Reply Message</h1>

                <?php 
                    //Query to Get all Admin `user_name``from_customer``mobile_num``message`
                    $sql = "SELECT * FROM `contact_us` WHERE `id`='$user_id'";
                    //Execute the Query
                    $res = mysqli_query($conn, $sql) or die();

                    $data = mysqli_num_rows($res);

                    if ($data > 0){

                        while ($row = mysqli_fetch_assoc($res)) {

                           

                            $user_name= $row['user_name'];
                            $from_customer= $row['from_customer'];
                            $mobile_num= $row['mobile_num'];
                            $message= $row['message'];
                            
                        }
                        ?>

                        

                <div class="container">
                    <div class="login-box">
                        <h1>From customer</h1>
                        <form>
                            
                            <input type="text" placeholder="<?php echo $user_name ;?>" readonly>
                            <input type="text" placeholder="<?php echo $mobile_num ;?>" readonly>

                        
                            <textarea id="message" name="message" rows="8" cols="70" placeholder="<?php echo $message ;?>" readonly></textarea>
                            

                        </form>
                    </div>
                    <div class="login-box">
                        <h1>To customer</h1>
                        <form method="post" id="send-email-form" >
                            <input type="text" name="admin_name" placeholder="Name">
                            <input type="text" name="admin_mobile" placeholder="Mobile">
                            <textarea id="message" name="admin_message" rows="8" cols="70" placeholder="Write your message" ></textarea>
                            <input type="submit" name="email-send-form" value="Send Message">
                        </form>
                    </div>
                </div>

         
        


                <?php

                if(isset($_POST['email-send-form'])){

                    //get input data from Reply form;
                    $admin_name = $_POST['admin_name'];
                    $admin_mobile = $_POST['admin_mobile'];
                    $admin_message = $_POST['admin_message'];

                    //get customar Email ID
                    $sql2 = "SELECT * FROM `contact_us` WHERE `id`='$user_id'";

                    // Execute the query and get the result set
                    $result = mysqli_query($conn, $sql2);

                    // Fetch one row of data as an associative array
                    $row = mysqli_fetch_assoc($result);

                    $user_email = $row['from_customer'];

                    if($row == TRUE){

                            

                        try{


                            $from  = "ismatara2050@gmail.com";
                            $namefrom =  $admin_name;
                            $mail = new PHPMailer();
                            $mail->SMTPDebug = 0;
                            $mail->CharSet = 'UTF-8';
                            $mail->isSMTP();
                            $mail->SMTPAuth   = true;
                            $mail->Host   = "smtp.gmail.com";
                            $mail->Port       = 587;
                            $mail->Username   = "ismatara2050@gmail.com";
                            $mail->Password   = "aswulfhqeojpvzwg";
                            $mail->SMTPSecure = "tls";
                            $mail->setFrom($from, $namefrom);
                            $mail->addCC('Password Recovery');
                            $mail->addAddress($user_email);
        
                            $mail->isHTML(TRUE);
        
                            $mail->Subject = 'Reply from online food order';
                            $mail->Body = '
                                    <p>Dear Sir...</p>
                                    <h3 style="font-size: 20px; text-decoration: none">We have received your message</h3>
                                    
                                    <p>'.$admin_message.' </p>
                                    
                                    <p>if you have any query , please call '.$admin_mobile.'</p>
                                
                                    ';
        
                            $mail->send();
        
                            $_SESSION['email-send'] = "<div class='success text-center'>Email Send Successfull</div>";
            
                                //echo ('We have send you the reset link in your e-mail ID, Please check your e-mail Inbox');
                              
                            //  header('location:' . SITEURL . 'admin/replyMessage.php');
                            echo '<script>alert("Email has been sent successfully")</script>';

                            $sql3 = "DELETE FROM `contact_us` WHERE `id`='$user_id'";
                                            //Execute the Query
                                $res2 = mysqli_query($conn, $sql3);

                                //Check whether query executed successfully or not
                                if($res2==true)
                                {
                                    //Query Executed and Order Saved
                                    $_SESSION['sms-delete'] = "<div class='success text-center'>Message DELETE Successfully.</div>";
                                   
                                }
                                else
                                {
                                    //Failed to Save Order
                                    $_SESSION['sms-delete'] = "<div class='error text-center'>Failed to Message Delete .</div>";
                                   
                                }

                               echo "<script> window.location.href = 'http://localhost/food-order/admin/message.php' </script>";

                            } catch (Exception $e) {
                                echo '<script>alert("Email could not send, please try again ")</script>';
                                $_SESSION['email-send'] = "<div class='error text-center'>Email did not send</div>";
                              //  echo "<script> window.location.href = 'http://localhost/food-order/admin/message.php' </script>";
                            }

                        }
                        
                    }

                    }
                    
                
                ?>


        

<?php include('partials/footer.php') ?>

