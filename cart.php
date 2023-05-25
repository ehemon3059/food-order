
<?php include('partials-front/menu.php');
include('partials-front/check-login.php');


 $order_user = $_SESSION['user-email'];


//  $numbers = $_POST['food_price'];
//  print $sum = array_sum($numbers);


if(isset($_POST['remove_cart'])){

    @$cart_id = $_POST['cart_id'][0];
    
    // foreach($cart_id as $value){
    //     echo '<script>alert("please select our  '.$value.' ")</script>'; 
    // }   
    echo '<script>alert("Food Remove successful")</script>'; 


    $query23 ="DELETE FROM `tbl_cart` WHERE id = '$cart_id'";
    $result = mysqli_query($conn,$query23);

}



 // initialize totalQty variable outside the loop


    

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
        $food_names = array();
        $food_price = array();
        $quantity = array();



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

                            //title push
                           $title = $row2['title'];
                           array_push($food_names, $title);

                            //price push
                           $price = $row2['price'];
                           array_push($food_price,$price);

                            ?>


                            <form method="POST" >

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

                                        <div class="cart-price">$<?php echo $price; ?></div>
                                        <input type="hidden" name="food_price[]" value="<?php echo $price; ?>">

                                        <div class="cart-quantity">
                                            <label class="cart-quantity-label">Quantity:</label>
                                            <input type="number" class="cart-quantity-input"  name="qty" min="1" value="1">

                                        
                                        </div>
                                    </div>
                                    <button class="cart-remove" type="submit" name="remove_cart">X</button>
                                </div>


                            </form>

                        <?php
                        @$quantity_input = $_POST['qty'];
                        array_push($quantity,$quantity_input);

                    }

                   
      
             
                  

                    echo $sumTotal ;
       
             
        }

               


        ?>
        <a onclick="setLinkHref()" id="my-link" href="#" class="btn btn-primary" >Continue to order</a>

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

<?php foreach ($food_names as $name): ?>
    <p><?php echo $name; ?></p>
<?php endforeach; ?>

<?php foreach ($quantity as $quantity_show): ?>
    <p><?php echo $quantity_show; ?></p>
<?php endforeach; ?>

<?php foreach ($quantity as $quantity_show): ?>
    <p><?php echo $quantity_show; ?></p>
<?php endforeach; ?>

<!--  -->


<script>
    function getTotalQuantity() {
  var inputs = document.getElementsByClassName('cart-quantity-input');
  var sum = 0;
  for (var i = 0; i < inputs.length; i++) {
    sum += parseInt(inputs[i].value);
  }
  return sum;
}

function setLinkHref() {
  var total = getTotalQuantity();
  var link = document.getElementById('my-link');
 // link.href = 'order-2.php?total=' + total;
  link.href = '<?php echo SITEURL; ?>order-2.php?price=' + <?php echo $sumTotal; ?> + '&total=' + total;


}


</script>



<?php include('partials-front/footer.php'); ?>