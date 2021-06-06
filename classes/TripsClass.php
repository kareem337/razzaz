<?php 
session_start(); 
class Product
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

    function getBackground()
    {
        if(isset($_SESSION["Clicked_Trip_ID"]))
        {
           $id = $_SESSION["Clicked_Trip_ID"];
            $sql = "SELECT background FROM trips WHERE ID = $id";
            $result = $this->connect()->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                echo $row["background"];
                }
            }
        }
    }

    function getName()
    {
        if(isset($_SESSION["Clicked_Trip_ID"]))
        {
           $id = $_SESSION["Clicked_Trip_ID"];
            $sql = "SELECT name FROM trips WHERE ID = $id";
            $result = $this->connect()->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                echo $row["name"];
                }
            }
        }
    }

    function getDescription()
    {
        if(isset($_SESSION["Clicked_Trip_ID"]))
        {
           $id = $_SESSION["Clicked_Trip_ID"];
            $sql = "SELECT Description FROM trips WHERE ID =$id";
            $result = $this->connect()->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                echo $row["Description"];
                }
            }
        }
    }
    function getPrice()
    {
        if(isset($_SESSION["Clicked_Trip_ID"]))
        {
          $id = $_SESSION["Clicked_Trip_ID"];
            $sql = "SELECT Price FROM trips WHERE ID =$id";
            $result = $this->connect()->query($sql);
            if ($result->num_rows > 0) 
            {
                while($row = $result->fetch_assoc()) 
                {
                echo $row["Price"];
                }
            }
        }
    }

}

?>

