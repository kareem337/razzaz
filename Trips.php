<?php 
session_start(); 
	include('DB.php');
	// check GET request id param
	if(isset($_SESSION["Clicked_Trip_ID"])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_SESSION["Clicked_Trip_ID"]);

		// make sql
		$sql = "SELECT * FROM trips WHERE ID = $id";

		$_SESSION['trip_id'] = $id;

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$show = mysqli_fetch_assoc($result);

		mysqli_free_result($result);


        $reviews = "SELECT * FROM reviews WHERE Trip_ID =". $_SESSION["Clicked_Trip_ID"]." ORDER BY `Date` DESC";

        $Rate ="SELECT AVG(`Rating`) FROM reviews WHERE Trip_ID =". $_SESSION["Clicked_Trip_ID"];

        $Rate1 ="SELECT COUNT(`Rating`) FROM `reviews` WHERE `Trip_ID` =". $_SESSION["Clicked_Trip_ID"]." AND `Rating` = 1";

        $Rate2 ="SELECT COUNT(`Rating`) FROM `reviews` WHERE `Trip_ID` =". $_SESSION["Clicked_Trip_ID"]." AND `Rating` = 2";

        $Rate3 ="SELECT COUNT(`Rating`) FROM `reviews` WHERE `Trip_ID` =". $_SESSION["Clicked_Trip_ID"]." AND `Rating` = 3";

        $Rate4 ="SELECT COUNT(`Rating`) FROM `reviews` WHERE `Trip_ID` =". $_SESSION["Clicked_Trip_ID"]." AND `Rating` = 4";

        $Rate5 ="SELECT COUNT(`Rating`) FROM `reviews` WHERE `Trip_ID` =". $_SESSION["Clicked_Trip_ID"]." AND `Rating` = 5";

        $Rateing1 = mysqli_query($conn, $Rate1);
        if($Rateing1){
        $countRate1 = mysqli_fetch_assoc($Rateing1);
    }
        $Rateing2 = mysqli_query($conn, $Rate2);
         if($Rateing2){
        $countRate2 = mysqli_fetch_assoc($Rateing2);
}
        $Rateing3 = mysqli_query($conn, $Rate3);
         if($Rateing3){
        $countRate3 = mysqli_fetch_assoc($Rateing3);
}
        $Rateing4 = mysqli_query($conn, $Rate4);
         if($Rateing4){
        $countRate4 = mysqli_fetch_assoc($Rateing4);
}
        $Rateing5 = mysqli_query($conn, $Rate5);
         if($Rateing5){
        $countRate5 = mysqli_fetch_assoc($Rateing5);
}
        $Rateing = mysqli_query($conn, $Rate);
         if($Rateing){
        $avgRate = mysqli_fetch_assoc($Rateing);
        }

        $result2 = mysqli_query($conn, $reviews);


$array= array(array());
$j=0;

$array[0][0]= "";
$array[0][1]= "";
$array[0][2]= "";
$array[0][3]= "";
$array[0][4]= "";

        while($row = $result2 -> fetch_array(MYSQLI_ASSOC))
{

$array[$j][0]= $row["User_name"];
$array[$j][1]= $row["Review"];
$array[$j][2]= $row["Date"];
$array[$j][3]= $row["User_ID"];
$array[$j][4]= $row["Rating"];
$j++;


}


		} 

	else
	{
		die("Not Requested");
	}

	if( isset($_POST['book'] ) )
	{
		if(isset($_SESSION["Logged_in_ID"])){
		$price = $_POST['price'];
		$date = $_POST['date'];
		$quantity = $_POST['quantity'];
		$tripid = $_SESSION['trip_id'];
		$User = $_SESSION["Logged_in_ID"];
		$_SESSION['tid']= $tripid;
        $_SESSION['date']=$date;

		$sql = "INSERT INTO `cart` (`ID`, `User_ID`,`trip_id` ,`Date_Created`, `Total_Price`, `quantity`) 
		VALUES (NULL, '$User', '$tripid' ,'$date', '$price', '$quantity')";
		if (mysqli_query($conn, $sql)) {
			print "<script>alert('Added To Cart')</script>";
			header( "refresh:0; url=TripsH.php" );
			
		} 
		else {
			echo "<script>alert('Error in Adding')</script>";
	 }
		
}else {
	echo "<script>alert('You need to Log in first')</script>";
}

	}

if( isset($_POST['review'] ) )
	{
		if(isset($_SESSION["Logged_in_ID"])){
		$rev = $_POST['review-text'];
		
			
if($rev !=" "){
	
		$rate = $_POST['rate-star'];
		$tripid = $_SESSION['trip_id'];
		$Userid = $_SESSION["Logged_in_ID"];
		$Username = $_SESSION["Logged_in_Name"];

		$insert = "INSERT INTO `reviews` (`ID`, `Trip_ID`, `User_ID`, `Review`, `Rating`, `User_name`, `Date`) VALUES (NULL, '$tripid', '$Userid', '$rev', '$rate', '$Username', CURRENT_TIMESTAMP)";

        $result2 = mysqli_query($conn, $insert);
        echo "<script>alert('Thanks for Your review')</script>";
        header( "refresh:1; url=TripsH.php" );
} else {echo "<script>alert('Your review is empty')</script>";
header( "refresh:1; url=TripsH.php" );
 }


}
		else {
	echo "<script>alert('You need to Log in first')</script>";
	header( "refresh:5; url=TripsH.php" );
}
}



mysqli_close($conn);
?>
