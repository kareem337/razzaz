<?php
require_once('classes/Category.php');
session_start();
class TripModel extends category
{
    public function __construct($name, $description, $background, $price) 
    {
        if(isset($_SESSION["Clicked_Trip_ID"]))
        {
            $tid = $_SESSION["Clicked_Trip_ID"];
            $sql = "SELECT * FROM products WHERE ID = $tid";
            $result = $this->connect()->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                $this->name = $row['Name'];
                $this->description = $row['Description'];
                $this->background = $row['Background'];
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