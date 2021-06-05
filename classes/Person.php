<?php
session_start();
class Person{
    
    private $servername = "localhost";
    private $username = "root";
    private $pass = "";
    private $database = "razzaztours";
    public $con;
    
    private $firstname;
    private $lastname;
    private $email;
    private $number;
    private $gender;
    private $password;
    private $confirmpassword;
    
    private $confirmReg;
    private $confirmLogin;
    
    private $errors = [];
    private $get_errors_login = [];
    
    public function __construct(){
     $this->con = new mysqli($this->servername, $this->username, $this->pass, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->con;
        }
    }
    
    public function login($post)
    {
        $msg = 0;
        $this->email = $this->con->escape_string($_POST['email']);
        $this->password = $this->con->escape_string($_POST['pwd']);
        
        $sql="SELECT `ID` , `User_Type_ID` , `First Name` FROM `users` WHERE `Email` = '".$this->email."'"." AND `Password` = '".$this->password."'";

        $select = $this->con->query($sql);
        if ($select->num_rows > 0)
        {
            while($select_data = $select->fetch_assoc()) {
            $_SESSION["Logged_in_ID"]=$select_data['ID'];
            $_SESSION["Logged_in_UTID"]=$select_data['User_Type_ID'];
            $_SESSION["Logged_in_Name"]=$select_data['First Name'];
            }
            $_SESSION["Logged_in"] = true;
            header("location: HomePage.php");  
        }else{
         
        }
        
    }
    
    public function register($post)
    {
       
        $this->firstname = $this->con->escape_string($_POST['firstname']);
        $this->lastname = $this->con->escape_string($_POST['lastname']);
        $this->email = $this->con->escape_string($_POST['email']);
        $this->number = $this->con->escape_string($_POST['number']);
        $this->password = $this->con->escape_string($_POST['password']);
        $this->confirmPassword =  $this->con->escape_string($_POST['confirm_password']);
        $this->gender = $this->con->escape_string($_POST['gender']);
        $this->firstname();
        $this->lastname();
        $this->email();
        $this->password();
        $this->valid();
        if(empty($this->errors)){
        $query = "INSERT INTO `users` (`ID`, `First Name`, `Last Name`, `Email`, `Gender`, `Number`, `Password`, `User_Type_ID`) VALUES ('null', '$this->firstname', '$this->lastname', '$this->email', '$this->gender', '$this->number', '$this->password', '2')";
        $sql = $this->con->query($query);
        $this->confirmReg = "Registered Successfully you can sign in now";    
        }
        
    }
    
    public function firstname(){
        if(preg_match("^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$^", $this->firstname) == 0){
        $this->errors[] = "First name should be characters only!";
	 }
        
    }
    
    public function lastname(){
       if(preg_match("^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z])$^", $this->lastname) == 0){
        $this->errors[] = "Last name should be characters only!";
	 }
    }
    
    public function email(){
        //$this->email = filter_var($this->email,FILTER_SANITIZE_EMAIL);
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
         $this->errors[] = "Not a valid email address!";
        }
        else{
            $query = "SELECT * FROM users WHERE Email ='$this->email'";
            $result = $this->con->query($query);
            if ($result->num_rows > 0) {
                $this->errors[] = "Email already exist!";
            } 
        }
    }
    
    public function password(){
        $uppercase = preg_match('@[A-Z]@', $this->password);
        $lowercase = preg_match('@[a-z]@', $this->password);
        $number    = preg_match('@[0-9]@', $this->password);    
        if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 5) {
         $this->errors[] = "Password must Contain at least 5 Characters!"; 
        }
        else if($this->password != $this->confirmPassword){
         $this->errors[] = "Password doesn't match the retype password!";    
        }
        else{
         $searchQuery = "SELECT `Password` FROM users WHERE Password = '".$this->password."' ";
         $searchResult = $this->con->query($searchQuery); 
         if(mysqli_num_rows($searchResult) >= 1){
           $this->errors[] = "Invalid password!";      
         }
     }
    }
    
    public function valid(){
     $searchQuery = "SELECT `Email`, `Password` FROM users WHERE Email = '".$this->email."' AND Password = '$this->password'";
     $searchResult = $this->con->query($searchQuery);
     if(mysqli_num_rows($searchResult) >= 1){
       $this->errors[] = "Invalid email and password!";    
     }
    }

    public function get_errors()
    {
        return  $this->errors;
    }
    
    public function get_errors_login_all()
    {
        return $this->get_errors_login;
    }
    
    public function getConfirmReg(){
        return $this->confirmReg;
    }
    
    public function getConfirmLogin(){
        return $this->confirmLogin;
    }
}

?>