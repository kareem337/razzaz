<!DOCTYPE html>
<html lang="en">
<?php
include 'classes/TripsClass.php';
include 'classes/User.php';
$show = new Product("name", "description", "background", "price");
$reserve = new Reserve();


?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Razzaz Tours</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">


	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="Trips.css" /> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
	<link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- default styles -->


  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>



<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />

<!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

<!-- important mandatory libraries -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/js/star-rating.min.js" type="text/javascript"></script>

<!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.6/themes/krajee-svg/theme.js"></script>


</head>

<script>
  $(function(){
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
   <header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->
	<div id="booking" class="section"  style="background-image: url('img/<?php print($show->getBackground()); ?>'); " >
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5" style="color: white;">
						<div class="booking-cta">
							<h1> <?php print($show->getName()); ?> </h1> 
							<p> <?php print($show->getDescription()); ?> </p>
						</div>
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form action="" method="POST">
								<div>
									<h1> <?php print($show->getPrice()); ?> $ </h1>  <h5> &nbsp; per person</h5>
									<input type="hidden" name="price" value="<?php print($show->getPrice()); ?>">
								</div>
								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											<span class="form-label">Date</span>
											<input class="form-control" name="date" type="date" id="currentDate" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-4">
										<div class="form-group">
											<span class="form-label">Persons</span>
											<input type="number"  class="form-control" id="quantity" value="1" name="quantity" min="1"  required>
									
										</div>
									</div>
								</div>
								<div class="form-btn">
									<button class="submit-btn" name="book">BOOK</button>
								</div>
							</form>

							<?php
						if(isset($_SESSION["Logged_in_ID"]))
						{
							if( isset($_POST['book'] ) )
							{
								$date = $_POST['date'];
								$quantity = $_POST['quantity'];
								$price = $_POST['price'];
								$tripid = $_SESSION['Clicked_Trip_ID'];
								$User = $_SESSION["Logged_in_ID"];
								$reserve->saveRecords($date, $quantity, $price, $tripid, $User);
							}
							

						}
						else 
							{
								echo "<script>alert('You will not be able to book unless you log in')</script>";
							}
							?>

						</div>
					</div>
				</div>


			</div>


                
            </div>

        </div>



</body>




</html>