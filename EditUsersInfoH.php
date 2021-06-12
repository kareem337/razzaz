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
  border: 1px solid #ddd;
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
        
  </style>
<div class = "h"> <h1> Users Informations </h1>
<form method="GET">
<input type = "text" name= "search" class = "text"><span class="fas fa-search" style = "margin-left: 20px; margin-left:-30px;"></span> </div>
<button type="submit">Submit</button>
</form>

<?php


?>
</head>

<body style = "background: #668B91;">
	
<table class="mx-auto" id="customers">
  
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Number</th>
      <th scope="col">User Type ID</th>
      <th scope="col">Users Types </th>
      <th scope="col">Delete </th>
    </tr>

  <tbody>
    <?php
     
 
       $query = "SELECT * FROM users";
       $result = mysqli_query($conn,$query);
       $UI = "SELECT * FROM `user_type`";
       
       


		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {     
        $result2 = mysqli_query($conn,$UI);        
		    $id = $row['ID'];
		    $fname = $row['First Name'];
		    $lname = $row['Last Name'];
		    $email = $row['Email'];  
		    $gender = $row['Gender'];  
        $num = $row['Number']; 
		    $UTI = $row['User_Type_ID']; //type id rakam
		    $UIT = "SELECT `type` FROM `user_type` WHERE ID=".$UTI; //type id esm
        $res = mysqli_query($conn,$UIT);
		
		?>
	<tr>
		<td><?php echo $id; ?>  <input type="hidden" value="<?php echo $id; ?>"></td>
		<td><?php echo $fname; ?></td>
		<td><?php echo $lname; ?></td>
        <td><?php echo $email; ?></td> 
        <td><?php echo $gender; ?></td> 
        <td><?php echo $num; ?></td>
        <td><?php $Utype = $res -> fetch_array(MYSQLI_ASSOC); echo $Utype['type']; ?></td> 
        <td>
          <select oninput="defineValues(this.value,<?php echo $id; ?>)">
            <?php while($roww = mysqli_fetch_assoc($result2)) 
              {
                  if($roww['ID'] == $UTI )
                  {
                      echo "<option value='".$roww['ID']."'selected >".$roww['type']."</option>";}
                  else 
                  {
                      echo "<option value='".$roww['ID']."'>".$roww['type']."</option>";
                  }
              }
            ?>
          </select>
        </td> 
       <td style="width: 80px" > <a href="EditUsersInfoH.php?delete=<?php echo $id;?>"> <button value="Delete" class="failure"> Delete </button></a></td>
	</tr>
	<?php
    }
    ?>
  
  <tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
        
  <td style="width: 80px" > <a id="idTag" href="EditUsersInfoH.php?id=<?php echo $id; ?>"><button value="save" type="button" name="Save" class="success"> Save </button></a></td>
  </tr>
  
</tbody>
</table>






<?php
					
						if( isset($_GET['id']) && isset($_GET['type']) )
							{
                $user_id = $_GET['id'];
                $userTid = $_GET['type'];
               echo $user_id;
               echo $userTid;
								$Admin->editRecords($user_id,  $userTid);
                echo '<script>window.location="EditUsersInfoH.php"</script>';
							}
            elseif( isset($_GET['delete'] ) )
            {
              $user_id = $_GET['delete'];
              $Admin->deletRecords($user_id);
              echo '<script>window.location="EditUsersInfoH.php"</script>';
            }
            elseif( isset($_GET['search'] ) )
            {
              $Admin->Search();
              echo '<script>window.location="EditUsersInfoH.php"</script>';
            }
           
?>


<script>
  function defineValues(x,y)
  {
    

    var idTag = document.getElementById('idTag');
    idTag.href = "EditUsersInfoH.php?id="+y+"&type="+x;
  }



</script>

</body>

</html>