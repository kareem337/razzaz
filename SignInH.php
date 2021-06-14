<?php
include("classes/Person.php");
$login = new Person();
if (isset($_POST['sign_in'])) {
    $login->login($_POST);
    $error = $login->get_errors_login_all();
    $confirm = $login->getConfirmLogin();
}
?>
<!DOCTYPE html>
<html>

<head>

 
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

  <style>
  .bar {
  padding: 10px;
  margin-left: 80px;
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

<header >
   

     <?php
     include'NavBarH.php';
     ?>
      
   
  </header><!-- End Header -->
 <link rel="stylesheet" href="SignIn.css">
    <div class="signin-form">
    <form id="SignInF" method="POST" action = "SignInH.php">

          <h1>Sign In</h1>

    <p id="p">Please fill this form to Sign In.</p>
                <?php
                if (isset($error)) {
                    ?>
                        <div class='alert alert-danger bar error close' data-dismiss = 'alert'>
                        <?php echo $error; ?>
                        </div>
                        <?php }
                 ?>
             <?php
              if (isset($confirm)) {?>
                    <div class='alert alert-danger bar success close' data-dismiss = 'alert'>
                    <?php echo $confirm; ?>
                    </div>
                     <?php }
             ?>    
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

    <div class="hint-text"> New User? <a href="SignUpH.php" style="color:white;" >Sign Up Here</a></div>

    <div id="result"></div>
    </div>
</body>
</html>