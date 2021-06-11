<?php 
include("Person.php");
class   Admin extends Person
{
    private $userscount = 0;
    private $orderscount = 0;
    private $enquiriescount = 0;
    private $museumscount = 0;
    private $tripscount = 0;
    
    protected function connect ()
        {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname="razzaztours";

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        return $conn;
        }

    public function editRecords ($user_id,  $userTid)
    {

        $conn = $this->connect();
        $done = false;
        $sql = "UPDATE `users` SET `User_Type_ID`=". $userTid . " WHERE `ID` = ". $user_id;
        $save = mysqli_query($conn,$sql);

                if (mysqli_query($conn, $sql)) 
                {
                    print "<script>alert('Edit saved')</script>";
                    $done=true;       
                } 
                else 
                {
                    echo "<script>alert('Error in editing')</script>";
                    $done=false;
                }
                return $done;
        
    }

    public function deletRecords ($user_id)
    {
        $conn = $this->connect();

        $sql = "DELETE FROM `users` WHERE `ID` = ". $user_id;
        $delete = mysqli_query($conn,$sql);

            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('deleted')</script>";
                        
            } 
            else 
            {
                echo "<script>alert('Error in deleting')</script>";
            }
        
    }
    public function addTrip($tname,$tloc,$tprice,$tdesc,$tpic) {
        $conn = $this->connect();
        $sql = "INSERT INTO `Products`(`Name`,`Location`,`Price`, `Description`, `Image`) VALUES ('$tname','$tloc','$tprice','$tdesc','$tpic')";
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

   
    public function edittrips ($id,$trips,$loc,$price,$desc,$pic)
    {
        $conn = $this->connect();
       
    

    $sql = "UPDATE `products` SET `Name`= ". $trips. ",`Location`=" .$loc. " ,`Price`=".$price.", `Description`=".$desc.", `Image`=".$pic." WHERE `ID`= ".$id; 
  

    $save = mysqli_query($conn,$sql);


            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('Edit saved')</script>";
                        
            } 
            else 
            {
                echo "<script>alert('Error in editing')</script>";
            }
        
    }

    public function delettrips ($trip_id)
    {
        $conn = $this->connect();

        $sql = "DELETE FROM `products` WHERE `ID` = ". $trip_id;
        $delete = mysqli_query($conn,$sql);

            if (mysqli_query($conn, $sql)) 
            {
                print "<script>alert('deleted')</script>";
                        
            } 
            else 
            {
                echo "<script>alert('Error in deleting')</script>";
            }
        
    }

        public function displayTripById($id)
		{
            $conn = $this->connect();

		    $query = "SELECT * FROM products WHERE ID = '$id'";
		    $result = mysqli_query($conn,$query);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                return $row;
                }else{
                echo "Record not found";
                }
		}

		// Update customer data into customer table
		public function updateTrip($location,$name,$price,$desc,$image,$id)
		{
		    $conn = $this->connect();
                $query = "UPDATE products SET Location = '$location', Name = '$name', Price = '$price' , Description = '$desc' , Image = '$image' WHERE ID = '$id'";
                $result = mysqli_query($conn,$query);
                if ($result == true) {
                    header("Location: EditTripsH.php");
                }else{
                    echo "Registration updated failed try again!";
                }
			
		}


		// Delete customer data from customer table
		public function deleteTrip($id)
		{
		    $query = "DELETE FROM products WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}

            public function getUsersCount(){
            $con = $this->connect();
            $query = "SELECT COUNT(ID) FROM users WHERE User_Type_ID = 2";
            $this->userscount = $this->con->query($query)->fetch_row()[0];
            return $this->userscount;
        }
    
        public function getOrdersCount(){
            $con = $this->connect();
            $query = "SELECT COUNT(id) FROM orders";
            $this->orderscount = $this->con->query($query)->fetch_row()[0];
            return $this->orderscount;
        }
    
        public function getEnquiriesCount(){
            $con = $this->connect();
            $query = "SELECT COUNT(id) FROM chat";
            $this->enquiriescount = $this->con->query($query)->fetch_row()[0];
            return $this->enquiriescount;
        }
    
        public function getMuseumsCount(){
            $con = $this->connect();
            $query = "SELECT COUNT(ID) FROM products WHERE category = 2";
            $this->enquiriescount = $this->con->query($query)->fetch_row()[0];
            return $this->enquiriescount;
        }
    
        public function getTripsCount(){
            $con = $this->connect();
            $query = "SELECT COUNT(ID) FROM products WHERE category = 1";
            $this->tripscount = $this->con->query($query)->fetch_row()[0];
            return $this->tripscount;
        }
}
