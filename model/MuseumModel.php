<?php
require_once('classes/Category.php');
session_start();
class MuseumModel extends category
{
    public function __construct($name, $description, $background, $price) 
    {
        if(isset($_SESSION["Clicked_Museum_ID"]))
        {
            $mid = $_SESSION["Clicked_Museum_ID"];
            $sql = "SELECT * FROM products WHERE ID = $mid";
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
}

?>