
<?php

include 'DB.php';
   
session_start();


$msg=0;
 


$sql="SELECT `ID` , `User_Type_ID` , `First Name` FROM `users` WHERE `Email` = '".$_POST['email']."'"." AND `Password` = '".$_POST['pwd']."'";

$select = $conn->query($sql);

                
               if ($select->num_rows > 0)
               {
                     while($select_data = $select->fetch_assoc()) {
                   $_SESSION["Logged_in_ID"]=$select_data['ID'];
                   $_SESSION["Logged_in_UTID"]=$select_data['User_Type_ID'];
                   $_SESSION["Logged_in_Name"]=$select_data['First Name'];
                 }

                  $_SESSION["Logged_in"] = true;
                    $msg= 1;
                   echo json_encode($msg);

                  
               }
               else 
               {
                
                  $msg=2;
                  echo json_encode($msg);
               }
            
           

 ?>






































