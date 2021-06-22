<!DOCTYPE html>
<html lang="en">
<?php   
include 'controller/UserController.php';
include 'view/TripView.php';
$UserC = new UserController();
$TripV = new TripView("","","","");
?>

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Razzaz Tours</title>
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">	
<link type="text/css" rel="stylesheet" href="assets/css/Trips.css" /> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-svg/theme.js"></script>
</head>

<script>
  $(function()
  {
    var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#currentDate').attr('min', maxDate);
});
  </script>

<body>

   <header>
     <?php
     include'NavBarH.php';
     ?>
      </header>

	<div id="booking" class="section"  style="background-image: url('img/<?php $TripV->fetchBackground(); ?>'); " >
		<div class="section-center">
			<div class="container">
				<div class="row">
					<?php $TripV->fetchTrip(); ?>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
						<?php $TripV->fetchForm(); ?>
						</div>
					</div>
				</div>
			</div>      
        </div>
    </div>	

<?php
	if(isset($_SESSION["Logged_in_ID"]))
		{
			if( isset($_POST['book']))
				{
					$UserC->insertTripRecord();
				}
		}
	else 
		{
			echo "<script>alert('You will not be able to book unless you log in')</script>";
		}
?>
</body>
</html>