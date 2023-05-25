
<?php include('partials-front/menu.php');
include('partials-front/check-login.php');


 $order_user = $_SESSION['user-email'];


 if(isset($_GET['cart_id']))
 {
     //Get the Food id and details of the selected food
     $cart_id = $_GET['cart_id'];


     $query23 ="DELETE FROM `tbl_cart` WHERE id = '$cart_id'";
     $result = mysqli_query($conn,$query23);
     echo "<script> window.location.href = 'http://localhost/food-order/cart2.php' </script>";
 }


 if(isset($_POST['continue_order'])){
    $food_name = $_POST['food_name'];

    (int)$food_price = $_POST['food_price'];
 
    $qty = $_POST['qty'];

    // echo "<pre>";
    // print_r($qty);

    // die();

$totalprice = 0;

// echo "<pre>";
// print_r($qty);
// echo "</pre>";
// die();

// Loop through the arrays and insert the values into the database
for ($i = 0; $i < count($food_name); $i++) {
    if (isset($food_name[$i])) {
        $name = mysqli_real_escape_string($conn, $food_name[$i]);
    }
    if (isset($food_price[$i])) {
        $price = (int)$food_price[$i];
    }
    if (isset($qty[$i])) {
        $new_qty = (int)$qty[$i];
    }
    $totalprice = $price * $new_qty;




    $order_date = date("Y-m-d h:i:sa"); //Order DAte

    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

    $customer_name = $_POST['full-name'];
    $customer_contact = $_POST['phone_number'];
    $customer_email = $_POST['cus_email'];
    $customer_address = $_POST['cus_address'];
    $our_location = $_POST['options'];

    if($our_location == 'Select an option'){
        echo '<script>alert("please select our location")</script>'; die();
    }

   $sql = "INSERT INTO `tbl_order` SET
    `food`='$name',
    `price`='$price',
    `qty`='$new_qty',
    `total`='$totalprice',
    `order_date`='$order_date',
    `status`='$status',
    `customer_name`='$customer_name',
    `customer_contact`='$customer_contact',
    `customer_email`='$customer_email',
    `customer_address`='$customer_address',
    `order_from`='$order_user',
    `who_updated`='no_one',
    `our_location`='$our_location'";

   

  
    if (mysqli_query($conn, $sql) or die(mysqli_error()))  {

      echo '<script>alert("your order successful")</script>';
    } else {
        echo '<script>alert("something was wrong , Please try again ")</script>';
    }
  }


  //Delete cart detail from tbl_cart
  $sql2 = "DELETE FROM`tbl_cart` WHERE `from_order`='$order_user'";
  $execute = mysqli_query($conn, $sql2 );


  echo "<script> window.location.href = 'http://localhost/food-order/' </script>";


 }




  $sql = "SELECT * FROM `tbl_cart` WHERE `from_order` = '$order_user'";

  //Execute the Query
  $res=mysqli_query($conn, $sql);

  //Count Rows
  $count = mysqli_num_rows($res);
   //CHeck whether the foods are availalable or not
   if($count>0)
   {

            //get all data from cart table which user login
        $sumTotal = 0;
        // $totalQty = 0;


        //empty array push

        ?>


    <form method="POST"  >


        
            <?php

            while($row=mysqli_fetch_assoc($res)){


                    $food_id = $row['food_id'] ; 
                    $cart_id = $row['id'];

            


                    $query = "SELECT * FROM `tbl_food` WHERE `id`='$food_id'";

                    $result3 = mysqli_query($conn,$query );

                        

                        while($row2 = mysqli_fetch_assoc($result3)){

                                //`title``price``image_name`
                                $title = $row2['title'];
                                $image_name = $row2['image_name'];
                                $price = $row2['price'];
                                

                                //ager result
                            $sumTotal += $price;

      
                                ?>


                                

                                    <div class="cart">

                                        <?php 
                                                    
                                            //CHeck whether the image is available or not
                                            if($image_name=="")
                                            {
                                                //Image not Availabe
                                                echo "<div class='error'>Image not Available.</div>";
                                            }
                                            else
                                            {
                                                //Image is Available
                                                ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Product">
                                                <?php
                                            }
                                        
                                        ?>


                                        <div class="cart-info">
                                            <div class="cart-title"><?php echo $title; ?></div>
                                            <input type="hidden" name="food_name[]" value="<?php echo $title; ?>">

                                            <input type="hidden" name="cart_id[]" value="<?php echo $cart_id?>"> 

                                            <div class="cart-price"> Price : $<?php echo $price; ?></div>
                                          <!-- //  <input type="hidden" name="food_price[]" class="item-price" value="<?php echo $price; ?>"> -->

                                            <input type="hidden" class="item-price" name="food_price[]" value="<?php echo $price; ?>"/>
                                           

                                            <div class="cart-quantity">
                                                <label class="cart-quantity-label">Quantity:</label>
                                                <input type="number" class="cart-quantity-input"  name="qty[]" min="1" value="1">

                                            
                                            </div>

                                            <label class="sub-total cart-quantity-label">Sub total : $ <span class="sub-total-price">
                                                                                                        <?php echo $price; ?>
                                                                                                    </span>
                                        </label>
                                            
                                       

                                        </div>
                                        
                                        

                                        <a href="<?php echo SITEURL; ?>cart2.php?cart_id=<?php echo $cart_id; ?>" class="btn btn-primary">X</a>
                                        

                                    </div>


                                

                            <?php
      

                        }

                    
        
                
                    

           
        
                
            }

                


            ?>

                

                <label >
                <div  style="text-align: center; font-size:25px; margin-top:50px;">Total: =  
                    <span  class="total-amount">
                  
                    </span>
                </div>
                </label>

            
         <!-- ///   <span class="total-amount text-center"> total </span> -->

            <input type="hidden" name="product_total" class="total-price" value="">
            <div class="container_order_form">
                    <h1 class="confirm_order_h1">Confirm Order</h1>
                
                        <label for="fullname">Full Name</label>
                        <input type="text" class="input_form"  name="full-name" required>

                        <label for="phone">Phone Number</label>
                        <input type="number" class="input_form" name="phone_number" required>

                        <label for="email">Email</label>
                        <input type="email" class="input_form" name="cus_email" required>

                        <label for="location">Select Location</label>

                        <?php

                    // Query the database
                        $sql = "SELECT * FROM `service_area`";
                        $result = mysqli_query($conn, $sql);

                        // Create the select option element
                        echo "<select  id='select_location' name='options' class='input_form' required  >";
                        
                        echo   "<option >Select an option</option>";
                        // Loop through the query results and add each option to the select element
                        while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['area_name'] . "'>" . $row['area_name'] . "</option>";
                        }

                        // Close the select element
                        echo "</select>";
                        ?>

                      
                        <label for="textarea">Address</label>
                        <textarea class="input_form" name="cus_address" id="text_area_box" cols="30" rows="10"></textarea>

                        <button class=" confirm_btn" type="submit" name="continue_order">Continue order</button>
                </div>

       
     
    </form>

    <?php
    }else{

        ?>
        <div class="container-003">
            <h1>Your Cart</h1>
            <div class="cart-empty-03">
                <p>Your cart is empty.</p>
            </div>
        </div>
        <?php
       
    }


      
?>






</form>


<!--  -->

<?php
 

 if(isset($_GET['cart_id'])){

    @$food_id = $_GET['food_id'];

    echo "<script>alert('$food_id')</script>";

 }

?>
<script>



$(document).ready(function() {




  $('.cart-quantity-input').on('change', function() {
    var quantity = $(this).val();
   
    
    var price = $(this).closest('.cart-info').find('.item-price').val();
    var subTotal = quantity * price;
    $(this).closest('.cart-info').find('.sub-total-price').text(subTotal.toFixed(2));


    net_amount();
  });



  function net_amount(){

    var amount = 0 ;

    $('.cart-info').each(function(){
        
    var val = $(this).closest('.cart-info').find('.sub-total-price').text();
    var total = parseInt(amount) + parseInt(val);
    amount = total;
    console.log(amount);
     $('.total-amount').html(amount);
    });

   


  }
  net_amount();





});




</script>

<?php include('partials-front/footer.php'); 


