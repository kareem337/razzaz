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




<div class="h" > <h1><b> Razzaz Tours Trip Informations<b> </h1></div>
</head>




<body>
  <header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->
	 <link rel="stylesheet" href="EditTrips.css">
<form method="POST">
	
<table class="mx-auto" id="f">
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
     
 
       $query = "SELECT * FROM trips";
       $result = mysqli_query($conn,$query);
      


		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {             
		    $id = $row['ID'];
		    $tname = $row['name'];
        $location = $row['location'];
		    $price = $row['Price'];  
		    $dis = $row['Description'];  
        $pic = $row['image']; 
		    
		?>
	<tr>
		<td><?php echo $id; ?></td>
		<td> <input type="text" value="<?php echo $tname; ?>"></td>
    <td> <input type="text" value="<?php echo $location; ?>"></td>
    <td><input type="number" minlength="1" value="<?php echo $price; ?>"></td> 
    <td><input type="text" value="<?php echo $dis; ?>"></td> 
    <td><input type="text" value="<?php echo $pic; ?> "></td> 
    <td style="width: 80px;" ><button value="delete" name="delete" class="btn btn-danger" style=" width: 80px; font-size: 16px;"> Delete </button></td>
    <td style="width: 80px;" ><button value="update" name="update" class="btn btn-success" style=" width: 80px; font-size: 16px;"> Update </button></td>

	</tr>
	<?php
    }
    ?>
  </tbody>
</table>
</form>



<form method="POST" id="form1" style="display: none;">
  <table class="mx-auto" id="ta">
    <thead>
    <tr>
      <th scope="col">Trip Name</th>
      <th scope="col">Trip Location</th>
      <th scope="col">Price</th>
      <th scope="col">Description</th>
      <th scope="col">Picture</th>
      <th scope="col">Save </th>
    </tr>
  </thead>
    <tr>
  <td><input type="text" id="Tname"></td>
   <td><input type="text" id="Tloc"></td>
    <td><input type="number" id="Tprice" ></td>
     <td><input type="text" id="Tdesc"></td> 
     <td><input type="text" id="Tpic"></td>
     <td><button  value="save" name="save" class="btn btn-success" style="margin-bottom: 20px; width: 100px; font-size: 18px;"> Save </button></td>
  </tr>
  </table>
</form>
<button type="button" class="btn btn-primary" value="add" id="a_b" style="margin-bottom: 20px; width: 100px; font-size: 18px;">Add Trip</button>




<script>


$( "button" ).click(function() {
  var text = $(this).closest('tr').find('td:eq(0)').text();
  var name = $(this).closest('tr').find("td:eq(1) input[type='text']").val();
  var location = $(this).closest('tr').find("td:eq(2) input[type='text']").val();
  var Price = $(this).closest('tr').find("td:eq(3) input[type='number']").val();
  var Description = $(this).closest('tr').find("td:eq(4) input[type='text']").val(); 
  var image = $(this).closest('tr').find("td:eq(5) input[type='text']").val();

   var title=$(this).attr("value");
  
parseInt(text);
if(title=="delete"){
  if(confirm("Are you sure this record is going to be deleted !!")){
$.ajax({ 
           method: "POST", 
           url: "EditTrips.php",
           data: {functioncall: 'deleteTrip',tripId : text},
           success:function(results) { 
            alert(results);
            window.location.reload(true);

        },
        error: function(xhr, status, error) {
 console.error(xhr);
 alert("error");
 }

         });
}
}
else if(title=="add"){

$("#form1").toggle();

}

else if(title=="save"){

   var Tname = document.getElementById("Tname").value;
   var Tloc = document.getElementById("Tloc").value;
   var Tprice = document.getElementById("Tprice").value;
   var Tdesc = document.getElementById("Tdesc").value;
   var Tpic = document.getElementById("Tpic").value;


if(confirm("Are you sure this record is going to be Saved !")){

   
$.ajax({ 
           method: "POST", 
           url: "EditTrips.php",
           data: {functioncall: 'save',Trip : Tname , Location : Tloc , Price: Tprice, Description : Tdesc, Picture : Tpic},
           success:function(results) { 
            alert(results);
        },
        error: function(xhr, status, error) {
 console.error(xhr);
 alert("error");
 }

         });
}
}else if(title=="update"){
if(confirm("Are you sure this record is going to be Updated !")){
$.ajax({ 
           method: "POST", 
           url: "EditTrips.php",
           data: {functioncall: 'update',tripId : text , name: name, location: location,
         Price: Price,
       Description: Description,
       image: image},
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