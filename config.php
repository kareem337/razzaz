<?php

class DB{
    private $dbHost;
    private $dbUsername;
    private $dbPassword;
    private $dbDatabase;
    public  $conn;
    
    function __construct(){
      $this->dbHost ='localhost';
      $this->dbUsername ='root';
      $this->dbPassword ='';
      $this->dbDatabase ='hikelydb';
      $this->conn=mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbDatabase);
    }
}





?>