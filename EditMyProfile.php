<?php

include 'DB.php';
session_start();


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc'); // valid extensions
$path = 'uploads/'; // upload directory



$test =$_REQUEST['functioncall']; 

if($test == "loadprofile") { 
 $select = mysqli_query($conn, "SELECT * FROM `users` WHERE `ID` = ". $_SESSION["Logged_in_ID"]) ;

   
   $result_array = array();

   if ($select->num_rows > 0) {

    while($row = $select->fetch_assoc()) {

        array_push($result_array, $row);

    }

}

//  send a JSON encded array to client 
	header('Content-type: application/json');
   

	echo json_encode($result_array);
    }

     elseif ($test == "photo") {

      $img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
  $img = $_SESSION["Logged_in_ID"]."Profile_photo.jpg";
$path = $path.strtolower($img); 
if(move_uploaded_file($tmp,$path)) 
{
echo json_encode("Successfully Uploaded");

//insert form data in the database
$insert = mysqli_query($conn,"UPDATE `users` SET `Picture`= '$path' WHERE `ID` = ". $_SESSION["Logged_in_ID"]);

}
} 
else 
{
echo json_encode('Invalid photo ');
}
    }   





 if($test == "editprofile") { 
   
   

	 $first_name = $_POST['first_name'];
	 $last_name = $_POST['last_name'];
	 $email = $_POST['email'];
	 $num = $_POST['mobile'];
	 $password = $_POST['password'];


$sql = "UPDATE `users` SET `First Name`= '$first_name',`Last Name`= '$last_name',`Email`= '$email',`Number`= '$num',`Password`='$password' WHERE `ID` = ". $_SESSION["Logged_in_ID"];
$update = mysqli_query($conn,$sql);

if($update){

echo json_encode("Your profile has been updated");
$_SESSION["Logged_in_Name"]= $first_name;
}
else{
  echo json_encode("Sorry, there was an error updating Your profile");
}

}





?>