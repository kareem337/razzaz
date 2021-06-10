<?php 
include("Person.php");
class Reserve extends Person
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

    public function saveRecords($date, $quantity, $price, $pid, $User)
    {
        $conn = $this->connect();

        $sql = "INSERT INTO `cart` (`ID`, `User_ID`,`pid` ,`Date_Created`, `Total_Price`, `quantity`) VALUES (NULL, '$User', '$pid' ,'$date', '$price', '$quantity')";
        if (mysqli_query($conn, $sql)) 
        {
            print "<script>alert('Added To Cart')</script>";                
        } 
        else 
        {
            echo "<script>alert('Error in Adding')</script>";
        } 
    }
}