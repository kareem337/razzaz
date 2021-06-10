<?php 
	session_start();
	if(isset($_SESSION['Logged_in_ID']))
	{
        include "DB.php"; 
        $id = $_SESSION['Logged_in_ID'];
	
		$sql="SELECT * FROM `chat` WHERE sender = $id OR reciever = $id";

		$query = mysqli_query($conn,$sql);
?>
<style>

h2{
color:white;
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
  height:60%;
  /*background-color:#83cf27; */
  margin-top:10%;
  margin-bottom:1%;
  overflow:auto;
  padding:15px;
}
.message{
  background-color: white;
  color: black;
  border-radius: 15px;
  padding: 5px;
  margin-bottom: 3%;
}
img {
  max-height: 150px;
  max-width: 200px;
}
  .modal {
display: none; /* Hidden by default */
position: fixed; /* Stay in place */
z-index: 1; /* Sit on top */
padding-top: 100px; /* Location of the box */
left: 0;
top: 0;
width: 100%; /* Full width */
height: 100%; /* Full height */
overflow: auto; /* Enable scroll if needed */
background-color: rgb(0,0,0); /* Fallback color */
background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
background-color: #fefefe;
margin: auto;
padding: 20px;
border: 1px solid #888;
width: 80%;
}

/* The Close Button */
.close {
text-align: right;
color: #aaaaaa;
font-size: 28px;
font-weight: bold;
}

.close:hover,
.close:focus {
color: #000;
text-decoration: none;
cursor: pointer;
}   
</style>

<html>
    <head>
      <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link type="text/css" rel="stylesheet" href="contact.css" /> 
    </head>
    <body style="background-color: #668B91; margin-left: 50;">
    <header>
   

   <?php
   include'NavBarH.php';
   ?>
    
 
</header>
<div style = 'margin-left: 500px;' class="container">

  <div class="display-chat" style = "margin-top: 150px;">
      <div class="contact100-map" id="google_map" data-map-x="40.722047" data-map-y="-73.986422" data-pin="images/icons/map-marker.png" data-scrollwhell="0" data-draggable="1"></div>  
     <input class = 'btn btn-light' type="button" onclick="view()" id = "myBtn"  Value="View Messages"> 
      <div id="myModal" class="modal">

       <!-- Modal content -->
       <div class="modal-content" style = "width: 800px;">
        <span class="close">&times;</span>
         <table class = "table table-hover">
      <tr> 
          <th> Image </th>
          <th> Message </th>
          <th> Time </th>
          <th> Links  </th>
      </tr>
    <?php
      $result = mysqli_query($conn, "SELECT * FROM chat WHERE sender = '".$_SESSION["Logged_in_ID"]."' OR reciever = '".$_SESSION["Logged_in_ID"]."' ORDER BY sender ASC");
      while($res = mysqli_fetch_array($result))
      {
          print "<tr>";
          
          print "<td ><img style = 'border-radius: 50%; width:50px; height: 50px;' src = images/".$res['images']." style = border-radius: 50%;></td>";
          print "<td>".$res['message']."</td>";
          print "<td>".$res['time']."</td>";
          print "<td>".$res['links']."</td>";
          print "</tr>";
      }
    ?>
    </table>
        </div>

       </div>    

  </div>
    <div style = "margin-top: -300px;"></div>
  <form class="form-horizontal" method="post" action="sendMessage.php" enctype="multipart/form-data">
    <div class="form-group">
      <div class="col-sm-10">          
      <textarea name="msg" class="form-control" style= "width:500px" placeholder="Type your message here..."></textarea>
      <br>
      <label for="url" style="color:black;">Enter an https:// URL:</label>
      <input type="url" name="url" id="url" style = "border-size: 20px;" placeholder="https://example.com" pattern="https://.*" size="30">
      &nbsp;&nbsp;
      <input type="file" name="image" id="image" /> 
      </div>
	         <br>
      <div class="col-sm-2">
      <button type="submit" class="btn btn-success">Send</button>

      
      </div>

    </div>
  </form>
</div>

</body>
</html>
<?php
    }
?>
 <script>  
     var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
 </script>
