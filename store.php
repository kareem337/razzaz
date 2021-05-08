<?php
$TOTAL = 0;

session_start();
include('DB.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Hikely | Store</title>
        <meta name="description" content="This is the description">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="Cart.css" />
       

    </head>
    <body style="background-color: #668B91;">

        <header>


            <?php
     include'NavBarH.php';
     ?>
      
  <link href="assets/css/style.css" rel="stylesheet">
   
        </header>
       
       <form action = "store.php" method = "post">
        <section class="container content-section">
            <h2 class="section-header">My Cart</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-item cart-header cart-column">DATE</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>

            </div>

            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
            </div>
            <input type = "submit" class="btn btn-primary btn-purchase" name = "save" value = "PURCHASE">
        </section>
         </form>
          

    </body>
</html>