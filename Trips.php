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

}

mysqli_close($conn);
?>
