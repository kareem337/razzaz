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
include 'classes/Admin.php';
$Admin = new Admin();
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  <?php
  include('DB.php');
   ?>

  <style>
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;  
  margin-top:20px;  
  margin-left: 70px;              
  }
  #customers td, #customers th {
  border: 2px solid #ddd;
  background-color : white;
  padding: 8px;
  text-align: center;      
  }
  #customers tr:nth-child(even){background-color: #ddd;}
  /*#customers tr:hover {background-color: #ddd;}*/
  #customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #dddddd;
  color: black;
  }    
  a{
  text-decoration: none;
  }
  .h{
	margin-top: 150px;
	text-align:center;
  }   
  .text{
    margin-top: 10px;  
    width:300px;   
    height:40px;  
    border-radius: 10px;
    margin-left: -15px;  
    font-family: Arial, Helvetica, sans-serif;  
    font-size: 16px;  
  }
  .success{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;     
  } 
  .failure{
    background-color: #f44336; /* Red */
    border: none;
    color: white;
    padding: 10px 22px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;     
  }  
    .success:hover{
    cursor: pointer;
   } 
    .failure:hover{
    cursor: pointer;
   } 
   ::placeholder {
  text-align : center;

}  
        
  </style>
  <form method="POST">
<div class = "h"> <h1> Users Orders </h1><input  placeholder="Enter Users ID" type = "text"  name="name" class = "text">
<span class="fas fa-search" type="submit" name = "search" style = "margin-left: 20px; margin-left:-30px;"></span> 
</div>
<input type = "submit" name = "search" value = "Find" class = "btnStyle">
</form>
</head>

<body style = "background: #668B91;">




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






<table class="mx-auto" id="customers">
  
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Id</th>
      <th scope="col">Order Placed</th>
      <th scope="col">Product Id</th>
      <th scope="col">Price</th>
    </tr>

  <tbody>
    <?php
     
 
       $query = "SELECT * FROM orders";
       $result = mysqli_query($conn,$query);
       

		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {     
                
		    $id = $row['id'];
		    $User_id = $row['user_id'];
		    $Orderd_placed = $row['order_placed'];
		    $product_id = $row['pid'];  
		    $price = $row['price'];  
		?>
	<tr>
		<td><?php echo $id; ?>  <input type="hidden" value="<?php echo $id; ?>"></td>
		<td><?php echo  $User_id; ?></td>
		<td><?php echo $Orderd_placed; ?></td>
    <td><?php echo $product_id; ?></td> 
    <td><?php echo $price; ?></td> 
	</tr>
	<?php
    }
    ?>
  
  </tbody>
</table>

</body>

</html>