<?php 
class Product
{
    private $tripid;
    private $name;
    private $description;
    private $price;
    private $background;
    private $datecreated;
    private $quantity;

    protected function connect ()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname="razzaztours";

        $conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);
        return $conn;
    }


    public function __construct($name, $description, $background, $price) 
    {
        if(isset($_SESSION["Clicked_Trip_ID"]))
        {
            $tid = $_SESSION["Clicked_Trip_ID"];
            $sql = "SELECT * FROM trips WHERE ID = $tid";
            $result = $this->connect()->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                $this->name = $row['name'];
                $this->description = $row['Description'];
                $this->background = $row['background'];
                $this->price = $row['Price'];
                }
            }
        }
    }
    
    function getTripId(){
        return $this->tripid;
    }

    function getBackground()
    {
        return $this->background;
    }

    function getName()
    {
        return $this->name;
    }

    function getDescription()
    {
        return $this->description;
    }
    
    function getPrice()
    {
        return $this->price;
    }
    
    function getDateCreated()
    {
        return $this->datecreated;
    }
    
    function getQuantity()
    {
        return $this->quantity;
    }
    
    function getTotalPrice(){
        return $this->price;
    }
    
    public function fetchcart(){
        $tripid = 0;
        $userid = $_SESSION['Logged_in_ID'];
        $sql = "SELECT * FROM cart WHERE User_Id = $userid";
	    $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $this->tripid = $row['trip_id'];
                $this->datecreated = $row['Date_Created'];
                $this->quantity = $row['quantity'];    
                $this->price = $row['Total_Price'];
            }
        }
        
        $sql = "SELECT * FROM trips WHERE id = $tripid";
	    $result = $this->connect()->query($sql);
        if ($result->num_rows > 0) 
        {
            while($row = $result->fetch_assoc()) 
            {
                $this->name = $row['name'];
                $this->background = $row['background'];
            }
        } 
    }

}

?>

