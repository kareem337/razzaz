
<?php
session_start();
  if( $_SESSION["Logged_in_UTID"] == 2) {
    die("Forbidden");
  }

?>
<!DOCTYPE html>
<html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<head>
	<?php
	include('DB.php');
 
   include'NavBarH.php';
  
	?>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" href="EditUsersInfo.css">
  
  


  <style>
    table{
			border:1px solid #000;
		}
		table td,table th {
			border:1px solid #000;
		}
    </style>
<div class="h" > <h1><b>Contact Users<b> </h1></div>
</head>




<body>
	
<form>
	
<table class="mx-auto" id="f">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Chat</th>
    </tr>
  </thead>
  <tbody>
    <?php
     
 
       $query = "SELECT * FROM users WHERE User_Type_ID = 2";
       $result = mysqli_query($conn,$query);
       $UI = "SELECT `ID`, `type` FROM `user_type`";
       


		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {     
        $result2 = mysqli_query($conn,$UI);        
		    $id = $row['ID'];
		    $fname = $row['First Name'];
		    $lname = $row['Last Name'];
		    $email = $row['Email'];  
		
		?>
	<tr>
		<td><?php echo $id; ?></td>
        <td><?php echo $email; ?></td> 
       <!-- <td style="width: 80px" ><button value="save" name="save" class="btn btn-success"> Save </button></td> -->
      <td style="width: 80px" ><a class="btn btn-success" href="chatAdmin.php?id=<?php echo $row['ID'] ?>">Contact</a> </td> 
	</tr>
	<?php
    }
    ?>
  </tr>
  </tbody>
</table>
</form>
</body>
</html>