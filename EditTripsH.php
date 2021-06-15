<?php 
include'adminmenu.php';

session_start();
  if( $_SESSION["Logged_in_UTID"] == 2)
  {
    die("Forbidden");
  }

?>

<!DOCTYPE html>
<html>
<?php

include 'classes/Admin.php';
include 'controller/AdminController.php';
$AdminC = new AdminController();
$Admin = new Admin();
?>
<head>
	<?php
	include('DB.php');
	?>
   
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

  <style>
  #customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 90%;  
  margin-top:20px;  
  margin-left: -2px;  
              
  }
  #customers td, #customers th {
  border: 1px solid black;
  padding: 8px;
  text-align: center; 
       
  }
  #customers tr{background-color: white;}
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
    margin-left: 15px;  
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
    text-align: center     
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
   .scroll{
  overflow: auto;
   }
        
  </style>

<div class="h" >
 <h1> Razzaz Tours Trip Informations </h1>
 <form method="GET">
 <input type = "text" name= "search" class = "text">
    <button class="fas fa-search" style = "margin-left: 20px; margin-left:-45px; width: 50px; height: 50px; background: transparent; border: transparent;" type="submit"></button>
</form>
</div>
</head>




<body style = "background: #668B91;">
 
	 <link rel="stylesheet" href="EditTrips.css">
<form method="POST">
	<div class="scroll"> 
  
<table class="mx-auto" id="customers">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Trip Name</th>
      <th scope="col">Trip Location</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Picture</th>
      <th scope="col">Delete </th>    
      <th scope="col">Update </th>
    </tr>
  </thead>
  <tbody>
    <?php
     
 
       $query = "SELECT * FROM products WHERE category = 1 ";
       $result = mysqli_query($conn,$query);
      


		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {             
		    $id = $row['ID'];
		    $tname = $row['Name'];
        $location = $row['Location'];
		    $price = $row['Price'];  
		    $dis = $row['Description'];  
        $pic = $row['Image']; 
		    
		?>
	<tr>
		<td><?php echo $id; ?> <input type="hidden" value="<?php echo $id; ?>"></td>
		<td> <input name="tname" type="text" id="tname" value="<?php echo $tname; ?>"></td>
    <td> <input name="location" type="text" id="location" value="<?php echo $location; ?>"></td>
    <td><input name="price" type="number" id="price" minlength="1" value="<?php echo $price; ?>"></td> 
    <td><input name="dis" type="text" id="dis" value="<?php echo $dis; ?>"></td> 
    <td><input name="pic" type="text" id="pic" value="<?php echo $pic; ?> "></td> 
    <td style="width: 80px;" > <a href="EditTripsH.php?delete=<?php echo $id;?>"><button value="delete"type="button" name="delete" class="failure" style=" width: 100px; font-size: 16px; background-color: #f44336; "> Delete </button></a></td>
    <!-- <td style="width: 80px;" > <button onclick="updateTrip(<?php echo $id; ?>)" value="update" type="button" name="update" class="btn btn-success" style=" width: 80px; font-size: 16px;"> Update </button></td> -->
    <td style="width: 80px;" > <a href="update.php?editId=<?php echo $id;?>"><button value="update"type="button" name="update" class="success" style=" width: 110px; font-size: 16px;"> Update </button></a></td>

</tr>
<?php
    }
    ?>
</tbody>
</table>
</div>
</form>



<form method="POST" id="form1" style="display: none;">
  <table class="mx-auto" id="customer">
    <thead>
    <tr>
      <th scope="col">Trip Name</th>
      <th scope="col">Trip Location</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Picture</th>
     
      
    </tr>
  </thead>
    <tr>
     <td><input type="text" name="tname" id="Tname"></td>
     <td><input type="text" name="tloc" id="Tloc"></td>
     <td><input type="number"  name="tprice" id="Tprice" ></td>
     <td><input type="text" name="tdesc" id="Tdesc"></td> 
     <td><input type="text" name="tpic" id="Tpic"></td>
     <td><button  value="save" name="save" class="success" onclick="alert()" style="margin-bottom: 20px; width: 100px; font-size: 18px;"> Save </button></td>
  </tr>
  </table>
</form>
<button type="button" class="success" value="add" onclick="openForm()" id="a_b" style="margin-bottom: 20px;  font-size: 18px; Background-color:#1974D2; border:transparent; border-radius: 12px; margin-left:70px; margin-top:15px; color:white;">Add Trip</button>



<?php

					
						if( isset($_POST['save'] ) )
							{
                
             /*   $tname = $_POST['tname'];
                $tloc = $_POST['tloc'];
                $tprice = $_POST['tprice'];
                $tdesc = $_POST['tdesc'];
                $tpic = $_POST['tpic']; */
								$AdminC->saveTrip();
            
               // echo "<script>alert('updated succsesfuly')</script>";
							}
				
              elseif( isset($_GET['delete'] ) )
              {
                $trip_id = $_GET['delete'];
                $Admin->delettrips($trip_id);
                echo '<script>window.location="EditTripsH.php"</script>';
              }

              if( isset($_GET['update'] ) )
							{
                $id = $_GET['tripid'];
                $tname = $_GET['tname'];
                $tloc = $_GET['location'];
                $tprice = $_GET['price'];
                $tdesc = $_GET['dis'];
                $tpic = $_GET['pic'];
								$Admin->edittrips($id,$tname,$tloc,$tprice,$tdesc,$tpic);
                // echo '<script>window.location="update.php"</script>';
							}
             
           
							?>

<script>
function openForm() {
  $("#form1").toggle();
}
function alert()
{

if (confirm('Are you sure you want to save this thing into the database?')) {
  // Save it!
  console.log('Thing was saved to the database.');
} else {
  // Do nothing!
  console.log('Thing was not saved to the database.');
}
}
// function updateTrip(x)
// {
//   var tripId = x;
//   var tname = document.getElementById('tname').value;
//   var location = document.getElementById('location').value;
//   var price = document.getElementById('price').value;
//   var dis = document.getElementById('dis').value;
//   var pic = document.getElementById('pic').value;

//   window.location = "EditTripsH.php?update=1&tripid="+x+"&tname="+tname+"&location="+location+"&price="+price+"&dis="+dis+"&pic="+pic;

// }






</script>
</body>

</html>