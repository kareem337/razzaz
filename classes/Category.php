<?php
class category 
{
    private $id;
    //private $name;
    //private $description;
    //private $price;
    //private $background;
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

    
    function getId()
    {
        return $this->id;
    }
    
    function getBackground(){
        return $this->background;
    }
    
    function getName(){
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
}