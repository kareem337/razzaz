<?php 
class   Admin
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
        $sql = "INSERT INTO `trips`(`name`,`location`,`Price`, `Description`, `image`) VALUES ('$tname','$tloc','$tprice','$tdesc','$tpic')";
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
       
    

    $sql = "UPDATE `trips` SET `name`= ". $trips. ",`location`=" .$loc. " ,`Price`=".$price.", `Description`=".$desc.", `image`=".$pic." WHERE `ID`= ".$id; 
    // $sql = "UPDATE `users` SET `User_Type_ID`=". $userTid . " WHERE `ID` = ". $user_id;  

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

        $sql = "DELETE FROM `trips` WHERE `ID` = ". $trip_id;
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

		    $query = "SELECT * FROM trips WHERE ID = '$id'";
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
                $query = "UPDATE trips SET location = '$location', name = '$name', Price = '$price' , Description = '$desc' , image = '$image' WHERE ID = '$id'";
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
		    $query = "DELETE FROM customers WHERE id = '$id'";
		    $sql = $this->con->query($query);
		if ($sql==true) {
			header("Location:index.php?msg3=delete");
		}else{
			echo "Record does not delete try again";
		    }
		}





}