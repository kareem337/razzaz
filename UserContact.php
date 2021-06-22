<?php 
	session_start();
    include 'model/UserModel.php';
    include 'view/UserView.php';
    include 'controller/UserController.php';
    $UserM = new UserModel();
    $UserV = new UserView();
    $UserC = new UserController();
?>
<html>
    <head>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="assets/css/contact.css" /> 
    </head>
    <body style="background-color: #668B91;">
        <?php
     include'NavBarH.php';
     ?>
<div class="container">
    <?php $UserV->fetchMyMsg(); ?>

  <?php $UserV->fetchMsgForm(); ?>
  
  <?php
  						if(isset($_SESSION["Logged_in_ID"]))
                        {
							if( isset($_POST['send']))
							{
								$UserC->insertMsg();
							}
                        }
						else 
				        {
								echo "<script>alert('You will not be able to send unless you log in')</script>";
				        }
							?>
</div>

</body>
</html>


