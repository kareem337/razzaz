<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE); 
session_start();
class PersonModel
{

private $servername = "localhost";
private $username = "root";
private $pass = "";
private $database = "razzaztours";
public $con;

private $img;
private $firstname;
private $lastname;
private $email;
private $number;
private $gender;
private $password;
private $confirmpassword;
private $id = 0;

private $confirmReg;
private $confirmLogin;
private $confirmEdit;

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
        $this->confirmLogin = "Logged in successfully";
        if($_SESSION["Logged_in"] = true && $_SESSION["Logged_in_UTID"] == 2){
        header("location: index.php");  
        }
        else if($_SESSION["Logged_in"] = true && $_SESSION["Logged_in_UTID"] == 1){
            header("location: dashboard.php");
        }
    }else{
        //print("<script> alert('ERROR') </script>");
        $this->get_errors_login = "Check email or password";
    }
    
}

public function register($post)
{
    $this->img = "unnamed.jpg";
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
    $query = "INSERT INTO `users` (`ID`, `First Name`, `Last Name`, `Email`, `Gender`, `Number`, `Password`, `Picture`, `User_Type_ID`) VALUES ('null', '$this->firstname', '$this->lastname', '$this->email', '$this->gender', '$this->number', '$this->password', '$this->img', '2')";
    $sql = $this->con->query($query);
    $this->confirmReg = "Registered successfully you can sign in now";    
    }
    
}

public function savedata($post){
    $this->id = $_SESSION['Logged_in_ID'];
    $this->firstname = $this->con->escape_string($_POST['first_name']);
    $this->lastname = $this->con->escape_string($_POST['last_name']);
    $this->email = $this->con->escape_string($_POST['email']);
    $this->number = $this->con->escape_string($_POST['mobile']);
    $this->password = $this->con->escape_string($_POST['password']);
    $this->confirmPassword =  $this->con->escape_string($_POST['password2']);
    
    $this->firstname();
    $this->lastname();
    $this->email();
    $this->password();
    $this->valid();
    
    if(empty($this->errors)){
    $query = "UPDATE `users` SET `First Name`='$this->firstname',`Last Name`='$this->lastname',`Email`='$this->email',`Number`='$this->number',`Password`='$this->password' WHERE ID = '$this->id'";
    $sql = $this->con->query($query);
    $this->confirmEdit = "Edited successfully";    
    }
}

public function editimg($upload_pic){
    $this->id = $_SESSION['Logged_in_ID'];
    # check if it is an image or not!
    $this->img = $upload_pic;
    
    $query = "SELECT Picture FROM `users` where ID = '$this->id'";
    $sql = $this->con->query($query);
    
    if ($sql->num_rows > 0)
    {
        while($row = $sql->fetch_assoc()) {  
         $image = $row['Picture'];    
        }  
    }
    if(file_exists("img/personal-images/"))
    {
        unlink("img/personal-images/".$image);
        $this->confirmEdit = "Edited successfully";   
    }
    else
    {
       $this->errors = "Error while editing";     
    }
    
    $query = "UPDATE `users` SET `Picture`='$this->img' WHERE ID = '$this->id'";
    $sql = $this->con->query($query);
}

public function getprofile()
{
    $this->id = $_SESSION['Logged_in_ID'];
    $query = "SELECT * FROM `users` where ID = '$this->id'";
    $sql = $this->con->query($query);
    if ($sql->num_rows > 0)
    {
        while($row = $sql->fetch_assoc()) {
         $this->firstname = $row['First Name'];
         $_SESSION['Logged_in_Name'] = $row['First Name'];
         $this->lastname = $row['Last Name'];
         $this->email = $row['Email'];
         $this->number = $row['Number'];
         $this->password = $row['Password'];   
         $this->img = $row['Picture'];    
        }  
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
        $query = "SELECT * FROM users WHERE Email ='$this->email' AND ID <> $this->id";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $this->errors[] = "Email already exist!";
        } 
    }
}

public function number(){
    if(preg_match('@[0-9]@', $this->number) == 0){
        $this->errors[] = "Phone number must be numbers only!";
    }
}

public function password(){
    $uppercase = preg_match('@[A-Z]@', $this->password);
    $lowercase = preg_match('@[a-z]@', $this->password);
    $number    = preg_match('@[0-9]@', $this->password);    
    if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 5) {
     $this->errors[] = "Password must contain at least 5 Characters!"; 
    }
    else if($this->password != $this->confirmPassword){
     $this->errors[] = "Password doesn't match the retype password!";    
    }
    else{
     $searchQuery = "SELECT `Password` FROM users WHERE Password = '".$this->password."' AND ID <> $this->id";
     $searchResult = $this->con->query($searchQuery); 
     if(mysqli_num_rows($searchResult) >= 1){
       $this->errors[] = "Invalid password!";      
     }
 }
}

public function valid(){
 $searchQuery = "SELECT `Email`, `Password` FROM users WHERE Email = '".$this->email."' AND Password = '$this->password' AND ID <> $this->id";
 $searchResult = $this->con->query($searchQuery);
 if(mysqli_num_rows($searchResult) >= 1){
   $this->errors[] = "Invalid email and password!";    
 }
}

public function deleteAccount(){
   // $con = $this->connect();
    $id = $_SESSION['Logged_in_ID'];
    $sql = "DELETE FROM `users` WHERE ID = $id";
    
    $query = $this->con->query($sql);
    if ($query) 
    {
        header('Location: index.php'); 
        include("logout.php");
    } 
    else 
    {
        echo "<script>alert('Error in deletion')</script>";
        
    } 
}

public function getfirstname(){
    //$this->getprofile();
    return $this->firstname;
}

public function getlastname(){
    return $this->lastname;
}

public function getemail(){
    return $this->email;
}

public function getnumber(){
    return $this->number;
}

public function getpassword(){
    return $this->password;
}

public function getimg(){
    return $this->img;
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

public function getConfirmEdit(){
    return $this->confirmEdit;
}
}
?>