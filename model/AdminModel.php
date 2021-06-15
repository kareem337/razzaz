<?php 
require_once('classes/Person.php');
session_start();
class AdminModel extends Person
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

    public function addTrip($tname,$tloc,$tprice,$tdesc,$tpic) {
    
        $conn = $this->connect();
        $sql = "INSERT INTO `Products`(`Name`,`Location`,`Price`, `Description`, `Image`,`category` ) VALUES ('$tname','$tloc','$tprice','$tdesc','$tpic',1)";
           $save = mysqli_query($conn,$sql);


            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('Trip Added')</script>";
                        
            } 
            else 
            {
                echo "<script>alert('Error in editing')</script>";
            }
    }

}
?>