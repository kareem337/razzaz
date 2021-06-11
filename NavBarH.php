<html>
<head>

<meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

 
  <link href="NavBar.css" rel="stylesheet">

</head>
<body>

 <header id="header" class="fixed-top ">
    <div class="container-fluid d-flex align-items-center justify-content-between">

      <!-- Uncomment below if you prefer to use an image logo -->
       <a href="HomePage.php" class="logo"><img src="assets/img/navv1.png" alt=""  class="img-fluid" ></a>
 
      <nav class="nav-menu d-none d-lg-block">
        <ul >
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="index.php#about-boxes">About</a></li>
          <li><a href="index.php#services">SERVICES</a></li>
          <li><a href="DestinationH.php">Trips</a></li>
          <li><a href="Museum_CategoryH.php">Museums</a></li>
          <li class="" id="links">
              
           
          </li>
          

        </ul>
      </nav><!-- .nav-menu -->
<div id="signIn">
      <a href="SignInH.php" class="get-started-btn" style="text-decoration: none;">Sign In</a>
    </div>
     </div>
  </header>
  
  </body>

  <script>
$.ajax({ 
           
           method: "GET", 
           url: "NavBar.php",
           dataType:'json',
           success:function(results) { 
          var result = results;
  

          if(result!=0){

          $('#links').append("<a href='UserContact.php'>Contact Us</a><ul id='inLinks'></ul>")

          $.each( result, function( key, value ) { 


             $('#signIn').html("<a href='store.php' class='get-started-btn' style='text-decoration: none;'><i class='fa fa-shopping-cart' style='font-size:14px';></i></a> <a href='EditMyProfileH.php' class='get-started-btn' style='text-decoration: none;'>"+value+"</a><a href='logout.php' class='get-started-btn' style='text-decoration: none;'>Log out</a>" )
          

           
});  
}
           },
        error: function(xhr, status, error) {
 console.error(xhr);
 }
           
        

         });
</script>
 <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

    </html>