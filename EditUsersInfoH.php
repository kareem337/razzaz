<?php
session_start();
  if( $_SESSION["Logged_in_UTID"] == 2) {
    die("Forbidden");
  }

?>

<!DOCTYPE html>
<html>

<head>

	 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php
  include('DB.php');

     include'NavBarH.php';
     ?>

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
<div class="h" > <h1><b> Users Informations<b> </h1></div>
</head>




<body>
	 
<form method="POST">
	
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
      <th scope="col">Save </th>
    </tr>
  </thead>
  <tbody>
    <?php
     
 
       $query = "SELECT * FROM users";
       $result = mysqli_query($conn,$query);
       $UI = "SELECT `ID`, `type` FROM `user_type`";
       


		while($row = $result -> fetch_array(MYSQLI_ASSOC)) {     
        $result2 = mysqli_query($conn,$UI);        
		    $id = $row['ID'];
		    $fname = $row['First Name'];
		    $lname = $row['Last Name'];
		    $email = $row['Email'];  
		    $gender = $row['Gender'];  
        $num = $row['Number']; 
		    $UTI = $row['User_Type_ID']; 
		    $UIT = "SELECT `type` FROM `user_type` WHERE ID=".$UTI;
        $res = mysqli_query($conn,$UIT);
		
		?>
	<tr>
		<td><?php echo $id; ?></td>
		<td><?php echo $fname; ?></td>
		<td><?php echo $lname; ?></td>
        <td><?php echo $email; ?></td> 
        <td><?php echo $gender; ?></td> 
        <td><?php echo $num; ?></td>
        <td><?php $Utype = $res -> fetch_array(MYSQLI_ASSOC); echo $Utype['type']; ?></td> 
        <td> <select name="UTI" ><?php while($row = mysqli_fetch_assoc($result2)) {
          if($row['ID'] == $UTI ){echo("<option value='".$row['ID']."'selected >".$row['type']."</option>");}
          else echo("<option value='".$row['ID']."'>".$row['type']."</option>");
      }?> </select></td> 
       <td style="width: 80px" ><button value="delete" name="delete" class="btn btn-danger"> Delete </button></td>
       <td style="width: 80px" ><button value="save" name="save" class="btn btn-success"> Save </button></td>

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
           url: "EditUsersInfo.php",
           data: {functioncall: 'deleteUser',userId : text},
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
else if(title=="save"){
if(confirm("Are you sure this record is going to be Updated !")){
$.ajax({ 
           method: "POST", 
           url: "EditUsersInfo.php",
           data: {functioncall: 'save',userId : text , userTId: text2},
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