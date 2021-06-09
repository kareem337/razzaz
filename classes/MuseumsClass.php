<?php 
error_reporting(E_ERROR | E_WARNING | E_PARSE);
include 'classes/Category.php';
class museums extends category
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

