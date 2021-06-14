<?php
require_once('UserModel.php');
class UserView extends UserModel
{
    public function fetchMyMsg()
    {
        echo " <div class='display-chat'>
		<div class='message'>
	    <p>";
        if(isset($_SESSION['Logged_in_ID']))
        {
        
            $id = $_SESSION['Logged_in_ID'];
        
            $sql="SELECT * FROM `chat` WHERE sender = $id OR reciever = $id";
    
            $result = $this->connect()->query($sql);

            while($row= $result->fetch_assoc())	
            {
                echo "<span style='font-weight: 700;'>".$row["sender_name"]."</span>";
                echo ": ";
                echo $row["message"];
                echo "<br>";
            }
        }
        echo" </p>
        </div>
  </div>";
    }

    public function fetchMsgForm()
    {
        echo'<form class="form-horizontal" action="UserContact.php" method="POST">
        <div class="form-group">
          <div class="col-sm-10">          
          <textarea name="msg" class="form-control" style= "width:500px" placeholder="Type your message here..."></textarea>
          <br>
          </div>
          <div class="col-sm-2">
          <button type="submit"  style= "background-color: #83cf27; margin-left:520px; margin-top:-75px;" class="btn btn-primary"  name="send" >Send</button>
          </div>
        </div>
      </form>';
  
    }
}