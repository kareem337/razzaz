<?php
$TOTAL = 0;

session_start();
include('DB.php');
include('classes/Category.php');

$cart = new category();
$cart->fetchcart();

    if(isset($_GET['remove']))
    {
        $removedID = $_GET['remove'];
        $removeitem = "DELETE FROM `cart` WHERE trip_id=$removedID";
        $removeResultt = mysqli_query($conn, $removeitem);
        echo '<script>window.location="store.php"</script>';
    }

   if(isset($_POST['save'])){
        $User = $_SESSION["Logged_in_ID"];
        $date = date('Y-m-d H:i:s');
        // $tripid = $_SESSION['trip_id'];
       $price  = $_POST['totalPrice'];

        $allCart = "SELECT * FROM cart WHERE user_id=$User";
        $result2 = mysqli_query($conn, $allCart);

        if ($result2->num_rows > 0) 
        {
            // output data of each row
            while($row = $result2->fetch_assoc()) 
            {
                $tripid = $row['trip_id'];
                $sql = "INSERT INTO `orders` (`ID`, `user_id`, `order_placed` ,`trip_id` , `price`) 
		        VALUES (NULL, '$User', '$date' ,'$tripid', '$price')";
                $insertResult = mysqli_query($conn, $sql);

                $removeCart = "DELETE FROM cart WHERE user_id=$User";
                $removeResult = mysqli_query($conn, $removeCart);
                header("location: store.php");
            }
        }
		
       
		
   }
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
            <div class="cart-items">
            <?php
                $totalPrice = 0;
            ?>
             <?php if($cart->getTripId() == 0){
                   //exit(0);
             }else{  ?>
            <div class="cart-row">
                    <div class="cart-item cart-column">
                    <img class="cart-item-image" src="img/<?php print($cart->getBackground()); ?>" width="100" height="100">
                    <span class="cart-item-title"><?php print($cart->getName()); ?></span>
                    </div>
                    <div class="cart-item cart-column">         
                    <span class="cart-item-title"><?php print($cart->getDateCreated()); ?></span>
                    </div>
                    <span class="cart-price cart-column"><?php print($cart->getTotalPrice()); ?> $</span>                
                    <div class="cart-quantity cart-column">
                      <div class="cart-quantity-column">  <?php print($cart->getQuantity()); ?> </div> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        <button class="btn btn-danger" onclick="(function(){window.location.href='store.php?remove=<?php print($cart->getTripId()); ?>';return false;})();return false;">REMOVE</button> 
                    </div>
                </div>
                 <?php } ?>
                <?php 
                $calculatedPrice = $cart->getTotalPrice() * $cart->getQuantity();
                $totalPrice += $calculatedPrice;
            
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
                <span class="cart-total-price" id="tPrice"><?php echo $totalPrice;  ?>$</span>
            </div>
            <input type="hidden" name="totalPrice" id="ttPrice" value="<?php echo $totalPrice; ?>">
            <?php
                
                 $_SESSION['totalPrice'] = $totalPrice;
            ?>
            <?php if($cart->getTripId() != 0){ ?>
            <input type = "submit" class="btn btn-primary btn-purchase" name = "save" value = "PURCHASE">
            <?php } ?>
        </section>
         </form>
          
                <script> 
   
// Function to create the cookie 
        function createCookie(name, days) {
            var expires; 
            var value = document.getElementById('tPrice').innerHTML;
            if (days) { 
                var date = new Date(); 
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000)); 
                expires = "; expires=" + date.toGMTString(); 
            } 
            else { 
                expires = ""; 
            } 
            
            document.cookie = escape(name) + "=" +  
                escape(value) + expires + "; path=/";
        } 
            </script>
    </body>
</html>