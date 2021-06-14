<?php
require_once('model/UserModel.php');
class UserController extends UserModel
{
    public function insertMsg()
    {
        $user_id = $_SESSION["Logged_in_ID"];
        $user_name = $_SESSION["Logged_in_Name"];
        $msg = $_POST['msg'];
        $this->sendToAdmin($user_id, $user_name, $msg);
    }

    public function insertTripRecord()
    {
        
        $date = $_POST['date'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $tripid = $_SESSION["Clicked_Trip_ID"];
        $User = $_SESSION["Logged_in_ID"];
        $this->saveRecords($User, $quantity, $date, $price, $tripid);
        

    }

    public function insertMuseumRecord()
    {
        
        $date = $_POST['date'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $museumid = $_SESSION["Clicked_Museum_ID"];
        $User = $_SESSION["Logged_in_ID"];
        $this->saveRecords($User, $quantity, $date, $price, $museumid);
        

    }

}

?>