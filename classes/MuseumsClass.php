<?php 
session_start(); 
class Product
{
    private $name;
    private $description;
    private $price;
    private $background;

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
        if(isset($_SESSION["Clicked_Museum_ID"]))
        {
            $mid = $_SESSION["Clicked_Museum_ID"];
            $sql = "SELECT * FROM museums WHERE ID = $mid";
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

}

?>

