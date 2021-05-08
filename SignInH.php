<!DOCTYPE html>
<html>

<body>

<head>

 
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->
 <link rel="stylesheet" href="SignIn.css">
    <div class="signin-form">
    <form id="SignInF" method="POST">

          <h1>Sign In</h1>

    <p id="p">Please fill in this form to Sign In.</p>
    <hr>

        <div class="form-group">
            <div class="row">

            <div class="col-xs-3">
                <input type="text" id="email" name="email" placeholder="Email" class="form-control" required>
            </div>
        </div>
    </div>

            <div class="form-group">
                <input type="password" id="pwd" name="pwd" placeholder="Password" class="form-control" required>
            </div>

            <div class="form-group">
                 <button type="submit" value="Submit" name="sign_in" class="btn btn-success btn-lg">Sign In</button>
            </div>
        

    </form>

    <div class="hint-text"> New User? <a href="SignUpH.php" style="color:white;" >Sign Up here</a></div>

    <div id="result"></div>

</div>

<script>

$(document).ready(function() {
    $( "form" ).submit(function( event ) { 
    event.preventDefault(); 
var pwd = $("#pwd").val();
 var email = $("#email").val();

  $.ajax({
 type: "POST",
 url: "SignIn.php",
 data: {
 email: email,
 pwd: pwd
 },

 success: function(data) {

 if(data==1){
 	alert("Logged In");
 	window.location.href = "HomePage.php";

}
 	else alert("Wrong Email or password");
 },
 error: function(xhr, status, error) {
 console.error(xhr);
 }
 });
});
    });

</script>


</body>
</html>