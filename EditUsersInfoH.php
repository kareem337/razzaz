<?php
session_start();
  if( $_SESSION["Logged_in_UTID"] == 2) {
    die("Forbidden");
  }
include'adminmenu.php';
?>

<!DOCTYPE html>
<html>
<?php
include 'classes/Admin.php';
$Admin = new Admin();
?>
<style>
    
    </style>
<head>
   
	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  
  <?php
  include('DB.php');
   ?>

     
 <link rel="stylesheet" href="EditUsersInfo.css">
  <style>
    table{
			border:1px solid #000;
		}
		table td,table th {
			border:1px solid #000;
		}
    </style>
<div class="h" > <h1> Users Informations </h1></div>
</head>




<body>
	
<table class="mx-auto" id="f">
  <thead>
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
  </thead>
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
       <td style="width: 80px" > <a href="EditUsersInfoH.php?delete=<?php echo $id;?>"> <button value="Delete" class="btn btn-danger"> Delete </button></a></td>
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
  <td style="width: 80px" > <a id="idTag" href="EditUsersInfoH.php?id=<?php echo $id; ?>"><button value="save" type="button" name="Save" class="btn btn-success"> Save </button></a></td>
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