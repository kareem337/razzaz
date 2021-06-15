<?php 
require_once('classes/Person.php');
session_start();
class UserModel extends Person
{
    private $currentdate;
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

        $sql = "INSERT INTO `cart` (`User_ID`, `quantity`,`Date_Created`, `Total_Price`,`pid`) VALUES ('$User', '$quantity',' $date', '$price',' $tripid')";
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

    public function deleteItemFromCart(){
        $conn = $this->connect();
        $pid = $_GET['remove'];
        $removeitem = "DELETE FROM `cart` WHERE pid = $pid";
        $removeResultt = mysqli_query($conn, $removeitem);
    }
    
    public function purchase($price){
        $conn = $this->connect();
        $user = $_SESSION['Logged_in_ID'];
        $this->currentdate = date('Y-m-d H:i:s');
        $allCart = "SELECT * FROM cart WHERE user_id = '".$_SESSION['Logged_in_ID']."'";
        $result2 = mysqli_query($conn, $allCart);

        if ($result2->num_rows > 0) 
        {
            // output data of each row
            while($row = $result2->fetch_assoc()) 
            {
                $pid = $row['pid'];
                $sql = "INSERT INTO `orders` (`ID`, `user_id`, `order_placed` ,`pid` , `price`) 
		        VALUES (NULL, '$user', '$this->currentdate' ,'$pid', '$price')";
                $insertResult = mysqli_query($conn, $sql);
                $removeCart = "DELETE FROM cart WHERE user_id=$user";
                $removeResult = mysqli_query($conn, $removeCart);
                header("location: store.php");
            }
        }
    }

}


?>