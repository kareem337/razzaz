<?php 
class Reserve
{

    protected function connect ()
        {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname="razzaztours";

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        return $conn;
        }

    public function saveRecords ($date, $quantity, $price, $tripid, $User)
    {
        $conn = $this->connect();

            $sql = "INSERT INTO `cart` (`ID`, `User_ID`,`trip_id` ,`Date_Created`, `Total_Price`, `quantity`) 
		    VALUES (NULL, '$User', '$tripid' ,'$date', '$price', '$quantity')";
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