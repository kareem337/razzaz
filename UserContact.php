<?php 
	session_start();
    include 'classes/User.php';
    $reserve = new Reserve();
?>
<html>
    <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="contact.css" /> 
    </head>
    <body style="background-color: #668B91;">
<header>


</header>
<div class="container">

  <div class="display-chat">

		<div class="message">
	<p>
    <?php $reserve->fetchMyMsg(); ?>
	</p>
		</div>


  </div>
  <form class="form-horizontal" action="UserContact.php" method="POST">
    <div class="form-group">
      <div class="col-sm-10">          
      <textarea name="msg" class="form-control" style= "width:500px" placeholder="Type your message here..."></textarea>
      <br>
      </div>
      <div class="col-sm-2">
      <button type="submit"  style= "background-color: #83cf27;" class="btn btn-primary"  name="send" >Send</button>
      </div>
    </div>
  </form>
  <?php
  						if(isset($_SESSION["Logged_in_ID"]))
                        {
							if( isset($_POST['send']))
							{
								$user_id = $_SESSION["Logged_in_ID"];
                                $user_name = $_SESSION["Logged_in_Name"];
                                $msg = $_POST['msg'];
								$reserve->sendToAdmin($user_id, $user_name, $msg);
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


