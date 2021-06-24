<?php
session_start();
include("DB.php");
include 'controller/PersonController.php';
include 'view/PersonView.php';
//include 'model/PersonModel.php';
$personC = new PersonController();
//$personM = new PersonModel();
$personV = new PersonView();
if (isset($_POST['save'])) {
    $personC->savedataC();
    $_SESSION['error'] = $personC->get_errors();
    $_SESSION['confirm'] = $personC->getConfirmEdit();
}
if(isset($_POST['upload'])){
    $personC->editimgC();
    $_SESSION['error'] = $personC->get_errors();
    $_SESSION['confirm'] = $personC->getConfirmEdit();
}
if(isset($_POST['deleteAccount'])){
    $personC->deleteAccount();
}

?>

<!DOCTYPE html>

<html>
<head>
    
    <title>Edit Profile</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="assets/css/EditProfile.css">
    
    <style>    
        
  .bar {
  /*padding: 10px;*/
  margin-left: 120px;
  margin-bottom: 5px;
  width: 430px;      
  border: 1px solid #ccc;
  text-align: center;      
  font-size:14px; 
  /*font-family: Brush Script MT; */       
}
     
  .error {
  border: 1px solid #a33a3a;          
}    
     
  .success {
  border: 1px solid #617c42;
        
}     
     
 </style> 
    
</head>
<body style = "background: #668B91;">
    <?php
     include ('NavBarH.php');
  ?>

    <?php 
     
      $personV->fetchEditProfile();
       unset($_SESSION["error"]);
      unset($_SESSION["confirm"]);
    ?>
    
</body>
   
</html>