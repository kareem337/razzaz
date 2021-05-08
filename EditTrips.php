<?php
include 'DB.php';
session_start();

$test =$_REQUEST['functioncall']; 

if($test == "deleteTrip") {   
	 $trip_id = $_POST['tripId'];

$sql = "DELETE FROM `trips` WHERE `ID` = ". $trip_id;
$delete = mysqli_query($conn,$sql);


if($delete){

echo json_encode("Done");
}
else{
	echo json_encode($trip_id);
	echo json_encode("failed");
    }
}
elseif ($test == "save")
{

 $t = $_POST['Trip'];
 $l = $_POST['Location'];
 $p = $_POST['Price'];
 $d = $_POST['Description'];
 $P = $_POST['Picture'];


$sql = "INSERT INTO `trips`(`name`,`location`,`Price`, `Description`, `image`, `background`) VALUES ('$t','$l','$p','$d','$P','$P')";
$save = mysqli_query($conn,$sql);

if($save){

echo json_encode("Done");
}
else{
	echo json_encode("failed");
    }
    
}
elseif ($test == "update")
{
	
 $id = $_POST['tripId'];
 $t = $_POST['name'];
 $l = $_POST['location'];
 $p = (int)$_POST['Price'];
 $d = $_POST['Description'];
 $P = $_POST['image'];

 $sql = "UPDATE `trips` SET `name` ='$t',`location` ='$l',`Price` =".$p.", `Description` ='$d', `image` ='$P', `background`='$P' WHERE `ID` = '$id'";
$update = mysqli_query($conn,$sql);

if($update){

echo json_encode("Done");
}
else{
	echo json_encode("Enter");
    }

	}


?>