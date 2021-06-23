<?php 

session_start();
	include 'DB.php';

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
        $sql = "SELECT * FROM `chat` WHERE sender = $id OR reciever = $id";
        
        //Hold the id
        $_SESSION['reciever'] = $id;

		// get the query result
		$result = mysqli_query($conn, $sql);

      
    }        

?>
  
<style>
    body {
        margin:0;
        background-image: url('canyon.jpg'); 
    }

  h2{
    text-align : center;
     color:black;
  }
  label{
color:white;
  }
  span{
	  color:black;
	  font-weight:bold;
  }
  .container {
    width: 80%;
   /* background-color: #83cf27; */
   top:10px;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #83cf27;
	}
	.display-chat{
    height:45%;
    /*background-color:#83cf27; */
    margin-top:10%;
		margin-bottom:1%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #EEE9CB;
		color: black;
		border-radius: 15px;
		padding: 5px;
		margin-bottom: 3%;
	}
  .success{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 28px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    text-align: center     
  } 
  img {
    max-height: 150px;
    max-width: 200px;
  }
  </style>
<html>

    <head>
      <header>
   
<?php include'adminmenu.php'; ?>

 
</header>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    
    <body style=" background-color: #668B91;">
   
   
<div style="margin-left: 300px;" class="container">


  <div class="display-chat">
  <h2>Chat With Users</h2>
<?php

		while($row= $result->fetch_assoc())	
		{
?>
		<div class="message">
			<p>
				<span><?php echo $row['sender_name']; ?> :</span>
				<?php echo $row['message']; ?>
        <br>
			</p>
		</div>
<?php
		}
	
?>


  </div>
  
  <form class="form-horizontal" method="post" action="sendMessageAdminN.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" style= "width:500px" placeholder="Type your message here..."></textarea>
        
      </div>
	         <br>
      <div class="col-sm-2">
        <button type="submit"  style= "background-color: #83cf27; "class="success">Send</button>
      </div>

    </div>
  </form>
</div>

</body>
</html>
