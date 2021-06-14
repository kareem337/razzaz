<?php 
require_once('classes/Person.php');
session_start();
class UserModel extends Person
{
    protected function connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname="razzaztours";

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        return $conn;
    }

    public function sendToAdmin($user_id, $user_name, $msg)
    {
        $conn = $this->connect();

        $sql = "INSERT INTO `chat` (`sender`, `sender_name`, `message`) VALUES ('$user_id', '$user_name', '$msg')";
        
        $query = mysqli_query($conn,$sql);
        if ($query) 
        {
            echo '<script>window.location="UserContact.php"</script>';               
        } 
        else 
        {
            echo "<script>alert('Error in sending')</script>";
        } 
    }

    public function saveRecords($User, $quantity, $date, $price, $tripid)
    {
        $conn = $this->connect();

        $sql = "INSERT INTO `cart` (`User_ID`, `quantity`,`Date_Created`, `Total_Price`,`trip_id`) VALUES ('$User', '$quantity',' $date', '$price',' $tripid')";
        $query = mysqli_query($conn,$sql);
        if ($query) 
        {
            print "<script>alert('Added To Cart')</script>";                
        } 
        else 
        {
            echo "<script>alert('Error in Adding')</script>";
        } 
    }

}


?>