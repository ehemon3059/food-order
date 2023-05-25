<?php

include('partials-front/menu.php'); 
include('partials-front/check-login.php');

  @$order_from =  $_SESSION['user-email'];


  if(isset($_GET['price']) && isset($_GET['total'])){


  print  $food_price = $_GET['price']; "<br>";
  print  $food_quantity = $_GET['total'];

  }

?>