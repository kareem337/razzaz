<!DOCTYPE html>
<html lang="en">
<?php
include'Trips.php';
?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Booking Form HTML Template</title>

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

    <<!-- default styles -->


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
  <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        
// initialize with defaults
$("#input-id").rating();


</script>
<body>
   <header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->
	<div id="booking" class="section"  style="background-image: url('img/<?php echo $show['background']; ?>'); " >
		<div class="section-center">
			<div class="container">
				<div class="row">
					<div class="col-md-7 col-md-push-5" style="color: white;">
						<div class="booking-cta">
							<h1> <?php echo $show['name']; ?> </h1> 
							<p> <?php echo $show['Description']; ?> </p>
						</div>
						<h3> Users Average Rating</h3>
<input  type="text" class="rating" data-size="xl" value="<?php echo $avgRate['AVG(`Rating`)']; ?>" data-readonly="true">
					
					</div>
					<div class="col-md-4 col-md-pull-7">
						<div class="booking-form">
							<form action="" method="POST">
								<div>
									<h1> <?php echo $show['Price']; ?> $ </h1>  <h5> &nbsp; per person</h5>
									<input type="hidden" name="price" value="<?php echo $show['Price']; ?>">
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
						</div>
					</div>
				</div>


			</div>


                
            </div>

        </div>

         <div class="well well-sm" style="width: 50%; margin-left:25%; margin-top: 20px; ">
        <form action="" method="POST">
<input type="hidden" name="review-text" id="review-text">
<input type="hidden" name="rate-star" id="rate-star">

        <textarea id="text"> </textarea>
        <div class="row"  id="comment">
        	<input id="input-id" type="text" class="rating" data-size="lg" data-step="1">
        <button class="submit-btn btn-primary" name="review" onclick="insert()"> Add Review</button> 

        

        </div>

        
          </form> 
        </div> 


        <div class="container"  style="width: 1040px; margin-left:22%;">
    <div class="row" style="width: 74%;">
        <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Recent Reviews</h3>
                
            </div>
            <div class="panel-body" style=" font-family: Helvetica;">
                <ul class="list-group">
        <?php
     $size=sizeof($array);
if($size > 10){
	$size = 10;
}
      for($a=0; $a<$size; $a++){

$name=$array[$a][0];
$rev=$array[$a][1];
$date=$array[$a][2];
$id=$array[$a][3];
$rate=$array[$a][4];

$i=0;

		?>
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-xs-2 col-md-1">
                                <img src="uploads/<?php echo $id; ?>profile_photo.jpg" class="img-circle img-responsive" alt="" />   </div>
                            <div class="col-xs-10 col-md-11">
                                <div>
                                    
                                    <div class="mic-info">
                                        By: <?php echo $name; ?> On <?php echo $date; ?>
                                        <input type="text" class="rating" data-size="xs" value="<?php echo $rate; ?>" data-readonly="true">
                                    </div>
                                </div>
                                <div class="comment-text">
                                  <?php echo $rev; ?>
                                </div>
                                
                            </div>
                        </div>
                    </li>
                <?php } ?>
                   
                </ul>

                
            </div>
        </div>
    </div>
</div>

    </div>
</div>




		</div>
	</div>
</body>



<script>

function insert(){

var rev= document.getElementById("text").value;
var rate = document.getElementById("input-id").value;
document.getElementById("review-text").value = rev;
document.getElementById("rate-star").value = rate;


}





	</script>

</html>