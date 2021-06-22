<?php
include 'controller/PersonController.php';
include 'view/PersonView.php';
//include 'model/PersonModel.php';
$personC = new PersonController();
$personV = new PersonView();
//$personM = new PersonModel();
if (isset($_POST['sign_in'])) {
    $personC->loginC();
     $_SESSION['error'] = $personC->get_errors_login_all();
     $_SESSION['confirm'] = $personC->getConfirmLogin();
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
 <link rel="stylesheet" href="assets/css/SignIn.css">

 <?php
 
 
 $personV->fetchSignIn();

 
 unset($_SESSION["error"]);
 unset($_SESSION["confirm"]);

 ?>

</body>
</html>