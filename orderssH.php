<?php
session_start();
  if( $_SESSION["Logged_in_UTID"] == 2) {
    die("Forbidden");
  }

?>
<!DOCTYPE html>
<html>

<head>
	<?php
	include('DB.php');
	?>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


  <style>
    table{
			border:1px solid #000;
		}
		table td,table th {
			border:1px solid #000;
		}
    </style>
<div class="h" > <h1><b> Search Orders<b> </h1></div>
</head>





<body>

   <form  method = "post">
     <div class = "div1">
     <label> <h3>Enter ID</h3> </label> <br> <input type = "number" name = "name" class = "txtStyle" min="1"> <br> <br>
     <div class = "div2">
     <input type = "submit" name = "search" value = "Find" class = "btnStyle">
     </div>
     </div>
   </form>

<table class="mx-auto" id="f">
      <tr> 
          <th> Order ID </th>
          <th> User Id</th>
          <th> Ordered Placed </th>
          <th> Trip ID </th>
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
          <td><?php echo $row['trip_id']; ?></td>
        </tr>

          <?php
}
     }
          ?>
    </table>

  <header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->
<link rel="stylesheet" href="orders.css">
<br>
<br>


<h1 style="text-align: center;"> <b>All Orders</b> </h1>
<form method = "post">
	
<table class="mx-auto" id="f">
  <thead>
    <tr>
    <th scope="col">Order ID</th>
      <th scope="col">User ID</th>
      <th scope="col">Ordered Placed</th>
      <th scope="col">Trip ID</th>
      <th scope="col">Price</th>
      <th scope="col">Delete </th>
    </tr>
  </thead>
  <tbody>
    <?php
     
 
     $query = "SELECT * FROM orders";
     $result = mysqli_query($conn,$query);
     


      while($row = $result -> fetch_array(MYSQLI_ASSOC)) {     
             
          $id = $row['id'];
          $user_id = $row['user_id'];
          $date = $row['order_placed'];
          $trip = $row['trip_id'];  
          $price = $row['price'];  
      
		
		?>
	<tr>
    <td><?php echo $id; ?></td>
		<td><?php echo $user_id; ?></td>
		<td><?php echo $date; ?></td>
        <td><?php echo $trip; ?></td> 
        <td><?php echo $price; ?></td> 
      <!-- <td style="width: 80px" ><button value="delete" name="delete" class="btn btn-danger"> Remove </button></td> -->
      <td style="width: 80px" ><button value="delete" name="delete" class="btn btn-danger" onClick="(function(){window.location='orderssH.php';});return false;">REMOVE</button> </td>


	</tr>
	<?php
    }
    ?>
  </tr>
  </tbody>
</table>


</form>
<script>

$( "button" ).click(function() {
  var title=$(this).attr("value");

  var text = $(this).closest('tr').find('td:eq(0)').text();
  var text2 = $(this).closest('tr').find('td:eq(7) option:selected').val(); 
  parseInt(text);
  parseInt(text2);

  if(title=="delete"){
if(confirm("Are you sure this record is going to be deleted !!")){
$.ajax({ 
           method: "POST", 
           url: "orderss.php",
           data: {functioncall: 'deleteOrder',orderID : text},
           success:function(results) { 
            alert(results);
        },
        error: function(xhr, status, error) {
 console.error(xhr);
 alert("error");
 }

         });
}
}




});



</script>
</body>

</html>