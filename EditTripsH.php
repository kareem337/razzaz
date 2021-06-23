<?php 
include'adminmenu.php';

session_start();
  if( $_SESSION["Logged_in_UTID"] == 2)
  {
    die("Forbidden");
  }

?>

<!DOCTYPE html>
<html>
<?php

include 'controller/AdminController.php';
include 'view/EditProductView.php';
$AdminV = new EditProductView();
$AdminC = new AdminController();
?>
<head>
	<?php
	include('DB.php');
	?>
   
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 
 
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  

  

</head>




<body style = "background: #668B91;">
	 <link rel="stylesheet" href="assets/css/Admin.css">


   <?php 
   
         $AdminV->searchView(); 
   
         $AdminV-> fetchTrips();

        $AdminV->addTripform();
   ?>





<?php

					
					  	if( isset($_POST['save'] ) )
							{
								$AdminC->saveTrip();
							}
				
              elseif( isset($_GET['delete'] ) )
              {
                $AdminC->deleteTrip();
                echo '<script>window.location="EditTripsH.php"</script>';
              }   
							?>

<script>
function openForm() {
  $("#form1").toggle();
}







</script>
</body>

</html>