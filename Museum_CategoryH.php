<?php 

	include('DB.php');
?>

<!DOCTYPE html>
<head>
<!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="Museum_Category.css" rel="stylesheet">
</head>
<html>
    
<header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->

   
    <img src="img/backgrounds/blyde-river-canyon-famous-travel-destination-south-africa.jpg" alt="BACKGROUND IMAGE" width="100%" height="670">
    
	<h1 class="title">Museums</h1>

<div class="input-group rounded" id="s" >
         <input type="search" class="form-control rounded" placeholder="Search Museums" aria-label="Search"
         aria-describedby="search-addon"  onkeyup="showResult(this.value)"/>
         <span class="input-group-text border-0" id="search-addon">
         <i class="fas fa-search"></i>
         </span>
         
</div>
<div id="Museum_Livesearch" ></div>

	<div class="container">
		<div class="row">
	<!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Museums</h2>
          <p>Check our museums</p>
        </div>


        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200" id="MuseumDiv">

	

         

        </div>

      </div>
    </section><!-- End Portfolio Section -->


		</div>
	</div>

<script>
$( document ).ready(function() {
   var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("MuseumDiv").innerHTML=this.responseText;
      }
  }

xmlhttp.open("GET","Museum_Livesearch.php?museum=1",true);
xmlhttp.send();
});



function showMuseum(str) {

var xmlhttp=new XMLHttpRequest();
  xmlhttp.open("GET","Museum_Livesearch.php?ID="+str,true);
  xmlhttp.send();
  window.location.href = "MuseumsH.php";

}


function showResult(str) {
  if (str.length==0) {
    document.getElementById("Museum_Livesearch").innerHTML="";
    document.getElementById("Museum_Livesearch").style.border="0px";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("Museum_Livesearch").innerHTML=this.responseText;
      document.getElementById("Museum_Livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","Museum_Livesearch.php?query="+str,true);
  xmlhttp.send();
}
</script>

</html>