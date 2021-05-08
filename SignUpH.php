<!DOCTYPE html>
<html>



<head>

  <link rel="stylesheet" href="SignUp.css">
  

</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<div class="signup-form"> 

<form action="" method="post">

 <h1>Sign Up</h1>

  <p id="p">Please fill in this form to create a new account.</p>
  <hr>

<div class="form-group">
            <div class="row">

        <div class="col-xs-8">
        <input  id="firstname" type="text" placeholder="Enter Your First Name" name="firstname" class="form-control" required> </div>
            </div>          
        </div>

     <div class="form-group">

     <input id="lastname" type="text" placeholder="Enter Your Last Name" name="lastname" class="form-control" required>

     </div>

     <div class="form-group">
     <input id="email" type="email" placeholder="Enter Email" name="email" class="form-control"required>
     </div>

    
    <div class="form-group">
    <input id="number" type="number" placeholder="Enter Your Number" name="number" class="form-control" maxlength="11" required>
    </div>


    <div class="form-group">
    <input id="password" type="password" placeholder="Enter Password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
    <input id= "confirm_password" type="password" placeholder="Repeat Password" name="confirm_password" class="form-control" required>
    </div>

    <span id='message' ></span><br><br>

    <div class="form-group">
    Male<input type="radio" id="male" name="gender" value="male" class="form-radio"required> 
    
    Female<input type="radio" id="female" name="gender" value="female" class="form-radio"required> 
    </div>


    <div class="form-group">
    <label class="checkbox-inline"> <input type="checkbox" required>
    By creating an account you must agree to our <a href="#">Terms & Privacy</a>.</label> 
    </div>




    <div class="form-group">
      <button type="submit" value="Submit" name="Submit" class="btn btn-primary btn-lg">Sign Up</button>
    </div>

      



<script>



$(document).ready(function() {

  $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val() && $('#password').val()!="") {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});

var chkmail= -1;
 $('#email').on('keyup', function () {

$.ajax({ 
           
           method: "GET", 
           url: "SignUp.php",
           data: { function : "checkEmail"},
           dataType:'json',
          success:function(results){
          var result = results;
          var checkEmail = $("#email").val();

          $.each( result, function( key, value ) { 
      
              if(checkEmail == value['Email']){

              $("#email").val("");
              $("#email").attr("placeholder", "This Email already used");
              chkmail = 1;

              }
            chkmail = 0;
                 });  
        },
 error: function(xhr, status, error) {
 console.error(xhr);
 console.error(status);
 console.error(error);
 }

         });
});

    $( "form" ).submit(function( event ) {  
      event.preventDefault();

 var firstname = $("#firstname").val();
 var lastname = $("#lastname").val();
 var email = $("#email").val();
 var gender = $("input[name='gender']:checked").val();
 var number = $("#number").val();
 var password = $("#password").val();

var flag = $('#message').html();
if(flag == "Matching"){
if(chkmail==0){
  $.ajax({
 type: "POST",
 url: "SignUp.php",
 data: {
 function : 'adduser',
 firstname: firstname,
 lastname: lastname,
 email: email,
 gender: gender,
 number: number,
 password: password
 },
 success: function(data) {

if(data == "New record created successfully !"){
  setTimeout(function () {
    alert("successfull SignUp");
            window.location.href = "SignInH.php";
            window.clearTimeout(tID);   // clear time out.
        }, 1);

   
}else alert(data);
 
 },
 error: function(xhr, status, error) {
 console.error(xhr);
 }
 });
}else {alert("This Email is already used");}
}else $('#message').html('Type correct passsword').css('color', 'red');

});
    });
</script>

    </form>

<div class="hint-text">Already have an account? <a href="SignInH.php">Login here</a></div>
  
</div>

</body>

</html>