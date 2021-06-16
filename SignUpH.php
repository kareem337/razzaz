<?php
include 'controller/PersonController.php';
include 'view/PersonView.php';
$personC = new PersonController();
$personV = new PersonView();
if (isset($_POST['register'])) {
    $personC->registerC();
    $_SESSION['error'] = $personC->get_errors();
    $_SESSION['confirm'] = $personC->getConfirmReg();
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

    
 <?php $personV->fetchSignUp();
  unset($_SESSION["error"]);
  unset($_SESSION["confirm"]); ?>
 
  

</body>

</html>