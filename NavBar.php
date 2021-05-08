<?php

include 'DB.php';
session_start();

$Data = array();
$flag = 0;

if(isset($_SESSION["Logged_in"]) && $_SESSION['Logged_in'] == true){
 

 $pages = "SELECT `Access`,`Link` FROM `pagesaccess` WHERE UTI=".$_SESSION["Logged_in_UTID"];
  $res2 = mysqli_query($conn,$pages);
      	

 
       if ($res2->num_rows > 0) {
 

    while($row = $res2->fetch_assoc()) {

        array_push($Data, $row);

    }
    array_push( $Data,$_SESSION["Logged_in_Name"]);

echo json_encode($Data);
} else {
	echo json_encode("Error Query");
}


} else {echo json_encode($flag);}









?>