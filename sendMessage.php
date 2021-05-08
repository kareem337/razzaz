<?php

include 'DB.php';
session_start();
if(isset($_POST))
{
	$msg=$_POST['msg'];
	$url=$_POST['url'];
	
    
     $filename=$_FILES['image']['name'];
     $tmp=$_FILES['image']['tmp_name'];
     move_uploaded_file($tmp,'images/'.$filename);

	$sql="INSERT INTO `chat`(`sender`, `sender_name`, `message`, `links`,`images`) VALUES ('$_SESSION[Logged_in_ID]', '$_SESSION[Logged_in_Name]', '".$msg."', '".$url."', '".$filename."')";

	$query = mysqli_query($conn,$sql);
	if($query)
	{
		header('Location: chatPage.php');
	}
	else
	{
		echo "Something went wrong";
	}
	
	}
?>