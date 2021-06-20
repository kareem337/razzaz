
<?php
include'adminmenu.php';
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
 
  
  
	?>
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
 <link rel="stylesheet" href="EditUsersInfo.css">
  
  


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
<div class="h" > <h1><b>Contact Users<b> </h1></div>
</head>




<body>
	
<form>
	
<table class="mx-auto" id="customers">
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
      <td style="width: 80px" ><a class="success" href="ChatAdminN.php?id=<?php echo $row['ID'] ?>">Contact</a> </td> 
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