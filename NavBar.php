<?php

include 'DB.php';
session_start();

$Data = array();
	
 if ($_SESSION["Logged_in"])
{
    array_push($Data,$_SESSION["Logged_in_Name"]);
    echo json_encode($Data);
} 

else 
{
	echo json_encode("Error Query");
}
?>