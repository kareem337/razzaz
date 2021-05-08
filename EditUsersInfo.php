<?php
include 'DB.php';
session_start();

$test =$_REQUEST['functioncall']; 

if($test == "deleteUser") {   
	 $user_id =(int)$_POST['userId'];

$sql = "DELETE FROM `users` WHERE `ID` = ". $user_id;
$delete = mysqli_query($conn,$sql);


if($delete){

echo json_encode("Done");
}
else{
	echo json_encode("failed");
    }
}
elseif ($test == "save")
{

 $user_id = $_POST['userId'];
 $userTid = $_POST['userTId'];

$sql = "UPDATE `users` SET `User_Type_ID`=". $userTid . " WHERE `ID` = ". $user_id;
$save = mysqli_query($conn,$sql);

if($save){

echo json_encode("Done");
}
else{
	echo json_encode("failed");
    }
    
}


?>