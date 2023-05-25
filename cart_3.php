<?php

 include('partials-front/menu.php');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" name="form123" action="cart_3.php">


    <form method="POST" action="cart_3.php">

        <div class="cart-info">
            <div class="cart-title">frout</div>
            <input type="hidden" name="food_name[]" value="apple">

            <div class="cart-quantity">
                <label class="cart-quantity-label">Quantity:</label>
                <input type="number" class="cart-quantity-input"  name="qty[]" min="1" value="1">

            </div>
        </div>


        <button type="submit">remove</button>
    </form>

    
    <form method="POST" action="cart_3.php">

        <div class="cart-info">
            <div class="cart-title">frout</div>
            <input type="hidden" name="food_name[]" value="apple">

            <div class="cart-quantity">
                <label class="cart-quantity-label">Quantity:</label>
                <input type="number" class="cart-quantity-input"  name="qty[]" min="1" value="1">

            </div>
        </div>


        <button type="submit">remove</button>
    </form>


    <button type="submit" name="submit">submit</button>
</form>


</body>
</html>