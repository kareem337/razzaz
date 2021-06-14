<?php
include("classes/Person.php");
$register = new Person();
if (isset($_POST['register'])) {
    $register->register($_POST);
    $error = $register->get_errors();
    $confirm = $register->getConfirmReg();
}
?>
<!DOCTYPE html>
<html>
<head>
<?php
     include'NavBarH.php';
  ?>

  <link rel="stylesheet" href="SignUp.css">
  
 <style>
  .bar {
  padding: 10px;
  margin-left: 75px;
  margin-bottom: 5px;
  width: 380px;      
  color: #333;
  background: #fafafa;
  border: 1px solid #ccc;
        
}
     
  .error {
  color: #ba3939;
  background: #ffe0e0;
  border: 1px solid #a33a3a;
}    
     
  .success {
  color: #2b7515;
  background: #ecffd6;
  border: 1px solid #617c42;
}     
     
 </style>    
    
</head>
<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
    
</script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

<div class="signup-form"> 

<form method="post" style="margin-top:150px;">
    
 <h1>Sign Up</h1>

  <p id="p">Please fill in this form to create a new account.</p>
  <hr>
    <div class="text-left w-100 mb-4 ml-3">
        <p class="text-green h3 font-weight-bold text-uppercase">Create an Account</p>
            <?php
                if (isset($error)) {
                    foreach ($error as $e) { ?>
                        <div class='alert alert-danger bar error close' data-dismiss = 'alert'>
                        <?php echo $e; ?>
                        </div>
                        <?php }
                } ?>
             <?php
              if (isset($confirm)) {?>
                    <div class='alert alert-danger bar success close' data-dismiss = 'alert'>
                    <?php echo $confirm; ?>
                    </div>
                     <?php }
             ?>
    </div>

<div class="form-group">
            <div class="row">

        <div class="col-xs-8">
        <input type="text" style="margin-left:13%;" placeholder="Enter Your First Name" name="firstname" class="form-control" required> </div>
            </div>          
        </div>

     <div class="form-group">

     <input type="text" style="margin-left:13%;" placeholder="Enter Your Last Name" name="lastname" class="form-control" required>

     </div>

     <div class="form-group">
     <input type="email" style="margin-left:13%;" value = " " placeholder="Enter Email" name="email" class="form-control"required>
     </div>

    
    <div class="form-group">
    <input type="text" style="margin-left:13%;" placeholder="Enter Your Number" name="number" class="form-control" maxlength="11" required>
    </div>


    <div class="form-group">
    <input type="password" style="margin-left:13%;" placeholder="Enter Password" name="password" class="form-control" required>
    </div>

    <div class="form-group">
    <input type="password" style="margin-left:13%;" placeholder="Repeat Password" name="confirm_password" class="form-control" required>
    </div>

    <span id='message' ></span><br><br>

    <div class="form-group">
    Male<input type="radio" style="margin-left:5px;" name="gender" value="male" class="form-radio" required> 
    
    Female<input type="radio" style="margin-left:5px;" name="gender" value="female" class="form-radio" required> 
    </div>


    <div class="form-group">
    <label class="checkbox-inline"> <input type="checkbox" required>
    By creating an account you must agree our <a href="#">Terms & Privacy</a>.</label> 
    </div>




    <div class="form-group">
      <input type="Submit" value="Submit" name="register" class="btn btn-primary btn-lg">
    </div>


    </form>

<div class="hint-text">Already have an account? <a href="SignInH.php">Login Here</a></div>
  
</div>

</body>

</html>