<?php
include'adminmenu.php';
session_start();
  if( $_SESSION["Logged_in_UTID"] == 2) {
    die("Forbidden");
  }

?>

<!DOCTYPE html>
<html>
<?php
include 'controller/AdminController.php';
include 'view/EditProductView.php';
$AdminV = new EditProductView();
$AdminC = new AdminController();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  <?php
  include('DB.php');
   ?>

  

</head>

<body style = "background: #668B91;">
<link rel="stylesheet" href="assets/css/orders.css">

<?php

$AdminV->searchorders();

?>




<table class="mx-auto" id="customers">
      <tr>
      <h2 style= "text-align:center;"> Searched Orders </h2> 
      <th scope="col">ID</th>
      <th scope="col">User Id</th>
      <th scope="col">Order Placed</th>
      <th scope="col">Product Id</th> 
      <th scope="col">Price</th>
      </tr>


    <?php
    // search
     if(isset($_POST['search']))
     {
       $name= $_POST["name"];
    
      $result = mysqli_query($conn, "SELECT * FROM orders  WHERE  user_id  = $name ");
      
      while($row = mysqli_fetch_array($result))
      {
        ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['user_id']; ?></td>
          <td><?php echo $row['order_placed']; ?></td>
          <td><?php echo $row['pid']; ?></td>
          <td><?php echo $row['price']; ?></td>

        </tr>

          <?php
}
     }
          ?>
    </table>






<?php   $AdminV->showorders(); ?>
</body>

</html>