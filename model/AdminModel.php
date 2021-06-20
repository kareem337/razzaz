<?php 
require_once('model/PersonModel.php');
session_start();
class AdminModel extends PersonModel
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

    public function addTrip($tname,$tloc,$tprice,$tdesc,$tpic,$tbackground)
     {
    
        $conn = $this->connect();
        $sql = "INSERT INTO `Products`(`Name`,`Location`,`Price`, `Description`, `Image`,`Background`,`category` ) VALUES ('$tname','$tloc','$tprice','$tdesc','$tpic', '$tbackground',1)";



            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('Trip Added')</script>";
                echo '<script>window.location="EditTripsH.php"</script>';
                        
            } 
            else 
            {
                echo "<script>alert('Error in editing')</script>";
            }
    }
    public function removeTrip($trip_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM `products` WHERE `ID` = ". $trip_id;
     
            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('deleted')</script>";
                        
            } 
            else 
            {
                echo "<script>alert('Error in deleting')</script>";
            }
        
    }
    public function Updatetrips($id,$location,$name,$price,$desc,$image,$background)
		{
		    $conn = $this->connect();
                $query = "UPDATE products SET Location = '$location', Name = '$name', Price = '$price' , Description = '$desc' , Image = '$image', Background = '$background' WHERE ID = '$id'";
                $result = mysqli_query($conn,$query);
                if ($result == true) {
                    print "<script>alert('Update Saved')</script>";
                    echo '<script>window.location="EditMuseums.php"</script>';
                   
                    
                    
                }else{
                    echo "Registration updated failed try again!";
                }
			
		}   

    public function displayTripById($id)
    {


        $conn = $this->connect();
        $query = "SELECT * FROM products WHERE ID = '$id'";
        $_SESSION['ID']=$_GET['editId'];
        $result = mysqli_query($conn,$query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;    
            }else{
            echo "Record not found";
            }
    }
    public function addmuseum($tname,$tloc,$tprice,$tdesc,$tpic,$tbackground) {
    
        $conn = $this->connect();
        $sql = "INSERT INTO `Products`(`Name`,`Location`,`Price`, `Description`, `Image`,`Background`,`category`) VALUES ('$tname','$tloc','$tprice','$tdesc','$tpic','$tbackground',2)";
        

            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('Museume Added')</script>";
                echo '<script>window.location="EditMuseums.php"</script>';
                        
            } 
            else 
            {
                echo "<script>alert('Error in editing')</script>";
            }


            
    }
    public function removemuseum($trip_id)
    {
        $conn = $this->connect();
        $sql = "DELETE FROM `products` WHERE `ID` = ". $trip_id;
     
            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('Museum deleted')</script>";
                        
            } 
            else 
            {
                echo "<script>alert('Error in deleting')</script>";
            }
     }
}
?>