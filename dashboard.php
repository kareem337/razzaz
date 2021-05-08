<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./do7a.css">



  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <title>Dashboard</title>

</head>
<body>
  <header>
    html>
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
       <a href="HomePage.php" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid" ></a>
 
      <nav class="nav-menu d-none d-lg-block">
        <ul >
          <li class="active"><a href="HomePage.php">Home</a></li>
          <li><a href="HomePage.php#about-boxes">About</a></li>
          <li><a href="HomePage.php#services">SERVICES</a></li>
          <li><a href="DestinationH.php">Destinations</a></li>
          <li class="drop-down" id="links">
              
           
          </li>
          

        </ul>
      </nav><!-- .nav-menu -->
<div id="signIn">
      <a href="SignInH.php" class="get-started-btn" style="text-decoration: none;">Sign In</a>
    </div>
      

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

          $('#links').append("<a href=''>Links</a><ul id='inLinks'></ul>")

          $.each( result, function( key, value ) { 

       if(typeof value != "string"){
            $('#inLinks').append( "<li><a href='"+value['Link']+"'>"+value['Access']+"</a></li>");
          }else {
             $('#signIn').html("<a href='store.php' class='get-started-btn' style='text-decoration: none;'><i class='fa fa-shopping-cart' style='font-size:14px';></i></a> <a href='EditMyProfileH.php' class='get-started-btn' style='text-decoration: none;'>"+value+"</a><a href='logout.php' class='get-started-btn' style='text-decoration: none;'>Log out</a>" )
          }

           
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
  </header>
  
  <div class="body-container">
    <div class="container">
      <div class="row">
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
        <div class="col text-center p-2 py-4 m-2 text-dark border rounded bg-lg">
          <i class="bi-alarm"></i>
          <div class="">
            Item
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>