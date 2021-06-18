<?php
include 'DB.php';
session_start();

if($_POST)
{


	$msg=$_POST['msg'];
    $reciever =  $_SESSION['reciever'];

    $sql="INSERT INTO `chat`(`sender`, `sender_name`, `message`, `reciever`) VALUES ('$_SESSION[Logged_in_ID]', '$_SESSION[Logged_in_Name]', '".$msg."', '$reciever')";

    $query = mysqli_query($conn,$sql);
    
	if($query)
	{
        header("location: chatAdminN.php?id=".$reciever);
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>