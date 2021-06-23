<?php

session_start();
$TOTAL = 0;
$pid = 0;

include('DB.php');
include 'controller/UserController.php';
$UserC = new UserController();

$userid = $_SESSION['Logged_in_ID'];
$sql = "SELECT * FROM cart WHERE user_id = $userid";
$result = mysqli_query($conn, $sql);
$show = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);


    if(isset($_GET['remove'])){
        $UserC->deleteItemFromCartC();
        echo '<script>window.location="store.php"</script>';
    }

   if(isset($_POST['save'])){
       $UserC->purchaseC($price);		
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Razzaz Tours</title>
        <meta name="description" content="This is the description">
       <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

   <link rel="stylesheet" href="assets/css/Cart.css" />
       

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
            <div class="cart-items">
            <?php
                $totalPrice = 0;
                foreach($show as $row) {
                $GLOBALS['pid'] = $row['pid'];
                $trip_name = "SELECT * FROM products WHERE ID = $pid";


                $result_name = mysqli_query($conn, $trip_name);
                $roww = $result_name->fetch_assoc()
            ?>
             <?php if($pid == 0){
                   //exit(0);
             }else{  ?>
               
            <div class="cart-row">
                    <div class="cart-item cart-column">
                    <img class="cart-item-image" src="img/<?php print($roww['Background']); ?>" width="100" height="100">
                    <span class="cart-item-title"><?php print($roww['Name']); ?></span>
                    </div>
                    <div class="cart-item cart-column">         
                    <span class="cart-item-title"><?php print($row['Date_Created']); ?></span>
                    </div>
                    <span class="cart-price cart-column"><?php print($row['Total_Price']); ?> $</span>                
                    <div class="cart-quantity cart-column">
                      <div class="cart-quantity-column">  <?php print($row['quantity']); ?> </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <button class="btn btn-danger" onclick="(function(){window.location.href='store.php?remove=<?php print($row['ID']); ?>';return false;})();return false;">REMOVE</button> 
                    </div>
                </div>
                 <?php } ?>
                <?php 
                $calculatedPrice = $row['Total_Price'] * $row['quantity'];
                $totalPrice += $calculatedPrice;
                }
             ?>
            </div>
            <script>
                function changePrice(x,price)
                {
                    document.getElementById('tPrice').innerHTML = x * price + "$";
                    document.getElementById('ttPrice').value = x * price;
                }
            </script>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price" id="tPrice"><?php echo $totalPrice; ?>$</span>
            </div>
            <input type="hidden" name="totalPrice" id="ttPrice" value="<?php echo $totalPrice; ?>">
            <?php
                
                 $_SESSION['totalPrice'] = $totalPrice;
            ?>
            <?php if($pid != 0){ ?>
            <input type = "submit" class="btn btn-primary btn-purchase" name = "save" value = "PURCHASE">
            <?php } ?>
        </section>
         </form>
    </body>
</html>